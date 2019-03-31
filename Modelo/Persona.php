<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 14:49
 */
require_once('db_abstract_class.php');
require ('Especialidad.php');

class Persona extends db_abstract_class
{
    private $idPersona;
    private $Tipo_Documento;
    private $Documento;
    private $Nombres;
    private $Apellidos;
    private $Telefono;
    private $Direccion;
    private $Correo;
    private $Foto;
    private $NRP;
    private $Fecha_Registro;
    private $Profesion;
    private $Usuario;
    private $Contrasena;
    private $Tipo_Usuario;
    private $Observaciones;
    private $Estado;

    // Relaciones M * M
    private $relEspecialidades;

    public function __construct($persona_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($persona_data)>1){ //
            foreach ($persona_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idPersona = "";
            $this->Tipo_Documento = "";
            $this->Documento = "";
            $this->Nombres = "";
            $this->Apellidos = "";
            $this->Telefono = "";
            $this->Direccion = "";
            $this->Correo = "";
            $this->Foto = "";
            $this->NRP = "";
            $this->Profesion = "";
            $this->Usuario = "";
            $this->Contrasena = "";
            $this->Tipo_Usuario = "";
            $this->Estado = "";
            $this->relEspecialidades = "";
        }
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
//        unset($this);
    }

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param mixed $idPersona
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    /**
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->Tipo_Documento;
    }

    /**
     * @param mixed $Tipo_Documento
     */
    public function setTipoDocumento($Tipo_Documento)
    {
        $this->Tipo_Documento = $Tipo_Documento;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param mixed $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * @param mixed $Nombres
     */
    public function setNombres($Nombres)
    {
        $this->Nombres = $Nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * @param mixed $Apellidos
     */
    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param mixed $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param mixed $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->Correo;
    }

    /**
     * @param mixed $Correo
     */
    public function setCorreo($Correo)
    {
        $this->Correo = $Correo;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->Foto;
    }

    /**
     * @param mixed $Foto
     */
    public function setFoto($Foto)
    {
        $this->Foto = $Foto;
    }

    /**
     * @return mixed
     */
    public function getNRP()
    {
        return $this->NRP;
    }

    /**
     * @param mixed $NRP
     */
    public function setNRP($NRP)
    {
        $this->NRP = $NRP;
    }

    /**
     * @return mixed
     */
    public function getFechaRegistro()
    {
        return $this->Fecha_Registro;
    }

    /**
     * @param mixed $Fecha_Registro
     */
    public function setFechaRegistro($Fecha_Registro)
    {
        $this->Fecha_Registro = $Fecha_Registro;
    }

    /**
     * @return mixed
     */
    public function getProfesion()
    {
        return $this->Profesion;
    }

    /**
     * @param mixed $Profesion
     */
    public function setProfesion($Profesion)
    {
        $this->Profesion = $Profesion;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * @param mixed $Usuario
     */
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->Contrasena;
    }

    /**
     * @param mixed $Contrasena
     */
    public function setContrasena($Contrasena)
    {
        $this->Contrasena = $Contrasena;
    }

    /**
     * @return mixed
     */
    public function getTipoUsuario()
    {
        return $this->Tipo_Usuario;
    }

    /**
     * @param mixed $Tipo_Usuario
     */
    public function setTipoUsuario($Tipo_Usuario)
    {
        $this->Tipo_Usuario = $Tipo_Usuario;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->Observaciones;
    }

    /**
     * @param mixed $Observaciones
     */
    public function setObservaciones($Observaciones)
    {
        $this->Observaciones = $Observaciones;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return mixed
     */
    public function getRelEspecialidades()
    {

        return $this->relEspecialidades;
    }

    /**
     * @param mixed $relEspecialidades
     */
    public function setRelEspecialidades($relEspecialidades)
    {
        $this->relEspecialidades = $relEspecialidades;
    }

    public static function buscarForId($id)
    {
        $Persona = new Persona();
        if ($id > 0){
            $getrow = $Persona->getRow("SELECT * FROM persona WHERE idPersona =?", array($id));
            $Persona->idPersona = $getrow['idPersona'];
            $Persona->Tipo_Documento = $getrow['Tipo_Documento'];
            $Persona->Documento = $getrow['Documento'];
            $Persona->Nombres = $getrow['Nombres'];
            $Persona->Apellidos = $getrow['Apellidos'];
            $Persona->Telefono = $getrow['Telefono'];
            $Persona->Direccion = $getrow['Direccion'];
            $Persona->Correo = $getrow['Correo'];
            $Persona->Foto = $getrow['Foto'];
            $Persona->NRP = $getrow['NRP'];
            $Persona->Fecha_Registro = $getrow['Fecha_Registro'];
            $Persona->Profesion = $getrow['Profesion'];
            $Persona->Usuario = $getrow['Usuario'];
            $Persona->Contrasena = $getrow['Contrasena'];
            $Persona->Tipo_Usuario = $getrow['Tipo_Usuario'];
            $Persona->Observaciones = $getrow['Observaciones'];
            $Persona->Estado = $getrow['Estado'];
            $Persona->relEspecialidades = $Persona->obtenerEspecialidades($getrow['idPersona']);
            $Persona->Disconnect();
            return $Persona;
        }else{
            $Persona->Disconnect();
            unset($Persona);
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrPersonas = array();
        $tmp = new Persona();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Persona = new Persona();
            $Persona->idPersona = $valor['idPersona'];
            $Persona->Tipo_Documento = $valor['Tipo_Documento'];
            $Persona->Documento = $valor['Documento'];
            $Persona->Nombres = $valor['Nombres'];
            $Persona->Apellidos = $valor['Apellidos'];
            $Persona->Telefono = $valor['Telefono'];
            $Persona->Direccion = $valor['Direccion'];
            $Persona->Correo = $valor['Correo'];
            $Persona->Foto = $valor['Foto'];
            $Persona->NRP = $valor['NRP'];
            $Persona->Fecha_Registro = $valor['Fecha_Registro'];
            $Persona->Profesion = $valor['Profesion'];
            $Persona->Usuario = $valor['Usuario'];
            $Persona->Contrasena = $valor['Contrasena'];
            $Persona->Tipo_Usuario = $valor['Tipo_Usuario'];
            $Persona->Observaciones = $valor['Observaciones'];
            $Persona->Estado = $valor['Estado'];
            $Persona->relEspecialidades = $Persona->obtenerEspecialidades($valor['idPersona']);
            $Persona->Disconnect();
            array_push($arrPersonas, $Persona);
        }
        $tmp->Disconnect();
        return $arrPersonas;
    }

    public static function getAll()
    {
        return Persona::buscar("SELECT * FROM persona");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO persona VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?)", array(
                $this->Tipo_Documento,
                $this->Documento,
                $this->Nombres,
                $this->Apellidos,
                $this->Telefono,
                $this->Direccion,
                $this->Correo,
                $this->Foto,
                $this->NRP,
                $this->Profesion,
                $this->Usuario,
                $this->Contrasena,
                $this->Tipo_Usuario,
                $this->Observaciones,
                $this->Estado,
            )
        );

