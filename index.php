<!DOCTYPE html>
<html lang="es">
<head>

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> 	  
	<script src="js/lb.js"></script>  

	<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
	<script>
		function showBD()
		{
			 var url = document.getElementById('url').value;
		         var usuario = document.getElementById('user').value;
		         var usuario = document.getElementById('user2').value;
		         var password = document.getElementById('pw').value;
			if (url.length==0 || usuario.length==0 )
		         { 
				document.getElementById("tablaDB").innerHTML="Lo sentimos, vuelve a especificar los datos.";
				return;
			}
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function()
  			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    				{
					document.getElementById("tablaDB").innerHTML = xmlhttp.responseText;
    				}
  			}
			xmlhttp.open("GET","getDB.php?url="+url+"&pass="+password+"&user="+usuario,true);
			
			xmlhttp.send();
		}	
		function muestraContenido(str)
		{
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function()
  			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    				{
					document.getElementById("tablaDB").innerHTML = xmlhttp.responseText;
    				}
  			}
			xmlhttp.open("GET",str,true);
			xmlhttp.send();
		}	
		function loadTable()
		{
		   
		    var url = document.getElementById('url').value;
		    var usuario = document.getElementById('user').value;
		    var password = document.getElementById('pw').value;
		    showDB(url,usuario,password);
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
      		 
        </div>
	  
	</section>

	<div id="lightbox-panel"> 
		<h2>Introduce los datos</h2> 
	 	<form> 

	 		<p>URL: </p>
	 		<input type="text" id="url" value="localhost" class="form" placeholder="Introduce la url"></input>
	 		</br>
	 		<p>Usuario: </p>
	 		<input type="text" id="user" class="form"  value="root" placeholder="Introduce el usuario"></input>
	 		</br>
	 		<p>Password: </p>
	 		<input type="text" id="pw" class="form" placeholder="Introduce el password" value="root"></input>

		    <p align="center">  
		        <input id="close-panel" type="button" value="Aceptar" onclick='showBD()'></input>  
		    </p>  

		</form>		
	</div>
	  
	<div id="lightbox"> </div>

	<footer>
		Hecho por nosotros en Abril 2013
	</footer>
</body>
</html>
