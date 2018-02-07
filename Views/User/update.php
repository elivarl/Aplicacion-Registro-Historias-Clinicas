<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<div class="container">
	 <h2>Actualizar Cuenta</h2>
	<form action='?controller=usuario&action=update' method='post'>
		<input type='hidden' name='id' value='<?php echo $usuario->getId(); ?>'>
		<div class="form-group">
	    	<label for="alias">Alias:</label>
	     	<input type="text" class="form-control" id="alias" name="alias" required="true" readonly="false" value="<?php echo $usuario->getAlias(); ?>">
		</div>

		<div class="form-group">
		    <label for="nombres">Nombres:</label>
		    <input type="text" class="form-control" id="nombres" name="nombres" required="true" value='<?php echo utf8_decode($usuario->getNombres()); ?>' autocomplete="off">
		</div>

		<div class="form-group">
		    <label for="email">Email:</label>
		    <input type="email" class="form-control" id="email" name="email" required="true" readonly="false" value='<?php echo $usuario->getEmail(); ?>'>
		</div>

		 <div class="row">
		 	<div class="col-sm-2">
		 	    <button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-save"> </span> Guardar</button>
	      </div>
		 	<div class="col-sm-2">
		 	    <button type="button" class="btn btn-danger" onclick="location.href='?controller=usuario&action=welcome'"><span class="glyphicon glyphicon-hand-left"></span> Cancelar</button>
		 	</div> 
		 </div>		
	</form>
</div>