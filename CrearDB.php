<?php
	if(isset($_GET['name']) and isset($_GET['url']) and  isset($_GET['user']) and isset($_GET['pass'])) 
	{
		$name = $_GET['name'];
		$url = $_GET["url"];
		$user = $_GET["user"];
		$password = $_GET["pass"];
	}
	try
	{
		$conn = new PDO('mysql:host='.$url.';charset=utf8', $user, $password);
		$qry = "CREATE DATABASE ".$name.";";
		$cont = $conn->exec($qry);
		if($cont ==1)
		{
			$qry = "USE ".$name;
			$cont = $conn->exec($qry);
			$qry = "CREATE TABLE facttable (id int NOT NULL AUTO_INCREMENT, PRIMARY KEY (id))";
			$cont = $conn->exec($qry);
			echo ("<h4>Base de datos ".$name." creada. Inserte sus campos para llenarla.</h4>");
			echo ("<input type='text' id='durl' value='$url'/> <br>");
			echo ("<input type='text' id='duser' value='$user'/><br>");
			echo ("<input type='text' id='dpw' value='$password'/><br>");
			echo ("<div id='Attrpasados'> </div>");

			echo "<input type='button' value='Agregar al Cubo de datos' onclick='AgregarCD();'/>";
		}
		else
		{
			echo( "<h4>Base de datos ".$name." no fue creada. Intente más tarde.</h4>");
		}
		$conn = null;
	}
	catch (PDOException $e) {
		echo ("Lo lamento... no se pudo conectar al servidor.");
		echo ("¡Error!: " . $e->getMessage() . "<br/>");
		die();
	}
	
?>
