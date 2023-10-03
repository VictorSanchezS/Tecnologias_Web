<?php
ini_set('display_errors', 1);

require_once("../../view/head/head.php");
require_once("../../controller/teacherController.php");


$obj = new teacherController();
$rows = $obj->index();

?>

<div class="mb-3">
    <a href="create.php" class="btn btn-primary">Agregar nuevo usuario</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo de Documento</th>
            <th scope="col">Número de Documento</th>
            <th scope="col">Categoria</th>
            <th scope="col">Pasatiempos</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php if ($rows) : ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <th><?= $row['id_teacher'] ?></th>
                    <th><?= $row['name_teacher'] ?></th>
                    <th><?= $row['email'] ?></th>
                    <th><?= ($row['doc_type'] == 1) ? "DNI" : (($row['doc_type'] == 2) ? "Pasaporte" : "Carnet de extranjeria"); ?></th>
                    <th><?= $row['doc_number'] ?></th>
                    <th><?= ($row['category'] == 1) ? "DTC" : "DPC"; ?></th>
                    <th><?= $row['hobbies'] ?></th>
                    <th>
                        <a class="btn btn-primary" href="show.php?id_teacher=<?= $row['id_teacher'] ?>">Ver</a>
                        <a class="btn btn-success" href="edit.php?id_teacher=<?= $row['id_teacher'] ?>">Modificar</a>
                        <a class="btn btn-danger" href="delete.php?id_teacher=<?= $row['id_teacher'] ?>">Eliminar</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <th colspan="8" class="text-center">No hay registros actualmente</th>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
require_once("../../view/head/footer.php");
?>
