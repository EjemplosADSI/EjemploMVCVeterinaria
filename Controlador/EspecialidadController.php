<?php

require_once (__DIR__.'/../Modelo/Especialidad.php');

if(!empty($_GET['action'])){
    EspecialidadController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class EspecialidadController{

    static function main($action){
        if ($action == "crear"){
            EspecialidadController::crear();
        }else if ($action == "editar"){
            EspecialidadController::editar();
        }else if ($action == "buscarID"){
            EspecialidadController::buscarID();
        }else if ($action == "ActivarEspecialidad"){
            EspecialidadController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            EspecialidadController::InactivarEspecialidad();
        }
    }

    static public function crear (){
        try {
            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombre'] = $_POST['Nombre'];
            $arrayEspecialidad['Estado'] = $_POST['Estado'];
            $Especialidad = new Especialidad ($arrayEspecialidad);
            $Especialidad->insertar();
            header("Location: ../Vista/createEspecialidad.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/createEspecialidad.php?respuesta=error");
        }
    }

    /*
    static public function selectEspecialista ($isRequired=true, $id="idEspecialista", $nombre="idEspecialista", $class=""){
        $arrEspecialistas = Especialista::getAll(); /*  */
        /*$htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrEspecialistas) > 0){
            foreach ($arrEspecialistas as $especialista)
                $htmlSelect .= "<option value='".$especialista->getIdEspecialista()."'>".$especialista->getNombre()." ".$especialista->getApellido()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }*/


    static public function editar (){
        try {
            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombre'] = $_POST['Nombre'];
            $arrayEspecialidad['Estado'] = $_POST['Estado'];
            $arrayEspecialidad['idEspecialidad'] = $_POST['idEspecialidad'];
            $especial = new Especialidad($arrayEspecialidad);
            $especial->editar();
            header("Location: ../Vista/editarEspecialidad.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarEspecialidad.php?respuesta=error");
        }
    }

    static public function ActivarEspecialidad (){
        try {
            $ObjEspecialidad = Especialidad::buscarForId($_GET['IdEspecialidad']);
            $ObjEspecialidad->setEstado("Activo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/gestionarEspecialidades.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarEspecialidades.php?respuesta=error");
        }
    }

    static public function InactivarEspecialidad (){
        try {
            $ObjEspecialidad = Especialidad::buscarForId($_GET['IdEspecialidad']);
            $ObjEspecialidad->setEstado("Inactivo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/gestionarEspecialidades.php");
        } catch (Exception $e) {
            header("Location: ../Vista/gestionarEspecialidades.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return Especialidad::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarEspecialidades.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return Especialidad::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarEspecialidades.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return Especialidad::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarEspecialidades.php?respuesta=error");
        }
    }

}
?>