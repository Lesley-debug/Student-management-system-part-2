<?php include "../header.php" ?>
<?php
require_once '../config/Database.php';
require_once '../controllers/CoursesController.php';


    $db = (new Database())->connect();
$controller = new CoursesController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST['name'], $_POST['syllabus'], $_POST['duration']);
    header("Location: index.php");
    exit();
}
?>

<div class="card">
    <div class="card-header">Courses Page</div>
    <div class="card-body">
        <form action="index.php" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required><br>
            <label for="syllabus">syllabus</label>
            <input type="text" name="syllabus" id="syllabus" class="form-control" required><br>
            <label for="duration">Duration (in Months)</label>
            <input type="number" name="duration" id="duration" class="form-control" required><br>
            
            <button type="submit">Create</button>
        </form>
    </div>
</div>

<?php include "../footer.php" ?>