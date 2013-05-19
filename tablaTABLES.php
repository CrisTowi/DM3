<?php
	include("php/DataConnection.class.php");
	$db = $_GET["db"];
	$url = $_GET["url"];
	$usuario = $_GET["usuario"];
	$password = $_GET["password"];
	echo "<button class=\"menu\" onclick='muestraContenido(\"getDB.php?url=".$url."&user=".$usuario."&pass=".$password."\")'>Lista BD's</button>";
	echo "<h2>Estos son las tablas de la BD ".$db.".</h2>";
?>
<table id='table-content'>


	<tr class='tr-header'  style='color: white'>
	
		<td>Tabla</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>
<?php
	
	$conn = new DataConnection($url, $usuario, $password);
	$qry = "SHOW Tables from ".$db.";";
	$result = $conn->getDB($qry);	
	
	while($fila = mysql_fetch_assoc($result))
	{		
		$tabla = $fila['Tables_in_'.strtolower($db)];
		echo "<tr class='tr-cont' id='".$idm."' name='".$idm."'>
			<td><button onclick='muestraContenido(\"tablaATT.php?db=".$db."&table=".$tabla."&url=".$url."&usuario=".$usuario."&password=".$password."\")'>".$tabla."</button></td>
			<td class='opc'><img src='img/pencil.png' onclick='modificarEmpleado(\"".$idm."\")' alt='Modificar' class='clickable'/></td>
			<td class='opc'><img src='img/less.png'   onclick='eliminarEmpleado(\"".$idm."\")' alt='Eliminar' class='clickable'/></td>
		</tr>";
	}
?>

</table>