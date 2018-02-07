<?php 
/**
* Controlador HistoriaController, para administrar las historias y datos relacionados
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
* Fecha: 23-03-2017
*/
 //error_reporting (0);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
require_once('Models/Paciente.php');

class HistoriaController
{	
	function __construct(){}

	public function register(){
		$idPaciente=$_GET['id'];

		$historia=HistoClinica::getByPaciente($idPaciente);
		
		if ($historia->getId()!=NULL) {//si existe la HC se va al archivo update.php
			$paciente=Paciente::getById($idPaciente);
			$aFamiliares=HistoClinica::getAntFamiliarByPaciente($idPaciente);
			$aPersonal=HistoClinica::getAntPersonalByPaciente($idPaciente);
			$eVisual=HistoClinica::getExaVisualByPaciente($idPaciente);
			//var_dump($aPersonal);
			//die();

			require_once('Views/Historia/update.php');	
		} else {// sino se va al register.php
			$numeroHistoria=$this->generarNumero();
			//obtengo el paciente para crear la historia
			$paciente=Paciente::getById($idPaciente);
			require_once('Views/Historia/register.php');
		}	
		
	}

	//guarda una HC, antecedentes familiares, personales y exámenes visuales
	public function save(){
		$idPaciente=$_POST['paciente'];
		$historia= new HistoClinica(null,$_POST['fecha'], $_POST['numero'], $_POST['paciente']);

		try {
			//validadar que no se creen más de una HC por paciente
			$historia1=HistoClinica::getByPaciente($idPaciente);
			if ($historia1->getId()==NULL) {
				HistoClinica::save($historia);
				$this->saveAntFamiliares();
				$this->saveAntPersonales();
				$this->saveExaVisuales();
				$_SESSION['mensaje']='Registro guardado satisfactoriamente';
				$this->show();
			} else {
				$_SESSION['mensaje']='El paciente ya tiene una Historia Clinica';
			}					
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}
		
	}

	//muestra las historias clínicas creadas
	public function show(){
		$historias=HistoClinica::all();
		//var_dump($historias);
		//die();
		//$paciente=Paciente::getById($_SESSION['usuario_id']);
		//paginator
		$lista_historias="";
		$registros=2; // debe ser siempre par
		if (count($historias)>$registros) { // solo página si el número de registros mostrados es menor que los registros de la bd
			if ((count($historias)%$registros)==0) {
				$botones=count($historias)/$registros;
			}else{//si el total de registros de la bd es impar			
				$botones=(count($historias)/$registros+1);
			}
			
			if (!isset($_GET['boton'])) {//la primera vez carga los registros del botón 1
				$res=$registros*1;
				for ($i=0; $i < $res ; $i++) { 
					$lista_historias[]=$historias[$i];
				}
			}else{
				//multiplica el número de botón por el número de registros mostrados
				$res=$registros*$_GET['boton'];
				//resta el valor mayor de registros a mostrar menos el número de registros mostrados
				for ($i=$res-$registros; $i < $res; $i++) { 
					if ($i<count($historias)) {
						$lista_historias[]=$historias[$i];
					}				
				}
			}
		}else{// si no se presenta el paginador
			$botones=0;
			$lista_historias=$historias;
		}
		require_once('Views/Historia/show.php');
	}

	public function error(){
		require_once('Views/User/error.php');
	} 

	//actualiza HC, enfermedades familiares, personales y exámenes visuales
	public function update(){
		$this->updateAntFamiliares();
		$this->updateAntPersonales();
		$this->updateExaVisuales();
		//$historia= new HistoClinica($_POST['idHistoria'],$_POST['fecha'], $_POST['numero'], $_POST['paciente']);

		//var_dump($paciente);
		//die();
		//HistoClinica::update($historia);

		$_SESSION['mensaje']='Registro actualizado satisfactoriamente';
		$this->show();
		//header('Location: index.php');
	}

