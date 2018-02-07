<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<div class="container">
	<h1>Información de Historia Clínica</h1>
</div>
<div id="exTab1" class="container">	
	<ul  class="nav nav-pills">
		<li class="active">
       		<a  href="#historia" data-toggle="tab">Historia Clínica</a>
		</li>
		<li>
			<a href="#familiares" data-toggle="tab">Antecedentes Familiares</a>
		</li>
		<li>
			<a href="#personales" data-toggle="tab">Antecedentes Personales</a>
		</li>
		<li>
			<a href="#visuales" data-toggle="tab">Exámenes Visuales</a>
		</li>
	</ul>


	<form action='?controller=historia&action=save' method='post'>
	<div class="tab-content clearfix">
		<div class="tab-pane active" id="historia">
			<div class="container">	
				<div class="form-group">
			  		<label for="fecha">Fecha Registro:</label>
				    <input type="fecha" class="form-control" id="fecha" name="fecha" required="true" readonly="false" value="<?php echo date('Y-m-d'); ?>">
				</div>			 
			  	<div class="form-group">
			  		<label for="numero">Número:</label>
				    <input type="numero" class="form-control" id="numero" name="numero" required="true" readonly="false" value="<?php echo $numeroHistoria;?>">
				</div>
				<div class="form-group">
					<label for="nombres">Nombres Paciente:</label>
					<input type="hidden" name="paciente" value="<?php echo $paciente->getId();?>">
				    <input type="nombres" class="form-control" id="nombres" name="nombres" required="true" value="<?php echo $paciente->getNombres().' '.$paciente->getApellidos(); ?>" readonly="false">
				</div>
			</div>
		</div>
		<div class="tab-pane" id="familiares">
		    <div class="checkbox">
		    	<label><input type="checkbox" name="cardiopatia" >Cardiopatía</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="diabetes">Diabetes</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="cancer" >Cancer</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="enfcardiovasculares" >Enfermedades Cardiovasculares</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="hipertension">Hipertensión</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="enfmentales" >Enfermedades Mentales</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="tubercolosis" >Tubercolosis</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="enfinfecciosas"  >Enfermedades Infecciosas</label>
		    </div>

		    <div class="checkbox">
		    	<label><input type="checkbox" name="malformacion"  >Malformacion</label>
		    </div>
		    <div class="checkbox">
		    	<label><input type="checkbox" name="otra">Otra</label>
		    </div>
		    <div class="form-group">
				<label for="descripcion">Descripción:</label>
				<textarea class="form-control" rows="4" name="descripcionfami" placeholder="Ingrese alguna información adicional"></textarea>
			</div>
		</div>
		<div class="tab-pane" id="personales">
		    <div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="imenarquia">Edad menarquía:</label>
					<input type="number" class="form-control" id="imenarquia" name="imenarquia"  value="0" placeholder="Edad primera menstruación" autocomplete="off">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="imenopausia">Edad menopausia:</label>
					<input type="number" class="form-control" id="imenopausia" name="imenopausia" value="0" placeholder="Edad menopausia" autocomplete="off">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="vsexualactiva">Vida Sexual:</label>
					<input type="vsexualactiva" class="form-control" id="vsexualactiva" name="vsexualactiva"  placeholder="Ingrese SI o NO tiene vida sexual" autocomplete="off">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="gesta">Edad gestación:</label>
					<input type="number" class="form-control" id="gesta" name="gesta" value="0" placeholder="Edad gestación" autocomplete="off">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="partos">Partos:</label>
					<input type="number" class="form-control" id="partos" name="partos" value="0" placeholder="Número de partos" autocomplete="off">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="abortos">Abortos:</label>
					<input type="number" class="form-control" id="abortos" name="abortos" value="0" placeholder="Número de abortos" autocomplete="off">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="cesareas">Cesáreas:</label>
					<input type="number" class="form-control" id="cesareas" name="cesareas" value="0" placeholder="Número de cesareas">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="hvivos">Hijos vivos:</label>
					<input type="number" class="form-control" id="hvivos" name="hvivos" value="0" placeholder="Número de hijos vivos" autocomplete="off">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="mpf">Método:</label>
					<input type="mpf" class="form-control" id="mpf" name="mpf"  placeholder="Método planificación familiar" autocomplete="off">		    	
		    	</div>				
			</div>
			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="ciclos">Ciclos menstruación:</label>
					<input type="number" class="form-control"  id="ciclos" name="ciclos" value="0"  placeholder="Frecuencia menstruación" autocomplete="off">					    	
		    	</div>				
			</div>

			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="fum">Fecha menstruación:</label>
					<div class="input-group input-append date" id="datePicker1" >
		    	    	<input type="date" class="form-control" name="fum" value="<?php echo date('Y-m-d'); ?>" placeholder="Fecha última menstruación" autocomplete="off" />
		    	     	<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        			</div>
		    	</div>
			</div>

			<div class="form-group">
		    	<div class="col-xs-4">
		    		<label for="fup">Fecha parto:</label>
					<div class="input-group input-append date" id="datePicker2" >
		    	    	<input type="date" class="form-control" name="fup" value="<?php echo date('Y-m-d'); ?>"   placeholder="Fecha último parto"  autocomplete="off" />
		    	     	<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        			</div>
		    	</div>				
			</div>

			<div class="form-group">
				<label for="descripcion">Descripción:</label>
				<textarea class="form-control" rows="4" name="descripcionper" placeholder="Ingrese alguna información adicional" autocomplete="off"></textarea>
			</div>


		</div>
       	<div class="tab-pane" id="visuales">
       		 <div class="form-group">
				<label for="descripcion">Valores para ojo derecho e izquierdo:</label>
				<textarea class="form-control" rows="4" name="descripcionvisual" required="true"  placeholder="Escriba los valores para cada ojo y alguna información adicional" autocomplete="off"></textarea>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-2">
				<button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-save"></span> Guardar</button>
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-danger" onclick="location.href='?controller=paciente&action=show'"><span class="glyphicon glyphicon-hand-left"></span> Cancelar</button>
			</div>			
		</div>
		
	</div>	
	</form>	
</div>
<?php  
//Ejemplo de tabs adaptado de: https://codepen.io/wizly/pen/BlKxo 
?>

<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<script>
//ejemplo datepiker en bootstrap tomado de:
//http://formvalidation.io/examples/bootstrap-datepicker/

$(document).ready(function() {
    $('#datePicker1')
        .datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true            
        })
        
    $('#datePicker2')
        .datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true            
        })
});

/*Basic example
Embedding a date picker
Setting date in a range
Auto closing the date picker
Tweets by @formvalidation
Download Report bug

© 2013 - 2016 Nguyen Huu Phuoc. All rights reserved.*/
</script>



