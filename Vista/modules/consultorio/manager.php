<?php require ("../../../Modelo/Consultorio.php")?>
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
                        <h3>Consultorios <small>Administrar</small></h3>
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Gestionar <small>Consultorios</small></h2>
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
                                <p class="text-muted font-13 m-b-30">
                                    Selecciona un consultorio para gestionarlo
                                </p>

                                <table id="tbl_consultorio_manager" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Especialidad</th>
                                            <th>Jornada</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $arrConsultorios = Consultorio::getAll();
                                        foreach ($arrConsultorios as $consultorio){
                                    ?>
                                        <tr>
                                            <td><?php echo $consultorio->getNombre(); ?></td>
                                            <td><?php echo $consultorio->getEspecialidad()->getNombre(); ?></td>
                                            <td><?php echo implode(",",$consultorio->getJornada()); ?></td>
                                            <td><?php echo $consultorio->getEstado(); ?></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $consultorio->getIdConsultorio(); ?>" type="button" data-toggle="tooltip" title="Actualizar" class="btn docs-tooltip btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                                <a href="view.php?id=<?php echo $consultorio->getIdConsultorio(); ?>" type="button" data-toggle="tooltip" title="Ver" class="btn docs-tooltip btn-warning btn-xs"><i class="fa fa-eye"></i></a>
                                                <?php if ($consultorio->getEstado() != "Activo"){ ?>
                                                    <a href="../../../Controlador/ConsultorioController.php?action=ActivarConsultorio&IdConsultorio=<?php echo $consultorio->getIdConsultorio(); ?>" type="button" data-toggle="tooltip" title="Activar" class="btn docs-tooltip btn-success btn-xs"><i class="fa fa-check-square-o"></i></a>
                                                <?php }else{ ?>
                                                    <a type="button" href="../../../Controlador/ConsultorioController.php?action=InactivarConsultorio&IdConsultorio=<?php echo $consultorio->getIdConsultorio(); ?>" data-toggle="tooltip" title="Inactivar" class="btn docs-tooltip btn-danger btn-xs"><i class="fa fa-times-circle-o"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
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
<script src="../../plantilla_base/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/jszip/dist/jszip.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>

<script src="../../plantilla_base/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../../plantilla_base/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<!-- Cropper -->
<script src="../../plantilla_base/gentelella/vendors/cropper/dist/cropper.min.js"></script>

<script type="application/javascript">
    $(document).ready(function() {
        $('#tbl_consultorio_manager').DataTable({
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'print', 'excel', 'pdf'
            ],
            "paging":   true,       //Paginacion
            "ordering": true,       //Ordenamiento
            "info":     true,       //Informacion
            "order": [[ 1, "asc" ]], //Fila que ordena
            "language": {
                "url": "../../build/Spanish.json"
            },
            "stateSave" : true, //Guardar la configuracion del usuario
            "pagingType": "full_numbers",
            "scrollX": true //Desplazamiento Horizontal
        });
    } );
</script>

<!-- Custom Theme Scripts -->
<script src="../../build/js/custom.min.js"></script>

</body>
</html>