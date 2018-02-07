<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class AntFamiliar
{
	private $id; 
	private $cardiopatia;
	private $diabetes;
	private $cancer; 
	private $enfcardiovasculares;
	private $hipertension;
	private $enfmentales; 
	private $tubercolosis;
	private $enfinfecciosas;
	private $malformacion; 
	private $otra;
	private $descripcion;
	private $paciente;

	function __construct($id, $cardiopatia, $diabetes, $cancer, $enfcardiovasculares, $hipertension, $enfmentales, $tubercolosis, $enfinfecciosas, $malformacion, $otra, $descripcion, $paciente )
	{
		$this->setId($id);
		$this->setCardiopatia($cardiopatia);
		$this->setDiabetes($diabetes);
		$this->setCancer($cancer);
		$this->setEnfcardiovasculares($enfcardiovasculares);
		$this->setHipertension($hipertension);
		$this->setEnfmentales($enfmentales);
		$this->setTubercolosis($tubercolosis);
		$this->setEnfinfecciosas($enfinfecciosas);
		$this->setMalformacion($malformacion);
		$this->setOtra($otra);
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

	public function getCardiopatia(){
		return $this->cardiopatia;
	}

	//1=ON, 2=OFF
	public function setCardiopatia($cardiopatia){
		if ($cardiopatia=='on') {
			$this->cardiopatia = 1;
		}elseif ($cardiopatia==1) {
			$this->cardiopatia= 'checked';
		}elseif ($cardiopatia==2) {
			$this->cardiopatia = 'of';
		}else{
			$this->cardiopatia = 2;
		}
	}

	public function getDiabetes(){
		return $this->diabetes;
	}

	public function setDiabetes($diabetes){
		if ($diabetes=='on') {
			$this->diabetes = 1;
		}elseif ($diabetes==1) {
			$this->diabetes= 'checked';
		}elseif ($diabetes==2) {
			$this->diabetes = 'of';
		}else{
			$this->diabetes = 2;
		}
	}

	public function getCancer(){
		return $this->cancer;
	}

	public function setCancer($cancer){
		if ($cancer=='on') {
			$this->cancer = 1;
		}elseif ($cancer==1) {
			$this->cancer= 'checked';
		}elseif ($cancer==2) {
			$this->cancer = 'of';
		}else{
			$this->cancer = 2;
		}
	}

	public function getEnfcardiovasculares(){
		return $this->enfcardiovasculares;
	}

	public function setEnfcardiovasculares($enfcardiovasculares){
		if ( $enfcardiovasculares=='on') {
			$this->enfcardiovasculares  = 1;
		}elseif ($enfcardiovasculares==1) {
			$this->enfcardiovasculares= 'checked';
		}elseif ($enfcardiovasculares==2) {
			$this->enfcardiovasculares = 'of';
		}else{
			$this->enfcardiovasculares = 2;
		}
	}

	public function getHipertension(){
		return $this->hipertension;
	}

	public function setHipertension($hipertension){
		if ( $hipertension=='on') {
			$this->hipertension = 1;
		}elseif ($hipertension==1) {
			$this->hipertension= 'checked';
		}elseif ($hipertension==2) {
			$this->hipertension = 'of';
		}else{
			$this->hipertension = 2;
		}
	}

	public function getEnfmentales(){
		return $this->enfmentales;
	}

	public function setEnfmentales($enfmentales){
		if ( $enfmentales=='on') {
			$this->enfmentales = 1;
		}elseif ($enfmentales==1) {
			$this->enfmentales= 'checked';
		}elseif ($enfmentales==2) {
			$this->enfmentales = 'of';
		}else{
			$this->enfmentales = 2;
		}
	}

	public function getTubercolosis(){
		return $this->tubercolosis;
	}

	public function setTubercolosis($tubercolosis){
		if ( $tubercolosis=='on') {
			$this->tubercolosis = 1;
		}elseif ($tubercolosis==1) {
			$this->tubercolosis= 'checked';
		}elseif ($tubercolosis==2) {
			$this->tubercolosis = 'of';
		}else{
			$this->tubercolosis = 2;
		}
	}

	public function getEnfinfecciosas(){
		return $this->enfinfecciosas;
	}

	public function setEnfinfecciosas($enfinfecciosas){
		if ( $enfinfecciosas=='on') {
			$this->enfinfecciosas = 1;
		}elseif ($enfinfecciosas==1) {
			$this->enfinfecciosas= 'checked';
		}elseif ($enfinfecciosas==2) {
			$this->enfinfecciosas = 'of';
		}else{
			$this->enfinfecciosas = 2;
		}
	}

	public function getMalformacion(){
		return $this->malformacion;
	}

	public function setMalformacion($malformacion){
		if ( $malformacion=='on') {
			$this->malformacion = 1;
		}elseif ($malformacion==1) {
			$this->malformacion = 'checked';
		}elseif ($malformacion==2) {
			$this->malformacion = 'of';
		}else{
			$this->malformacion = 2;
		}
	}

	public function getOtra(){
		return $this->otra;
	}

	public function setOtra($otra){
		if ( $otra=='on') {
			$this->otra = 1;
		}elseif($otra==1){
			$this->otra = 'checked';
		}elseif($otra==2){
			$this->otra = 'of';
		}else{
			$this->otra = 2;
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