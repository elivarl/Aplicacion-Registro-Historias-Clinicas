<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class AntPersonal
{
	private $id;
	private $imenarquia;
	private $imenopausia;
	private $vsexualactiva;
	private $ciclos;
	private $gesta;
	private $partos;
	private $abortos;
	private $cesareas;
	private $fum;
	private $fup;
	private $hvivos;
	private $mpf;
	private $descripcion;
	private $paciente;
	function __construct($id, $imenarquia, $imenopausia, $vsexualactiva, $ciclos, $gesta, $partos, $abortos, $cesareas, $fum, $fup, $hvivos, $mpf, $descripcion, $paciente)
	{
		$this->setId($id);
		$this->setImenarquia($imenarquia);
		$this->setImenopausia($imenopausia);
		$this->setVsexualactiva($vsexualactiva);
		$this->setCiclos($ciclos);
		$this->setGesta($gesta);
		$this->setPartos($partos);
		$this->setAbortos($abortos);
		$this->setCesareas($cesareas);
		$this->setFum($fum);
		$this->setFup($fup);
		$this->setHvivos($hvivos);
		$this->setMpf($mpf);
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

	public function getImenarquia(){
		return $this->imenarquia;
	}

	public function setImenarquia($imenarquia){
		$this->imenarquia = $imenarquia;
	}

	public function getImenopausia(){
		return $this->imenopausia;
	}

	public function setImenopausia($imenopausia){
		$this->imenopausia = $imenopausia;
	}

	public function getVsexualactiva(){
		return $this->vsexualactiva;
	}

	public function setVsexualactiva($vsexualactiva){
		$this->vsexualactiva = $vsexualactiva;
	}

	public function getCiclos(){
		return $this->ciclos;
	}

	public function setCiclos($ciclos){
		$this->ciclos = $ciclos;
	}

	public function getGesta(){
		return $this->gesta;
	}

	public function setGesta($gesta){
		$this->gesta = $gesta;
	}

	public function getPartos(){
		return $this->partos;
	}

	public function setPartos($partos){
		$this->partos = $partos;
	}

	public function getAbortos(){
		return $this->abortos;
	}

	public function setAbortos($abortos){
		$this->abortos = $abortos;
	}

	public function getCesareas(){
		return $this->cesareas;
	}

	public function setCesareas($cesareas){
		$this->cesareas = $cesareas;
	}

	public function getFum(){
		return $this->fum;
	}

	public function setFum($fum){
		$this->fum = $fum;
	}

	public function getFup(){
		return $this->fup;
	}

	public function setFup($fup){
		$this->fup = $fup;
	}

	public function getHvivos(){
		return $this->hvivos;
	}

	public function setHvivos($hvivos){
		$this->hvivos = $hvivos;
	}

	public function getMpf(){
		return $this->mpf;
	}

	public function setMpf($mpf){
		$this->mpf = $mpf;
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