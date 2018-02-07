<?php
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class ExaFisico
{
	private $id;
	private $fecha;
	private $cabeza;
	private $cuello;
	private $torax;
	private $abdomen;
	private $miembros;
	private $genitales;
	private $paciente;
	function __construct($id,$fecha, $cabeza, $cuello, $torax, $abdomen, $miembros, $genitales, $paciente)
	{
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setCabeza($cabeza);
		$this->setCuello($cuello);
		$this->setTorax($torax);
		$this->setAbdomen($abdomen);
		$this->setMiembros($miembros);
		$this->setGenitales($genitales);
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

	public function getCabeza(){
		return $this->cabeza;
	}

	public function setCabeza($cabeza){
		$this->cabeza = $cabeza;
	}

	public function getCuello(){
		return $this->cuello;
	}

	public function setCuello($cuello){
		$this->cuello = $cuello;
	}

	public function getTorax(){
		return $this->torax;
	}

	public function setTorax($torax){
		$this->torax = $torax;
	}

	public function getAbdomen(){
		return $this->abdomen;
	}

	public function setAbdomen($abdomen){
		$this->abdomen = $abdomen;
	}

	public function getMiembros(){
		return $this->miembros;
	}

	public function setMiembros($miembros){
		$this->miembros = $miembros;
	}

	public function getGenitales(){
		return $this->genitales;
	}

	public function setGenitales($genitales){
		$this->genitales = $genitales;
	}

	public function getPaciente(){
		return $this->paciente;
	}

	public function setPaciente($paciente){
		$this->paciente = $paciente;
	}

	//opciones CRUD
}