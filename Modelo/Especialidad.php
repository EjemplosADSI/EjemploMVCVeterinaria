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
    private $idEspacialidad;
    private $Nombre;
    private $Estdo;

    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estdo
     */
    public function __construct($Especialidad_data = array())
    {

        arent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Especialidad_data)>1){ //
            foreach ($Especialidad_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idEspacialidad = "";
            $this->Nombre = "";
            $this->Estdo = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    protected static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    protected function insertar()
    {
        $this->insertRow("INSERT INTO mypet.especialidad VALUES (NULL, ?, ?)", array(
                $this->Nombre,
                $this->Estdo,
            )
        );
        $this->Disconnect();
    }

    protected function editar()
    {
        // TODO: Implement editar() method.
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    /**
     * @return mixed
     */
    public function getIdEspacialidad()
    {
        return $this->idEspacialidad;
    }

    /**
     * @param mixed $idEspacialidad
     */
    public function setIdEspacialidad($idEspacialidad)
    {
        $this->idEspacialidad = $idEspacialidad;
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
    public function getEstdo()
    {
        return $this->Estdo;
    }

    /**
     * @param mixed $Estdo
     */
    public function setEstdo($Estdo)
    {
        $this->Estdo = $Estdo;
    }



}

