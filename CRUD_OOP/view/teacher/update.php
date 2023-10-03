<?php

    ini_set('display_errors', 1);
    require_once("../../controller/teacherController.php");
    
    $obj = new teacherController();

    $id_teacher = $_POST['id_teacher'];
    $name_teacher = $_POST['name_teacher'];
    $email = $_POST['email'];
    $doc_type = (int) $_POST['doc_type'];
    $doc_number = $_POST['doc_number'];
    $category = (int) $_POST['category'];
    $hobbies = isset($_POST['chkHobbies']) ? implode(', ', $_POST['chkHobbies']) : '';
    
    $obj->update($id_teacher,$name_teacher,$email,$doc_type, $doc_number, $category, $hobbies);
?>