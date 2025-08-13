<?php
require_once '../models/Student.php';
require_once '../controllers/StudentController.php';

$studentController = new StudentController();
$students = $studentController->index();

?>

<div class="card">
    <div class="card-header">
        Student's Page
    </div>
    

    <?php foreach($students as $student){ var_dump($student)?>
          <tr>
              <td><?php echo $student['id'] ?></td>
              <td><?php echo $student['name'] ?></td>
              <td><?php echo $student['mobile'] ?></td>
              <td><?php echo $student['address'] ?></td>
        
            </tr>
    <?php } ?>

</div>


<?php include "../footer.php" ?>