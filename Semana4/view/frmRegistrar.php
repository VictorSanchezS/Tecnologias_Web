<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Registro de Docentes </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-4 form-container">
        <form action="../model/registrar.php" method="POST">
            <h3 class="mb-4">Registro de Docentes</h3>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input name="nombre" id="nombre" type="text" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input name="correo" id="correo" type="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tdocumento" class="form-label">Tipo de documento:</label>
                <select name="tdocumento" id="tdocumento" class="form-select">
                    <option value="1">DNI</option>
                    <option value="2">Pasaporte</option>
                    <option value="3">Carnet de extranjería</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ndocumento" class="form-label">Número de documento:</label>
                <input name="ndocumento" id="ndocumento" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <select name="categoria" id="categoria" class="form-select">
                    <option value="1">DTC</option>
                    <option value="2">DTP</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="chkpasatempos" class="form-label">Pasatiempos:</label>
                <div class="form-check">
                    <input name="chkpasatempos[]" id="chkpasatempos1" type="checkbox" class="form-check-input" value="Leer">
                    <label class="form-check-label" for="chkpasatempos1">Leer</label>
                </div>
                <div class="form-check">
                    <input name="chkpasatempos[]" id="chkpasatempos2" type="checkbox" class="form-check-input" value="Futbol">
                    <label class="form-check-label" for="chkpasatempos2">Futbol</label>
                </div>
                <div class="form-check">
                    <input name="chkpasatempos[]" id="chkpasatempos3" type="checkbox" class="form-check-input" value="Videojuegos">
                    <label class="form-check-label" for="chkpasatempos3">Videojuegos</label>
                </div>
                <div class="form-check">
                    <input name="chkpasatempos[]" id="chkpasatempos4" type="checkbox" class="form-check-input" value="Música">
                    <label class="form-check-label" for="chkpasatempos4">Música</label>
                </div>
            </div>
            <div class="mb-3">
                <input name="Submit" type="submit" class="btn btn-primary" value="Guardar">
                <a href="index.php" class="btn btn-secondary">Regresar</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>