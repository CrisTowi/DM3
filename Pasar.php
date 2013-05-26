<?php


	echo ("
	<table  id='table-content' style='border:1px solid black;'>
		<tr class='tr-header'  style='color: white'>
			<td>Sever</td>
			<td>Base de datos</td>
			<td>tabla</td>
			<td>Nombre</td>
			<td>Tipo de dato</td>
			<td class='opc'> </td>
		</tr>");
	echo "<tr class='tr-cont' >";
	$i = 0;
	foreach ($_GET as $key => $value)
	{
		if($i != 5)
		{
			echo "<td style='border:1px solid black;'><strong>$value</strong></td>";
			$i++;
		}
		else
		{
			echo "</tr>";
			echo "<tr class='tr-cont' >";
			echo "<td style='border:1px solid black;'><strong>$value</strong></td>";
			$i =1;
		}
	}
	echo("</table>");

	echo "<input type='button' value='Agregar al Cubo de datos' onclick='AgregarCD();'/>"


?>