<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<h1>Mi Cuenta</h1>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Alias</th>
					<th>Nombres</th>
					<th>Email</th>
					<th></th>
				</tr>
			</thead>
			<tbody>			
				<tr>
					<td><?php echo $usuario->getAlias(); ?></td>
					<td><?php echo $usuario->getNombres();?></td>
					<td><?php echo $usuario->getEmail();?></td>
					<td> <button type="button" class="btn btn-primary" onclick="location.href='?controller=usuario&action=showregister&id=<?php echo $usuario->getId()?>'">Actualizar</button></td>
				<td><button type="button" class="btn btn-danger" onclick="location.href='?controller=usuario&action=delete&id=<?php echo $usuario->getId()?>'">Eliminar</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>