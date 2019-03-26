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
            EspecialidadController::buscarID($_REQUEST['idEspecialidad']);
        }else if ($action == "ActivarEspecialidad"){
            EspecialidadController::ActivarEspecialidad();
        }else if ($action == "InactivarEspecialidad"){
            EspecialidadController::InactivarEspecialidad();
        }else if ($action == "asociarPersona"){
            EspecialidadController::asociarPersona();
        }else if ($action == "eliminarPersona"){
            EspecialidadController::eliminarPersona();
        }
    }

    static public function crear (){
        try {
            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombre'] = $_POST['Nombre'];
            $arrayEspecialidad['Estado'] = $_POST['Estado'];
            $Especialidad = new Especialidad ($arrayEspecialidad);
            $Especialidad->insertar();
            header("Location: ../Vista/modules/especialidad/create.php?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            header("Location: ../Vista/modules/especialidad/create.php?respuesta=error");
        }
    }

    public static function especialidadIsInArray($idEspecialidad, $ArrEspecialidades){
        if(count($ArrEspecialidades) > 0){
            foreach ($ArrEspecialidades as $Especialidad){
                if($Especialidad->getIdEspecialidad() == $idEspecialidad){
                    return true;
                }
            }
        }
        return false;
    }

    static public function selectEspecialidad ($isMultiple=false,
                                               $isRequired=true,
                                               $id="idConsultorio",
                                               $nombre="idConsultorio",
                                               $defaultValue="",
                                               $class="",
                                               $where="",
                                               $arrExcluir = array()){
        $arrEspecialidad = array();
        if($where != ""){
            $base = "SELECT * FROM especialidad WHERE ";
            $arrEspecialidad = Especialidad::buscar($base.$where);
        }else{
            $arrEspecialidad = Especialidad::getAll();
        }
        $htmlSelect = "<select ".(($isMultiple) ? "multiple" : "")." ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option value=''>Seleccione</option>";
        if(count($arrEspecialidad) > 0){
            foreach ($arrEspecialidad as $especialidad){
                if (!EspecialidadController::especialidadIsInArray($especialidad->getIdEspecialidad(),$arrExcluir))
                    $htmlSelect .= "<option ".(($defaultValue != "") ? (($defaultValue == $especialidad->getIdEspecialidad()) ? "selected" : "" ) : "")." value='".$especialidad->getIdEspecialidad()."'>".$especialidad->getNombre()."</option>";
            }

        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }


    static public function editar (){
        try {
            $arrayEspecialidad = array();
            $arrayEspecialidad['Nombre'] = $_POST['Nombre'];
            $arrayEspecialidad['Estado'] = $_POST['Estado'];
            $arrayEspecialidad['idEspecialidad'] = $_POST['idEspecialidad'];
            $especial = new Especialidad($arrayEspecialidad);
            $especial->editar();
            header("Location: ../Vista/modules/especialidad/view.php?id=".$arrayEspecialidad['idEspecialidad']."&respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/modules/especialidad/edit.php?respuesta=error");
        }
    }

    static public function ActivarEspecialidad (){
        try {
            $ObjEspecialidad = Especialidad::buscarForId($_GET['IdEspecialidad']);
            $ObjEspecialidad->setEstado("Activo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/modules/especialidad/manager.php");
        } catch (Exception $e) {
            header("Location: ../Vista/modules/especialidad/manager.php?respuesta=error");
        }
    }

    static public function InactivarEspecialidad (){
        try {
            $ObjEspecialidad = Especialidad::buscarForId($_GET['IdEspecialidad']);
            $ObjEspecialidad->setEstado("Inactivo");
            $ObjEspecialidad->editar();
            header("Location: ../Vista/modules/especialidad/manager.php");
        } catch (Exception $e) {
            header("Location: ../Vista/modules/especialidad/manager.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return Especialidad::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/especialidad/manager.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return Especialidad::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/modules/especialidad/manager.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return Especialidad::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/especialidad/manager.php?respuesta=error");
        }
    }

    static public function asociarPersona(){
        try {
            $Especialidad = new Especialidad();
            $Especialidad->asociarPersonal($_POST['Persona'],$_POST['Especialidad']);
            header("Location: ../Vista/modules/persona/managerPersonal.php?respuesta=correcto&id=".$_POST['Especialidad']);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/persona/managerPersonal.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    static public function eliminarPersona (){
        try {
            $ObjEspecialidad = new Especialidad();
            if(!empty($_GET['Persona']) && !empty($_GET['Especialidad'])){
                $ObjEspecialidad->eliminarPersonal($_GET['Persona'],$_GET['Especialidad']);
            }else{
                throw new Exception('No se recibio la informacion necesaria.');
            }
            header("Location: ../Vista/modules/persona/managerPersonal.php?id=".$_GET['Especialidad']);
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/persona/manager.php?respuesta=error");
        }
    }

}