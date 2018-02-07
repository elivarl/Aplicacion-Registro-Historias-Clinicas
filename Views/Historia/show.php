<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<h1>Resumen Historias Clínicas</h1>
	<form class="form-inline" action="?controller=historia&action=buscar" method="post">
	<div class="form-group row">
	  <div class="col-xs-4">
	    <input class="form-control" name="numero" type="text" placeholder="0001">
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
					<th>Fecha Registro</th>
					<th>N. Historia Clínica</th>
					<th>Nombres Paciente</th>
					<th>Apellidos Paciente</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>	
			<?php foreach ($lista_historias as $historia) {?>		
				<tr>
					<td><?php echo $historia->getFregistro(); ?></td>
					<td><?php echo $historia->getNumero();?></td>
					<td><?php $paciente=Paciente::getById($historia->getPaciente()); echo $paciente->getNombres();?></td>
					<td><?php echo $paciente->getApellidos();?></td>
					<td> <button type="button" class="btn btn-info" onclick="location.href='?controller=historia&action=reporteHistorico&id=<?php echo $paciente->getId()?>'"><span class="glyphicon glyphicon-zoom-in"></span> Ver Histórico</button></td>
					<td> <button type="button" class="btn btn-success" onclick="location.href='?controller=consulta&action=register&id=<?php echo $paciente->getId()?>'"><span class="glyphicon glyphicon-th"></span> Crear Consulta</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<ul class ="pagination">		
			<?php for ($i=1;$i<=$botones;$i++){ ?>
				<li><a href="?controller=historia&action=show&boton=<?php echo $i ?>"><?php echo $i; ?></a></li>
			<?php }?>			
		</ul>
	</div>
</div>