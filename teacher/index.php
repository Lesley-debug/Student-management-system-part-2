<?php include "../header.php" ?>

<?php
require_once '../controllers/TeachersController.php';

$teachers = $teachersController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teachersController->store($_POST['name'], $_POST['mobile'], $_POST['address']);
    header("Location: index.php");
    exit();
}
?>


<div class="card">
  <div class="card-header">
    <h2>Teacher Application</h2>
  </div>
  <div class="card-body">
    <a href="create.php" class="btn btn-success btn-sm" title="Add New Teacher">
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
          <?php foreach($teachers as $teacher){ ?>
          <tr>
              <td><?php echo $teacher['id'] ?></td>
              <td><?php echo $teacher['name'] ?></td>
              <td><?php echo $teacher['mobile'] ?></td>
              <td><?php echo $teacher['address'] ?></td>
              
              <td>
                <a href="show.php" title="View Student"><button class="btn btn-primary">View</button></a>
                <a href="<?php echo "edit.php?id=". $teacher['id']  ?>" title="Edit Student"><button class="btn btn-success">Edit</button></a>
                
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