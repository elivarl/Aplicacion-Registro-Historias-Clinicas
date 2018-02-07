<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<div class="container">
	<h2>Actualizar Paciente</h2>
	<form class="form-horizontal" action='?controller=paciente&action=update' method='post'>
    <input type="hidden" name="id" value="<?php echo $paciente->getId(); ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="cedula">Cédula:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="cedula" name="cedula" value="<?php echo $paciente->getCedula(); ?>" readonly="false" required="true" autocomplete="off">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombres">Nombres:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $paciente->getNombres(); ?>" required="true" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="apellidos">Apellidos:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $paciente->getApellidos(); ?>" required="true" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="ocupacion">Ocupación:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?php echo $paciente->getOcupacion(); ?>" required="true" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $paciente->getEmail(); ?>"  required="true" autocomplete="off">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="ocupacion">Tipo de Sangre:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="tposangre" name="tposangre" value="<?php echo $paciente->getTposangre(); ?>"  required="true" autocomplete="off">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ocupacion">Dirección:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $paciente->getDireccion(); ?>"  required="true" autocomplete="off">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="estcivil">Estado Civil:</label>
      <div class="col-sm-10"> 
      <select class="form-control" id="estcivil" name="estcivil">
        
        <option value="<?php echo $paciente->getEstcivil(); ?>"> <?php echo $paciente->getStringEstadoCivil(); ?>   </option>
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
        <option value="<?php echo $paciente->getGenero(); ?>"><?php echo $paciente->getStringGenero() ?></option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        <option value="O">Otro</option>
        </select>  
      </div>
    </div> 

     <div class="form-group">
      <label class="control-label col-sm-2" for="fnacimiento">Fecha de nacimiento:</label>
      <div class="col-sm-10">    
        <div class="input-group input-append date" id="datePicker" data-date="<?php echo $paciente->getFnacimiento(); ?>"  data-date-format="dd-mm-yyyy">
                <input type="date" class="form-control" name="date"  required="true" value="<?php echo $paciente->getFnacimiento(); ?>" autocomplete="off"/>
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
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
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

