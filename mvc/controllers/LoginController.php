<?php
require_once "models/LoginModel.php";
require_once "ValController.php";

class  LoginController
{
    protected $db;
    protected $validation;
    protected $errores;

    public function __construct()
    {
        $this->db = new LoginModel();
        $this->validation = new ValController();
        $this->errores = array();
    }

    public function index()
    {
        require_once "views/login/login.php";
    }

    public function validarCredenciales()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $usuario = $_POST["txtUsuario"];
            $password = $_POST["txtPassword"];

            $this->validarUsuario($usuario);
            $this->validarPassword($password);

            if ($this->errores) {
                $data = array("errores" => $this->errores);
                require_once "views/login/login.php";
            } else {
                echo "datos";
                $data = array(
                    "personas" => $this->db->getAllResultados($usuario, $password)
                );
                print_r($data);
            }
        }
    }

    private function validarUsuario($valor)
    {
        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["usuario"] = "Debe ingresar un valor en Usuario";
        }
    }


    private function validarPassword($valor)
    {
        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["password"] = "Debe ingresar un valor en Password";
        }
    }
}
