<?php
	$name = $_GET['name'];
	$url = $_GET["url"];
	$usuario = $_GET["user"];
	$password = $_GET["pass"];

	include("php/DataConnection.class.php");
	$db = new DataConnection($url, $usuario, $password);

	$qry = "CREATE DATABASE ".$name.";";
	$result = $db->getDB($qry);	


	if($result)
	{
			$response = "<h4>Base de datos ".$name." creada. Inserte sus campos para llenarla.</h4>";
	}

	echo $response;
	
?>
