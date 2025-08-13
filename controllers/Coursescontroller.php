<?php
require_once '../models/Course.php';

Class CoursesController {
    private $courses;

    public function __construct() {
        $this->courses = new Courses();
    }

    public function index() {
        return $this->courses->readAll();
    }

    public function show($id) {
        return $this->courses->readOne($id);
    }

    public function store($name, $syllabus, $duration) {
        $this->courses->name = $name;
        $this->courses->syllabus =$syllabus;
        $this->courses->duration = $duration;
        return $this->courses->create();
    }

    public function update($id, $name, $syllabus) {
        $this->courses->id = $id;
        $this->courses->name = $name;
        $this->courses->syllabus = $syllabus;
        //$this->courses->duration = $duration;
        return $this->courses->update();
    }

    public function delete($id) {
        $this->courses->id = $id;
        return $this->courses->delete();
    }
}

$CoursesController = new CoursesController();