        if($this->relEspecialidades != "" and !empty($this->relEspecialidades) and isset($this->relEspecialidades)){
            $this->idPersona = $this->getLastId();
            $this->asociarEspecialidad();
        }
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE persona SET Tipo_Documento = ?, Documento = ?, Nombres = ?, Apellidos = ?, Telefono = ?, Direccion = ?, Correo = ?, Foto = ?, NRP = ?, Fecha_Registro = NOW(), Profesion = ?, Usuario = ?, Contrasena = ?, Tipo_Usuario = ?, Observaciones = ?, Estado = ? WHERE idPersona = ?", array(
            $this->Tipo_Documento,
            $this->Documento,
            $this->Nombres,
            $this->Apellidos,
            $this->Telefono,
            $this->Direccion,
            $this->Correo,
            $this->Foto,
            $this->NRP,
            $this->Profesion,
            $this->Usuario,
            $this->Contrasena,
            $this->Tipo_Usuario,
            $this->Observaciones,
            $this->Estado,
            $this->idPersona,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    public function eliminarEspecialidad($idPersona, $idEspecialidad)
    {
        $idPersona = (!empty($idPersona) && isset($idPersona)) ? $idPersona : $this->idPersona;
        $idEspecialidad = (!empty($idEspecialidad) && isset($idEspecialidad)) ? $idEspecialidad : $this->relEspecialidades->getIdEspecialidad();

        $this->deleteRow("DELETE FROM persona_has_especialidad WHERE Especialidad = ? AND Persona = ?", array(
                $idEspecialidad,
                $idPersona,
            )
        );
        $this->Disconnect();
    }

    public function asociarEspecialidad($IdPersona=0, $IdEspecialidad=0){
        $IdPersona = (!empty($IdPersona) && isset($IdPersona)) ? $IdPersona : $this->idPersona;
        $IdEspecialidad = (!empty($IdEspecialidad) && isset($IdEspecialidad)) ? $IdEspecialidad : $this->relEspecialidades->getIdEspecialidad();

        $this->insertRow("INSERT INTO persona_has_especialidad VALUES (?, ?)", array(
                $IdEspecialidad,
                $IdPersona,
            )
        );
        $this->Disconnect();
    }

    public function obtenerEspecialidades($IdPersona){
        $arrEspecialidades = array();
        $tmp = new Persona();
        $getrows = $tmp->getRows("SELECT * FROM persona_has_especialidad WHERE Persona = ".$IdPersona.";");
        foreach ($getrows as $valor) {
            $Especialidad = Especialidad::buscarForId($valor['Especialidad']);
            $Especialidad->Disconnect();
            array_push($arrEspecialidades, $Especialidad);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

    public function Login($Usuario, $Contraseña){
        $tmp = new Persona();
        $resultPersonas = $tmp->getRows("SELECT * FROM persona WHERE Usuario = '$Usuario'");
        if(count($resultPersonas) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM persona WHERE Usuario = '$Usuario' AND Contrasena = '$Contraseña'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    $resultPersonas = new Persona($valor);
                    return $resultPersonas;
                }
            }else{
                return "Contraseña Incorrecta";
            }
        }else{
            return "Usuario Incorrecto";
        }

        $tmp->Disconnect();
        return null;
    }

}