<table id='table-content'>


	<tr class='tr-header'  style='color: white'>
		<td>Tabla</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>
<?php
	include("php/DataConnection.class.php");
	$db = $_GET["db"];
	$conn = new DataConnection("localhost", "root", "root");	
	$qry = "SHOW Tables from ".$db.";";

	$result = $conn->getDB($qry);	
	while($fila = mysql_fetch_assoc($result))
	{		
		$tabla = $fila['Tables_in_'.strtolower($db)];
		echo "<tr class='tr-cont' id='".$idm."' name='".$idm."'>
			<td><a href='atributos.php?db=".$db."&table=".$tabla."'>".$tabla."</a></td>
			<td class='opc'><img src='img/pencil.png' onclick='modificarEmpleado(\"".$idm."\")' alt='Modificar' class='clickable'/></td>
			<td class='opc'><img src='img/less.png'   onclick='eliminarEmpleado(\"".$idm."\")' alt='Eliminar' class='clickable'/></td>
		</tr>";
	}
?>

</table>