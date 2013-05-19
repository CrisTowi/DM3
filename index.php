<!DOCTYPE html>
<html lang="es">
<head>

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> 	  
	<script src="js/lb.js"></script>  

	<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
	<script>
		function loadTable()
		{
			    	
			var parametros;

		    url = document.getElementById('url').value;
		    usuario = document.getElementById('user').value;
		    password = document.getElementById('pw').value;

			parametros = "url=" + url + "&";
		    parametros+= "usuario=" + usuario + "&";
		    parametros+= "password=" + password;

		    //sendPetitionSync("tablaDB.php?"+parametros,"tablaDB",document);
		    alert(parametros);
		}
	</script>

</head>
<body>
	<header> 
		<hgroup>
			<h1> Bienvenido! Selecciones el host donde quiera interactuar: </h1>
		</hgroup>
	</header>

	<section id = "contenedor">

		<div button id="show-panel">
			Buscar bases de datos
		</div>
		<div id="tablaDB" class="box">
      		<?php include("tablaDB.php"); ?>
        </div>
	  
	</section>

	<div id="lightbox-panel"> 
		<h2>Introduce los datos</h2> 
	 	<form> 

	 		<p>URL: </p>
	 		<input type="text" id="url" class="form" placeholder="Introduce la url"></input>
	 		</br>
	 		<p>Usuario: </p>
	 		<input type="text" id="user" class="form" placeholder="Introduce el usuario"></input>
	 		</br>
	 		<p>Password: </p>
	 		<input type="text" id="pw" class="form" placeholder="Introduce el password"></input>

		    <p align="center">  
		        <input id="close-panel" type="submit" value="Aceptar" onclick='loadTable()'></input>  
		    </p>  

		</form>		
	</div>
	  
	<div id="lightbox"> </div>

	<footer>
		Hecho por nosotros en Abril 2013
	</footer>
</body>
</html>
