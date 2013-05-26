<!DOCTYPE html>
<html lang="es">
<head>

	<script src="js/jquery-1.4.2.min.js"></script>	  
	<script src="js/lb.js"></script>  
	<link rel="stylesheet" type="text/css" href="css/estilo.css"> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
	<script>
		var selectedAtt;
		function Crear()
		{

			var url = document.getElementById('nurl').value;
			var name = document.getElementById('nname').value;
			var pw = document.getElementById('npw').value;
			var user = document.getElementById('nuser').value;


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
    					
						document.getElementById("agregados").innerHTML = xmlhttp.responseText;
    				}
  			}
			xmlhttp.open("GET","crearDB.php?url="+url+"&pass="+pw+"&user="+user+"&name="+name,true);			
			xmlhttp.send();

			alert("Si pase");
		}
		
		function showBD()
		{
			var url = document.getElementById('urlizq').value;
	         		var usuario = document.getElementById('userizq').value;
		         var password = document.getElementById('pwizq').value;
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
		function atributo(url, database,table,name,type)
		{
			this.url = url;
			this.database=database;
			this.table=table;
			this.name=name;
			this.type=type;
		}
		function editaLista(objetoAtributo, seleccion)
		{
			var x=selectedAtt.length ;
			alert("Estamos editando");
			if(seleccion == false)
			{
				for( i = 0 ; i< x ; i++)
				{
					if(selectedAtt[i].name  == objetoAtributo.name  &&  selectedAtt[i].table == objeto.table && selectedAtt[i].database = objetoAtributo.database && selectedAtt[i].url  == objetoAtributo.url)
					{
						splice(i,1);
					}
				}
			}
			else
			{
				selectedAtt.push(objetoAtributo);
			}
		}	
		function checarSeleccionados(database,table)
		{
			var x=selectedAtt.length ;
			alert("Estamos checando ");
			for( i = 0 ; i< x ; i++)
			{
				if(  selectedAtt[i].url  == objetoAtributo.url && selectedAtt[i].table == table && selectedAtt[i].database = database)
				{
					document.getElementById(selectedAtt[i]).checked = true;
				}
			}
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
		<div id="agregados" class="box">
      		 <h2>Data Mart</h2>

      		<form >
		 		<p>URL: </p>
		 		<input type="text" id="nurl" class="form" placeholder="Introduce la url"></input>
		 		<p>Usuario: </p>
		 		<input type="text" id="nuser" class="form" placeholder="Introduce el usuario"></input>
		 		<p>Password: </p>
		 		<input type="text" id="npw" class="form" placeholder="Introduce el password"></input>
		 		<p>Nombre: </p>
		 		<input type="text" id="nname" class="form" placeholder="Nombre de tu repositorio"></input>
		 		<br>
		 		<br>
		 		<input  type="button" id='boton_cre' value='Crear' onclick='Crear()'>
      		</form>
        </div>
	  
	</section>

	<div id="lightbox-panel"> 
		<h2>Introduce los datos</h2> 
	 	<form> 

	 		<p>URL: </p>
	 		<input type="text" id="urlizq" value="localhost" class="form" placeholder="Introduce la url"></input>
	 		</br>
	 		<p>Usuario: </p>
	 		<input type="text" id="userizq" class="form"  value="root" placeholder="Introduce el usuario"></input>
	 		</br>
	 		<p>Password: </p>
	 		<input type="text" id="pwizq" class="form" placeholder="Introduce el password" value="root"></input>

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
