<?php
include '../Models/Enrollment.php';

class Enrollmentcontroller {
  private $Enrollment;

  public function __construct()
  {
    $this->Enrollment = new enrollment;
  }

  public function index(){
   return $this->Enrollment->readALL();
  }

  public function show($id){
    return $this->Enrollment->readone($id);
  }

  public function store($enroll_no, $batch_id, $student_id, $join_date, $fee){
    $this->Enrollment->enroll_no = $enroll_no;
    $this->Enrollment->batch_id = $batch_id;
    $this->Enrollment->student_id = $student_id;
    $this->Enrollment->Join_date = $join_date;
    $this->Enrollment->fee = $fee;
    return $this->Enrollment->create();
  }

  public function update ($enroll_no, $batch_id, $student_id, $join_date, $fee){
    $this->Enrollment->enroll_no = $enroll_no;
    $this->Enrollment->batch_id = $batch_id;
    $this->Enrollment->student_id = $student_id;
    $this->Enrollment->Join_date = $join_date;
    $this->Enrollment->fee = $fee;
    return $this->Enrollment->update();
  }

  public function delete($id){
    $this->Enrollment->id = $id;
    return $this->Enrollment->delete();
  }

}

$Enrollmentcontroller = new Enrollmentcontroller();