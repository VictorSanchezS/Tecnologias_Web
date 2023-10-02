<?php

class db{
    //public $pdo = null;

    private $host = "localhost";
    private $dbname = "tw_db";
    private $user = "root";
    private $password = "";

    public function connection(){
        try{
            $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
            return $PDO;
        }catch(PDOException $e){
            throw new Exception("Error en la conexión a la base de datos: " . $e->getMessage());
        }
    }
    
}

