<?php include "../header.php" ?>

<?php
  require_once '../controllers/Enrollmentcontroller.php';

  $Enrollment = $Enrollmentcontroller->index();

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $Enrollmentcontroller->store($_POST['enroll_no'], $_POST['batch_id'], $_POST['student_id'], $_POST['join_date'], $_POST['fee']);
    header("location: index.php");
    die();
  }

  
?>

<div class="card">
  <div class="card-header">
    <h2>Enrollments</h2>
  </div>
  <div class="card-body">
    <a href="create.php" class="btn btn-success btn-sm" title="Add New Enrollment">
      <i class="fa fa-plus" aria-hidden="true"></i> Add New
    </a>
    <br />
    <br />
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Enroll_no</th>
            <th>Batch</th>
            <th>Student</th>
            <th>Join Date</th>
            <th>Fee</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($Enrollment as $enrollment) {?>
          <tr>
            <td><?=$enrollment['id'] ?></td>
            <td><?=$enrollment['enroll_no'] ?></td>
            <td><?=$enrollment['batch_id'] ?></td>
            <td><?=$enrollment['student_id'] ?></td>
            <td><?=$enrollment['join_date'] ?></td>
            <td><?=$enrollment['fee'] ?></td>
            
            <td>
              <a href="" title="View Enrollment"><button class="btn btn-primary">View</button></a>
              <a href="" title="Edit Enrollment"><button class="btn btn-success">Edit</button></a>
              
              <form method="POST" action="">
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Enrollment">Delete</button>
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