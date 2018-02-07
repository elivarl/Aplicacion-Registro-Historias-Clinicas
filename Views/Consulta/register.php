<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<div class="container">
	<h1>Información Consulta</h1>
</div>
<div id="exTab1" class="container">	
	<ul  class="nav nav-pills">
		<li class="active">
       		<a  href="#paciente" data-toggle="tab">Datos Paciente</a>
		</li>
		<li>
       		<a  href="#consulta" data-toggle="tab">Consulta</a>
		</li>
		<li>
			<a href="#signos" data-toggle="tab">Signos Vitales</a>
		</li>
		<li>
			<a href="#sistemas" data-toggle="tab">Organos y Sistemas</a>
		</li>
		<li>
			<a href="#fisicos" data-toggle="tab">Exámenes Físicos</a>
		</li>
		<li>
			<a href="#complementarios" data-toggle="tab">Exámenes Complementarios</a>
		</li>
		<li>
			<a href="#receta" data-toggle="tab">Receta</a>
		</li>
	</ul>


	<form action='?controller=consulta&action=save' method='post'>
	<div class="tab-content clearfix">
		<div class="tab-pane active" id="paciente">
			<div class="container">				 
			  	<div class="form-group">
			  		<label for="cedula">Cedula:</label>
				    <input type="cedula" class="form-control" id="cedula" name="cedula" readonly="false" value="<?php echo $paciente->getCedula(); ?>">
				    <div id="prueba"></div>	
				</div>
				<div class="form-group">					
					<input type="hidden" name="idpaciente" value="<?php echo $paciente->getId();?>">
			  		<label for="nombres">Nombres:</label>
				    <input type="nombres" class="form-control" id="nombres" name="nombres"  readonly="false" value="<?php echo $paciente->getNombres().' '.$paciente->getApellidos(); ?>">
				</div>
				<div class="form-group">
			  		<label for="ocupacion">Ocupación:</label>
				    <input type="ocupacion" class="form-control" id="ocupacion" name="ocupacion"  readonly="false" value="<?php echo $paciente->getOcupacion(); ?>">
				</div>	
				<div class="form-group">
			  		<label for="direccion">Dirección:</label>
				    <input type="direccion" class="form-control" id="direccion" name="direccion"  readonly="false" value="<?php echo $paciente->getDireccion(); ?>">
				</div>			
			</div>
		</div>

		<div class="tab-pane" id="consulta">
			<div class="container">				 
			  	<div class="form-group">
			  		<label for="fecha">Fecha Consulta:</label>
				    <input type="fecha" class="form-control" id="fecha" name="fecha"  value="<?php echo date('Y-m-d h:i:s') ?>" readonly="false">
				</div>
				<div class="form-group">
					<label for="enfactual">Enfermedad o problema actual:</label>
					<textarea class="form-control" rows="4" name="enfactual" required="true" placeholder="CRONOLOGIA, LOCALIZACIÓN, CARACTERÍSTICAS, INTENSIDAD, CAUSA APARENTE, FACTORES QUE AGRAVAN O MEJORAN, SÍNTOMAS ASOCIADOS, EVOLUCIÓN, MEDICAMENTOS QUE RECIBE, RESULTADOS DE EXAMENES ANTERIORES, CONDICION ACTUAL."></textarea>
				</div>
				<div class="form-group">
					<label for="diagnostico">Diagnóstico:</label>
					<textarea class="form-control" rows="4" name="diagnostico" placeholder="Diagnóstico enfermedad"></textarea>
				</div>
				<div class="form-group">
					<label for="prescripcion">Prescripción:</label>
					<textarea class="form-control" rows="4" name="prescripcion"  placeholder="Prescripción y medicamentos, dietas etc."></textarea>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="signos">
		    <div class="form-group">
		    	<div class="col-xs-6">
		    		<label for="prearterial">Presión arterial:</label>
					<input type="text" class="form-control" id="prearterial" name="prearterial" required="true" placeholder="Escriba la presión arterial del paciente al momento de la consulta">		    	
		    	</div>				
			</div>
			<div class="form-group">
				<div class="col-xs-6">
		    		<label for="pulso">Pulso:</label>
					<input type="number" class="form-control" id="pulso" min="20" name="pulso" required="true" placeholder="Escriba el pulso del paciente al momento de la consulta" autocomplete="off">		    	
		    	</div>
		    </div>

		    <div class="form-group">
		        <div class="col-xs-6">
		    		<label for="peso">Peso (Kilos):</label>
					<input type="number" class="form-control" id="peso" min="5" name="peso"  step="0.01" required="true" placeholder="Escriba el peso del paciente al momento de la consulta" autocomplete="off">		    	
				</div>
		    </div>

		    <div class="form-group">
		        <div class="col-xs-6">
		    		<label for="talla">Talla (centímetros):</label>
					<input type="number" class="form-control" id="talla" name="talla" required="true" step="0.01" placeholder="Escriba la talla del paciente al momento de la consulta" autocomplete="off">		    	
				</div>
		    </div>


		    <div class="form-group">
				<label for="descripcion">Descripción:</label>
				<textarea class="form-control" rows="4" name="descripcionsignos" placeholder="Ingrese alguna información adicional"></textarea>
			</div>
		</div>
		<div class="tab-pane" id="sistemas">
		    <div class="checkbox">
		    	<label><input type="checkbox" name="sentidos" >Organos de los Sentidos</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="respiratorio" >Respiratorio</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="cardiovascular"  >Cardio Vasculares</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="digestivo" >Digestivo</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="genital" >Genital</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="urinario"  >Urinario</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="mesquletico" >Musculo Esqueletico</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="endocrino"  >Endocrino</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="linfatico"  >Linfático</label>
		    </div>

		    <div class="form-group">
				<label for="descripcion">Descripción:</label>
				<textarea class="form-control" rows="3" name="descripcionsistemas" placeholder="Ingrese alguna información adicional"></textarea>
			</div>
		</div>
       	<div class="tab-pane" id="fisicos">
       		 <div class="form-group">
				<label for="cabeza">Cabeza:</label>
				<textarea class="form-control" rows="3" name="cabeza" placeholder="Ingrese alguna información adicional"></textarea>
			</div>
			<div class="form-group">
				<label for="cuello">Cuello:</label>
				<textarea class="form-control" rows="3" name="cuello"  placeholder="Ingrese alguna información adicional"></textarea>
			</div>
			<div class="form-group">
				<label for="torax">Torax:</label>
				<textarea class="form-control" rows="3" name="torax" placeholder="Ingrese alguna información adicional"></textarea>
			</div>
			<div class="form-group">
				<label for="abdomen">Abdomen:</label>
				<textarea class="form-control" rows="3" name="abdomen" placeholder="Ingrese alguna información adicional"></textarea>
			</div>
			<div class="form-group">
				<label for="miembros">Miembros:</label>
				<textarea class="form-control" rows="3" name="miembros"  placeholder="Ingrese alguna información adicional"></textarea>
			</div>
			<div class="form-group">
				<label for="genitales">Genitales:</label>
				<textarea class="form-control" rows="3" name="genitales"  placeholder="Ingrese alguna información adicional"></textarea>
			</div>
		</div>

		<div class="tab-pane" id="complementarios">
			<div class="container">	
				<div class="form-group">
					<label for="exadicionales">Exámenes Adicionales:</label>
					<textarea class="form-control" rows="5" name="descripcionexacompl"  placeholder="Ingrese los exámenes adicionales, laboratorio, radiografías etc."></textarea>
				</div>			
			</div>
		</div>

		<div class="tab-pane" id="receta">
			<div class="container">	
				<div class="form-group">
					<label for="medicamentos">Medicamentos:</label>
					<textarea class="form-control" rows="5" name="medicamentos"  placeholder="Ingrese los medicamentos."></textarea>
				</div>			
			</div>
			<div class="container">	
				<div class="form-group">
					<label for="indicaciones">Indicaciones:</label>
					<textarea class="form-control" rows="5" name="indicaciones"  placeholder="Ingrese las indicaciones respectivas."></textarea>
				</div>			
			</div>
		</div>

		<div class="row">
			<div class="col-sm-2">
				<button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-save"></span> Guardar</button>
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-danger" onclick="location.href='?controller=historia&action=show'"><span class="glyphicon glyphicon-hand-left"></span> Cancelar</button>
			</div>			
		</div>

	</div>
	</form>
</div>
<?php  
//Ejemplo de tabs adaptado de: https://codepen.io/wizly/pen/BlKxo 
?>

