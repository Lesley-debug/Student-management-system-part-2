<?php include "../header.php" ?>


<div class="card">
    <div class="card-header">Payments</div>
    <div class="card-body">
        <form action="" method="POST">
            <label for="enrollment_id">Enrollment</label><br>
            <select name="enrollment_id" id="enrollment_id" class="custom-select" >
                <option value="" selected>Select An Enrollment</option>
                <option value=""></option>
            </select><br>
            <!-- <input type="text" name="course_id" id="course_id" class="form-control" required><br> -->
            
            <label for="paid_date">Paid Date</label>
            <input type="date" name="paid_date" id="paid_date" class="form-control" required><br>

            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required><br>
            
            <button type="submit">Create</button>
        </form>
    </div>
</div>
<?php include "../footer.php" ?>
