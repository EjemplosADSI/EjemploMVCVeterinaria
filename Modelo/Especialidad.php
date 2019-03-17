<?php

/**
 * Created by PhpStorm.
 * User: CAPACITACION-PC
 * Date: 16/6/2017
 * Time: 16:47
 */

require_once('db_abstract_class.php');

class Especialidad extends db_abstract_class
{
    private $idEspecialidad;
    private $Nombre;
    private $Estado;

    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($Especialidad_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Especialidad_data)>1){ //
            foreach ($Especialidad_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idEspecialidad = "";
            $this->Nombre = "";
            $this->Estado = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
        //unset($this);
    }

    public static function buscarForId($id)
    {
        $Especial = new Especialidad();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM especialidad WHERE idEspecialidad =?", array($id));
            $Especial->idEspecialidad = $getrow['idEspecialidad'];
            $Especial->Nombre = $getrow['Nombre'];
            $Especial->Estado = $getrow['Estado'];
            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrEspecialidades = array();
        $tmp = new Especialidad();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $especial = new Especialidad();
            $especial->idEspecialidad = $valor['idEspecialidad'];
            $especial->Nombre = $valor['Nombre'];
            $especial->Estado = $valor['Estado'];
            array_push($arrEspecialidades, $especial);
        }
        $tmp->Disconnect();
        return $arrEspecialidades;
    }

    public static function getAll()
    {
        return Especialidad::buscar("SELECT * FROM especialidad");
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO mypet.especialidad VALUES (NULL, ?, ?)", array(
                $this->Nombre,
                $this->Estado,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mypet.especialidad SET Nombre = ?, Estado = ? WHERE idEspecialidad = ?", array(
            $this->Nombre,
            $this->Estado,
            $this->idEspecialidad,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    /**
     * @return mixed
     */
    public function getIdEspecialidad()
    {
        return $this->idEspecialidad;
    }

    /**
     * @param mixed $idEspecialidad
     */
    public function setIdEspecialidad($idEspecialidad)
    {
        $this->idEspecialidad = $idEspecialidad;
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



}

