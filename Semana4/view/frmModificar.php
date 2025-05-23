<?php require_once "./head/header.php";?>
<body>
    <div class="container mt-4">
        <?php require "../config/login.php";
        if (isset($_GET['id_docente'])) { ?>
            <div class="form-container">
                <form action="../model/modificar.php" method="GET">
                    <input type="hidden" name="id_docente" value="<?php echo $_GET['id_docente'] ?>"></input><br>
                    <h3 class="mb-4">Modificación del Registro de Docentes</h3>
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input name="nombre" type="text" value="<?php echo $_GET['nombre'] ?>"> </input><br>
                    </div>
                    <div class="mb-3">
                        <label>Correo</label>
                        <input name="correo" type="text" value="<?php echo $_GET['correo'] ?>"> </input><br>
                    </div>
                    <div class="mb-3">
                        <label>Tipo de documento</label>
                        <select name="tdocumento" id="tdocumento" class="form-select" value="<?php echo $_GET['tipoDocumento'] ?>">
                            <option value=1> DNI </option>
                            <option value=2> Pasaporte </option>
                            <option value=3> Carnet de extranjeria </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Número de documento</label>
                        <input name="ndocumento" type="text" value="<?php echo $_GET['nDocumento'] ?>"> </input><br>
                    </div>
                    <div class="mb-3">
                        <label>Categoría</label>
                        <select name="categoria" id="categoria" class="form-select" value="<?php echo $_GET['categoria'] ?>">
                            <option value=1> DTC </option>
                            <option value=2> DTP </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Pasatiempos</label>
                        <?php
                        function verificarPasatiempo($pasatiempo)
                        {
                            $coincidencia = strpos($_GET['pasatiempo'], $pasatiempo);
                            if ($coincidencia === false) {
                                return "";
                            } else {
                                return "checked";
                            }
                        }
                        ?>
                        <input name="chkpasatempos[]" id="chkpasatempos" type="checkbox" value="Leer" <?php echo verificarPasatiempo('Leer'); ?>> Leer</input>
                        <input name="chkpasatempos[]" id="chkpasatempos" type="checkbox" value="Futbol" <?php echo verificarPasatiempo('Futbol'); ?>> Futbol</input>
                        <input name="chkpasatempos[]" id="chkpasatempos" type="checkbox" value="Videojuegos" <?php echo verificarPasatiempo('Videojuegos'); ?>> Videojuegos</input>
                        <input name="chkpasatempos[]" id="chkpasatempos" type="checkbox" value="Música" <?php echo verificarPasatiempo('Música'); ?>> Música</input>
                    </div>
                    <div class="mb-3">
                        <input name="Submit" class="btn btn-primary" type="submit" value="Modificar"> </input>
                        <a href="index.php" class="btn btn-secondary">Regresar</a>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>

<?php require_once "./head/footer.php";?>