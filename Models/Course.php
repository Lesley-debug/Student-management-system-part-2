<?php
require_once '../config/database.php';

class Courses extends Database {
    private $courses = "courses";

    public $id;
    public $name;
    public $syllabus;
    public $duration;

    public function __construct(){
        $this->connect();
    }

    // Get all
    public function readAll() {
        $sql = "SELECT * FROM `courses`";
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
        $sql = "SELECT * FROM `courses` WHERE `id` = $id";
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
        $stmt = $this->conn->prepare("INSERT INTO $this->courses (name, syllabus, duration) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->name, $this->syllabus, $this->duration);
        return $stmt->execute();
    }

    // UPDATE
    public function update() {
        var_dump("okay");
        $stmt = $this->conn->prepare("UPDATE $this->courses SET name=?, syllabus=? WHERE id=?");
        $stmt->bind_param("ssi", $this->name, $this->syllabus, $this->id);
        return $stmt->execute();
    }

    // DELETE
    public function delete() {
        $stmt = $this->conn->prepare("DELETE FROM courses WHERE id=?");
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}
