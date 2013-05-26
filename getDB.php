
<?php
	if(isset($_GET["url"])  and isset($_GET["user"]) and isset($_GET["pass"])  )
	{
		$url = $_GET["url"];
		$usuario = $_GET["user"];
		$password = $_GET["pass"];
	}
	try
	{
		$conn = new PDO('mysql:host='.$url.';charset=utf8', $usuario, $password);
		$response = 
		"<table id='table-content'>
			<tr class='tr-header'  style='color: white'>
				<td>Databases</td>
				<td class='opc'> </td>
				<td class='opc'> </td>
			</tr>";
		$qry = "SHOW Databases;";
		foreach ($conn->query($qry) as $fila) 
		{
			$db = $fila['Database'];
			$response = $response."<tr class='tr-cont' id='".$idm."' name='".$idm."'>
				<td><button onclick='muestraContenido(\"tablaTables.php?db=".$db."&url=".$url."&usuario=".$usuario."&password=".$password."\")'>".$db."</button></td>
				<td class='opc'><img src='img/pencil.png' onclick='modificarEmpleado(\"".$idm."\")' alt='Modificar' class='clickable'/></td>
				<td class='opc'><img src='img/less.png'   onclick='eliminarEmpleado(\"".$idm."\")' alt='Eliminar' class='clickable'/></td>
			</tr>";
		}
		$response = $response."</table>";
	}
	catch (PDOException $e) {
		$response = "Lo lamento... no se pudo conectar al servidor.";
		$response ="¡Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	echo $response;
?>

