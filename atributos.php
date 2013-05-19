<!DOCTYPE html>
<html lang="es">
<head>

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> 	  
	<script src="js/lb.js"></script>  

	<link rel="stylesheet" type="text/css" href="css/estilo.css"> 

</head>
<body>
	<header> 
		<hgroup>
			<h1> Bienvenido! Selecciones el host donde quiera interactuar: </h1>
		</hgroup>
	</header>

	<section id = "contenedor">

		<div id="tablaDB" class="box">
      		<?php include("tablaATT.php"); ?>
        </div>
	  
	</section>
	<div id="lightbox"> </div><!-- /lightbox --> 

	<footer>
		Hecho por nosotros en Abril 2013
	</footer>
</body>
</html>