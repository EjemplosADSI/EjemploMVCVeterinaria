<?php require ("../../../Modelo/Persona.php")?>
<?php require ("../../../Controlador/EspecialidadController.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="../../plantilla_base/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../plantilla_base/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../plantilla_base/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../plantilla_base/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../../plantilla_base/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../plantilla_base/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../plantilla_base/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../plantilla_base/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../plantilla_base/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="../../plantilla_base/gentelella/vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php require("../../snippers/menuIzquierdo.php");?>

        <!-- top navigation -->
        <?php require("../../snippers/menusuperior.php");?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3><small>Especialidades de Personas</small></h3>
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Gestionar <small> </small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                                    <?php
                                        $Persona = Persona::buscarForId($_GET["id"]);
                                    ?>
                                    <span class="section">Asociar Especialidad a <?= $Persona->getNombres()." ".$Persona->getApellidos() ?> </span>

                                    <?php if(!empty($_GET['respuesta'])){ ?>
                                        <?php if ($_GET['respuesta'] == "correcto"){ ?>
                                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <strong>La especialidad</strong> se a asociado correctamente.
                                            </div>
                                        <?php }else {?>
                                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <strong>Error!</strong> No se pudo editar la persona intentalo nuevamente!!
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <p class="font-gray-dark">
                                        Seleccione la especialidad que desea asociar.
                                    </p>
                                    <form class="form-inline" method="post" action="../../../Controlador/PersonaController.php?action=asociarEspecialidad">
                                        <div class="form-group">
                                            <label for="ex3">Especialidad</label>
                                            <input id="Persona" value="<?php echo $Persona->getIdPersona(); ?>" name="Persona" hidden required="required" type="text">
                                            <?php
                                                $ArrEspecialidades = $Persona->getRelEspecialidades();
                                                echo EspecialidadController::selectEspecialidad( false,
                                                    true,
                                                    "Especialidad",
                                                    "Especialidad",
                                                    "",
                                                    "form-control",
                                                    "Estado = 'Activo'",
                                                    $ArrEspecialidades);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-sm" value="Registrar">
                                            <a href="manager.php" class="btn btn-dark btn-sm">Volver</a>
                                        </div>
                                    </form>

                                    <br/><br/>
                                    <span class="section">Gestionar Especialidades de <?= $Persona->getNombres()." ".$Persona->getApellidos() ?></span>
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Especialidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $i=1;
                                        foreach ($ArrEspecialidades as $Especialidad){
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?php echo $Especialidad->getNombre(); ?></td>
                                                <td>
                                                    <a type="button" href="../../../Controlador/PersonaController.php?action=eliminarEspecialidad&Persona=<?= $Persona->getIdPersona(); ?>&Especialidad=<?= $Especialidad->getIdEspecialidad() ?>" data-toggle="tooltip" title="Eliminar" class="btn docs-tooltip btn-danger btn-xs"><i class="fa fa-times-circle-o"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                <?php }else{ ?>
                                    <?php if (empty($_GET["respuesta"])){ ?>
                                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Error!</strong> No se encontro ninguna persona con el parametro de busqueda.
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <?php require("../../snippers/footer.php"); ?>
    </div>
</div>

<!-- jQuery -->
<script src="../../plantilla_base/gentelella/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plantilla_base/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plantilla_base/gentelella/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../plantilla_base/gentelella/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="../../plantilla_base/gentelella/vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="../../plantilla_base/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/jszip/dist/jszip.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Cropper -->
<script src="../../plantilla_base/gentelella/vendors/cropper/dist/cropper.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>

</body>
</html>