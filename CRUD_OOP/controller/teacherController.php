<?php
ini_set('display_errors', 1);

class teacherController{
    private $model;

    public function __construct()
    {
        //require_once("./model/teacherModel.php");
        require_once("/opt/lampp/htdocs/Semana_04/model/teacherModel.php");
        $this->model = new teacherModel();
    }

    public function save($name_teacher, $email, $doc_type, $doc_number, $category, $hobbies){
        $id_teacher = $this->model->insert($name_teacher, $email, $doc_type, $doc_number, $category, $hobbies);
        return ($id_teacher != false) ? header("Location:show.php?id_teacher=".$id_teacher) : header("Location:create.php");
    }

    public function show($id_teacher){
        return ($this->model->show($id_teacher) != false) ? $this->model->show($id_teacher): header("Location:index.php");
    }

    public function index(){
        return ($this->model->index()) ? $this->model->index() : false;
    }

    public function update($id_teacher, $name_teacher, $email, $doc_type, $doc_number, $category, $hobbies){
        return ($this->model->update($id_teacher, $name_teacher, $email, $doc_type, $doc_number, $category, $hobbies) != false) ? header("Location:show.php?id=".$id_teacher) : header("Location:index.php") ;
    }

    public function delete($id_teacher){
        return ($this->model->delete($id_teacher)) ? header("Location:index.php") : header("Location:show.php?id=".$id_teacher) ;
    }
    
}
