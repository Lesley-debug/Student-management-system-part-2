<?php
require_once '../models/Batches.php';

Class BatchesController {
    private $Batches;

    public function __construct() {
        $this->Batches = new batches();
    }

    public function index() {
        return $this->Batches->readAll();
    }

    public function show($id) {
        return $this->Batches->readOne($id);
    }

    public function store($course_id, $name, $start_date, $end_date) {
        $this->Batches->course_id = $course_id;
        $this->Batches->name = $name;
        $this->Batches->start_date =$start_date;
        $this->Batches->end_date = $end_date;
        return $this->Batches->create();
    }

    public function update($id, $course_id, $name, $start_date, $end_date) {
        $this->Batches->id = $id;
        $this->Batches->id = $course_id;
        $this->Batches->name = $name;
        $this->Batches->start_date = $start_date;
        $this->Batches->end_date = $end_date;
        return $this->Batches->update();
    }

    public function delete($id) {
        $this->Batches->id = $id;
        return $this->Batches->delete();
    }
}

$BatchesController = new BatchesController();