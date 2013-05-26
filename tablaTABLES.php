<?php
	if(isset($_GET["url"])  and isset($_GET["usuario"]) and isset($_GET["password"])   and isset($_GET["db"]))
	{
		$url = $_GET["url"];
		$usuario = $_GET["usuario"];
		$password = $_GET["password"];
		$db = $_GET["db"];
	}
	try
	{
		echo "<button class=\"menu\" onclick='muestraContenido(\"getDB.php?url=".$url."&user=".$usuario."&pass=".$password."\")'>Lista BD's</button>";
		$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
		echo (
		"<table id='table-content'>
			<tr class='tr-header'  style='color: white'>
				<td>Tabla</td>
				<td class='opc'> </td>
				<td class='opc'> </td>
			</tr>");
		$qry = "SHOW Tables from ".$db.";";
		foreach ($conn->query($qry) as $fila) 
		{
			$tabla = $fila['Tables_in_'.strtolower($db)];
			echo ("
			<tr class='tr-cont'>
				<td><button onclick='muestraContenido(\"tablaATT.php?db=".$db."&table=".$tabla."&url=".$url."&usuario=".$usuario."&password=".$password."\")'>".$tabla."</button></td>
			</tr>");
		}
		echo("</table>");
	}
	catch (PDOException $e) {
		echo ("Lo lamento... no se pudo conectar al servidor.");
		echo ("¡Error!: " . $e->getMessage() . "<br/>");
		die();
	}
?>