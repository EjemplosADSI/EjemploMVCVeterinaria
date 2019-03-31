<?php
session_start();
if (empty($_SESSION['UserInSession'])){
    header("Location: http://".$_SERVER["HTTP_HOST"]."/EjemploMVCVeterinaria/Vista/modules/persona/login.php?mensaje=loginError");
}
?>