<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
	<div class="alert alert-success">
		<strong><?php echo $_SESSION['mensaje']; ?></strong>
	</div>
<?php } 
	unset($_SESSION['mensaje']);
?>	
<div class="container">
	<h2>Ingresar</h2>
	<form  action="?controller=usuario&action=login" method="post">
		<div class="form-group">
			<label for="email">	Email:	</label>			
			<input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" required="true" autocomplete="off">	
			
		</div>

		<div class="form-group">
			<label for="pwd"> Contraseña:</label>
			<input type="password"  class="form-control" id="pwd" name="pwd" placeholder="Ingrese su contraseña" required="true">				
		</div>

		<div class="form-group">
			<div class="col-sm-2">
			    <button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Ingresar</button>
		    </div>			
		</div>		
	</form>
</div>