<?php

require_once("../../controller/teacherController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['submit']))) {
    $name_teacher = $_POST['name_teacher'];
    $email = $_POST['email'];
    $doc_type = (int) $_POST['doc_type'];
    $doc_number = $_POST['doc_number'];
    $category = (int) $_POST['category'];

    $hobbies = isset($_POST['chkHobbies']) ? implode(', ', $_POST['chkHobbies']) : '';

     $obj = new teacherController();
     $obj->save($name_teacher, $email, $doc_type, $doc_number, $category,$hobbies);

}
