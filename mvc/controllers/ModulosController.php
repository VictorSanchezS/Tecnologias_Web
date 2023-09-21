<?php

require_once "models/ModulosModel.php";
require_once "ValController.php";

class ModulosController
{

    protected $db;
    protected $errores;
    protected $validation;

    public function __construct()
    {
        session_start();
        $this->db = new ModulosModel();
        $this->validation = new ValController();
        $this->errores = array();
    }

    public function index()
    {
        $data = array(
            "contenido" => "views/modulos/modulo.php",
            "titulo"    => "Administración de modulos",
            "modulos"   => $this->db->getSubModulos(),
            "registros" => $this->db->getAllResultados()
        );

        require_once TEMPLATE;
    }

    public function registrarModulos()
    {
        error_reporting(0);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $tipoOpcion = $_POST["cboOpcion"];
            $icon       = $_POST["txtIcon"];
            $cboModulo  = $_POST["cboModulo"];
            $url        = $_POST["txtUrl"];
            $descripcion = $_POST["txtDescripcion"];

            if ($tipoOpcion == 1) {
                $this->validarIcon($icon);
                $this->validarDescripcion($descripcion);
            } else {
                $this->validarDescripcion($descripcion);
                $this->validarURL($url);
            }

            if ($this->errores) {
                echo json_encode(array("statusCode" => 500, "errores" => $this->errores));
            } else {

                if ($tipoOpcion == 1) {
                    $dataModulo = [
                        "descripcion" => $descripcion,
                        "icon"        => $icon,
                    ];
                    $this->db->saveModulo($dataModulo);
                } else {
                    $dataSubModulo = [
                        "descripcion" => $descripcion,
                        "url"         => $url,
                        "submodulo"   => $cboModulo
                    ];
                    $this->db->saveSubModulo($dataSubModulo);
                }

                $_SESSION["mensaje"] = "Datos registrados correctamente";

                echo json_encode(array("statusCode" => 200));
            }
        } else {
            $data["contenido"] = ERROR_404;
            require_once TEMPLATE;
        }
    }

    public function verModuloID($id)
    {
        $data = $this->db->getResultID($id);
        echo json_encode(array("data" => $data));
    }

    public function actualizarModulos($id)
    {
        error_reporting(0);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $tipoOpcion = $_POST["cboOpcion"];
            $icon       = $_POST["txtIcon"];
            $cboModulo  = $_POST["cboModulo"];
            $url        = $_POST["txtUrl"];
            $descripcion = $_POST["txtDescripcion"];

            if ($tipoOpcion == 1) {
                $this->validarIcon($icon);
                $this->validarDescripcion($descripcion);
            } else {
                $this->validarDescripcion($descripcion);
                $this->validarURL($url);
            }

            if ($this->errores) {
                echo json_encode(array("statusCode" => 500, "errores" => $this->errores));
            } else {

                if ($tipoOpcion == 1) {
                    $dataModulo = [
                        "descripcion" => $descripcion,
                        "icon"        => $icon,
                    ];
                    $this->db->updateModulo($id, $dataModulo);
                } else {
                    $dataSubModulo = [
                        "descripcion" => $descripcion,
                        "url"         => $url,
                        "submodulo"   => $cboModulo
                    ];
                    $this->db->updateSubModulo($id, $dataSubModulo);
                }

                $_SESSION["mensaje"] = "Datos actualizados correctamente";

                echo json_encode(array("statusCode" => 200));
            }
        } else {
            $data["contenido"] = ERROR_404;
            require_once TEMPLATE;
        }
    }

    public function eliminarModulo($id)
    {

        if ($this->db->deleteModulo($id)) {
            $_SESSION["mensaje"] = "Datos eliminados correctamente";
        } else {
            $_SESSION["mensaje"] = "Error al eliminar el registro";
        }

        $url = BASE_URL . "modulos";
        header("Location: $url");
    }


    private function validarIcon($valor)
    {
        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["icon"] = "Debe ingresar un valor en ICON";
        }
        return $this->errores;
    }

    private function validarDescripcion($valor)
    {
        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["descripcion"] = "Debe ingresar un valor en DESCRIPCION";
        }
    }

    private function validarURL($valor)
    {
        if (!$this->validation->validarRequeridos($valor)) {
            $this->errores["url"] = "Debe ingresar un valor en URL";
        }
    }
}