	//muestra una historia clínicas por  numero
	public function buscar(){
		// si el campo numero no es vació
		if (!empty($_POST['numero'])) {
			$lista_historias[]=HistoClinica::getByNumero($_POST['numero']);
			$botones=0;
			require_once('Views/Historia/show.php');
		}else{//si está vacía trae todos los registros
			$this->show();
		}		
	}

	public function generarNumero(){
		$numero=HistoClinica::getMaxId();
		$numero = (NULL) ? $numero : $numero+1 ;
		if ($numero<10) {
			$numero= "000".$numero;
		} elseif($numero>=10&&$numero<99) {
			$numero="00".$numero;
		}elseif ($numero>=100&&$numero<999) {
			$numero="0".$numero;
		}elseif ($numero>=1000&&$numero<9999) {
			$numero=$numero;
		}		
		return $numero;
	}


	/*** Enfermedades familiares***/
	//guardar las enfermedades familiares
	public function saveAntFamiliares(){
		$antFamiliar= new AntFamiliar(null,$_POST['cardiopatia'], $_POST['diabetes'], $_POST['cancer'], $_POST['enfcardiovasculares'], $_POST['hipertension'], $_POST['enfmentales'], $_POST['tubercolosis'], $_POST['enfinfecciosas'], $_POST['malformacion'], $_POST['otra'], $_POST['descripcionfami'],$_POST['paciente']);
		//var_dump($antFamiliar);
		//die();
		HistoClinica::saveAntFamiliar($antFamiliar);
	}

	//actualizar las enfermedades familiares
	public function updateAntFamiliares(){		
		$antFamiliar= new AntFamiliar($_POST['idfamiliar'],$_POST['cardiopatia'], $_POST['diabetes'], $_POST['cancer'], $_POST['enfcardiovasculares'], $_POST['hipertension'], $_POST['enfmentales'], $_POST['tubercolosis'], $_POST['enfinfecciosas'], $_POST['malformacion'], $_POST['otra'], $_POST['descripcionfami'],$_POST['paciente']);
		
		HistoClinica::updateAntFamiliar($antFamiliar);
	}

	/*** Antecedentes personales***/
	//guardar antecedentes personales
	public function saveAntPersonales(){
		//var_dump($_POST['hipertension']);
		//die();
		$antPersonal= new AntPersonal(null,$_POST['imenarquia'], $_POST['imenopausia'],$_POST['vsexualactiva'],$_POST['ciclos'],$_POST['gesta'], $_POST['partos'], $_POST['abortos'], $_POST['cesareas'], $_POST['fum'],$_POST['fup'], $_POST['hvivos'],$_POST['mpf'],$_POST['descripcionper'],$_POST['paciente'] );
		HistoClinica::saveAntPersonal($antPersonal);
	}
	//actualiza antecedentes personales
	public function updateAntPersonales(){
		$antPersonal= new AntPersonal($_POST['idpersonal'],$_POST['imenarquia'], $_POST['imenopausia'],$_POST['vsexualactiva'],$_POST['ciclos'],$_POST['gesta'], $_POST['partos'], $_POST['abortos'], $_POST['cesareas'], $_POST['fum'],$_POST['fup'], $_POST['hvivos'],$_POST['mpf'],$_POST['descripcionper'],$_POST['paciente'] );
		HistoClinica::updateAntPersonal($antPersonal);
	}


	/*** Examenes visuales***/
	//guardar examenes visuales
	public function saveExaVisuales(){
		$exaVisual= new ExaVisual(null,$_POST['descripcionvisual'],$_POST['paciente'] );
		HistoClinica::saveExaVisual($exaVisual);
	}

	//actualiza examenes visuales
	public function updateExaVisuales(){
		$exaVisual= new ExaVisual($_POST['idvisual'],$_POST['descripcionvisual'],$_POST['paciente'] );
		HistoClinica::updateExaVisual($exaVisual);
	}


	//REPORTES
	public function reporteHistorico(){
		//validar que no se abra si no hay consultas
		header('Location: Controllers/HistoricoPdf.php?id='.$_GET['id']);		
	}



	
}

