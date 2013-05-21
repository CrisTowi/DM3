<?php
	include("php/DataConnection.class.php");
	$db = $_GET["db"];
	$url = $_GET["url"];
	$usuario = $_GET["usuario"];
	$password = $_GET["password"];
	$table = $_GET["table"];
	echo "<button class=\"menu\" onclick='muestraContenido(\"getDB.php?url=".$url."&user=".$usuario."&pass=".$password."\")'>Lista BD's</button>";
	echo "<button class=\"menu\" onclick='muestraContenido(\"tablaTables.php?db=".$db."&url=".$url."&usuario=".$usuario."&password=".$password."\")'>Tablas de ".$db."</button>";
?>
<table id='table-content'>


	<tr class='tr-header'  style='color: white'>
		<td>Propiedad</td>
		<td>Tipo de dato</td>
		<td class='opc'> </td>
	</tr>
<?php
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

<input type='submit' value='Agregar' onclick='Agrega()'>

</table>