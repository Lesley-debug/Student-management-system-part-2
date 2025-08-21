<?php include "../header.php" ?>

<?php
    require_once '../config/database.php';
    require_once '../controllers/Enrollmentcontroller.php';
    
    $db = (new Database())->connect();
    $controller = new Enrollmentcontroller($db);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $controller->store($_POST['enroll_no'], $_POST['batch_id'], $_POST['student_id'], $_POST['join_date'], $_POST['fee']);
        header("location: index.php");
    }
        
    if(isset($_POST['submit'])){
        $enroll_no = mysqli_real_escape_string($db, htmlspecialchars($_POST['enroll_no']));
        $batch_id = $_POST['batch_id'];
        $student_id = $_POST['st_idudent'];
        $join_date = $_POST['join_date'];
        $fee = $_POST['fee'];

        $stmt = $db->prepare("insert into enrollment(enroll_no, batch_id, student_id, join_date, fee) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("siiss", $enroll_no, $batch_id, $student_id, $join_date, $fee);
        if($stmt->execute()){
            echo "inserted successfully";
        } else {
            echo "failed to insert";
        } 
    }
?>

<div class="card">
    <div class="card-header">Enrollment Page</div>
    <div class="card-body">
        <form action="index.php" method="POST">
            <label for="enroll_no">Enroll no</label>
            <input type="text" name="enroll_no" id="enroll_no" class="form-control" required><br>
            
            <label for="batch_id">Batch</label><br>
            <select name="batch_id" id="batch_id" class="custom-select" >
                <?php
                    $stmt = $db->prepare("select id, name from batches");
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        while ($data = $result->fetch_array()) {
                           
                            echo '
                                <option value="'.$data['id'].'"> '.$data['name'].'</option>
                            ';
                        }
                    }
                ?>
                
            </select><br>

            
            <label for="student_id">Student</label><br>
            <select name="student_id" id="student_id" class="custom-select" >
                
                <?php
                    $stmt = $db->prepare("select id, name from student");
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        while ($data = $result->fetch_array()) {
                           
                            echo '
                                <option value="'.$data['id'].'"> '.$data['name'].'</option>
                            ';
                        }
                    }
                ?>
            </select><br>
            
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" id="join_date" class="form-control" required><br>
            
            <label for="fee">Fee</label>
            <div class="input-group mb-3">
                <input type="number" name="fee" id="fee" class="form-control" placeholder="Fee" aria-describedby="currency" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="currency">FCFA</span>
                </div>
            </div>

            <button type="submit" name="submit" value="Create">Create</button>
        </form>
    </div>
</div>

<?php include "../header.php" ?>