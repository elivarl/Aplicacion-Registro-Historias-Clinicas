<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class Revision
{
	private $id;
	private $fecha;
	private $prescripcion;
	private $evolucion;
	private $consulta;
	function __construct($id, $fecha, $prescripcion, $evolucion ,$consulta)
	{
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setPrescripcion($prescripcion);
		$this->setEvolucion($evolucion);
		$this->setConsulta($consulta);
	}

	//Getters y Setters
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getPrescripcion(){
		return $this->prescripcion;
	}

	public function setPrescripcion($prescripcion){
		$this->prescripcion = $prescripcion;
	}

	public function getEvolucion(){
		return $this->evolucion;
	}

	public function setEvolucion($evolucion){
		$this->evolucion = $evolucion;
	}

	public function getConsulta(){
		return $this->consulta;
	}

	public function setConsulta($consulta){
		$this->consulta = $consulta;
	}

	//opciones CRUD
}