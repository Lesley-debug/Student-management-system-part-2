<?php
require_once '../models/Student.php';

Class StudentController {
    private $student;

    public function __construct() {
        $this->student = new student();
    }

    public function index() {
        return $this->student->readAll();
    }

    public function show($id) {
        return $this->student->readOne($id);
        
    }

    public function store($name, $mobile, $address) {
        $this->student->name = $name;
        $this->student->mobile =$mobile;
        $this->student->address = $address;
        return $this->student->create();
    }

    public function update($id, $name, $mobile, $address) {
        $this->student->id = $id;
        $this->student->name = $name;
        $this->student->mobile = $mobile;
        $this->student->address = $address;
        return $this->student->update();
    }

    public function delete($id) {
        $this->student->id = $id;
        return $this->student->delete();
    }
}

$studentController = new StudentController();