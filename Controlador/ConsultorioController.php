<?php
if(session_status() == PHP_SESSION_NONE){ //Si la session no ha iniciado
    session_start();
}
require_once (__DIR__.'/../Modelo/GeneralFunctions.php');
require_once (__DIR__.'/../Modelo/Consultorio.php');
require_once (__DIR__.'/../Modelo/Especialidad.php');

if(!empty($_GET['action'])){
    ConsultorioController::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

class ConsultorioController{

    static function main($action){
        if ($action == "crear"){
            ConsultorioController::crear();
        }else if ($action == "editar"){
            ConsultorioController::editar();
        }else if ($action == "buscarID"){
            ConsultorioController::buscarID($_REQUEST['idConsultorio']);
        }else if ($action == "ActivarConsultorio"){
            ConsultorioController::ActivarConsultorio();
        }else if ($action == "InactivarConsultorio"){
            ConsultorioController::InactivarConsultorio();
        }
    }

    static public function crear (){
        try {
            $arrayConsultorio = array();
            $arrayConsultorio['Nombre'] = $_POST['Nombre'];
            $arrayConsultorio['Especialidad'] = Especialidad::buscarForId($_POST['Especialidad']);
            $arrayConsultorio['Jornada'] = implode(",", $_POST['Jornada']); //Une todos los elementos seleccionados
            $arrayConsultorio['Estado'] = 'Activo';

            $Consultorio = new Consultorio ($arrayConsultorio);
            $Consultorio->insertar();
            header("Location: ../Vista/modules/consultorio/create.php?respuesta=correcto");
        } catch (Exception $e) {
            //var_dump($e);
            header("Location: ../Vista/modules/consultorio/create.php?respuesta=error&mensaje=".$e->getMessage());
        }
    }

    public static function consultorioIsInArray($idConsultorio, $ArrConsultorio){
        if(count($ArrConsultorio) > 0){
            foreach ($ArrConsultorio as $Consultorio){
                if($Consultorio->getIdConsultorio() == $idConsultorio){
                    return true;
                }
            }
        }
        return false;
    }

    static public function selectConsultorio ($isMultiple=false,
                                              $isRequired=true,
                                              $id="idConsultorio",
                                              $nombre="idConsultorio",
                                              $defaultValue="",
                                              $class="",
                                              $where="",
                                              $arrExcluir = array()){
        $arrConsultorios = array();
        if($where != ""){
            $base = "SELECT * FROM consultorio WHERE ";
            $arrConsultorios = Consultorio::buscar($base.$where);
        }else{
            $arrConsultorios = Consultorio::getAll();
        }

        $htmlSelect = "<select ".(($isMultiple) ? "multiple" : "")." ".(($isRequired) ? "required" : "")." id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option value=''>Seleccione</option>";
        if(count($arrConsultorios) > 0){
            foreach ($arrConsultorios as $Consultorio){
                if (!ConsultorioController::consultorioIsInArray($Consultorio->getIdConsultorio(),$arrExcluir))
                    $htmlSelect .= "<option ".(($defaultValue != "") ? (($defaultValue == $Consultorio->getIdConsultorio()) ? "selected" : "" ) : "")." value='".$Consultorio->getIdConsultorio()."'>".$Consultorio->getNombre()."</option>";
            }
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }


    static public function editar (){
        try {
            $arrayConsultorio = array();
            $arrayConsultorio['Nombre'] = $_POST['Nombre'];
            $arrayConsultorio['Especialidad'] = Especialidad::buscarForId($_POST['Especialidad']);
            $arrayConsultorio['Jornada'] = implode(",",$_POST['Jornada']);
            $arrayConsultorio['Estado'] = $_POST['Estado'];
            $arrayConsultorio['idConsultorio'] = $_POST['idConsultorio'];

            $person = new Consultorio($arrayConsultorio);
            $person->editar();

            header("Location: ../Vista/modules/consultorio/view.php?id=".$person->getIdConsultorio()."&respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/Consultorio/edit.php?respuesta=error");
        }
    }

    static public function ActivarConsultorio (){
        try {
            $ObjConsultorio = Consultorio::buscarForId($_GET['IdConsultorio']);
            $ObjConsultorio->setEstado("Activo");
            $ObjConsultorio->editar();
            header("Location: ../Vista/modules/consultorio/manager.php");
        } catch (Exception $e) {
            header("Location: ../Vista/modules/consultorio/manager.php?respuesta=error");
        }
    }

    static public function InactivarConsultorio (){
        try {
            $ObjConsultorio = Consultorio::buscarForId($_GET['IdConsultorio']);
            $ObjConsultorio->setEstado("Inactivo");
            $ObjConsultorio->editar();
            header("Location: ../Vista/modules/consultorio/manager.php");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/modules/Consultorio/manager.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return Consultorio::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/consultorio/manager.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return Consultorio::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/modules/consultorio/manager.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return Consultorio::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/modules/consultorio/manager.php?respuesta=error");
        }
    }

}