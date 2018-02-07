<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class Sistema
{
	private $id;
	private $fecha;
	private $sentidos;
	private $respiratorio;
	private $cardiovascular;
	private $nervioso;
	private $genital;
	private $digestivo;
	private $urinario;
	private $mesqueletico;
	private $endocrino;
	private $linfatico;
	private $descripcion;
	private $paciente;
	
	function __construct($id, $fecha,$sentidos, $respiratorio, $cardiovascular, $nervioso, $genital, $digestivo, $urinario, $mesqueletico, $endocrino, $linfatico, $descripcion, $paciente)
	{
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setSentidos($sentidos);
		$this->setRespiratorio($respiratorio);
		$this->setCardiovascular($cardiovascular);
		$this->setNervioso($nervioso);
		$this->setGenital($genital);
		$this->setDigestivo($digestivo);
		$this->setUrinario($urinario);
		$this->setMesqueletico($mesqueletico);
		$this->setEndocrino($endocrino);
		$this->setLinfatico($linfatico);
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

	public function getSentidos(){
		return $this->sentidos;
	}

	public function setSentidos($sentidos){
		if ($sentidos=='on') {
			$this->sentidos = 1;
		}elseif ($sentidos==1) {
			$this->sentidos= 'checked';
		}elseif ($sentidos==2) {
			$this->sentidos= 'of';
		}else{
			$this->sentidos = 2;
		}		
	}

	public function getRespiratorio(){
		return $this->respiratorio;
	}

	public function setRespiratorio($respiratorio){
		if ($respiratorio=='on') {
			$this->respiratorio = 1;
		}elseif ($respiratorio==1) {
			$this->respiratorio= 'checked';
		}elseif ($respiratorio==2) {
			$this->respiratorio= 'of';
		}else{
			$this->respiratorio = 2;
		}
	}

	public function getCardiovascular(){
		return $this->cardiovascular;
	}

	public function setCardiovascular($cardiovascular){
		if ($cardiovascular=='on') {
			$this->cardiovascular = 1;
		}elseif ($cardiovascular==1) {
			$this->cardiovascular= 'checked';
		}elseif ($cardiovascular==2) {
			$this->cardiovascular= 'of';
		}else{
			$this->cardiovascular = 2;
		}
	}

	public function getNervioso(){
		return $this->nervioso;
	}

	public function setNervioso($nervioso){
		if ($nervioso=='on') {
			$this->nervioso = 1;
		}elseif ($nervioso==1) {
			$this->nervioso= 'checked';
		}elseif ($nervioso==2) {
			$this->nervioso= 'of';
		}else{
			$this->nervioso = 2;
		}
	}

	public function getGenital(){
		return $this->genital;
	}

	public function setGenital($genital){
		if ($genital=='on') {
			$this->genital = 1;
		}elseif ($genital==1) {
			$this->genital= 'checked';
		}elseif ($genital==2) {
			$this->genital= 'of';
		}else{
			$this->genital = 2;
		}
	}

	public function getDigestivo(){
		return $this->digestivo;
	}

	public function setDigestivo($digestivo){
		if ($digestivo=='on') {
			$this->digestivo = 1;
		}elseif ($digestivo==1) {
			$this->digestivo= 'checked';
		}elseif ($digestivo==2) {
			$this->digestivo= 'of';
		}else{
			$this->digestivo = 2;
		}
	}

	public function getUrinario(){
		return $this->urinario;
	}

	public function setUrinario($urinario){
		if ($urinario=='on') {
			$this->urinario = 1;
		}elseif ($urinario==1) {
			$this->urinario= 'checked';
		}elseif ($urinario==2) {
			$this->urinario= 'of';
		}else{
			$this->urinario = 2;
		}
	}

	public function getMesqueletico(){
		return $this->mesqueletico;
	}

	public function setMesqueletico($mesqueletico){
		if ($mesqueletico=='on') {
			$this->mesqueletico = 1;
		}elseif ($mesqueletico==1) {
			$this->mesqueletico= 'checked';
		}elseif ($mesqueletico==2) {
			$this->mesqueletico= 'of';
		}else{
			$this->mesqueletico = 2;
		}
	}

	public function getEndocrino(){
		return $this->endocrino;
	}

	public function setEndocrino($endocrino){
		if ($endocrino=='on') {
			$this->endocrino = 1;
		}elseif ($endocrino==1) {
			$this->endocrino= 'checked';
		}elseif ($endocrino==2) {
			$this->endocrino= 'of';
		}else{
			$this->endocrino = 2;
		}
	}

	public function getLinfatico(){		
		return $this->linfatico;
	}

	public function setLinfatico($linfatico){
		if ($linfatico=='on') {
			$this->linfatico = 1;
		}elseif ($linfatico==1) {
			$this->linfatico= 'checked';
		}elseif ($linfatico==2) {
			$this->linfatico= 'of';
		}else{
			$this->linfatico = 2;
		}
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