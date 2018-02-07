<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once('Models/Paciente.php');
/**
* 
*/
class ConsultaController
{	
	function __construct(){}

	public function register(){
		$paciente=Paciente::getById($_GET['id']);
		require_once('Views/Consulta/register.php');
	}

	public function save(){
		$consulta= new Consulta(null,$_POST['fecha'],$_POST['enfactual'], $_POST['diagnostico'], $_POST['prescripcion'],$_POST['idpaciente']);
		//var_dump($consulta);
		//die();
		Consulta::save($consulta);
		$this->saveSigVitales();
		$this->saveSistemas();
		$this->saveExaFisicos();
		$this->saveExaComplementarios();
		$this->saveRecetas();
		$_SESSION['mensaje']='Registro guardado satisfactoriamente';
		$this->show();
	}

	//muestra las consultas
	public function show(){

		$consultas=Consulta::all();
		$lista_consultas="";
		$registros=2; // debe ser siempre par
		if (count($consultas)>$registros) { // solo página si el número de registros mostrados es menor que los registros de la bd
			if ((count($consultas)%$registros)==0) {
				$botones=count($consultas)/$registros;
			}else{//si el total de registros de la bd es impar			
				$botones=(count($consultas)/$registros+1);
			}
			
			if (!isset($_GET['boton'])) {//la primera vez carga los registros del botón 1
				$res=$registros*1;
				for ($i=0; $i < $res ; $i++) { 
					$lista_consultas[]=$consultas[$i];
				}
			}else{
				//multiplica el número de botón por el número de registros mostrados
				$res=$registros*$_GET['boton'];
				//resta el valor mayor de registros a mostrar menos el número de registros mostrados
				for ($i=$res-$registros; $i < $res; $i++) { 
					if ($i<count($consultas)) {
						$lista_consultas[]=$consultas[$i];
					}				
				}
			}
		}else{// si no se presenta el paginador
			$botones=0;
			$lista_consultas=$consultas;
		}

		require_once('Views/Consulta/show.php');
	}

	public function error(){
		require_once('Views/User/error.php');
	} 

	public function showupdate(){
		$id=$_GET['id'];
		//obtengo el paciente, la consulta, signos vitales, los datos sobre los sistemas y examenes fisicos, para esa consulta
		$paciente=Paciente::getById($_GET['paciente']);
		$consulta=Consulta::getById($id);
		$vitales=Consulta::getByIdSigVital($paciente->getId(),$consulta->getFecha());
		$sistemas=Consulta::getByIdSistema($paciente->getId(),$consulta->getFecha());
		$fisico=Consulta::getByIdFisico($paciente->getId(),$consulta->getFecha());
		$complementario=Consulta::getByIdComplementario($paciente->getId(),$consulta->getFecha());
		$receta=Consulta::getByIdReceta($paciente->getId(),$consulta->getFecha());
		require_once('Views/Consulta/update.php');
		//Usuario::update($usuario);
		//header('Location: ../index.php');
	}

	public function update(){
		$consulta= new Consulta($_POST['idconsulta'],$_POST['fecha'], $_POST['enfactual'], $_POST['diagnostico'], $_POST['prescripcion'], $_POST['idpaciente']);

		Consulta::update($consulta);
		$this->updateSigVitales();
		$this->updateSistemas();
		$this->updateExaFisicos();
		$this->updateExaComplementarios();
		$this->updateRecetas();
		$_SESSION['mensaje']='Registro actualizado satisfactoriamente';
		$this->show();
	}

	//la función para obtener consultas por cedula paciente
	public function buscar(){
		//obtener paciente por cedula
		if (!empty($_POST['cedula'])) {
			$paciente=Paciente::getByCedula($_POST['cedula']);
			$lista_consultas=Consulta::getByPaciente($paciente->getId());
			$botones=0;
			require_once('Views/Consulta/show.php');
		}else{
			$this->show();
		}	


	}



