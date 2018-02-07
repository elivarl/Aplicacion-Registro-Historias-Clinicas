<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class SigVitales
{
	private $id;
	private $fecha;
	private $prearterial;
	private $pulso;
	private $peso;
	private $talla;
	private $descripcion;
	private $paciente;

	function __construct($id, $fecha,$prearterial, $pulso, $peso, $talla,$descripcion, $paciente)
	{
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setPrearterial($prearterial);
		$this->setPulso($pulso);
		$this->setPeso($peso);
		$this->setTalla($talla);		
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

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getPrearterial(){
		return $this->prearterial;
	}

	public function setPrearterial($prearterial){
		$this->prearterial = $prearterial;
	}

	public function getPulso(){
		return $this->pulso;
	}

	public function setPulso($pulso){
		$this->pulso = $pulso;
	}

	public function getPeso(){
		return $this->peso;
	}

	public function setPeso($peso){
		$this->peso = $peso;
	}

	public function getTalla(){
		return $this->talla;
	}

	public function setTalla($talla){
		$this->talla = $talla;
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