<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 14:49
 */
require_once('db_abstract_class.php');
require ("Especialidad.php");

class Consultorio extends db_abstract_class
{
    private $idConsultorio;
    private $Nombre;
    private $Especialidad;
    private $Jornada;
    private $Estado;

    public function __construct($Consultorio_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Consultorio_data)>1){ //
            foreach ($Consultorio_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idConsultorio = "";
            $this->Nombre = "";
            $this->Especialidad = new Especialidad();
            $this->Jornada = "";
            $this->Estado = "";
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
    public function getIdConsultorio()
    {
        return $this->idConsultorio;
    }

    /**
     * @param mixed $idConsultorio
     */
    public function setIdConsultorio($idConsultorio)
    {
        $this->idConsultorio = $idConsultorio;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getEspecialidad()
    {
        return $this->Especialidad;
    }

    /**
     * @param mixed $Especialidad
     */
    public function setEspecialidad(Especialidad $Especialidad)
    {
        $this->Especialidad = $Especialidad;
    }

    /**
     * @return mixed
     */
    public function getJornada()
    {
        return $this->Jornada;
    }

    /**
     * @param mixed $Jornada
     */
    public function setJornada($arrJornada)
    {
        $this->Jornada = implode(",", $arrJornada);
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

    public static function buscarForId($id)
    {
        $Consultorio = new Consultorio();
        if ($id > 0){
            $getrow = $Consultorio->getRow("SELECT * FROM Consultorio WHERE idConsultorio =?", array($id));;
            $Consultorio->idConsultorio = $getrow['idConsultorio'];
            $Consultorio->Nombre = $getrow['Nombre'];
            /* Cargamos el objeto de la especialidad segun el id de la especialidad */
            $Consultorio->Especialidad = Especialidad::buscarForId($getrow['Especialidad']);
            $Consultorio->Jornada = explode(",",$getrow['Jornada']);
            $Consultorio->Estado = $getrow['Estado'];
            $Consultorio->Disconnect();
            return $Consultorio;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrConsultorios = array();
        $tmp = new Consultorio();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Consultorio = new Consultorio();
            $Consultorio->idConsultorio = $valor['idConsultorio'];
            $Consultorio->Nombre = $valor['Nombre'];
            /* Cargamos el objeto de la especialidad segun el id de la especialidad */
            $Consultorio->Especialidad = Especialidad::buscarForId($valor['Especialidad']);
            $Consultorio->Jornada = explode(",",$valor['Jornada']);
            $Consultorio->Estado = $valor['Estado'];
            array_push($arrConsultorios, $Consultorio);
        }
        $tmp->Disconnect();
        return $arrConsultorios;
    }

    public static function getAll()
    {
        return Consultorio::buscar("SELECT * FROM consultorio");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO Consultorio VALUES (NULL, ?, ?, ?, ?)", array(
                $this->Nombre,
                $this->Especialidad->getIdEspecialidad(),
                $this->Jornada,
                $this->Estado,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE Consultorio SET Nombre = ?, Especialidad = ?, Jornada = ?, Estado = ? WHERE idConsultorio = ?", array(
            $this->Nombre,
            $this->Especialidad->getIdEspecialidad(),
            $this->Jornada,
            $this->Estado,
            $this->idConsultorio,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }


}