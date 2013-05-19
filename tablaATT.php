<table id='table-content'>


	<tr class='tr-header'  style='color: white'>
		<td>Propiedad</td>
		<td>Tipo de dato</td>
		<td class='opc'> </td>
	</tr>
<?php
	$url = $_GET["url"];
	$usuario = $_GET["usuario"];
	$password = $_GET["password"];
	$db = $_GET["db"];
	$table = $_GET["table"];
	include("php/DataConnection.class.php");
	$conn = new DataConnection($url, $usuario,$password);	
	$qry = "SHOW columns from ".$table." from ".$db.";";
	$result = $conn->getDB($qry);	
	echo "<h2>Estos son los atributo(s) de la tabla ".$table.".</h2>";
	while($fila = mysql_fetch_assoc($result))
	{		
		echo "<tr class='tr-cont' id='".$idm."' name='".$idm."'>
			<td>".$fila['Field']."</td>
			<td>".$fila['Type']."</td>
			<td><input type='checkbox' name='option1' value='".$fila['Field']."'></td>
		</tr>";
	}
?>

</table>