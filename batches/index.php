<?php 
include "../header.php"; ?>

<?php
require_once '../controllers/Batchescontroller.php';

$Batches = $BatchesController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $BatchessController->store($_POST['course_id'], $_POST['name'], $_POST['start_dare'], $_POST['end_date']);
    header("Location: index.php");
    exit();
}
?>
<div class="card">
  <div class="card-header">
    <h2>Batches</h2>
  </div>
  <div class="card-body">
    <a href="create.php" class="btn btn-success btn-sm" title="Add New Batch">
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
            <th>Course</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($Batches as $batches) {?>
          <tr>
            <td><?= $batches['id'] ?></td>
            <td><?= $batches['name'] ?></td>
            <td><?= $batches['course_id'] ?></td>
            <td><?= $batches['start_date'] ?></td>
            <td><?= $batches['end_date'] ?></td>
            <td>
              <a href="" title="View Batch"><button class="btn btn-primary">View</button></a>
              <a href="" title="Edit Batch"><button class="btn btn-success">Edit</button></a>
              
              <form method="POST" action="">
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Batch">Delete</button>
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