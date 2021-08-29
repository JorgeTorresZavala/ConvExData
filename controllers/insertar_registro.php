<?php
		
		//Conexion a la BDD
		require("../model/datos_conexion.php");

			$conexion=mysqli_connect($db_host,$db_usuario,$db_contra); // Conexion a la BDD
			if(mysqli_connect_errno()){
				echo "Error al conectar a la BDD",
				exit();
			}
			mysqli_select_db($conexion,$db_nombre) or die ("No se enceuntra la BDD");
			mysqli_set_charset($conexion,"utf8");
			
			$consulta="INSERT INTO contactos (nombres, apellido_paterno, apellido_materno, tel_trabajo, tel_personal, correo_trabajo, correo_personal) 
						VALUES ('Julio César', 'Jiménez', 'Castaños', '3336807071', '3318505323', 'julio.cesar.jimenez@syntropy.com.mx', 'julio.cesar.jimenez@gmail.com')";	//Consulta a la BDD

			$resultados=mysqli_query($conexion,$consulta);	//Resultado de la BDD


			mysqli_close($conexion);
		?>