<?php
ini_set('display_errors', 1);
require_once("/opt/lampp/htdocs/Semana_04/view/head/head.php");
require_once("/opt/lampp/htdocs/Semana_04/controller/teacherController.php");

$obj = new teacherController();
$data = $obj->show($_GET['id_teacher']);
?>

<h2 class="text-center">Detalles del Registro</h2>
<div class="pb-3">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <a href="edit.php?id_teacher=<?= $data['id_teacher'] ?>" class="btn btn-success">Actualizar</a>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Eliminar
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el registro?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Una vez eliminado no se podrá recuperar el registro.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a href="delete.php?id_teacher=<?= $data['id_teacher'] ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="table container-fluid">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo de Documento</th>
            <th scope="col">Número de documento</th>
            <th scope="col">Categoria</th>
            <th scope="col">Pasatiempos</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $data['id_teacher'] ?></td>
            <td><?= $data['name_teacher'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= ($data['doc_type'] == 1) ? "DNI" : (($data['doc_type'] == 2) ? "Pasaporte" : "Carnet de extranjería"); ?></td>
            <td><?= $data['doc_number'] ?></td>
            <td><?= ($data['category'] == 1) ? "DTC" : "DPC"; ?></td>
            <td><?= $data['hobbies'] ?></td>
        </tr>
    </tbody>
</table>

<?php
require_once("/opt/lampp/htdocs/Semana_04/view/head/footer.php");
?>
