<?php 
/**
* Controlador UsuarioController, para administrar los usuarios
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
* Fecha: 20-03-2017
*/
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
class UsuarioController
{	
	public function __construct(){}

	public function show(){
		//echo 'index desde UsuarioController';
			
		$usuario=Usuario::getById($_GET['id']);
		require_once('Views/User/show.php');
	}
	public function register(){
		//echo getcwd ();
		require_once('Views/User/register.php');
	}

	//guardar
	public function save(){
		//Usuario::save($usuario);
		$usuarios=[];
		$usuarios=Usuario::all();
		$existe=False;
		//var_dump($existe);
		//	die();
		foreach ($usuarios as $usuario) {
			//echo $usuario->alias."<br>".$_POST['alias']."<br>".$usuario->email;
			if (strcmp($usuario->getAlias(),$_POST['alias'])==0 or strcmp($usuario->getEmail(),$_POST['email'])==0) {
				$existe=True;
			}
		}			

		if (!$existe) {
			$usuario= new Usuario(null,$_POST['alias'], $_POST['nombres'],$_POST['apellidos'],$_POST['email'], $_POST['pwd'], NULL, NULL);
			Usuario::save($usuario);
			$_SESSION['mensaje']='Registro guardado satisfactoriamente';
			$this->showLogin();
			//header('Location: index.php');
			//require_once('Views/Layouts/layout.php');*/
		}else{
			$_SESSION['mensaje']='El alias o el correo para tu usuario ya existen';
			header('Location: index.php');
		}	
	}

	public function showregister(){
		$id=$_GET['id'];
		$usuario=Usuario::getById($id);
		require_once('Views/User/update.php');
		//Usuario::update($usuario);
		//header('Location: ../index.php');
	}

	public function update(){
		$usuario= new Usuario($_POST['id'],NULL,$_POST['nombres'],NULL,NULL,NULL,NULL,NULL, NULL);

		//var_dump($usuario);
		//die();
		Usuario::update($usuario);
		$_SESSION['mensaje']='Registro actualizado satisfactoriamente';
		header('Location: index.php');
	}

	public function delete(){
		Usuario::delete($_GET['id']);
		$_SESSION['mensaje']='Registro eliminado satisfactoriamente';
		header('Location: index.php');
	}
		
	public function error(){
		require_once('Views/User/error.php');
	} 
	public function welcome(){
		require_once('Views/bienvenido.php');
	} 

	public function showLogin(){
		require_once('Views/User/login.php');
	}

	//función que valida el usuario esté registrado
	public function login(){
		$usuarios=[];
		$usuarios=Usuario::all();
		$existe=False;
		//var_dump($existe);
		//	die();
		foreach ($usuarios as $usuario) {
			if (password_verify($_POST['pwd'],$usuario->getClave()) && strcmp($usuario->getEmail(),$_POST['email'])==0) {
				$existe=True;
				$_SESSION['usuario_id']=$usuario->getId();
				$_SESSION['usuario_alias']=$usuario->getAlias();
			}
		}
		if ($existe) {
			$_SESSION['usuario']=True;//inicio de sesion de usuario				
			//require_once('Views/Layouts/layout.php');
			header('Location: index.php');
		}else{
			$_SESSION['mensaje']='Email o contraseña invalidos';
			header('Location: index.php');
		}
	}

	public function logout() {
		unset($_SESSION['usuario']);
		unset($_SESSION['usuario_id']);
		unset($_SESSION['usuario_name']);
		header('Location: index.php');
	}

	public function validarCedula(){
		// fuerzo parametro de entrada a string
		$retorno="";
        $numero = $_POST['cedula'];
        //var_dump($numero);
        //die();
        // borro por si acaso errores de llamadas anteriores.
        //$this->setError('');
        // validaciones
        
            //$this->validarInicial($numero, '10');
           // $this->validarCodigoProvincia(substr($numero, 0, 2));
            //$this->validarTercerDigito($numero[2], 'cedula');
            $this->algoritmoModulo10(substr($numero, 0, 9), $numero[9]);
            $retorno='SI';
        
        $datos = array('estado' => 'ok','nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad);
        echo  json_encode($datos, true);
	}

	public function algoritmoModulo10($digitosIniciales, $digitoVerificador)
    {
        $arrayCoeficientes = array(2,1,2,1,2,1,2,1,2);
        $digitoVerificador = (int)$digitoVerificador;
        $digitosIniciales = str_split($digitosIniciales);
        $total = 0;
        foreach ($digitosIniciales as $key => $value) {
            $valorPosicion = ( (int)$value * $arrayCoeficientes[$key] );
            if ($valorPosicion >= 10) {
                $valorPosicion = str_split($valorPosicion);
                $valorPosicion = array_sum($valorPosicion);
                $valorPosicion = (int)$valorPosicion;
            }
            $total = $total + $valorPosicion;
        }
        $residuo =  $total % 10;
        if ($residuo == 0) {
            $resultado = 0;
        } else {
            $resultado = 10 - $residuo;
        }
        if ($resultado != $digitoVerificador) {
            //return false;
            //throw new Exception('Dígitos iniciales no validan contra Dígito Idenficador');
        }
        return true;
    }

    public function setError($newError)
    {
        $this->error = $newError;
        return $this;
    }
}