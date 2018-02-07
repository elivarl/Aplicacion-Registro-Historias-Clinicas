<?php 
/**
* Modelo para el acceso a la base de datos y funciones CRUD
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
*/
class Consulta
{
	private $id;
	private $fecha;
	private $enfactual;
	private $diagnostico;
	private $prescripcion;
	private $paciente;
	function __construct($id, $fecha, $enfactual, $diagnostico, $prescripcion, $paciente)
	{
		$this->setId($id);
		$this->setFecha($fecha);
		$this->setEnfactual($enfactual);
		$this->setDiagnostico($diagnostico);
		$this->setPrescripcion($prescripcion);
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

	public function getEnfactual(){
		return $this->enfactual;
	}

	public function setEnfactual($enfactual){
		$this->enfactual = $enfactual;
	}

	public function getDiagnostico(){
		return $this->diagnostico;
	}

	public function setDiagnostico($diagnostico){
		$this->diagnostico = $diagnostico;
	}

	public function getPrescripcion(){
		return $this->prescripcion;
	}

	public function setPrescripcion($prescripcion){
		$this->prescripcion = $prescripcion;
	}

	public function getPaciente(){
		return $this->paciente;
	}

	public function setPaciente($paciente){
		$this->paciente = $paciente;
	}

	//opciones CRUD
	//la función para registrar una consulta
	public static function save($consulta){
		$db=Db::getConnect();
		//var_dump($consulta);
		//die();
			
		$insert=$db->prepare('INSERT INTO consultas VALUES(NULL,:fecha,:enfactual, :diagnostico, :prescripcion, :paciente)');
		$insert->bindValue('fecha',$consulta->getFecha());
		$insert->bindValue('enfactual',$consulta->getEnfactual());
		$insert->bindValue('diagnostico',$consulta->getDiagnostico());
		$insert->bindValue('prescripcion',$consulta->getPrescripcion());
		$insert->bindValue('paciente',$consulta->getPaciente());
		$insert->execute();
	}

	//función para obtener todas las consultas
	public static function all(){
		$listaConsultas =[];
		$db=Db::getConnect();
		$sql=$db->query('SELECT * FROM consultas order by id');


		// carga en la $listaConsultas cada registro desde la base de datos
		foreach ($sql->fetchAll() as $consulta) {
			$listaConsultas[]= new Consulta($consulta['id'],$consulta['fecha'],$consulta['enfactual'], $consulta['diagnostico'],$consulta['prescripcion'],$consulta['paciente']);
		}
		return $listaConsultas;
	}
	//función para obtener todas las consultas por numero de cedula pacientes
	public static function getByPaciente($paciente){
		$listaConsultas =[];
		$db=Db::getConnect();
		$sql=$db->prepare('SELECT * FROM consultas WHERE paciente=:paciente order by id');
		$sql->bindValue('paciente',$paciente);
		$sql->execute();
		// carga en la $listaConsultas cada registro desde la base de datos
		foreach ($sql->fetchAll() as $consulta) {
			$listaConsultas[]= new Consulta($consulta['id'],$consulta['fecha'],$consulta['enfactual'], $consulta['diagnostico'],$consulta['prescripcion'],$consulta['paciente']);
		}
		return $listaConsultas;
	}

	//la función para obtener una consulta por el id
	public static function getById($id){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM consultas WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto usuario
		$consultaDb=$select->fetch();
		$consulta= new Consulta($consultaDb['id'],$consultaDb['fecha'],$consultaDb['enfactual'],$consultaDb['diagnostico'],$consultaDb['prescripcion'], $consultaDb['paciente']);
		//var_dump($usuario);
		//die();
		return $consulta;
	}


	public static function update($consulta){
		//var_dump();
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE consultas SET enfactual=:enfactual, diagnostico=:diagnostico,prescripcion=:prescripcion WHERE id=:id');
		$update->bindValue('id',$consulta->getId());
		$update->bindValue('enfactual',$consulta->getEnfactual());
		$update->bindValue('diagnostico',$consulta->getDiagnostico());
		$update->bindValue('prescripcion',$consulta->getPrescripcion());
		$update->execute();
	}


	/***FUNCIONES CRUD SIGVITALES***/
	//la función para registrar los signos vitales
	public static function saveSigVital($sigVital){
		$db=Db::getConnect();
		//var_dump($sigvital);
		//die();
		
		$insert=$db->prepare('INSERT INTO sigvitales VALUES(NULL,:fecha,:prearterial, :pulso, :peso,:talla, :descripcion,:paciente)');
		$insert->bindValue('fecha',$sigVital->getFecha());
		$insert->bindValue('prearterial',$sigVital->getPrearterial());
		$insert->bindValue('pulso',$sigVital->getPulso());
		$insert->bindValue('peso',$sigVital->getPeso());
		$insert->bindValue('talla',$sigVital->getTalla());
		$insert->bindValue('descripcion',$sigVital->getDescripcion());
		$insert->bindValue('paciente',$sigVital->getPaciente());
		$insert->execute();
	}

	public static function updateSigVital($sigVital){
		//var_dump();
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE sigvitales SET descripcion=:descripcion  WHERE id=:id');
		$update->bindValue('id',$sigVital->getId());
		$update->bindValue('descripcion',$sigVital->getDescripcion());
		$update->execute();
	}

	//la función para obtener una consulta por el paciente y fecha
	public static function getByIdSigVital($paciente, $fechaConsulta){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM sigvitales WHERE PACIENTE=:paciente AND FECHA=:fecha');
		$select->bindValue('paciente',$paciente);
		$select->bindValue('fecha',$fechaConsulta);
		$select->execute();
		//asignarlo al objeto usuario
		$sigvitalDb=$select->fetch();
		$sigVital= new SigVitales($sigvitalDb['id'],$sigvitalDb['fecha'],$sigvitalDb['prearterial'],$sigvitalDb['pulso'],$sigvitalDb['peso'],$sigvitalDb['talla'], $sigvitalDb['descripcion'], $sigvitalDb['paciente']);
		//var_dump($usuario);
		//die();
		return $sigVital;
	}

	/***FUNCIONES CRUD SISTEMAS***/
	//la función para registrar el resultado de los sistemas
	public static function saveSistema($sistema){
		$db=Db::getConnect();
		//var_dump($sistemas);
		//die();
		
		$insert=$db->prepare('INSERT INTO sistemas VALUES(NULL,:fecha,:sentidos, :respiratorio, :cardiovascular,:nervioso,:genital,:digestivo,:urinario,:mesqueletico,:endocrino,:linfatico,:descripcion, :paciente)');
		$insert->bindValue('fecha', $sistema->getFecha());
		$insert->bindValue('sentidos',$sistema->getSentidos());
		$insert->bindValue('respiratorio',$sistema->getRespiratorio());
		$insert->bindValue('cardiovascular',$sistema->getCardiovascular());
		$insert->bindValue('nervioso',$sistema->getNervioso());
		$insert->bindValue('genital',$sistema->getGenital());
		$insert->bindValue('digestivo',$sistema->getDigestivo());
		$insert->bindValue('urinario',$sistema->getUrinario());
		$insert->bindValue('mesqueletico',$sistema->getMesqueletico());
		$insert->bindValue('endocrino',$sistema->getEndocrino());
		$insert->bindValue('linfatico',$sistema->getLinfatico());
		$insert->bindValue('descripcion',$sistema->getDescripcion());
		$insert->bindValue('paciente',$sistema->getPaciente());
		$insert->execute();
	}

	public static function updateSistema($sistema){
		//var_dump($sistema);
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE sistemas SET sentidos=:sentidos, respiratorio=:respiratorio,cardiovascular=:cardiovascular, nervioso=:nervioso, genital=:genital,digestivo=:digestivo,urinario=:urinario,mesqueletico=:mesqueletico,endocrino=:endocrino,linfatico=:linfatico,descripcion=:descripcion WHERE id=:id');
		$update->bindValue('id',$sistema->getId());
		$update->bindValue('sentidos',$sistema->getSentidos());
		$update->bindValue('respiratorio',$sistema->getRespiratorio());
		$update->bindValue('cardiovascular',$sistema->getCardiovascular());
		$update->bindValue('nervioso',$sistema->getNervioso());
		$update->bindValue('genital',$sistema->getGenital());
		$update->bindValue('digestivo',$sistema->getDigestivo());
		$update->bindValue('urinario',$sistema->getUrinario());
		$update->bindValue('mesqueletico',$sistema->getMesqueletico());
		$update->bindValue('endocrino',$sistema->getEndocrino());
		$update->bindValue('linfatico',$sistema->getLinfatico());
		$update->bindValue('descripcion',$sistema->getDescripcion());
		$update->execute();
	}


	//la función para obtener el sistema por el paciente y fecha
	public static function getByIdSistema($paciente, $fechaConsulta){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM sistemas WHERE PACIENTE=:paciente AND FECHA=:fecha');
		$select->bindValue('paciente',$paciente);
		$select->bindValue('fecha',$fechaConsulta);
		$select->execute();
		//asignarlo al objeto usuario
		$sistemaDb=$select->fetch();
		$sistema= new Sistema($sistemaDb['id'],$sistemaDb['fecha'],$sistemaDb['sentidos'],$sistemaDb['respiratorio'],$sistemaDb['cardiovascular'],$sistemaDb['nervioso'], $sistemaDb['genital'],$sistemaDb['digestivo'],$sistemaDb['urinario'],$sistemaDb['mesqueletico'],$sistemaDb['endocrino'],$sistemaDb['linfatico'],$sistemaDb['descripcion'], $sistemaDb['paciente']);
		//var_dump($usuario);
		//die();
		return $sistema;
	}


	/***FUNCIONES CRUD EXAFISICO***/
	//la función para registrar el resultado de los examenes fisicos
	public static function saveExaFisico($exaFisico){
		$db=Db::getConnect();
		//var_dump($sigvital);
		//die();
		
		$insert=$db->prepare('INSERT INTO exafisicos VALUES(NULL,:fecha,:cabeza, :cuello, :torax,:abdomen,:miembros,:genitales,:paciente)');
		$insert->bindValue('fecha',$exaFisico->getFecha());
		$insert->bindValue('cabeza',$exaFisico->getCabeza());
		$insert->bindValue('cuello',$exaFisico->getCuello());
		$insert->bindValue('torax',$exaFisico->getTorax());
		$insert->bindValue('abdomen',$exaFisico->getAbdomen());
		$insert->bindValue('miembros',$exaFisico->getMiembros());
		$insert->bindValue('genitales',$exaFisico->getGenitales());
		$insert->bindValue('paciente',$exaFisico->getPaciente());
		$insert->execute();
	}
	public static function updateExaFisico($exaFisico){
		//var_dump($exaFisico);
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE exafisicos SET cabeza=:cabeza, cuello=:cuello,torax=:torax,abdomen=:abdomen,miembros=:miembros,genitales=:genitales  WHERE id=:id');
		$update->bindValue('id',$exaFisico->getId());
		$update->bindValue('cabeza',$exaFisico->getCabeza());
		$update->bindValue('cuello',$exaFisico->getCuello());
		$update->bindValue('torax',$exaFisico->getTorax());
		$update->bindValue('abdomen',$exaFisico->getAbdomen());
		$update->bindValue('miembros',$exaFisico->getMiembros());
		$update->bindValue('genitales',$exaFisico->getGenitales());
		$update->execute();
	}

	//la función para obtener los examenes físicos por el paciente y fecha
	public static function getByIdFisico($paciente, $fechaConsulta){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM exafisicos WHERE PACIENTE=:paciente AND FECHA=:fecha');
		$select->bindValue('paciente',$paciente);
		$select->bindValue('fecha',$fechaConsulta);
		$select->execute();
		//asignarlo al objeto
		$fisicoDb=$select->fetch();
		$fisico= new ExaFisico($fisicoDb['id'],$fisicoDb['fecha'],$fisicoDb['cabeza'],$fisicoDb['cuello'],$fisicoDb['torax'],$fisicoDb['abdomen'],$fisicoDb['miembros'],$fisicoDb['genitales'],$fisicoDb['paciente']);
		//var_dump($usuario);
		//die();
		return $fisico;
	}



	/***FUNCIONES CRUD EXACOMPLEMENTARIOS***/
	//la función para registrar examenes complementarios
	public static function saveExaComplementario($exaComplementario){
		$db=Db::getConnect();
		//var_dump($exaComplementario);
		//die();
		
		$insert=$db->prepare('INSERT INTO exacomplementarios VALUES(NULL,:fecha,:descripcion,:paciente)');
		$insert->bindValue('fecha',$exaComplementario->getFecha());
		$insert->bindValue('descripcion',$exaComplementario->getDescripcion());
		$insert->bindValue('paciente',$exaComplementario->getPaciente());
		$insert->execute();
	}

	public static function updateExaComplementario($exaComplementario){
		//var_dump($exaFisico);
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE exacomplementarios SET descripcion=:descripcion  WHERE id=:id');
		$update->bindValue('id',$exaComplementario->getId());
		$update->bindValue('descripcion',$exaComplementario->getDescripcion());
		$update->execute();
	}

	//la función para obtener los examenes complementarios por el paciente y fecha
	public static function getByIdComplementario($paciente, $fechaConsulta){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM exacomplementarios WHERE PACIENTE=:paciente AND FECHA=:fecha');
		$select->bindValue('paciente',$paciente);
		$select->bindValue('fecha',$fechaConsulta);
		$select->execute();
		//asignarlo al objeto
		$complementarioDb=$select->fetch();
		$complementario= new ExaComplementario($complementarioDb['id'],$complementarioDb['fecha'],$complementarioDb['descripcion'],$complementarioDb['paciente']);
		//var_dump($usuario);
		//die();
		return $complementario;
	}

	/***FUNCIONES CRUD RECETA***/
	//la función para registrar LA RECETA
	public static function saveReceta($receta){
		$db=Db::getConnect();
		//var_dump($exaComplementario);
		//die();
		
		$insert=$db->prepare('INSERT INTO recetas VALUES(NULL,:fecha,:medicamentos,:indicaciones,:paciente)');
		$insert->bindValue('fecha',$receta->getFecha());
		$insert->bindValue('medicamentos',$receta->getMedicamentos());
		$insert->bindValue('indicaciones',$receta->getIndicaciones());
		$insert->bindValue('paciente',$receta->getPaciente());
		$insert->execute();
	}

	public static function updateReceta($receta){
		//var_dump($exaFisico);
		//die();
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE recetas SET medicamentos=:medicamentos, indicaciones=:indicaciones  WHERE id=:id');
		$update->bindValue('id',$receta->getId());
		$update->bindValue('medicamentos',$receta->getMedicamentos());
		$update->bindValue('indicaciones',$receta->getIndicaciones());
		$update->execute();
	}

	//la función para obtener las recetas
	public static function getByIdReceta($paciente, $fechaConsulta){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM recetas WHERE PACIENTE=:paciente AND FECHA=:fecha');
		$select->bindValue('paciente',$paciente);
		$select->bindValue('fecha',$fechaConsulta);
		$select->execute();
		//asignarlo al objeto
		$recetaDb=$select->fetch();
		$receta= new Receta($recetaDb['id'],$recetaDb['fecha'],$recetaDb['medicamentos'],$recetaDb['indicaciones'],$recetaDb['paciente']);
		//var_dump($usuario);
		//die();
		return $receta;
	}
	
}