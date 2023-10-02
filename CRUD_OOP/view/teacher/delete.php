<?php
ini_set('display_errors', 1);

// Requiere el controlador
require_once("/opt/lampp/htdocs/Semana_04/controller/teacherController.php");

$obj = new teacherController();

// Verifica si se proporcionó un 'id_teacher' válido en la URL
if (isset($_GET['id_teacher']) && is_numeric($_GET['id_teacher'])) {
    $id_teacher = $_GET['id_teacher'];

    // Intenta eliminar el registro
    if ($obj->delete($id_teacher)) {
        // Éxito: redirige a la página de índice con un mensaje
        header("Location: index.php?success=1");
        exit;
    } else {
        // Error al eliminar: redirige a la página de índice con un mensaje de error
        header("Location: index.php?error=1");
        exit;
    }
} else {
    // ID de profesor no válido: redirige a la página de índice con un mensaje de error
    header("Location: index.php?error=1");
    exit;
}
?>
