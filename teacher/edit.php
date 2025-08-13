
<?php
 include "../header.php";

require_once '../controllers/TeachersController.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
}

$id = $_GET['id'];

// Fetch current student data
$teachers = $teachersController->show($id);


// Handle update
if (isset($_POST['submit'])) {
    $teachersController->update($id, $_POST['name'], $_POST['mobile'], $_POST['address']);
    header("Location: index.php");
    exit();
}
?>

<div class="card">
    <div class="card-header">Contact Us Page</div>
    <div class="card-body">
        <form action="" method="POST">
            <input type="hidden" name="id" value="">
            
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $teachers['name'] ?>" required><br>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control"  value="<?php echo $teachers['address'] ?>" required><br>
            
            <label for="mobile">Mobile</label>
            <input type="tel" name="mobile" id="mobile" class="form-control"  value="<?php echo $teachers['mobile'] ?>" required><br>
            
            
            <button type="submit" name="submit">Update</button>
        </form>
    </div>
</div>

<?php include "../footer.php" ?>