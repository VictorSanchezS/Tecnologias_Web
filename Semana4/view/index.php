<?php require_once "./head/header.php";?>
<body>
    <div class="container mt-4">
        <h3 class="display-4 text-center"> Listado de Docentes </h3>
        <?php require "../config/login.php";
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-success">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Tipo de Documento</th>
                        <th class="text-center">Número de Documento</th>
                        <th class="text-center">Categoría</thz>
                        <th class="text-center">Pasatiempos</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <?php
                $sql = "Select * from docentes";
                //echo $sql;
                $resultado = $pdo->prepare($sql);
                $resultado->execute();
                ?>


                <tbody>
                    <?php foreach ($resultado as $row) { ?>
                        <tr>
                            <td> <?php echo $row['id_docente'] ?> </td>
                            <td> <?php echo $row['nombre'] ?> </td>
                            <td> <?php echo $row['correo'] ?> </td>
                            <td> <?php echo ($row['tipoDocumento'] == 1 ? 'DNI' : ($row['tipoDocumento'] == 2 ? 'Passaporte' : 'Carnet de extranjeria')); ?> </td>

                            <td> <?php echo $row['nDocumento'] ?> </td>
                            <td> <?php echo ($row['categoria'] == 1) ? 'DTC' : 'DPC'; ?> </td>
                            <td> <?php echo $row['pasatiempo'] ?> </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-primary" href="frmModificar.php?id_docente=<?php echo $row['id_docente'] ?>&nombre=<?php echo $row['nombre'] ?>&correo=<?php echo $row['correo'] ?>&tipoDocumento=<?php echo $row['tipoDocumento'] ?>&nDocumento=<?php echo $row['nDocumento'] ?>&categoria<?php echo $row['categoria'] ?>&pasatiempo=<?php echo $row['pasatiempo'] ?>"> Modificar </a>
                                    <a class="btn btn-danger" href="../model/eliminar.php?id_docente=<?php echo $row['id_docente'] ?>"> Eliminar </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container text-center mt-3">
        <a class="btn btn-primary btn-lg" href="./frmRegistrar.php">Registrar Nuevo Docente</a>
    </div>

<?php require_once "./head/footer.php"; ?>