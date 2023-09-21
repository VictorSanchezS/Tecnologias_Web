<?php

class LoginModel
{

    protected $db, $registros;

    public function __construct()
    {
        $this->db = Conexion::conectar();
        $this->registros = array();
    }

    public function getAllResultados($user, $pass)
    {
        $sql = "SELECT * FROM personas where usuario = $user";
        $consulta = $this->db->query($sql);
        $row = $consulta->fetch_assoc();

        return $row;
    }
}
