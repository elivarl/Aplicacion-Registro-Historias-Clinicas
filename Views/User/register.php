<div class="container">
	<h2>Registro de Usuario</h2>
	  <form action='?controller=usuario&action=save' method='post'>
	  	<div class="form-group">
	  		<label for="alias">Alias:</label>
		    <input type="text" class="form-control" id="alias" name="alias" required="true" placeholder="Ingrese su alias" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="nombres">Nombres:</label>
		    <input type="text" class="form-control" id="nombres" name="nombres" required="true" placeholder="Ingrese sus nombres" autocomplete="off">
		</div>

		<div class="form-group">
			<label for="apellidos">Apellidos:</label>
		    <input type="text" class="form-control" id="apellidos" name="apellidos" required="true" placeholder="Ingrese sus apellidos" autocomplete="off">
		</div>

		<div class="form-group">
		    <label for="email">Email:</label>
		    <input type="email" class="form-control" id="email" name="email" required="true" placeholder="Ingrese su email" autocomplete="off">
		</div>

		<div class="form-group">
		    <label for="pwd">Contraseña</label>
		    <input type="password" class="form-control" id="pwd" name="pwd" required="true" placeholder="Ingrese su contraseña">
		</div>
		<div class="col-sm-2">
		    <button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-save"></span> Guardar</button>
      </div>
	</form>
</div>