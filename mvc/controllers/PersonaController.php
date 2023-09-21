<?php

require_once "models/PersonaModel.php";
require_once "ValController.php";

class PersonaController
{

    protected $db;
    protected $errores;
    protected $validation;

    public function __construct()
    {
        session_start();
        $this->db = new PersonaModel();
        $this->validation = new ValController();
        $this->errores = array();
    }

    public function index()
    {
        $data = array(
            "contenido" => "views/persona/persona.php",
            "titulo" => "Administración de usuarios",
            "personas" => $this->db->getAllResultados(),
        );

        /*
        echo "<pre>";
        print_r($data["personas"]);
        echo "</pre>";

        echo "<br> Obtener datos mediante fetch_object";
        echo "<pre>";
        print_r($data["personas"][1]->nombres);
        echo "</pre>";

        echo "<br> Obtener datos mediante fetch_row";
        echo "<pre>";
        print_r($data["personas"][0][1]);
        echo "</pre>"; 

        echo "<br> Obtener datos mediante fetch_assoc";
        echo "<pre>";
        print_r($data["personas"][0]["nombres"]);
        echo "</pre>";

        echo "<br> Obtener datos mediante fetch_all";
        echo "<pre>";
        print_r($data["personas"][0][0][4]);
        echo "</pre>";
        */
        require_once TEMPLATE;
    }

    public function frmRegistrar()
    {
        $data = [
            "contenido" => "views/persona/frmRegistrar.php",
            "titulo" => "Registrar nuevo usuario",
            "perfiles" => $this->db->getPerfiles()
        ];
        require_once TEMPLATE;
    }

    public function registrarPersona()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nombre = $_POST["txtNombre"];
            $apPaterno = $_POST["txtApPaterno"];
            $apMaterno = $_POST["txtApMaterno"];
            $correo = $_POST["txtCorreo"];
            $usuario = $_POST["txtUsuario"];
            $contrasenia = $_POST["txtContrasenia"];
            $perfil = $_POST["cboPerfil"];

