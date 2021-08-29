
  <?php 

    $archivoEntrada = fopen("salida.txt", "r")
    or die ("Problemas al abrir el archivo salida.txt");

		//$archivoSalida = fopen("salida1.txt","w");

		$cant0NC = 0;
		$cant1NC = 0;
		$cant2NC = 0;
		$cant3NC = 0;
		$cant4NC = 0;

		$cant0NCxEM = array();
	
      while (!feof  ($archivoEntrada)){
        $linea = fgets($archivoEntrada);
				$coma = ",";
				$posComa = strpos($linea, $coma);
				$cadenaNC = "NC/";
				$posCadenaNC = strpos($linea, $cadenaNC);
				
				//Captura de datos:
        $cantNC = abs(substr($linea,21,2));

				if($posComa>0){
					$magazin = substr($linea,0,17);

					echo "El magazin es: ".$magazin."<br>";
					//fwrite($archivoSalida, "EMG: ".$nombreEMG.", EM: ".$numeroEM."\n");
				}

				if($posCadenaNC > 0) {
					//echo "El valor es: ".$cantNC."<br>";

					switch ($cantNC) {
						case 0:
							$cant0NC++;
							//echo "Este EM tiene: ".$cant0NC." Tarjetas con TODOS los LI3 con SNB"."<br>";
						break;
						case 1:
							$cant1NC++;
							//echo $cant1NC." Tarjetas con 1 NC "."<br>";
						break;
						case 2:
							$cant2NC++;
							//echo $cant2NC." Tarjetas con 2 NC "."<br>";
						break;
						case 3:
							$cant3NC++;
							//echo $cant3NC."Tarjetas con 3 NC "."<br>";
						break;
						case 4:
							$cant4NC++;
							//echo $cant3NC."Tarjetas con 3 NC "."<br>";
						break;	
					}
				}
			}
			
			if($cant0NC > 0){
				echo "Esta central tiene: ".$cant0NC." Tarjetas con TODOS los LI3 con SNB"."<br>";	
			}
			if($cant1NC > 0){
				echo "Esta central tiene: ".$cant1NC." Tarjetas con 1 NC"."<br>";	
			}
			if($cant2NC > 0){
				echo "Esta central tiene: ".$cant2NC." Tarjetas con 2 NC"."<br>";	
			}	

			if($cant3NC > 0){
				echo "Esta central tiene: ".$cant3NC." Tarjetas con 3 NC"."<br>";	
			}

			if($cant4NC > 0){
				echo "Esta central tiene: ".$cant4NC." Tarjetas con 4 NC"."<br>";	
			}

			$tarjCantTotal = $cant0NC + $cant1NC + $cant2NC + $cant3NC + $cant4NC;
			echo "El total de tarjetas en esta central es: ".$tarjCantTotal."<br>";
			//fclose($archivoSalida);
			//fclose($salida1);

  ?>
