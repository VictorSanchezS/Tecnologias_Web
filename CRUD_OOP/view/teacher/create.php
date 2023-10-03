<?php 
ini_set('display_errors', 1);
require_once("../../view/head/head.php"); ?>

<form action="store.php" method="post" autocomplete="off">
    <div class="mb-3">
        
        <input class="form-control" type="hidden" placeholder="" aria-label="default input example" name="id_teacher" id="name_teacher">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input class="form-control" required type="text" placeholder="" aria-label="default input example" name="name_teacher" id="name_teacher">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo</label>
        <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    </div>

    <div class="mb-3">
        <label for="disabledSelect" class="form-label">Tipo de Documento</label>
        <select name="doc_type" class="form-select">
            <option value="1">DNI</option>
            <option value="2">Pasaporte</option>
            <option value="3">Carnet de extranjeria</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Número de Documento</label>
        <input class="form-control" required type="text" placeholder="" aria-label="default input example" name="doc_number" id="document_number">
    </div>

    <div class="mb-3">
        <label for="disabledSelect" class="form-label">Categoria</label>
        <select name="category" id="category" class="form-select">
            <option value="1">DTC</option>
            <option value="2">DPC</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Pasatiempos: </label>
        <input name="chkHobbies[]" id="chkHobbies" type="checkbox" value="Leer"> Leer</input>
        <input name="chkHobbies[]" id="chkHobbies" type="checkbox" value="Futbol"> Futbol</input>
        <input name="chkHobbies[]" id="chkHobbies" type="checkbox" value="Videojuegos"> Videojuegos</input>
        <input name="chkHobbies[]" id="chkHobbies" type="checkbox" value="Música"> Música</input>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php" class="btn btn-danger">Cancelar</a>
</form>

<?php require_once("../../view/head/footer.php"); ?>