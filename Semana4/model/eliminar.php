<?php
ini_set('display_errors', 1);
require "../config/login.php";

$id_docente = $_GET['id_docente'];

$sql ="DELETE FROM docentes
        where id_docente=$id_docente;";
    //echo $sql;

    $resultado = $pdo->prepare($sql);
    $resultado ->execute();

    header("Location:/Semana4/view/");
?>

<!-- <a href="../view/index.php">Regresar</a> -->