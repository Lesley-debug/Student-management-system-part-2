
<?php 
include "../header.php";
require_once '../config/Database.php';
require_once '../controllers/TeachersController.php';


    $db = (new Database())->connect();
$controller = new teachersController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST['name'], $_POST['mobile'], $_POST['address']);
    header("Location: index.php");
    exit();
}
?>

<div class="card">
    <div class="card-header">Students Page</div>
    <div class="card-body">
        <form action="index.php" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required><br>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" required><br>
            <label for="mobile">Mobile</label>
            <input type="tel" name="mobile" id="mobile" class="form-control" required><br>

            <button type="submit">Create</button>
        </form>
    </div>
</div>

<?php include "../footer.php" ?>