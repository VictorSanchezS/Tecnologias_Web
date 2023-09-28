<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Semana 4 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

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
                        <th class="text-center">Categoría</th>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>