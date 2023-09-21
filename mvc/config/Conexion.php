<?php

class Conexion
{

    public static function conectar()
    {
        /*
        $conn = new mysqli("localhost","root","","db_tw");
        if(!$conn){
            die("Error en la conexión ".mysqli_connect_error());
        }else{
            echo "conexión exitosa";

        }*/

        try {
            // Crear la conexión
            $conn = new mysqli("localhost","root", "", "db_tw");
        
            // Verificar si la conexión fue exitosa
            if ($conn->connect_error) {
                throw new Exception($conn->connect_error);
            }else{
                return $conn;
            }
        
        } catch (Exception $e) {
            // Manejo de errores
            echo "Error: " . $e->getMessage();
        }
    }
}
