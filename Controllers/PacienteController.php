<?php 
/**
* Controlador PacienteController, para administrar los pacientes y datos relacionados
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
* Fecha: 22-03-2017
*/
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

class PacienteController
{	
	function __construct(){}

	public function register(){
		require_once('Views/Paciente/register.php');
	}

	public function save(){
		$paciente= new Paciente(null,$_POST['cedula'], $_POST['nombres'], $_POST['apellidos'], $_POST['ocupacion'], $_POST['estcivil'], $_POST['genero'],$_POST['date'],$_POST['email'],$_POST['tposangre'],$_POST['direccion'], $_SESSION['usuario_id']);
		Paciente::save($paciente);
		$_SESSION['mensaje']='Registro guardado satisfactoriamente';		
		$this->show();
		//header('Location: index.php');
	}

	//muestra los pacientes por usuario
	public function show(){
		//var_dump($_SESSION['usuario_id']);
		//die();
		$pacientes=Paciente::all($_SESSION['usuario_id']);


		//paginator
		$lista_pacientes="";
		$registros=4; // debe ser siempre par
		if (count($pacientes)>$registros) { // solo página si el número de registros mostrados es menor que los registros de la bd
			if ((count($pacientes)%$registros)==0) {
				$botones=count($pacientes)/$registros;
			}else{//si el total de registros de la bd es impar			
				$botones=(count($pacientes)/$registros)+1;
			}
			
			if (!isset($_GET['boton'])) {//la primera vez carga los registros del botón 1
				$res=$registros*1;
				for ($i=0; $i < $res ; $i++) { 
					$lista_pacientes[]=$pacientes[$i];
				}
			}else{
				//multiplica el número de botón por el número de registros mostrados
				$res=$registros*$_GET['boton'];
				//resta el valor mayor de registros a mostrar menos el número de registros mostrados
				for ($i=$res-$registros; $i < $res; $i++) { 
					if ($i<count($pacientes)) {
						$lista_pacientes[]=$pacientes[$i];
					}				
				}
			}
		}else{// si no se presenta el paginador
			$botones=0;
			$lista_pacientes=$pacientes;
		}
		require_once('Views/Paciente/show.php');
	}

	public function error(){
		require_once('Views/User/error.php');
	} 

	public function showupdate(){
		$id=$_GET['id'];
		$paciente=Paciente::getById($id);
		require_once('Views/Paciente/update.php');
		//Usuario::update($usuario);
		//header('Location: ../index.php');
	}

	public function update(){
		$paciente= new Paciente($_POST['id'],$_POST['cedula'], $_POST['nombres'], $_POST['apellidos'], $_POST['ocupacion'], $_POST['estcivil'], $_POST['genero'],$_POST['date'],$_POST['email'],$_POST['tposangre'],$_POST['direccion'], $_SESSION['usuario_id']);

		//var_dump($paciente);
		//die();
		Paciente::update($paciente);
		$_SESSION['mensaje']='Registro actualizado satisfactoriamente';
		$this->show();
		//header('Location: index.php');
	}

	public function delete(){
		Paciente::delete($_GET['id']);
		$_SESSION['mensaje']='Registro eliminado satisfactoriamente';
		$this->show();
		//header('Location: index.php');
	}
	//muestra un paciente por cedula
	public function buscar(){
		// si cedula no es vacía busca por cedula
		if (!empty($_POST['cedula'])) {
			$lista_pacientes[]=Paciente::getByCedula($_POST['cedula']);
			$botones=0;
			require_once('Views/Paciente/show.php');
		}else{//si está vacía trae todos los registros
			$this->show();
		}		
	}
}