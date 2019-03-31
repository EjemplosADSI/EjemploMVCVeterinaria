<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | MVC Odontologos </title>

    <!-- Bootstrap -->
    <link href="../../plantilla_base/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../plantilla_base/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../plantilla_base/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../plantilla_base/gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="../../plantilla_base/gentelella/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../../plantilla_base/gentelella/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../../plantilla_base/gentelella/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../plantilla_base/gentelella/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="frmLogin" name="frmLogin" method="post" action="../../../Controlador/PersonaController.php?action=login">
              <h1>Login MyPet</h1>
              <div>
                <input type="text" class="form-control" id="Usuario" name="Usuario" placeholder="Usuario" required="required" />
              </div>
              <div>
                <input type="password" class="form-control" id="Contrasena" name="Contrasena" placeholder="Contrasena" required="required" />
              </div>
              <div>
                <input class="btn btn-default submit" type="submit" value="Ingresar">
                <a class="reset_pass" href="#">Olvido su contraseña?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Nuevo en el Sitio?
                  <a href="#signup" class="to_register"> Registrarse </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> MyPet!</h1>
                  <p>©2019 All Rights Reserved. MyPet! es un ejemplo MVC de <a href="mailto:daom89@gmail.com">daom89@gmail.com</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Crear Cuenta</h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Correo" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Registar</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ya eres miembro ?
                  <a href="#signin" class="to_register"> Ingresar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                    <h1><i class="fa fa-paw"></i> MyPet!</h1>
                    <p>©2019 All Rights Reserved. MyPet! es un ejemplo MVC de <a href="mailto:daom89@gmail.com">daom89@gmail.com</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="../../plantilla_base/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Font Awesome -->
    <link href="../../plantilla_base/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- PNotify -->
    <script src="../../plantilla_base/gentelella/vendors/pnotify/dist/pnotify.js"></script>
    <script src="../../plantilla_base/gentelella/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../../plantilla_base/gentelella/vendors/pnotify/dist/pnotify.nonblock.js"></script>


    <script type="application/javascript">
        $( document ).ready(function() { //Cuando la pagina cargue
        <?php if(!empty($_GET['mensaje']) && $_GET['mensaje'] == 'loginError'){ ?>
            new PNotify({ //Si llega un mensaje de error de login
                title: "Error de Ingreso",
                text: "Debe de ingresar sus datos para acceder al sistema...",
                styling: "bootstrap3",
                type: "error",
                hide: true,
                delay: 5000
            });
        <?php } ?>
            $("#frmLogin").submit(function( event ) { //Cuando en el form se le de enviar
                event.preventDefault(); //Prevenir el envio del formulario
                $.post( $(this).attr("action"), $( this ).serialize(), function( data ) {
                    new PNotify({
                        title: data.title,
                        text: data.text,
                        styling: "bootstrap3",
                        width: "300px",
                        type: data.type, //Tipo de alerta "notice", "info", "success", or "error"
                        icon: true, //Mostrar el icono
                        animation: "fade", //Tipo de animacion "none", "show", "fade", and "slide"
                        nonblock: false, //Mensaje bloqueado
                        hide: true, //Eliminar despues de un tiempo
                        shadow: true,
                        delay: 3000, //Tiempo de eliminacion
                        remove: true //Elimina el mensaje del DOM
                    });
                }, "json") //Datos recibidos como JSON
                .done(function(data) {
                    if(data.type === 'success'){//Si la respuesta fue correcta
                        setTimeout(function(){ //Esperar 3 Segundos
                            window.location.href = '../../index.php'; //Redireccionar
                        }, 3000);
                    }
                });
            });
        });
    </script>
  </body>
</html>

