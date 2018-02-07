$(document).ready(function(){
	//index.php?controller=usuario&action=validarCedula
	$("#cedula").blur(function (){
		var cedula= this.value;
		$.ajax({
			url: 'assets/custom/vcedula.php',
			data: {cedula: cedula},
			type: 'POST',
			dataType: 'json',
			success:  function (response){
				//var r=response;
				//alert(response.estado);
				console.log("res: "+response);
				if (response.estado=='OK') {
					$("#cedula").css("border","1px solid green");
					$("#prueba").html('');
				} else {
					$("#cedula").css("border","1px solid red");
					$("#prueba").html('Cédula incorrecta');
				}
			},
			error: function(httpRequest, textStatus, errorThrown) { 
				alert("status=" + textStatus + ",error=" + errorThrown);
			}
		});		
	});
});