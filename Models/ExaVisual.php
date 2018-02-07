<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class ExaVisual
{
	private $id;
	private $descripcion;
	private $paciente;
	
	function __construct($id, $descripcion,$paciente)
	{
		$this->setId($id);
		$this->setDescripcion($descripcion);
		$this->setPaciente($paciente);
	}

	//Getters y Setters

		public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getPaciente(){
		return $this->paciente;
	}

	public function setPaciente($paciente){
		$this->paciente = $paciente;
	}


	//opciones CRUD
}