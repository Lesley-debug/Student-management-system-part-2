<?php
require_once '../config/database.php';

class Student extends Database {
    private $student = "student";

    public $id;
    public $name;
    public $mobile;
    public $address;

    public function __construct(){
        $this->connect();
    }
    

    // Get all
    public function readAll() {
        $sql = "SELECT * FROM `student`";
        $result = mysqli_query($this->conn, $sql);
        $rows = [];

        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        return $rows;
    }
    
    // Get one
    public function readOne($id) {
        $sql = "SELECT * FROM `student` WHERE `id` = $id";
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

    // CREATE
    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO $this->student (name, mobile, address) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->name, $this->mobile, $this->address);
        return $stmt->execute();
    }

    // UPDATE
    public function update() {
        var_dump("okay");
        $stmt = $this->conn->prepare("UPDATE $this->student SET name=?, mobile=?, address=? WHERE id=?");
        $stmt->bind_param("sssi", $this->name, $this->mobile, $this->address, $this->id);
        return $stmt->execute();
    }

    // DELETE
    public function delete() {
        $stmt = $this->conn->prepare("DELETE FROM student WHERE id=?");
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}
