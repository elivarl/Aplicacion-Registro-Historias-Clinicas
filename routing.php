<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	//función que llama al controlador y su respectiva acción, que son pasados como parámetros
	function call($controller, $action){
		//importa el controlador desde la carpeta Controllers
		require_once('Controllers/' . $controller . 'Controller.php');
		//crea el controlador

		switch($controller){
			case 'usuario':
				require_once('Models/Usuario.php');
				$controller= new UsuarioController();
				break; 
			case 'paciente':
				require_once('Models/Paciente.php');
				$controller=new PacienteController();
				break; 
			case 'historia':
				require_once('Models/AntPersonal.php');
				require_once('Models/AntFamiliar.php');
				require_once('Models/HistoClinica.php');
				require_once('Models/ExaVisual.php');
				$controller=new HistoriaController();
				break; 
			case 'consulta':
				require_once('Models/SigVitales.php');
				require_once('Models/HistoClinica.php');
				require_once('Models/Consulta.php');
				require_once('Models/Sistema.php');
				require_once('Models/ExaFisico.php');
				require_once('Models/ExaComplementario.php');
				require_once('Models/Receta.php');
				$controller= new ConsultaController();
				break;
		}
		//llama a la acción del controlador
		$controller->{$action }();
	}


	//array con los controladores y sus respectivas acciones
	$controllers= array(
						'usuario'=>['show','register','save','showregister', 'update', 'delete', 'showLogin','login','logout','error', 'welcome','validarCedula'],
						'paciente'=>['register','save', 'show', 'showupdate','update', 'delete','buscar'],
						'historia'=>['register','save', 'show', 'showupdate','update', 'delete','reporteHistorico','buscar'],
						'consulta'=>['register','save','show', 'showupdate','update','recetaPdf','buscar']
						);
	//verifica que el controlador enviado desde index.php esté dentro del arreglo controllers
	if (array_key_exists($controller, $controllers)) {

		//verifica que el arreglo controllers con la clave que es la variable controller del index exista la acción
		if (in_array($action, $controllers[$controller])) {
			//llama  la función call y le pasa el controlador a llamar y la acción (método) que está dentro del controlador
			if (isset($_SESSION['usuario'])){//ingresa sólo cuando el usuario tiene sesión abierta
				call($controller, $action);}
			elseif($controller=='usuario'&&($action=='showLogin'||$action=='login'||$action=='register'||$action=='save')){// ingresa a páginas que no necesitam sesión de usuario
				call($controller, $action);
			}else{//página que indica que no hay permisos
				call($controller, 'error');
			}
		}else{
			call('usuario', 'error');
		}
	}else{// le pasa el nombre del controlador y la pagina de error
		call('usuario', 'error');
	}
?>