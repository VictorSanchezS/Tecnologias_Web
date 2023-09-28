<?php 

/*$mysqli = new mysqli("localhost","root","","db_tw");
if($mysqli->connect_error){
    die("Error de conexion".$mysqli->connect_error);
}
*/
$dsn='mysql:dbname=db_tw_2;host=127.0.0.1';
$usr='root';
$pwd='';

global $pdo;

try {
    $pdo = new PDO($dsn,$usr,$pwd);
} catch (PDOexception $e){
    echo 'falló la conexión'.$e->getMessage();
}
?>