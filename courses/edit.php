<?php 
include "../header.php";

require_once '../controllers/CoursesController.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
}

$id = $_GET['id'];

// Fetch current student data
$Courses = $CoursesController->show($id);


// Handle update
if (isset($_POST['submit'])) {
    $CoursesController->update($id, $_POST['name'], $_POST['syllabus']);
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
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $Courses['name'] ?>" required><br>
            <label for="syllabus">Syllabus</label>
            <input type="text" name="syllabus" id="syllabus" class="form-control" value="<?php echo $Courses['syllabus'] ?>" required><br>
            
            <button type="submit" name="submit">Update</button>
        </form>
    </div>
</div>

<?php include "../header.php" ?>