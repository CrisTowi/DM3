<?php

	$url = $_GET['durl'];
	unset($_GET['durl']);
	$user = $_GET['duser'];
	unset($_GET['duser']);
	$password = $_GET['dpw'];
	unset($_GET['dpw']);


	$server = $_GET['url0'];
	$database = $_GET['database0'];
	$table = $_GET['table0'];

	$conn = new PDO('mysql:host='.$url.';charset=utf8', $user, $password);
	$qry = "USE otrabase";
	$cont = $conn->exec($qry);
	$qry = "CREATE TABLE ".$database."_".$table." (id".$database."_".$table." int NOT NULL AUTO_INCREMENT, PRIMARY KEY (id".$database."_".$table."))";
	$cont = $conn->exec($qry);
	$qry = "ALTER TABLE facttable ADD COLUMN(id".$database."_".$table." int not null)";
	$cont = $conn->exec($qry);
	$qry = "ALTER TABLE facttable ADD FOREIGN KEY(id".$database."_".$table.") REFERENCES ".$database."_".$table."(id".$database."_".$table.")";
	$cont = $conn->exec($qry);
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
		unset($_GET[$key]);
	}
	echo("</table>");


?>