<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>

<div class="container">
	<h2>Registro de Paciente</h2>
	<form class="form-horizontal" action='?controller=paciente&action=save' method='post' id="eventForm">
    <div class="form-group">
      <label class="control-label col-sm-2" for="cedula">Cédula:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Ingrese la cédula del paciente" required="true" autocomplete="off">
        <div id="prueba"></div>  
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombres">Nombres:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese los nombres del paciente" required="true" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="apellidos">Apellidos:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos del paciente"  required="true" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="ocupacion">Ocupación:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="Ingrese la ocupación del paciente" required="true" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el email del paciente" required="true" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="ocupacion">Tipo de Sangre:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="tposangre" name="tposangre" placeholder="Ingrese el tipo de sangre del paciente" required="true" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="ocupacion">Dirección:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la direccion del paciente" required="true" autocomplete="off">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="estcivil">Estado Civil:</label>
      <div class="col-sm-10"> 
      <select class="form-control" id="estcivil" name="estcivil">
        <option value="S">Soltero</option>
        <option value="C">Casado</option>
        <option value="V">Viudo</option>
        <option value="D">Divorciado</option>
        <option value="UL">Unión Libre</option>
        <option value="UH">Unión de Hecho</option>
      </select>  
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="genero">Genero:</label>
      <div class="col-sm-10"> 
      <select class="form-control" id="genero" name="genero">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        <option value="O">Otro</option>
        </select>  
      </div>
    </div>   

     <div class="form-group">
      <label class="control-label col-sm-2" for="fnacimiento">Fecha de nacimiento:</label>
      <div class="col-sm-10">    
        <div class="input-group input-append date" id="datePicker" >
            <input type="text" class="form-control" name="date"  required="true" autocomplete="off" />
            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">

      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-save"></span> Guardar</button>
      </div>
      <div class="col-sm-2">
        <button type="button" class="btn btn-danger" onclick="location.href='?controller=paciente&action=show'"><span class="glyphicon glyphicon-hand-left"></span> Cancelar</button>
      </div>      
    </div>

  </form>
</div>

<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>



<script>
//ejemplo datepiker en bootstrap tomado de:
//http://formvalidation.io/examples/bootstrap-datepicker/

$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            todayHighlight: true            
        });
});

/*Basic example
Embedding a date picker
Setting date in a range
Auto closing the date picker
Tweets by @formvalidation
Download Report bug

© 2013 - 2016 Nguyen Huu Phuoc. All rights reserved.*/
</script>

