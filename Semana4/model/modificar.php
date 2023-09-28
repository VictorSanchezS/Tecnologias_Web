<?php
ini_set('display_errors', 1);
require "../config/login.php";
// echo '<pre>';
// print_r($_GET['tdocumento']);
// echo '</pre>';

    if(isset($_GET['id_docente'])){

    $id_docente=$_GET['id_docente'];
    $nombre=$_GET['nombre'];
    $correo=$_GET['correo'];
    $tdocumento=(int)$_GET['tdocumento'];
    $ndocumento=$_GET['ndocumento'];
    $categoria=$_GET['categoria'];

    // // var_dump($_GET['nombre']);
    // // var_dump($_GET['correo']);

    //$tdocumento=isset($_GET['tdocumento'])?(int)$_GET['tdocumento']:null;

    $arrayPasatiempos=isset($_GET['chkpasatempos'])?$_GET['chkpasatempos']:null;
    $pasatiempos="";
    if($arrayPasatiempos!=null){
        $cantidad = count($arrayPasatiempos);
        foreach($arrayPasatiempos as $row){
            $pasatiempos.=$row.", ";
        }
    }

    $sql ="UPDATE docentes set 
            nombre='$nombre', correo='$correo', tipoDocumento=$tdocumento, nDocumento='$ndocumento', categoria=$categoria, pasatiempo='$pasatiempos'
            where id_docente=$id_docente;";
    //echo $sql;

    $resultado = $pdo->prepare($sql);
    $resultado ->execute();

    header("Location:/Semana4/view/");
    }
?>
<!-- <a href="../view/index.php">regresar</a> -->