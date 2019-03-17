<?php

require_once (__DIR__.'/../Modelo/Persona.php');

if(!empty($_GET['action'])){
    PersonaController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class PersonaController{

    static function main($action){
        if ($action == "crear"){
            PersonaController::crear();
        }else if ($action == "editar"){
            PersonaController::editar();
        }else if ($action == "buscarID"){
            PersonaController::buscarID($_REQUEST['idPersona']);
        }else if ($action == "ActivarPersona"){
            PersonaController::ActivarPersona();
        }else if ($action == "InactivarPersona"){
            PersonaController::InactivarPersona();
        }
    }

    static public function crear (){
        try {
            $arrayPersona = array();
            $arrayPersona['Tipo_Documento'] = $_POST['Tipo_Documento'];
            $arrayPersona['Documento'] = $_POST['Documento'];
            $arrayPersona['Nombres'] = $_POST['Nombres'];
            $arrayPersona['Apellidos'] = $_POST['Apellidos'];
            $arrayPersona['Telefono'] = $_POST['Telefono'];
            $arrayPersona['Direccion'] = $_POST['Direccion'];
            $arrayPersona['Correo'] = $_POST['Correo'];
            $arrayPersona['Foto'] = (isset($_POST['Foto']) ? $_POST['Foto'] : "Sin Foto");
            $arrayPersona['NRP'] = $_POST['NRP'];
            $arrayPersona['Profesion'] = $_POST['Profesion'];
            $arrayPersona['Usuario'] = $_POST['Usuario'];
            $arrayPersona['Contrasena'] = $_POST['Contrasena'];
            $arrayPersona['Tipo_Usuario'] = $_POST['Tipo_Usuario'];
            $arrayPersona['Observaciones'] = (isset($_POST['Observaciones']) ? $_POST['Observaciones'] : "");
            $arrayPersona['Estado'] = 'Activo';

            $Persona = new Persona ($arrayPersona);
            $Persona->insertar();
            header("Location: ../Vista/modules/persona/createPersona.php?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            header("Location: ../Vista/modules/persona/createPersona.php?respuesta=error");
        }
    }

    static public function selectPersona ($isRequired=true, $id="idPersona", $nombre="idPersona", $class=""){
        $arrPersonas = Persona::getAll();
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrPersonas) > 0){
            foreach ($arrPersonas as $persona)
                $htmlSelect .= "<option value='".$persona->getIdPersona()."'>".$persona->getNombres()." ".$persona->getApellidos()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }


    static public function editar (){
        try {
            $arrayPersona = array();
            $arrayPersona['Tipo_Documento'] = $_POST['Tipo_Documento'];
            $arrayPersona['Documento'] = $_POST['Documento'];
            $arrayPersona['Nombres'] = $_POST['Nombres'];
            $arrayPersona['Apellidos'] = $_POST['Apellidos'];
            $arrayPersona['Telefono'] = $_POST['Telefono'];
            $arrayPersona['Direccion'] = $_POST['Direccion'];
            $arrayPersona['Correo'] = $_POST['Correo'];
            $arrayPersona['Foto'] = $_POST['Foto'];
            $arrayPersona['NRP'] = $_POST['NRP'];
            $arrayPersona['Fecha_Registro'] = $_POST['Fecha_Registro'];
            $arrayPersona['Profesion'] = $_POST['Profesion'];
            $arrayPersona['Usuario'] = $_POST['Usuario'];
            $arrayPersona['Contrasena'] = $_POST['Contrasena'];
            $arrayPersona['Tipo_Usuario'] = $_POST['Tipo_Usuario'];
            $arrayPersona['Estado'] = $_POST['Estado'];
            $arrayPersona['idPersona'] = $_POST['idPersona'];
            $especial = new Persona($arrayPersona);
            $especial->editar();
            header("Location: ../Vista/modules/persona/edit.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/edit.php?respuesta=error");
        }
    }

    static public function ActivarPersona (){
        try {
            $ObjPersona = Persona::buscarForId($_GET['IdPersona']);
            $ObjPersona->setEstado("Activo");
            $ObjPersona->editar();
            header("Location: ../Vista/modules/persona/manager.php");
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    static public function InactivarPersona (){
        try {
            $ObjPersona = Persona::buscarForId($_GET['IdPersona']);
            $ObjPersona->setEstado("Inactivo");
            $ObjPersona->editar();
            header("Location: ../Vista/modules/persona/manager.php");
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return Persona::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return Persona::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return Persona::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

}