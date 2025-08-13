<?php include "../header.php" ?>

<?php
require_once '../controllers/StudentController.php';

$students = $studentController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentController->store($_POST['name'], $_POST['mobile'], $_POST['address']);
    header("Location: index.php");
    exit();
}
?>


<div class="card">
  <div class="card-header">
    <h2>Student Application</h2>
  </div>
  <div class="card-body">
    <a href="create.php" class="btn btn-success btn-sm" title="Add New Student">
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
            <th>Address</th>
            <th>Mobile</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($students as $student){ ?>
          <tr>
              <td><?php echo $student['id'] ?></td>
              <td><?php echo $student['name'] ?></td>
              <td><?php echo $student['mobile'] ?></td>
              <td><?php echo $student['address'] ?></td>
              
              <td>
                <a href="<?php echo "show.php?id=". $student['id']  ?>" title="View Student"><button class="btn btn-primary">View</button></a>
                <a href="<?php echo "edit.php?id=". $student['id']  ?>" title="Edit Student"><button class="btn btn-success">Edit</button></a>
                
                <form method="POST" action="index.php">
                  <button type="submit" class="btn btn-danger btn-sm" title="Delete Student">Delete</button>
                </form>
                
              </td>
            </tr>
            <?php } ?>
          <h2></h2>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?php include "../footer.php" ?>