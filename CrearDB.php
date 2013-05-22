<?php
	$name = $_GET['name'];
	$url = $_GET["url"];
	$user = $_GET["user"];
	$password = $_GET["pw"];

	include("php/DataConnection.class.php");
	$db = new DataConnection($url, $user, $password);

	$qry = "CREATE DATABASE ".$name.";";
	$result = $db->getDB($qry);	


	if($result)
	{
			$response = "<h4>Base de datos ".$name." creada. Inserte sus campos para llenarla.</h4>";
	}

	echo $response;
	
?>
