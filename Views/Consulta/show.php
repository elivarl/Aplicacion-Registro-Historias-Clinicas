<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<h1>Resumen Consultas</h1>
	<form class="form-inline" action="?controller=consulta&action=buscar" method="post">
	<div class="form-group row">
	  <div class="col-xs-4">
	    <input class="form-control" name="cedula" type="text" placeholder="17173245678">
	  </div>
	</div>
	<div class="form-group row">
	 <div class="col-xs-4">
	    <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span> Buscar</button>
	  </div>
		</div>
	</form>

		<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
			<div class="alert alert-success">
				<strong><?php echo $_SESSION['mensaje']; ?></strong>
			</div>
		<?php } 
			unset($_SESSION['mensaje']);
		?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Fecha Consulta</th>
					<th>N. Historia Clínica</th>
					<th>Paciente</th>
				</tr>
			</thead>
			<tbody>	
			<?php foreach ($lista_consultas as $consulta) {?>		
				<tr>
					<td><?php echo $consulta->getFecha(); ?></td>
					<td><?php $historia=HistoClinica::getByPaciente($consulta->getPaciente()); echo $historia->getNumero();?></td>
					<td><?php $paciente=Paciente::getById($consulta->getPaciente()); echo $paciente->getNombres().' '.$paciente->getApellidos();?></td>
					<td> <button type="button" class="btn btn-success" onclick="location.href='?controller=consulta&action=showupdate&id=<?php echo $consulta->getId()?>&paciente=<?php echo $consulta->getPaciente() ?>'"><span class="glyphicon glyphicon-edit"></span> Editar Consulta</button></td>
					<td> <button type="button" class="btn btn-info" onclick="location.href='?controller=consulta&action=recetaPdf&fecha=<?php echo $consulta->getFecha()?>&paciente=<?php echo $paciente->getId() ?>'"><span class="glyphicon glyphicon-cloud-download"></span> Descargar Receta PDF</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<ul class ="pagination">		
			<?php for ($i=1;$i<=$botones;$i++){ ?>
				<li><a href="?controller=consulta&action=show&boton=<?php echo $i ?>"><?php echo $i; ?></a></li>
			<?php }?>			
		</ul>
	</div>
</div>