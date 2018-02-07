<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>
<!DOCTYPE html>
<html lang="es">
<head>

	<title> APP MEDICOS</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Librerias Boostrap-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="assets/js/bootstrap.min.js"></script>
	

	<!-- Custom -->
	<script src="assets/custom/nick-test.js?1.1.0"></script>

</head>
<body>
<header>
	<?php 
		require_once('cabecera.php');
	?>	
</header>

<section>
	
	<div class="container" name="cuerpo">
		<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
			<div class="alert alert-success">
				<strong><?php echo $_SESSION['mensaje']; ?></strong>
			</div>
		<?php } 
			unset($_SESSION['mensaje']);
		?>
		<?php require_once('routing.php'); ?>
	</div>
</section>

<footer>
	<?php 
		include_once('footer.php');
	?>
</footer>
</body>
</html>