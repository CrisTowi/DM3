
<?php
	$url = $_GET["url"];
	$usuario = $_GET["user"];
	$password = $_GET["pass"];
	include("php/DataConnection.class.php");
	$db = new DataConnection($url, $usuario, $password);
	if($db->connect_errno)
	{
		$response = "Lo lamento... no se pudo conectar al servidor.";
	}
	else 
	{
		$response = "<table id='table-content'>


	<tr class='tr-header'  style='color: white'>
		<td>Databases</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>";
		$qry = "SHOW Databases";
		$result = $db->getDB($qry);	
		while($fila = mysql_fetch_assoc($result))
		{		
			$db = $fila['Database'];
			$response = $response."<tr class='tr-cont' id='".$idm."' name='".$idm."'>
				<td><a href='tablas.php?db=".$db."&url=".$url."&usuario=".$usuario."&password=".$password."'>".$db."</a></td>
				<td class='opc'><img src='img/pencil.png' onclick='modificarEmpleado(\"".$idm."\")' alt='Modificar' class='clickable'/></td>
				<td class='opc'><img src='img/less.png'   onclick='eliminarEmpleado(\"".$idm."\")' alt='Eliminar' class='clickable'/></td>
			</tr>";
		}
		$response = $response."</table>";
	}
	echo $response;
?>

