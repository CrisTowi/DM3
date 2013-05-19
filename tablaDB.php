<table id='table-content'>


	<tr class='tr-header'  style='color: white'>
		<td>Databases</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>
<?php
	$url = $_GET["url"];
	$usuario = $_GET["usuario"];
	$password = $_GET["password"];

	include("php/DataConnection.class.php");

	$db = new DataConnection("localhost", "root", "root");	
	$qry = "SHOW Databases";


	$result = $db->getDB($qry);	

	while($fila = mysql_fetch_assoc($result))
	{		
		$db = $fila['Database'];


		echo "<tr class='tr-cont' id='".$idm."' name='".$idm."'>
			<td><a href='tablas.php?db=".$db."'>".$db."</a></td>
			<td class='opc'><img src='img/pencil.png' onclick='modificarEmpleado(\"".$idm."\")' alt='Modificar' class='clickable'/></td>
			<td class='opc'><img src='img/less.png'   onclick='eliminarEmpleado(\"".$idm."\")' alt='Eliminar' class='clickable'/></td>
		</tr>";
	}
?>

</table>