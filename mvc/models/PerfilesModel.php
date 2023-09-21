<?php

class PerfilesModel
{

    protected $db, $registros;

    public function __construct()
    {
        $this->db = Conexion::conectar();
        $this->registros = array();
    }


    public function getAllResults()
    {
        $sql = "SELECT *FROM perfiles ORDER BY id_perfil DESC";
        $consulta = $this->db->query($sql);

        if (!$consulta) {
            $this->registros[] ="Sin registros que mostrar";
        } {
            while ($row = $consulta->fetch_assoc()) {
                $this->registros[] = $row;
            }
        }
        return $this->registros;
    
    }

    public function getResultID($id){
        $sql = "SELECT * FROM perfiles WHERE id_perfil = $id";
        $consulta = $this->db->query($sql);
        $row =  $consulta->fetch_assoc();
        return $row;
    }


    public function savePerfil($data)
    {
        $sql = "INSERT INTO perfiles (imagen, 
                                      perfil,
                                      estado) 
                VALUES ('" . $data["imagen"] . "', 
                        '" . $data["perfil"] . "',
                        '" . $data["estado"] . "')";
        $this->db->query($sql);
    }

    public function updatePerfil($id, $data){
        $sql = "UPDATE perfiles SET imagen = '".$data["imagen"]."', 
                                    perfil = '".$data["perfil"]."', 
                                    estado = '".$data["estado"]."' 
                                WHERE perfiles.id_perfil = $id";
        $this->db->query($sql);
    }


    public function deletePerfil($id){
        $sql = "DELETE FROM perfiles WHERE id_perfil = $id ";

        if($this->db->query($sql)===TRUE){
            return true;
        }else{
            return false;
        }
    }
}