	public function saveSigVitales(){
		$sigVital= new SigVitales(null,$_POST['fecha'],$_POST['prearterial'], $_POST['pulso'], $_POST['peso'],$_POST['talla'],$_POST['descripcionsignos'],$_POST['idpaciente']);
		Consulta::saveSigVital($sigVital);
	}

	public function updateSigVitales(){
		$sigVital= new SigVitales($_POST['idsignos'],$_POST['fecha'],$_POST['prearterial'], $_POST['pulso'], $_POST['peso'],$_POST['talla'],$_POST['descripcionsignos'],$_POST['idpaciente']);
		Consulta::updateSigVital($sigVital);
	}


	public function saveSistemas(){
		$sistema= new Sistema(null,$_POST['fecha'],$_POST['sentidos'],$_POST['respiratorio'], $_POST['cardiovascular'], $_POST['nervioso'],$_POST['digestivo'],$_POST['genital'],$_POST['urinario'],$_POST['mesquletico'],$_POST['endocrino'],$_POST['linfatico'],$_POST['descripcionsistemas'],$_POST['idpaciente']);
		//var_dump($sistemas);
		//die();
		Consulta::saveSistema($sistema);
	}

	public function updateSistemas(){
		$sistema= new Sistema($_POST['idsistemas'],$_POST['fecha'],$_POST['sentidos'],$_POST['respiratorio'], $_POST['cardiovascular'], $_POST['nervioso'],$_POST['digestivo'],$_POST['genital'],$_POST['urinario'],$_POST['mesquletico'],$_POST['endocrino'],$_POST['linfatico'],$_POST['descripcionsistemas'],$_POST['idpaciente']);
		//var_dump($sistema);
		//die();
		Consulta::updateSistema($sistema);
	}


	public function saveExaFisicos(){
		$exaFisicos= new ExaFisico(null,$_POST['fecha'],$_POST['cabeza'], $_POST['cuello'], $_POST['torax'],$_POST['abdomen'],$_POST['miembros'],$_POST['genitales'],$_POST['idpaciente']);
		//var_dump($sigVital);
		//die();
		Consulta::saveExaFisico($exaFisicos);
	}

	public function updateExaFisicos(){
		$exaFisico= new ExaFisico($_POST['idfisicos'],$_POST['fecha'],$_POST['cabeza'], $_POST['cuello'], $_POST['torax'],$_POST['abdomen'],$_POST['miembros'],$_POST['genitales'],$_POST['idpaciente']);
		//var_dump($exaFisico);
		//die();
		Consulta::updateExaFisico($exaFisico);
	}

	public function saveExaComplementarios(){
		$exaComplementario= new ExaComplementario(null,$_POST['fecha'],$_POST['descripcionexacompl'],$_POST['idpaciente']);
		//var_dump($sigVital);
		//die();
		Consulta::saveExaComplementario($exaComplementario);
	}

	public function updateExaComplementarios(){
		$exaComplementario= new ExaComplementario($_POST['idcomplementario'],$_POST['fecha'],$_POST['descripcionexacompl'],$_POST['idpaciente']);
		//var_dump($exaFisico);
		//die();
		Consulta::updateExaComplementario($exaComplementario);
	}


	public function saveRecetas(){
		$receta= new Receta(null,$_POST['fecha'],$_POST['medicamentos'],$_POST['indicaciones'],$_POST['idpaciente']);
		//var_dump($sigVital);
		//die();
		Consulta::saveReceta($receta);
	}

	public function updateRecetas(){
		$receta= new Receta($_POST['idreceta'],$_POST['fecha'],$_POST['medicamentos'],$_POST['indicaciones'],$_POST['idpaciente']);
		//var_dump($exaFisico);
		//die();
		Consulta::updateReceta($receta);
	}

	public function recetaPdf(){
		header('Location: Controllers/RecetaPdf.php?fecha='.$_GET['fecha'].'&paciente='.$_GET['paciente']);	
	}

}