            $this->validarNombre($nombre);
            $this->validarApPaterno($apPaterno);
            $this->validarApMaterno($apMaterno);
            $this->validarCorreo($id = null, $correo);
            $this->validarUsuario($id = null, $usuario);
            $this->validarContrasenia($contrasenia);
            if ($this->errores) {
                $data = [
                    "contenido" => "views/persona/frmRegistrar.php",
                    "titulo" => "Registrar nuevo usuario",
                    "errores" => $this->errores,
                    "perfiles" => $this->db->getPerfiles()
                ];
                require_once TEMPLATE;
            } else {
                $dataPersona = [
                    "nombres" => $this->validation->test_input($nombre),
                    "apPaterno" => $apPaterno,
                    "apMaterno" => $apMaterno,
                    "correo" => $this->validation->test_input($correo),
                    "usuario" => $usuario,
                    "contrasenia" => $contrasenia,
                    "perfil" => $perfil
                ];

                $this->db->save($dataPersona);

                $_SESSION['mensaje'] = "Datos registrados correctamente";
                $url = BASE_URL . "persona";
                header("Location: $url");
            }
        } else {
            $data["contenido"] = ERROR_404;
            require_once TEMPLATE;
        }
    }

    public function frmActualizar($id)
    {
        $data = [
            "contenido" => "views/persona/frmActualizar.php",
            "titulo" => "Actualizar datos de Usuario",
            "persona" => $this->db->getAllResultadosID($id),
            //"perfiles" => $this->db->getPerfiles(),
            "perfiles" => $this->db->getPerfiles()
        ];

        require_once TEMPLATE;
    }

    public function actualizarPersona($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nombre = $_POST["txtNombre"];
            $apPaterno = $_POST["txtApPaterno"];
            $apMaterno = $_POST["txtApMaterno"];
            $correo = $_POST["txtCorreo"];
            $usuario = $_POST["txtUsuario"];
            $contrasenia = $_POST["txtContrasenia"];
            $perfil = $_POST["cboPerfil"];

            $this->validarNombre($nombre);
            $this->validarApPaterno($apPaterno);
            $this->validarApMaterno($apMaterno);
            $this->validarCorreo($id, $correo);
            $this->validarUsuario($id, $usuario);
            $this->validarContrasenia($contrasenia);
            
            if ($this->errores) {
                $data = [
                    "contenido" => "views/persona/frmActualizar.php",
                    "titulo" => "Actualizar datos de Usuario",
                    "persona" => $this->db->getAllResultadosID($id),
                    "perfiles" => $this->db->getPerfiles(),
                    "errores" => $this->errores,
                ];
                
                require_once TEMPLATE;
            } else {
                $dataPersona = [
                    "nombres" => $this->validation->test_input($nombre),
                    "apPaterno" => $apPaterno,
                    "apMaterno" => $apMaterno,
                    "correo" => $this->validation->test_input($correo),
                    "usuario" => $usuario,
                    "contrasenia" => $contrasenia,
                    "perfil" => $perfil
                ];

                $this->db->update($id, $dataPersona);

                $_SESSION['mensaje'] = "Datos actualizados correctamente";
                $url = BASE_URL . "persona";
                header("Location: $url");
            }
        } else {
            $data["contenido"] = ERROR_404;
            require_once TEMPLATE;
        }
    }

    public function eliminarPersonaID($id)
    {
        if ($this->db->deletePersonaID($id)) {
            $_SESSION["mensaje"] = "Datos eliminados correctamente";
        } else {
            $_SESSION["mensaje"] = "Error al eliminar el registro";
        }

        $url = BASE_URL . "persona";
        header("Location: $url");
    }


    /**
     * Funciones para validar diferentes campos
     */

    private function validarNombre($valor)
    {
        $opciones = array(
            "options" => array(
                "min_range" => 3,
                "max_range" => 10
            )
        );
        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["nombre"] = "Debe ingresar un nombre de usuario";
        } else if (!$this->validation->validarLongitudes($valor, $opciones)) {
            $this->errores["nombre"] = "longitud de caracteres permitido: [3-10]";
        }
        return $this->errores;
    }

    private function validarApPaterno($valor)
    {
        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["apPaterno"] = "Debe ingresar un valor en apellido paterno";
        }
    }

    private function validarApMaterno($valor)
    {
        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["apMaterno"] = "Debe ingresar un valor en apellido materno";
        }
    }


    private function validarCorreo($id, $valor)
    {
        $opciones = array(
            "options" => array(
                "max_range" => 60,
            )
        );

        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["correo"] = "Debes ingresar un valor en el campo CORREO";
        } else if (!$this->validation->validarCorreo($valor)) {
            $this->errores["correo"] = "Valor incorrecto en el campo CORREO";
        } else if ($this->db->correoUnicoUsuario($id, $valor)) {
            $this->errores["correo"] = "Ya existe un registro con dicho valor";
        } else if (!$this->validation->validarLongitudes($valor, $opciones)) {
            $this->errores["correo"] = "Longitud de caracteres inválidos para el campo CORREO";
        }
        return $this->errores;
    }

    private function validarUsuario($id, $valor)
    {
        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["usuario"] = "Debe ingresar un valor en USUARIO";
        } else if ($this->db->usuarioUnico($id, $valor)) {
            $this->errores["usuario"] = "Ya existe un registro con dicho valor";
        }
    }

    private function validarContrasenia($valor)
    {

        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["contrasenia"] = "Debe ingresar un valor en CONTRASENIA";
        } else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,15}$/", $valor)) {
            //https://regexlib.com/Search.aspx?k=password&c=-1&m=-1&ps=100
            $this->errores["contrasenia"] = "La contraseña debe tener al menos 5 caracteres, no más de 15 caracteres y debe incluir al menos una letra mayúscula, una letra minúscula y un dígito numérico.";
        }
    }
}
