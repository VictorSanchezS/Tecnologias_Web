<?php
ini_set('display_errors', 1);

require_once("../../view/head/head.php");
require_once("../../controller/teacherController.php");

$obj = new teacherController();

$id_teacher = $_GET['id_teacher'];
$user = $obj->show($id_teacher);

?>

<form action="update.php" method="post" autocomplete="off">
    <h2>Modificando Registro</h2>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ID</label>
        <input class="form-control" type="text" readonly aria-label="default input example" name="id_teacher" id="id_teacher" value="<?= $user['id_teacher'] ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input class="form-control" required type="text" name="name_teacher" id="name_teacher" value="<?= $user['name_teacher'] ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo</label>
        <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= $user['email'] ?>">
    </div>

    <div class="mb-3">
        <label for="disabledSelect" class="form-label">Tipo de Documento</label>
        <select name="doc_type" class="form-select">
            <option value="1" <?= ($user['doc_type'] == 1) ? 'selected' : ''; ?>>DNI</option>
            <option value="2" <?= ($user['doc_type'] == 2) ? 'selected' : ''; ?>>Pasaporte</option>
            <option value="3" <?= ($user['doc_type'] == 3) ? 'selected' : ''; ?>>Carnet de extranjería</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Número de Documento</label>
        <input class="form-control" required type="text" name="doc_number" id="document_number" value="<?= $user['doc_number'] ?>">
    </div>

    <div class="mb-3">
        <label for="disabledSelect" class="form-label">Categoría</label>
        <select name="category" id="category" class="form-select">
            <option value="1" <?= ($user['category'] == 1) ? 'selected' : ''; ?>>DTC</option>
            <option value="2" <?= ($user['category'] == 2) ? 'selected' : ''; ?>>DPC</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Pasatiempos: </label>
        <?php
        function checkHobbies($user, $hobby)
        {
            $hobbies = explode(', ', $user['hobbies']);
            return in_array($hobby, $hobbies) ? 'checked' : '';
        }
        ?>

        <input name="chkHobbies[]" id="chkHobbies" type="checkbox" value="Leer" <?= checkHobbies($user, 'Leer'); ?>> Leer</input>
        <input name="chkHobbies[]" id="chkHobbies" type="checkbox" value="Futbol" <?= checkHobbies($user, 'Futbol'); ?>> Futbol</input>
        <input name="chkHobbies[]" id="chkHobbies" type="checkbox" value="Videojuegos" <?= checkHobbies($user, 'Videojuegos'); ?>> Videojuegos</input>
        <input name="chkHobbies[]" id="chkHobbies" type="checkbox" value="Música" <?= checkHobbies($user, 'Música'); ?>> Música</input>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
    <a href="show.php?id_teacher=<?= $user['id_teacher'] ?>" class="btn btn-danger">Cancelar</a>
</form>

<?php
require_once("../../view/head/footer.php");
?>
