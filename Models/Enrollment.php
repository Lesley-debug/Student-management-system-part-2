<?php
require_once '../config/database.php';

class Enrollment extends Database {

  private $enrollment = "enrollment";

  public $id;
  public $enroll_no;
  public $batch_id;
  public $student_id;
  public $Join_date;
  public $fee;

  public function __construct(){
    $this->connect();
  }

  // Get All
  public function readALL(){
    $sql = "SELECT * FROM `enrollment`";
    $result = mysqli_query($this->conn, $sql);
        $rows = [];
        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        return $rows;
  }

  // Get oneit
    public function readOne($id) {
        $sql = "SELECT * FROM `enrollment` WHERE `id` = $id";
        $result = mysqli_query($this->conn, $sql);
        $row = [];

        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row = $row;
                break;
            }
        }
      return $row;
    }

    public function create ()
    {
      $sql = "INSERT into $this->enrollment(enroll_no, batch_id, student_id, join_date, fee) values(?, ?, ?, ?, ?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("siiss", $this->enroll_no, $this->batch_id, $this->student_id, $this->Join_date, $this->fee);
      return $stmt->execute;
    }

    //update
    public function update(){
      $stmt = $this->conn->prepare("update $this->enrollment set enroll_no=?, batch_id=?, student_id=?, join_date=?, fee=? where id=?");
      $stmt->bind_param("siiss", $this->enroll_no, $this->Join_date, $this->fee);
      return $stmt->execute;
    }

    //delete
    public function delete(){
      $stmt=$this->conn->prepare("delete from enrollment where id=?");
      $stmt->bind_param("i", $this->id);
      return $stmt->execute;
    }

}