<?php require "../../../Controlador/EspecialidadController.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../../plantilla_base/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../plantilla_base/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../plantilla_base/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    
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
                <h3>Especialidades</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Create</small></h2>
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



                    <?php if(!empty($_GET['respuesta'])){ ?>
                        <?php if ($_GET['respuesta'] == "correcto"){ ?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>La especialidad!</strong> se ha actualizado correctamente.
                            </div>
                        <?php }else {?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> No se pudo ingresar la especialidad intentalo nuevamente!!
                            </div>
                        <?php } ?>
                    <?php } ?>

                      <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                          <?php
                            $DataEspecialidad = EspecialidadController::buscarID($_GET["id"]);
                          ?>
                          <form class="form-horizontal form-label-left" method="post" action="../../../Controlador/EspecialidadController.php?action=editar">

                              <p>Ingrese toda la informacion relacionada con la <code>Especialidad</code>
                              </p>
                              <span class="section">Informacion General</span>

                              <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="idEspecialidad" value="<?php echo $DataEspecialidad->getIdEspecialidad(); ?>" name="idEspecialidad" hidden required="required" type="text">
                                      <input id="Nombre" value="<?php echo $DataEspecialidad->getNombre(); ?>" class="form-control col-md-7 col-xs-12" name="Nombre" placeholder="Nombre de la Especialidad" required="required" type="text">
                                  </div>
                              </div>
                              <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Estado <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select id="Estado" name="Estado" class="form-control">
                                          <option <?php if($DataEspecialidad->getEstado() == "Activo"){ echo "selected"; } ?>>Activo</option>
                                          <option <?php if($DataEspecialidad->getEstado() == "Inactivo"){ echo "selected"; } ?>>Inactivo</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-3">
                                      <a href="manager.php" class="btn btn-primary">Cancelar</a>
                                      <button id="send" type="submit" class="btn btn-success">Enviar</button>
                                  </div>
                              </div>
                          </form>

                      <?php }else{ ?>
                          <?php if (empty($_GET["respuesta"])){ ?>
                              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                  </button>
                                  <strong>Error!</strong> No se encontro ninguna especialidad con el parametro de busqueda.
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
    <!-- validator -->
    <script src="../../plantilla_base/gentelella/vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
	
  </body>
</html>