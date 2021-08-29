
<?php
	$archivo = fopen("ChatWhatsApp_Kio QRO.txt","r")
	or die("Problemas al abrir el archivo...");
	


		while(!feof($archivo)){
			$linea=fgets($archivo)."<br>";
			$leerLinea=htmlentities ($linea);
			$contenidoLinea=nl2br($leerLinea);
			
			//Buscar datos
			$guion = "-";
		
			//Localizar datos
			$posGuion = strpos($contenidoLinea,$guion);			

      echo utf8_encode($linea);

      //echo "El contenido de la línea es:".$linea."<br>";

		}
		

	fclose($archivo);
?>