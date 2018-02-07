<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class Usuario
{
	private $id;
	private $alias;
	private $nombres;
	private $apellidos;
	private $email;
	private $clave;
	private $pregunta;
	private $respuesta;
	
	function __construct($id, $alias, $nombres, $apellidos, $email,$clave, $pregunta, $respuesta)
	{
		$this->setId($id);
		$this->setAlias($alias);
		$this->setNombres($nombres);
		$this->setApellidos($apellidos);
		$this->setEmail($email);
		$this->setClave($clave);
		$this->setPregunta($pregunta);
		$this->setRespuesta($respuesta);
	}


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getAlias(){
		return $this->alias;
	}

	public function setAlias($alias){
		$this->alias = $alias;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getClave(){
		return $this->clave;
	}

	public function setClave($clave){
		$this->clave = $clave;
	}

	public function getPregunta(){
		return $this->pregunta;
	}

	public function setPregunta($pregunta){
		$this->pregunta = $pregunta;
	}

	public function getRespuesta(){
		return $this->respuesta;
	}

	public function setRespuesta($respuesta){
		$this->respuesta = $respuesta;
	}


	//opciones CRUD

	//función para obtener todos los usuarios
	public static function all(){
		$listaUsuarios =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM usuarios');

		// carga en la $listaUsuarios cada registro desde la base de datos
		foreach ($sql->fetchAll() as $usuario) {
			$listaUsuarios[]= new Usuario($usuario['id'],$usuario['alias'], $usuario['nombres'],$usuario['apellidos'],$usuario['email'], $usuario['clave'], $usuario['respuesta'], $usuario['pregunta']);
		}
		return $listaUsuarios;
	}

	//la función para registrar un usuario
	public static function save($usuario){
		$db=Db::getConnect();
			
		$insert=$db->prepare('INSERT INTO USUARIOS VALUES(NULL,:alias,:nombres,:apellidos,:email,:clave, :respuesta,:pregunta)');
		$insert->bindValue('alias',$usuario->getAlias());
		$insert->bindValue('nombres',$usuario->getNombres());
		$insert->bindValue('apellidos',$usuario->getApellidos());
		$insert->bindValue('email',$usuario->getEmail());
		//encripta la clave
		$pass=password_hash($usuario->getClave(),PASSWORD_DEFAULT);
		//var_dump($pass);
		//die();
		$insert->bindValue('clave',$pass);
		$insert->bindValue('pregunta',$usuario->getPregunta());
		$insert->bindValue('respuesta',$usuario->getRespuesta());
		$insert->execute();
	}

	//la función para actualizar 
	public static function update($usuario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuarios SET nombres=:nombres WHERE id=:id');
		$update->bindValue('id',$usuario->id);
		$update->bindValue('nombres',$usuario->nombres);
		$update->execute();
	}

	// la función para eliminar por el id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM usuarios WHERE ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}

	//la función para obtener un usuario por el id
	public static function getById($id){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuarios WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto usuario
		$usuarioDb=$select->fetch();
		$usuario= new Usuario($usuarioDb['id'],$usuarioDb['alias'],$usuarioDb['nombres'],$usuarioDb['apellidos'],$usuarioDb['email'], $usuarioDb['clave'],$usuarioDb['pregunta'],$usuarioDb['respuesta']);
		//var_dump($usuario);
		//die();
		return $usuario;
	}
}