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
                <h3>Persona</h3>
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
                                <strong>La persona!</strong> se ha creado correctamente.
                            </div>
                        <?php }else {?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> No se pudo ingresar la persona intentalo nuevamente!!
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <form enctype="multipart/form-data" class="form-horizontal form-label-left" method="post" action="../../../Controlador/PersonaController.php?action=crear">

                      <p>Ingrese toda la informacion relacionada con la <code>Persona</code>
                      </p>
                      <span class="section">Información General</span>
                        <div id="divFormBasic" class="x_content">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Documento</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select id="Tipo_Documento" name="Tipo_Documento" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            <option value="C.C">Cedula de Ciudadania</option>
                                            <option value="T.I">Tarjeta de Identidad</option>
                                            <option value="C.E">Cedula de Extranjeria</option>
                                            <option value="R.C">Registro Civil</option>
                                            <option value="Otros">Otros</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombres</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="Nombres" name="Nombres" minlength="2" class="form-control" placeholder="Nombres Completos" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"># Celular</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" id="Telefono" name="Telefono" min="3000000000" class="form-control" placeholder="Sin puntos" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="email" id="Correo" name="Correo" class="form-control" placeholder="Correo Personal" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="Usuario" name="Usuario" class="form-control" placeholder="Nombre de Usuario" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="password" id="Contrasena" name="Contrasena" class="form-control" placeholder="Contrasena" required>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Documento</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <div class="input-group">
                                            <input type="number" id="Documento" name="Documento" min="10000000" class="form-control" placeholder="Sin puntos" required>
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="Apellidos" name="Apellidos" minlength="2" class="form-control" placeholder="Apellidos Completos" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Direccion</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="Direccion" name="Direccion" minlength="2" class="form-control" placeholder="Direccion" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Usuario</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select id="Tipo_Usuario" name="Tipo_Usuario" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Secretaria">Secretaria</option>
                                            <option value="Medico">Medico</option>
                                            <option value="Cliente">Cliente</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea id="Observaciones" name="Observaciones" class="form-control" rows="3" placeholder=''></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="divFormDoctor" class="x_content">
                            <span class="section">Información Medico</span>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Profesion</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="Profesion" name="Profesion" minlength="2" class="form-control" placeholder="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Registro</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" id="NRP" name="NRP" min="1000000" class="form-control" placeholder="Numero de Registro Profesional" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Especialidad</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <?= EspecialidadController::selectEspecialidad( false,
                                            false,
                                            "relEspecialidades",
                                            "relEspecialidades",
                                            "",
                                            "form-control",
                                            "Estado = 'Activo'") ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12" >
                                        <input type="file" size="32" name="Foto" id="Foto" />
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <img id="output"/>
                                    </div>
                                </div>

                            </div>
                        </div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancelar</button>
                          <button id="send" type="submit" class="btn btn-success">Enviar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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

    <script>

        function removeAtributes(){
            $("#Profesion").removeAttr("required");
            $("#NRP").removeAttr("required");
            $("#Foto").removeAttr("required");
            $("#divFormDoctor").hide("slow");
        }

        function addAtributes(){
            $("#Profesion").prop("required","required");
            $("#NRP").prop("required","required");
            $("#Foto").prop("required","required");
            $("#divFormDoctor").show("slow");
        }

        $( "#Foto" ).change(function() {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
                output.width = 150;
            };
            reader.readAsDataURL(event.target.files[0]);
        });

        $("#Tipo_Usuario").change(function() {
            var opcion = $(this).val();
            if(opcion === "Medico"){
                addAtributes();
            }else{
                removeAtributes();
            }
        });

        $( document ).ready(function() {
            removeAtributes();
            $("#divFormDoctor").hide();
        });

    </script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
	
  </body>
</html>