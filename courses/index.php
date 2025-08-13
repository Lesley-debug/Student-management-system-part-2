<?php include "../header.php" ?>

<?php
require_once '../controllers/Coursescontroller.php';

$Courses = $CoursesController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CoursesController->store($_POST['name'], $_POST['syllabus'], $_POST['duration']);
    header("Location: index.php");
    exit();
}
?>


<div class="card">
  <div class="card-header">
    <h2>Course Application</h2>
  </div>
  <div class="card-body">
    <a href="create.php" class="btn btn-success btn-sm" title="Add New Course">
      <i class="fa fa-plus" aria-hidden="true"></i> Add New
    </a>
    <br />
    <br />
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>syllabus</th>
            <th>duration</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($Courses as $courses) {?>
            
          <tr>
            <td><?php echo $courses['id'] ?></td>
            <td><?php echo $courses['name'] ?></td>
            <td><?php echo $courses['syllabus'] ?></td>
            <td><?php echo $courses['duration'] ?></td>
            
            <td>
              <a href="show.php" title="View Course"><button class="btn btn-primary">View</button></a>
              <a href="<?php echo "edit.php?id=". $courses['id'] ?>" title="Edit Course"><button class="btn btn-success">Edit</button></a>
              
              <form method="POST" action="index.php">
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Course">Delete</button>
              </form>
              
            </td>
          </tr>
          <?php  } ?>
          <h2></h2>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include "../footer.php" ?>