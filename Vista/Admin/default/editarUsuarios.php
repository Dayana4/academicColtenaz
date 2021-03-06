<?php

session_start();
require "../../../Modelo/Usuario.php";


if (empty($_SESSION["DataUser"]["idRol"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["idRol"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Administrar Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/LogoColtenaz18.ico">

    <!-- Scripts -->
    <?php include ("Includes/imports.php")?>

</head>


<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php include ("Includes/topBar.php")?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include("Includes/leftSideBar.php")?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- start row -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Sistema de Gestión de Procesos Academicos Institución Educativa Técnica de Nazareth Nobsa.</h4>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Administración</a></li>
                                <li class="breadcrumb-item active">Actualizar Usuario</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">


                    <?php if (!isset($_GET["IdUsuario"])){ ?>
                        <div class="alert alert-icon alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="mdi mdi-block-helper"></i>
                            No se pudo actualizar al Usuario.<strong>Error: no se encontro la informacion del Usuario.</strong> Puede administrar los Usuarios desde <a href="adminUsuario.php" class="alert-link">Aquí</a>.
                        </div>
                    <?php }else{
                        $IdUsuario = $_GET["IdUsuario"];
                        $_SESSION["IdUsuario"] = $IdUsuario;
                        $objUsuario = Usuario::buscarForId($IdUsuario);
                        ?>






                        <div class="col-lg-10 center-page">

                            <div class="card-box">

                                <h4 class="text-center text-custom"><strong>ACTUALIZAR USUARIO</strong></h4>

                                <br>

                                <form role="form" method="post" action="../../../Controlador/usuarioController.php?action=editar">

                                    <div class="row ">
                                        <div class="col-xs-9 center-page" style="width: 83%">

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <label for="Documento"><strong>Documento Identidad</strong><span class="text-danger">*</span> </label>
                                                    <input type="text" value="<?php echo $objUsuario->getDocumento(); ?>" name="Documento" id="Documento"
                                                           class="form-control" data-parsley-type="number" required
                                                           placeholder="Ingrese número de documento"/>
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="TipoDocumento"><strong>Tipo Documento</strong><span class="text-danger">*</span></label>
                                                    <select class="form-control" data-style="btn-verde btn-bordered" id="TipoDocumento" required name="TipoDocumento">
                                                        <option <?php echo ($objUsuario->getTipoDocumento() == "C.C") ? "selected" : ""; ?> value="C.C">C.C</option>
                                                        <option <?php echo  ($objUsuario->getTipoDocumento() == "C.E") ? "selected" : ""; ?> value="C.E">C.E</option>
                                                        <option <?php echo ($objUsuario->getTipoDocumento() == "Registro Civil") ? "selected" : ""; ?> value="Registro Civil">Registro Civil</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="row ">

                                                <div class="col-lg-6">
                                                    <label for="Apellidos"><strong>Apellidos</strong><span class="text-danger">*</span></label>
                                                    <input type="text" value="<?php echo $objUsuario->getApellidos(); ?>" name="Apellidos" parsley-trigger="change" required
                                                           placeholder="Ingrese apellidos completos" class="form-control" id="Apellidos" >
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="Nombres"><strong>Nombres</strong><span class="text-danger">*</span></label>
                                                    <input type="text" value="<?php echo $objUsuario->getNombres(); ?>" name="Nombres" required
                                                           parsley-trigger="change" placeholder="Ingrese nombres completos" class="form-control" id="Nombres" >
                                                </div>

                                            </div>

                                            <br>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="Email"><strong>Email</strong><span class="text-danger">*</span></label>
                                                    <input type="email" value="<?php echo $objUsuario->getEmail(); ?>" name="Email" parsley-trigger="change" required
                                                           placeholder="direccionEmail@dominio.com" class="form-control" id="Email">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="Celular"><strong>Celular</strong><span class="text-danger">*</span></label>
                                                    <input type="text" value="<?php echo $objUsuario->getCelular(); ?>" placeholder="3xx xxx xxxx" name="Celular" id="Celular" required
                                                           data-mask="3xx xxx xxxx" class="form-control">
                                                </div>
                                            </div>

                                            <br>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <label for="Direccion"><strong>Direccion</strong><span class="text-danger">*</span></label>
                                                    <input type="text" value="<?php echo $objUsuario->getDireccion(); ?>" name="Direccion" parsley-trigger="change" required
                                                           placeholder="Ingrese Dirección de Residencia" class="form-control" id="Direccion" >
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="idRol"><strong>Rol</strong><span class="text-danger">*</span></label>
                                                    <select class="form-control" data-style="btn-verde btn-bordered" id="idRol" required name="idRol">
                                                        <option <?php echo ($objUsuario->getIdRol() == "1") ? "selected" : ""; ?> value="1">Rector</option>
                                                        <option <?php echo ($objUsuario->getIdRol() == "2") ? "selected" : ""; ?> value="2">Psicorientador(a)</option>
                                                        <option <?php echo ($objUsuario->getIdRol() == "3") ? "selected" : ""; ?> value="3">Coordinador(a)</option>
                                                        <option <?php echo ($objUsuario->getIdRol() == "4") ? "selected" : ""; ?> value="4">Secretaria</option>
                                                        <option <?php echo ($objUsuario->getIdRol() == "5") ? "selected" : ""; ?> value="5">Docente</option>
                                                        <option <?php echo ($objUsuario->getIdRol() == "6") ? "selected" : ""; ?> value="6">Acudiente</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <br>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <label for="Password"><strong>Contraseña</strong><span class="text-danger">*</span></label>
                                                    <input id="Password" value="<?php echo $objUsuario->getPassword(); ?>" name="Password" type="password" placeholder="Contraseña" required
                                                           class="form-control">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="Password2"><strong>Confirme Contraseña</strong><span class="text-danger">*</span></label>
                                                    <input data-parsley-equalto="#Password" type="password" required
                                                           placeholder="Repetir contraseña" class="form-control" id="Password2">
                                                </div>

                                            </div>

                                            <br>

                                            <br>

                                            <div class="form-group text-center">

                                                <button onclick=" location.href='adminUsuarios.php'" type="reset" class="btn btn-gris font-15" style="border-radius: 5px">
                                                    <strong>Cancelar</strong>
                                                </button>

                                                &nbsp;

                                                <button type="submit" class="btn btn-verde  font-15" value="validate"   style= "border-radius: 5px">
                                                    <strong>Guardar</strong>
                                                </button>

                                            </div>

                                        </div>
                                    </div>


                                </form>
                            </div> <!-- end card-box -->
                        </div>
                        <!-- end col -->

                    <?php }?>

                </div>

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2018 © Institución Educativa Técnica de Nazareth Nobsa
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php include ("Includes/scripts.php")?>

</body>
</html>


