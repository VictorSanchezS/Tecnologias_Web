<?php

class RolesModel
{

    protected $db, $registros;

    public function __construct()
    {
        $this->db = Conexion::conectar();
        $this->registros = array();
    }

    public function getRoles($modulo, $perfil, $columna)
    {
        $estado = "";
        
        $sql = "SELECT $columna FROM roles where id_modulo= $modulo and id_perfil=$perfil";
        $consulta = $this->db->query($sql);
        $row =  $consulta->fetch_assoc();
        if (isset($row)) {
            if ($row["$columna"] == 1) {
                $estado = "checked";
            } else {
                $estado = "";
            }
        }
        return $estado;
    }

    public function saveRoles($data)
    {

        $sql = "INSERT INTO roles (id_modulo, id_perfil, c, r, u, d, p) 
                        VALUES ('".$data["id_modulo"]."', 
                                '".$data["id_perfil"]."', 
                                '".$data["c"]."', 
                                '".$data["r"]."', 
                                '".$data["u"]."', 
                                '".$data["d"]."', 
                                '".$data["p"]."')";
        $this->db->query($sql);
    }

    public function deleteRoles($id_perfil){
        $sql = "DELETE FROM roles WHERE id_perfil = $id_perfil";
        $this->db->query($sql);
    }
}
