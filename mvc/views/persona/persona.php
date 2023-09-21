<div class="wrapper">
    <!-- .page -->
    <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <div class="d-flex flex-column flex-md-row">
                    <p class="lead">
                        <span class="font-weight-bold"><?php echo $data["titulo"]; ?></span>
                    </p>

                    <div class="ml-auto">
                        <a href="<?php echo BASE_URL ?>persona/frmRegistrar" class="btn btn-success">NUEVO REGISTRO</a>
                    </div>
                </div>
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .section-block -->
                <div class="section-block">
                    <div class="card card-fluid">
                        <!-- .card-body -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- .table -->
                                <table class="table">
                                    <!-- thead -->
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Completo</th>
                                            <th>Correo</th>
                                            <th>Usuario</th>
                                            <th>Constraseña</th>
                                            <th>Perfil</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $cont = 0;
                                        foreach ($data["personas"] as $row) : $cont++; ?>
                                            <tr>
                                                <td> <?php echo $cont; ?></td>
                                                <td><?php echo $row["nombres"] . " " . $row["apPaterno"] . " " . $row["apMaterno"] ?></td>
                                                <td><?php echo $row["correo"] ?></td>
                                                <td><?php echo $row["usuario"] ?></td>
                                                <td><?php echo $row["contrasenia"] ?></td>
                                                <td><?php echo $row["perfil"] ?></td>
                                                <td>
                                                    <a href="<?php echo BASE_URL ?>persona/frmActualizar/<?php echo $row["id_persona"] ?>" class="btn btn-sm btn-icon btn-secondary">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="<?php echo BASE_URL ?>persona/eliminarPersonaID/<?php echo $row["id_persona"] ?>" class="btn btn-sm btn-icon btn-secondary btn-confirm-delete">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                    
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table><!-- /.table -->
                            </div><!-- /.table-responsive -->
                        </div><!-- /.card-body -->
                    </div>
                </div><!-- /.section-block -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>