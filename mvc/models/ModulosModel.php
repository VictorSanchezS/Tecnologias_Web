<?php

class ModulosModel
{

    protected $db, $registros;

    public function __construct()
    {
        $this->db = Conexion::conectar();
        $this->registros = array();
    }

    public function getAllResultados()
    {
        $this->registros = array();
        $sql = "SELECT *FROM modulos WHERE submodulo is null";
        $consulta = $this->db->query($sql);

        while ($row = $consulta->fetch_assoc()) {
            $this->registros[] = $row;
            
            $id_modulo = $row["id_modulo"];
            $sql1 = "SELECT*FROM modulos WHERE submodulo = $id_modulo";
            $consulta1 = $this->db->query($sql1);
            while ($row = $consulta1->fetch_assoc()) {
                $this->registros[] = $row;
            }
        }
        return $this->registros;
    }

    public function getSubModulos()
    {
        $this->registros = array();
        $sql = "SELECT *FROM modulos WHERE submodulo is null";
        $consulta = $this->db->query($sql);

        while ($row = $consulta->fetch_assoc()) {
            $this->registros[] = $row;
        }

        return $this->registros;
    }

    public function saveModulo($data)
    {
        $sql = "INSERT INTO modulos (descripcion, 
                                      icon) 
                VALUES ('" . $data["descripcion"] . "', 
                        '" . $data["icon"] . "')";
        $this->db->query($sql);
    }

    public function saveSubModulo($data)
    {
        $sql = "INSERT INTO modulos (descripcion,
                                    url, 
                                      submodulo) 
                VALUES ('" . $data["descripcion"] . "',
                        '" . $data["url"] . "', 
                        '" . $data["submodulo"] . "')";

        $this->db->query($sql);
    }

    public function getResultID($id){
        $sql = "SELECT * FROM modulos WHERE id_modulo = $id";
        $consulta = $this->db->query($sql);
        $row =  $consulta->fetch_assoc();
        return $row;
    }

    public function updateModulo($id, $data)
    {
      
        $sql = "UPDATE modulos SET  descripcion = '".$data["descripcion"]."', 
                                    icon = '".$data["icon"]."' 
                                WHERE modulos.id_modulo = $id";
        $this->db->query($sql);
    }

    public function updateSubModulo($id, $data)
    {
        $sql = "UPDATE modulos SET  descripcion = '" . $data["descripcion"] . "',
                                    url = '" . $data["url"] . "', 
                                    submodulo= '" . $data["submodulo"] . "'
                               WHERE id_modulo = $id     
                                    ";

        $this->db->query($sql);
    }

    public function deleteModulo($id){
        $sql = "DELETE FROM modulos WHERE id_modulo = $id ";

        if($this->db->query($sql)===TRUE){
            return true;
        }else{
            return false;
        }
    }
}
