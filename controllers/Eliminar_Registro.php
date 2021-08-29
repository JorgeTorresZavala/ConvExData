<?php
		
	$nombres=$_GET["nombres"];
	$apellidoPaterno=$_GET["apellidoPaterno"];
	$apellidoMaterno=$_GET["apellidoMaterno"];
	$tel_trabajo=$_GET["tel_trabajo"];
	$correo_trabajo=$_GET["correo_trabajo"];
	$tel_personal=$_GET["tel_personal"];
	$correo_personal=$_GET["correo_personal"];
	
	//Conexion a la BDD
	require("../model/datos_conexion.php");

		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra); // Conexion a la BDD
		if(mysqli_connect_errno()){
			echo "Error al conectar a la BDD",
			exit();
		}
		mysqli_select_db($conexion,$db_nombre) or die ("No se enceuntra la BDD");
		mysqli_set_charset($conexion,"utf8");
		
		$consulta="DELETE FROM contactos WHERE contacto='nombres'";	//Consulta a la BDD

		$resultados=mysqli_query($conexion,$consulta);	//Resultado de la BDD

		if($resultados==false){
			
			echo "Error en la consulta";

			}else{
				
				echo "Registro eliminado";

			}

		mysqli_close($conexion);
?>