<?php
	if(isset($_GET["url"])  and isset($_GET["usuario"]) and isset($_GET["password"])   and isset($_GET["db"]) and isset($_GET["table"]))
	{
		$url = $_GET["url"];
		$usuario = $_GET["usuario"];
		$password = $_GET["password"];
		$db = $_GET["db"];
		$table = $_GET["table"];
	}
	else
	{
		die();
	}
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
	try
	{
		$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
		$qry = "SHOW columns from ".$table.";";
		echo "<h4>Estos son los atributo(s) de la tabla ".$table.".</h4>";
		foreach ($conn->query($qry) as $fila) 
		{
			echo "<tr class='tr-cont' >
			<td>".$fila['Field']."</td>
			<td>".$fila['Type']."</td>
			<td><input type='checkbox' name='option1' value='".$fila['Field']."'></td>
		</tr>";
		}
		echo("</table>");
	}
	catch (PDOException $e) {
		echo ("Lo lamento... no se pudo conectar al servidor.");
		echo ("¡Error!: " . $e->getMessage() . "<br/>");
		die();
	}
	
?>