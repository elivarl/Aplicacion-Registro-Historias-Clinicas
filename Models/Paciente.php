<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
* Fecha: 22-03-2017
*/
class Paciente
{
	private $id;  
	private $cedula;
	private $nombres;
	private $apellidos;
	private $ocupacion;
	private $estcivil;
	private $genero;
	private $fnacimiento;
	private $email;
	private $tposangre;
	private $direccion;
	private $usuario;	

	function __construct($id, $cedula, $nombres, $apellidos, $ocupacion, $estcivil, $genero, $fnacimiento, $email,$tposangre, $direccion,$usuario)
	{
		$this->setId($id);
		$this->setCedula($cedula);
		$this->setNombres($nombres);
		$this->setApellidos($apellidos);
		$this->setOcupacion($ocupacion);
		$this->setEstcivil($estcivil);
		$this->setGenero($genero);
		$this->setFnacimiento($fnacimiento);
		$this->setEmail($email);
		$this->setTposangre($tposangre);
		$this->setDireccion($direccion);
		$this->setUsuario($usuario);
	}


	//Getters y Setters
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCedula(){
		return $this->cedula;
	}

	public function setCedula($cedula){
		$this->cedula = $cedula;
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

	public function getOcupacion(){
		return $this->ocupacion;
	}

	public function setOcupacion($ocupacion){
		$this->ocupacion = $ocupacion;
	}

	public function getEstcivil(){
		return $this->estcivil;
	}

	public function setEstcivil($estcivil){
		$this->estcivil = $estcivil;
	}

	public function getGenero(){
		return $this->genero;
	}

	public function setGenero($genero){	
		$this->genero = $genero;
	}

	//obtener el string completo del estado civil del paciente
	public function getStringEstadoCivil(){
		$estado_civil= array('S'=>'Soltero',
                              'C'=>'Casado',
                              'V'=>'Viudo',
                              'D'=>'Divorciado',
                              'UL'=>'Unión Libre',
                              'UH'=>'Unión de Hecho'
                      );
		$string_estado="";
        foreach ($estado_civil as $codigo=>$estado ) {
           if ($this->getEstcivil()==$codigo) {
              $string_estado=$estado;
            }
         } 
         return $string_estado;
	}


	//obtener el string completo del genero del paciente
	public function getStringGenero(){
		$genero= array('M'=>'Masculino',
                        'F'=>'Femenino',
                        'O'=>'Otro'

                      );
		$string_genero="";
        foreach ($genero as $codigo=>$genero ) {
           if ($this->getGenero()==$codigo) {
              $string_genero=$genero;
            }
         } 
         return $string_genero;
	}


	public function getFnacimiento(){
		return $this->fnacimiento;
	}

	public function setFnacimiento($fnacimiento){
		$this->fnacimiento = $fnacimiento;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getTposangre(){
		return $this->tposangre;
	}

	public function setTposangre($tposangre){
		$this->tposangre = $tposangre;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	//opciones CRUD

	//la función para registrar un paciente
	public static function save($paciente){
		$db=Db::getConnect();
		//var_dump($paciente);
		//die();
			
		$insert=$db->prepare('INSERT INTO pacientes VALUES(NULL,:cedula,:nombres, :apellidos, :ocupacion, :estcivil, :genero, :fnacimiento,:email,:tposangre,:direccion,:usuario)');
		$insert->bindValue('cedula',$paciente->getCedula());
		$insert->bindValue('nombres',$paciente->getNombres());
		$insert->bindValue('apellidos',$paciente->getApellidos());
		$insert->bindValue('ocupacion',$paciente->getOcupacion());
		$insert->bindValue('estcivil',$paciente->getEstcivil());
		$insert->bindValue('genero',$paciente->getGenero());
		$insert->bindValue('fnacimiento',$paciente->getFnacimiento());
		$insert->bindValue('email',$paciente->getEmail());
		$insert->bindValue('tposangre',$paciente->getTposangre());
		$insert->bindValue('direccion',$paciente->getDireccion());
		$insert->bindValue('usuario',$paciente->getUsuario());
		$insert->execute();
	}

	//función para obtener todos los pacientes por usuario
	public static function all($idUsuario){
		$listaPacientes =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM pacientes WHERE USUARIO=:id order by id');
		$sql->bindParam(':id',$idUsuario);
		$sql->execute();

		// carga en la $listaPacientes cada registro desde la base de datos
		foreach ($sql->fetchAll() as $paciente) {
			$listaPacientes[]= new Paciente($paciente['id'],$paciente['cedula'], $paciente['nombres'],$paciente['apellidos'],$paciente['ocupacion'], $paciente['estcivil'], $paciente['genero'], $paciente['fnacimiento'], $paciente['email'],$paciente['tposangre'], $paciente['direccion'], $paciente['usuario']);
		}
		return $listaPacientes;
	}

	//la función para obtener un paciente por el id
	public static function getById($id){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM pacientes WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto paciente
		$pacienteDb=$select->fetch();
		$paciente= new Paciente($pacienteDb['id'],$pacienteDb['cedula'],$pacienteDb['nombres'],$pacienteDb['apellidos'],$pacienteDb['ocupacion'],$pacienteDb['estcivil'], $pacienteDb['genero'],$pacienteDb['fnacimiento'],$pacienteDb['email'],$pacienteDb['tposangre'], $pacienteDb['direccion'],$pacienteDb['usuario']);
		return $paciente;
	}

	//la función para obtener un paciente por cédula
	public static function getByCedula($cedula){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM pacientes WHERE cedula=:cedula');
		$select->bindValue('cedula',$cedula);
		$select->execute();
		//asignarlo al objeto paciente
		$pacienteDb=$select->fetch();
		$paciente= new Paciente($pacienteDb['id'],$pacienteDb['cedula'],$pacienteDb['nombres'],$pacienteDb['apellidos'],$pacienteDb['ocupacion'],$pacienteDb['estcivil'], $pacienteDb['genero'],$pacienteDb['fnacimiento'],$pacienteDb['email'],$pacienteDb['tposangre'], $pacienteDb['direccion'],$pacienteDb['usuario']);
		return $paciente;
	}

	//la función para actualizar 
	public static function update($paciente){
		//var_dump($paciente);
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE pacientes SET nombres=:nombres, apellidos=:apellidos,ocupacion=:ocupacion, estcivil=:estcivil, genero=:genero,fnacimiento=:fnacimiento, email=:email, tposangre=:tposangre, direccion=:direccion, usuario=:usuario  WHERE id=:id');
		$update->bindValue('id',$paciente->getId());
		//$update->bindValue('cedula',$paciente->getCedula());
		$update->bindValue('nombres',$paciente->getNombres());
		$update->bindValue('apellidos',$paciente->getApellidos());
		$update->bindValue('ocupacion',$paciente->getOcupacion());
		$update->bindValue('estcivil',$paciente->getEstcivil());
		$update->bindValue('genero',$paciente->getGenero());
		$update->bindValue('fnacimiento',$paciente->getFnacimiento());
		$update->bindValue('email',$paciente->getEmail());
		$update->bindValue('tposangre',$paciente->getTposangre());
		$update->bindValue('direccion',$paciente->getDireccion());
		$update->bindValue('usuario',$paciente->getUsuario());
		$update->execute();
	}

	// la función para eliminar por el id
	public static function delete($id){
		//var_dump($id);
		//die();
		$db=Db::getConnect();

		// elimina en cascada

		//eliminar registros antfamiliares
		$delete=$db->prepare('DELETE FROM antfamiliares WHERE paciente=:id ');
		$delete->bindValue('id',$id);		
		$delete->execute();

		//eliminar registros antpersonales
		$delete=$db->prepare('DELETE FROM antpersonales WHERE paciente=:id ');
		$delete->bindValue('id',$id);		
		$delete->execute();

		//eliminar registros consultas
		$delete=$db->prepare('DELETE FROM consultas WHERE paciente=:id ');
		$delete->bindValue('id',$id);
		$delete->execute();

		//eliminar registros exacomplementarios
		$delete=$db->prepare('DELETE FROM exacomplementarios WHERE paciente=:id ');
		$delete->bindValue('id',$id);
		$delete->execute();

		//eliminar registros exafisicos
		$delete=$db->prepare('DELETE FROM exafisicos WHERE paciente=:id ');
		$delete->bindValue('id',$id);
		$delete->execute();

		//eliminar registros exavisuales
		$delete=$db->prepare('DELETE FROM exavisuales WHERE paciente=:id ');
		$delete->bindValue('id',$id);
		$delete->execute();

		//eliminar registros histoclinicas
		$delete=$db->prepare('DELETE FROM histoclinicas WHERE paciente=:id ');
		$delete->bindValue('id',$id);
		$delete->execute();
		
		//eliminar registros  recetas
		$delete=$db->prepare('DELETE FROM recetas WHERE paciente=:id ');
		$delete->bindValue('id',$id);		
		$delete->execute();
		
		//eliminar registros sistemas
		$delete=$db->prepare('DELETE FROM sistemas WHERE paciente=:id ');
		$delete->bindValue('id',$id);
		$delete->execute();
		
		//eliminar registros sigvitales
		$delete=$db->prepare('DELETE FROM sigvitales WHERE paciente=:id ');
		$delete->bindValue('id',$id);
		$delete->execute();

		//eliminar el paciente
		$delete=$db->prepare('DELETE FROM pacientes WHERE ID=:id ');
		$delete->bindValue('id',$id);
		$delete->execute();
	}

}

