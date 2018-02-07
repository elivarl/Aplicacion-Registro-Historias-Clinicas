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


	<form action='?controller=consulta&action=update' method='post'>
	<div class="tab-content clearfix">
		<div class="tab-pane active" id="paciente">
			<div class="container">				 
			  	<div class="form-group">
			  		<label for="cedula">Cedula:</label>
				    <input type="cedula" class="form-control" id="cedula" name="cedula" readonly="false" value="<?php echo $paciente->getCedula(); ?>">
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
			  		<input type="hidden" name="idconsulta" value="<?php echo $consulta->getId();?>">
			  		<label for="fecha">Fecha Consulta:</label>
				    <input type="fecha" class="form-control" id="fecha" name="fecha" required="true" value="<?php echo $consulta->getFecha(); ?>" readonly="false">
				</div>
				<div class="form-group">
					<label for="enfactual">Enfermedad o problema actual:</label>
					<textarea class="form-control" rows="4" name="enfactual" required="true"><?php echo $consulta->getEnfactual(); ?></textarea>
				</div>
				<div class="form-group">
					<label for="diagnostico">Diagnóstico:</label>
					<textarea class="form-control" rows="4" name="diagnostico"> <?php echo $consulta->getDiagnostico(); ?></textarea>
				</div>
				<div class="form-group">
					<label for="prescripcion">Prescripción:</label>
					<textarea class="form-control" rows="4" name="prescripcion" ><?php echo $consulta->getPrescripcion(); ?></textarea>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="signos">
		    <div class="form-group">
		    	<input type="hidden" name="idsignos" value="<?php echo $vitales->getId();?>">
		    	<div class="col-xs-6">
		    		<label for="prearterial">Presión arterial:</label>
					<input type="text" class="form-control"  name="prearterial" required="true" value="<?php echo $vitales->getPrearterial() ?>" readonly="true" >		    	
		    	</div>				
			</div>
			<div class="form-group">
				<div class="col-xs-6">
		    		<label for="pulso">Pulso:</label>
					<input type="number" class="form-control" id="pulso" name="pulso" required="true" value="<?php echo $vitales->getPulso(); ?>" readonly="true">		    	
		    	</div>
		    </div>

		    <div class="form-group">
		        <div class="col-xs-6">
		    		<label for="peso">Peso (Kilogramos):</label>
					<input type="number" class="form-control" id="peso" name="peso" required="true" step="0.01" value="<?php echo $vitales->getPeso(); ?>" readonly="true">		    	
				</div>
		    </div>

		    <div class="form-group">
		        <div class="col-xs-6">
		    		<label for="talla">Talla (centimetros):</label>
					<input type="number" class="form-control" id="talla" name="talla" required="true" step="0.01" value="<?php echo $vitales->getTalla(); ?>" readonly="true">		    	
				</div>
		    </div>


		    <div class="form-group">
				<label for="descripcion">Descripción:</label>
				<textarea class="form-control" rows="4" name="descripcionsignos"  ><?php echo $vitales->getDescripcion(); ?></textarea>
			</div>
		</div>
		<div class="tab-pane" id="sistemas">
			<input type="hidden" name="idsistemas" value="<?php echo $sistemas->getId();?>">
		    <div class="checkbox">
		    	<label><input type="checkbox" name="sentidos" <?php echo $sistemas->getSentidos(); ?>>Organos de los Sentidos</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="respiratorio" <?php echo $sistemas->getRespiratorio(); ?>>Respiratorio</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="cardiovascular" <?php echo $sistemas->getCardiovascular(); ?> >Cardio Vasculares</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="digestivo" <?php echo $sistemas->getDigestivo(); ?> >Digestivo</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="genital" <?php echo $sistemas->getGenital(); ?> >Genital</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="urinario" <?php echo $sistemas->getUrinario(); ?> >Urinario</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="mesquletico"<?php echo $sistemas->getMesqueletico(); ?> >Musculo Esqueletico</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="endocrino" <?php echo $sistemas->getEndocrino(); ?> >Endocrino</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="linfatico" <?php echo $sistemas->getLinfatico(); ?> >Linfático</label>
		    </div>

		    <div class="form-group">
				<label for="descripcion">Descripción:</label>
				<textarea class="form-control" rows="3" name="descripcionsistemas" ><?php echo $sistemas->getDescripcion(); ?></textarea>
			</div>
		</div>
       	<div class="tab-pane" id="fisicos">
       		 <div class="form-group">
       		 	<input type="hidden" name="idfisicos" value="<?php echo $fisico->getId();?>">
				<label for="cabeza">Cabeza:</label>
				<textarea class="form-control" rows="3" name="cabeza" ><?php echo $fisico->getCabeza() ?></textarea>
			</div>
			<div class="form-group">
				<label for="cuello">Cuello:</label>
				<textarea class="form-control" rows="3" name="cuello"  ><?php echo $fisico->getCuello(); ?></textarea>
			</div>
			<div class="form-group">
				<label for="torax">Torax:</label>
				<textarea class="form-control" rows="3" name="torax"><?php echo  $fisico->getTorax();?></textarea>
			</div>
			<div class="form-group">
				<label for="abdomen">Abdomen:</label>
				<textarea class="form-control" rows="3" name="abdomen"  ><?php echo $fisico->getAbdomen(); ?></textarea>
			</div>
			<div class="form-group">
				<label for="miembros">Miembros:</label>
				<textarea class="form-control" rows="3" name="miembros" ><?php echo $fisico->getMiembros(); ?></textarea>
			</div>
			<div class="form-group">
				<label for="genitales">Genitales:</label>
				<textarea class="form-control" rows="3" name="genitales" ><?php echo $fisico->getGenitales(); ?></textarea>
			</div>
		</div>

		<div class="tab-pane" id="complementarios">
			<div class="container">	
				<div class="form-group">
					<input type="hidden" name="idcomplementario" value="<?php echo $complementario->getId();?>">
					<label for="exadicionales">Exámenes Adicionales:</label>
					<textarea class="form-control" rows="5" name="descripcionexacompl" ><?php echo $complementario->getDescripcion(); ?></textarea>
				</div>			
			</div>
		</div>

		<div class="tab-pane" id="receta">
			<div class="container">	
				<div class="form-group">
					<input type="hidden" name="idreceta" value="<?php echo $receta->getId();?>">
					<label for="medicamentos">Medicamentos:</label>
					<textarea class="form-control" rows="5" name="medicamentos" ><?php echo $receta->getMedicamentos(); ?></textarea>
				</div>			
			</div>
			<div class="container">	
				<div class="form-group">
					<label for="indicaciones">Indicaciones:</label>
					<textarea class="form-control" rows="5" name="indicaciones" ><?php echo $receta->getIndicaciones(); ?></textarea>
				</div>			
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-save"></span> Guardar</button>
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-danger" onclick="location.href='?controller=consulta&action=show'"><span class="glyphicon glyphicon-hand-left"></span> Cancelar</button>
			</div>			
		</div>

	</div>
	</form>
</div>
<?php  
//Ejemplo de tabs adaptado de: https://codepen.io/wizly/pen/BlKxo 
?>

