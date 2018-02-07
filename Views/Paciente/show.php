<?php if(!isset($_SESSION)) 
    { 
        session_start();   

    } ?>
<h1>Lista de Pacientes</h1>
	<form class="form-inline" action="?controller=paciente&action=buscar" method="post">
	<div class="form-group row">
	  <div class="col-xs-4">
	    <input class="form-control" id="cedula" name="cedula" type="text" placeholder="1717899322">
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
					<th>Cédula</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Ocupación</th>
					<th>Email</th>
					<th>Tipo de Sangre</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($lista_pacientes as $paciente)  {?>

				<tr>
					<td><?php echo $paciente->getCedula(); ?></td>
					<td><?php echo $paciente->getNombres(); ?></td>
					<td><?php echo $paciente->getApellidos();?></td>
					<td><?php echo $paciente->getOcupacion();?></td>
					<td><?php echo $paciente->getEmail();?></td>
					<td><?php echo $paciente->getTposangre();?></td>
					<td> <button type="button" class="btn btn-primary" onclick="location.href='?controller=paciente&action=showupdate&id=<?php echo $paciente->getId()?>'"><span class="glyphicon glyphicon-edit"> </span> Actualizar</button></td>
					<td><button type="button" class="btn btn-danger" onclick="location.href='?controller=paciente&action=delete&id=<?php echo $paciente->getId()?>'"><span class="	glyphicon glyphicon-trash"></span> Eliminar</button></td>
					<td><button type="button" class="btn btn-success" onclick="location.href='?controller=historia&action=register&id=<?php echo $paciente->getId()?>'"><span class="glyphicon glyphicon-th"></span> Crear/Editar H. Clínica</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<ul class ="pagination">		
			<?php for ($i=1;$i<=$botones;$i++){ ?>
				<li><a href="?controller=paciente&action=show&boton=<?php echo $i ?>"><?php echo $i; ?></a></li>
			<?php }?>			
		</ul>
	</div>
</div>