<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class Receta
{
	private $id;
	private $fecha;
	private $medicamentos;
	private $indicaciones;	
	private $paciente;
	
	function __construct($id, $fecha,$medicamentos,$indicaciones, $paciente)
	{
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setMedicamentos($medicamentos);
		$this->setIndicaciones($indicaciones);		
		$this->setPaciente($paciente);		
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

	public function getIndicaciones(){
		return $this->indicaciones;
	}

	public function setIndicaciones($indicaciones){
		$this->indicaciones = $indicaciones;
	}

	public function getMedicamentos(){
		return $this->medicamentos;
	}

	public function setMedicamentos($medicamentos){
		$this->medicamentos = $medicamentos;
	}

	public function getPaciente(){
		return $this->paciente;
	}

	public function setPaciente($paciente){
		$this->paciente = $paciente;
	}

	//opciones CRUD
}