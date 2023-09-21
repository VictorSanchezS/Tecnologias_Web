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
                        <!-- .dropdown -->
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
                            <form class="form-horizontal" action="<?php echo BASE_URL ?>persona/actualizarPersona/<?php echo $data["persona"]["id_persona"] ?>" method="POST" autocomplete="off">
                                <fieldset>
                                    <?php error_reporting(0) ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="textinput">Nombres:</label>
                                            <input id="txtNombre" name="txtNombre" type="text" placeholder="" class="form-control input-md" value="<?php echo isset($_REQUEST['txtNombre']) ? $_REQUEST['txtNombre'] : $data["persona"]["nombres"]; ?>">
                                            <?php if (isset($data["errores"]["nombre"])) : ?>
                                                <div style="color:red">
                                                    <?php echo $data["errores"]["nombre"] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="textinput">Apellido Paterno:</label>

                                            <input id="txtApPaterno" name="txtApPaterno" type="text" placeholder="" class="form-control input-md" value="<?php echo isset($_REQUEST['txtApPaterno']) ? $_REQUEST['txtApPaterno'] : $data["persona"]["apPaterno"] ?>">
                                            <?php if (isset($data["errores"]["apPaterno"])) : ?>
                                                <div style="color:red">
                                                    <?php echo $data["errores"]["apPaterno"] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="textinput">Apellido Materno:</label>
                                            <input id="txtApMaterno" name="txtApMaterno" type="text" placeholder="" class="form-control input-md" value="<?php echo isset($_REQUEST['txtApMaterno']) ? $_REQUEST['txtApMaterno'] : $data["persona"]["apMaterno"] ?>">
                                            <?php if (isset($data["errores"]["apMaterno"])) : ?>
                                                <div style="color:red">
                                                    <?php echo $data["errores"]["apMaterno"] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Correo electrónico:</label>
                                        <input id="txtCorreo" name="txtCorreo" type="text" placeholder="" class="form-control input-md" value="<?php echo isset($_REQUEST['txtCorreo']) ? $_REQUEST['txtCorreo'] : $data["persona"]["correo"] ?>">
                                        <?php if (isset($data["errores"]["correo"])) : ?>
                                            <div style="color:red">
                                                <?php echo $data["errores"]["correo"] ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Usuario:</label>
                                            <input id="txtUsuario" name="txtUsuario" type="text" placeholder="" class="form-control input-md" value="<?php echo isset($_REQUEST['txtUsuario']) ? $_REQUEST['txtUsuario'] : $data["persona"]["usuario"] ?>">
                                            <?php if (isset($data["errores"]["usuario"])) : ?>
                                                <div style="color:red">
                                                    <?php echo $data["errores"]["usuario"] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Contraseña</label>
                                            <input id="txtContrasenia" name="txtContrasenia" type="password" placeholder="" class="form-control input-md" value="<?php echo isset($_REQUEST['txtContrasenia']) ? $_REQUEST['txtContrasenia'] : $data["persona"]["contrasenia"] ?>">
                                            <?php if (isset($data["errores"]["contrasenia"])) : ?>
                                                <div style="color:red">
                                                    <?php echo $data["errores"]["contrasenia"] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputZip">Perfil</label>
                                            <select id="cboPerfil" name="cboPerfil" class="form-control">
                                                <option value="">Seleccione....</option>
                                                <?php foreach ($data["perfiles"] as $row1) : ?>
                                                    <option value="<?php echo $row1["id_perfil"] ?>" <?php echo ($data["persona"]["idPerfil"] == $row1["id_perfil"]) ? "selected" : "" ?>><?php echo $row1["perfil"] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Button (Double) -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="button1id"></label>
                                        <div class="col-md-8">
                                            <input type="submit" value="Actualizar Persona" class="btn btn-success">
                                            <a href="<?php echo BASE_URL ?>persona" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>

                                </fieldset>
                            </form>
                        </div><!-- /.card-body -->
                    </div>
                </div><!-- /.section-block -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
</div>