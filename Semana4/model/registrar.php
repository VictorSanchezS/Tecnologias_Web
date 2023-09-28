<?php
require "../config/login.php";
//var_dump($_POST);

if(isset($_POST['nombre'])){

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$tdocumento=(int)$_POST['tdocumento'];
$ndocumento=$_POST['ndocumento'];
$categoria=$_POST['categoria'];

//$tdocumento=isset($_POST['tdocumento'])?(int)$_POST['tdocumento']:null;

$arrayPasatiempos=isset($_POST['chkpasatempos'])?$_POST['chkpasatempos']:null;
$pasatiempos="";
if($arrayPasatiempos!=null){
    $cantidad = count($arrayPasatiempos);
    foreach($arrayPasatiempos as $row){
        $pasatiempos.=$row.", ";
    }
}

$sql ="INSERT INTO docentes 
        (nombre, correo, tipoDocumento, nDocumento, categoria, pasatiempo)
        values ('$nombre','$correo',$tdocumento,'$ndocumento',$categoria,'$pasatiempos');" ;
//echo $sql;
$resultado = $pdo->prepare($sql);
$resultado ->execute();
}
//header('Location:/opt/lampp/htdocs/Semana4/view/index.php');
header("Location:/Semana4/view/")
?>

<!-- <a href="../view/index.php">Regresar</a> -->

