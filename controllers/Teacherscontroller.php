<?php
require_once '../models/teachers.php';

Class teachersController {
    private $teachers;

    public function __construct() {
        $this->teachers = new Teachers();
    }

    public function index() {
        return $this->teachers->readAll();
    }

    public function show($id) {
        return $this->teachers->readOne($id);
        
    }

    public function store($name, $mobile, $address) {
        $this->teachers->name = $name;
        $this->teachers->mobile =$mobile;
        $this->teachers->address = $address;
        return $this->teachers->create();
    }

    public function update($id, $name, $mobile, $address) {
        $this->teachers->id = $id;
        $this->teachers->name = $name;
        $this->teachers->mobile = $mobile;
        $this->teachers->address = $address;
        return $this->teachers->update();
    }

    public function delete($id) {
        $this->teachers->id = $id;
        return $this->teachers->delete();
    }
}

$teachersController = new teachersController();