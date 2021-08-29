<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Conexion</title>	
	</head>	

	<body>
		<?php

		//Conexion a la BDD
		require("datos_conexion.php");

			$conexion=mysqli_connect($db_host,$db_usuario,$db_contra); // Conexion a la BDD
			if(mysqli_connect_errno()){
				echo "Error al conectar a la BDD",
				exit();
			}
			mysqli_select_db($conexion,$db_nombre) or die ("No se enceuntra la BDD");
			mysqli_set_charset($conexion,"utf8");
			
			$consulta="SELECT * FROM centrales WHERE ESTADO='COLIMA'";	//Consulta a la BDD

			$resultados=mysqli_query($conexion,$consulta);	//Resultado de la BDD

			//Recuperacion de datos
			while ($fila=mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
				echo "<table><tr><td>";
				echo $fila ['CENTRAL'] . "</td><td>";
				echo $fila ['CLLI'] . "</td><td>";
				echo $fila ['DOMICILIO'] . "</td><td>";
				echo $fila ['NUM'] . "</td><td>";
				echo $fila ['LOCALIDAD'] . "</td><td>";
				echo $fila ['ESTADO'] . "</td><td>";
				echo $fila ['PROVEEDOR'] . "</td><td>";
				echo $fila ['EQUIPO'] . "</td><td></tr></table>";	
			}

			mysqli_close($conexion);
		?>
	</body>
</html>