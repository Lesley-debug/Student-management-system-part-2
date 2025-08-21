<?php include "../header.php" ?>
<?php
require_once '../config/Database.php';
require_once '../controllers/BatchesController.php';


    $db = (new Database())->connect();
$controller = new BatchesController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST['course_id'], $_POST['name'], $_POST['start_date'], $_POST['end_date']);
    header("Location: index.php");
    exit();
}
?>

<h2>Add Batch</h2>
<form method="POST">
    <label>Course:</label>
    <select name="course_id" required>
        <?php 
            $stm = $db->prepare("select id, name from courses");
            if($stm->execute()){
                $result = $stm->get_result();
                while ($data = $result->fetch_array()) 
                {
                    echo '
                        <option value = "'.$data['id'].'"> '.$data['name'].'</option>
                    ';
                }
            }
        ?>
       
    </select><br><br>

    <label>Batch Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Start Date:</label>
    <input type="date" name="start_date" required><br><br>

    <label>End Date:</label>
    <input type="date" name="end_date" required><br><br>

    <button type="submit">Add Batch</button>
</form>
