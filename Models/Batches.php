<?php

require_once '../config/database.php';

class Batches extends Database {
    private $Batches = 'batches';
    //private $table = "batches";

    public $id;
    public $course_id;
    public $name;
    public $start_date;
    public $end_date;

    public function __construct(){
        $this->connect();
    }

    // Get all
    public function readAll() {
        $sql = "SELECT * FROM `Batches`";
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
        $sql = "SELECT * FROM `Batches` WHERE `id` = $id";
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
        $sql = "INSERT INTO $this->Batches (course_id, name, start_date, end_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isss", $this->course_id, $this->name, $this->start_date, $this->end_date);
        return $stmt->execute();
    }

    // UPDATE
    public function update() {
        var_dump("okay");
        $stmt = $this->conn->prepare("UPDATE $this->Batches SET name=?, start_date=?, end_date=? WHERE id=?");
        $stmt->bind_param("sssi", $this->name, $this->start_date, $this->end_date, $this->id);
        return $stmt->execute();
    }

    // DELETE
    public function delete() {
        $stmt = $this->conn->prepare("DELETE FROM Batches WHERE id=?");
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}

?>
