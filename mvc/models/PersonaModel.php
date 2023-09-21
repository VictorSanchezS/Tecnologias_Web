<?php

class PersonaModel
{

    protected $db, $registros;

    public function __construct()
    {
        $this->db = Conexion::conectar();
        $this->registros = array();
    }

    public function getAllResultados()
    {
        $sql = "SELECT * FROM personas
                INNER JOIN perfiles ON perfiles.id_perfil = personas.idPerfil";
        $consulta = $this->db->query($sql);

        while ($row = $consulta->fetch_assoc()) {
            $this->registros[] = $row;
        }

        return $this->registros;
    }

    public function getAllResultadosID($id)
    {
        $sql = "SELECT * FROM personas
                INNER JOIN perfiles ON perfiles.id_perfil = personas.idPerfil
                WHERE personas.id_persona= $id";

        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }


    public function save($data)
    {
        $sql = "INSERT INTO personas (nombres, 
                                      apPaterno, 
                                      apMaterno,
                                      correo,
                                      usuario,
                                      contrasenia,
                                      idPerfil) 
                VALUES ('" . $data["nombres"] . "', 
                        '" . $data["apPaterno"] . "', 
                        '" . $data["apMaterno"] . "', 
                        '" . $data["correo"] . "', 
                        '" . $data["usuario"] . "', 
                        '" . $data["contrasenia"] . "', 
                        '" . $data["perfil"] . "')";
        $this->db->query($sql);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE personas SET nombres = '" . $data["nombres"] . "', 
                                    apPaterno = '" . $data["apPaterno"] . "', 
                                    apMaterno = '" . $data["apMaterno"] . "', 
                                    correo = '" . $data["correo"] . "', 
                                    usuario = '" . $data["usuario"] . "', 
                                    contrasenia = '" . $data["contrasenia"] . "', 
                                    idPerfil = '" . $data["perfil"] . "' 
                                WHERE personas.id_persona = $id";
        $this->db->query($sql);
    }


    public function deletePersonaID($id)
    {
        $sql = "DELETE FROM personas where id_persona = $id";
        if ($this->db->query($sql) === true) {
            return true;
        } else {
            return false;
        }
    }


    //método que permite validar un correo a nivel de registro y actualización
    public function correoUnicoUsuario($id = null, $valor)
    {
        if ($id == null) {
            $sql = "SELECT*FROM personas where correo = '$valor' limit 1";
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();
            if ($row) {
                return true;
            } else {
                return false;
            }
        } else {
            $sql = "SELECT*FROM personas where correo = '$valor' and id_persona='$id'";
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();
            if ($row == 1) {
                return false;
            } else {
                $sql = "SELECT*FROM personas where correo = '$valor' and not(id_persona= '$id') limit 1";
                $resultado = $this->db->query($sql);
                $row = $resultado->fetch_assoc();
                if ($row) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function usuarioUnico($id = null, $valor)
    {
        if ($id == null) {
            $sql = "SELECT*FROM personas where usuario = '$valor' limit 1";
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();
            if ($row) {
                return true;
            } else {
                return false;
            }
        } else {
            $sql = "SELECT*FROM personas where usuario = '$valor' and id_persona='$id'";
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();
            if ($row == 1) {
                return false;
            } else {
                $sql = "SELECT*FROM personas where usuario = '$valor' and not(id_persona= '$id') limit 1";
                $resultado = $this->db->query($sql);
                $row = $resultado->fetch_assoc();
                if ($row) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function getPerfiles()
    {

        $this->registros = array();
        $sql = "SELECT * FROM perfiles where estado = 1";
        $consulta = $this->db->query($sql);

        while ($row = $consulta->fetch_assoc()) {
            $this->registros[] = $row;
        }
        return $this->registros;
    }
}
