
<?php
	$archivo = fopen("CAR_DATOS_ALL-23122019Log.txt","r")
	or die("Problemas al abrir el archivo...");
	
		$contEM = 0;
		$arrayEM = array(); // Array de EMs
		$contLI3 = 0;
		$cantEM = 0;
		$kEM=15;
		$contNC = 0;
		$cantNC = 0;
		$contSNB = 0;
		$cantSNB = 0;


		while(!feof($archivo)){
			$linea=fgets($archivo);
			$leerLinea=htmlentities ($linea);
			$contenidoLinea=nl2br($leerLinea);
			
			//Buscar datos
			$igual = "=";
			$puntoYcoma = ";";
			$lagrimita = "!";
			$EMG = "EMG:";
			$DEV = "LI3-";
			$NC = "NC";
			$SNB = "SNB";
			$coma = ",";
			$dosPuntos = ":";

			//Localizar datos
			$posIgual = strpos($contenidoLinea,$igual);			
			$posDEV = strpos($contenidoLinea,$DEV);
			$posNC = strpos($contenidoLinea,$NC);
			$SNB = substr($contenidoLinea,53,10);
			//echo "La posiciòn del LI3 es:".$posDEV."<br>";

			if($posDEV=8){
				echo $contenidoLinea;
				$contLI3++;

				//echo "La cantidad de LIs NC es: ".$contNC."<br>";
			}

			if($posIgual>0){
				$encabezado = trim (substr ($contenidoLinea,$posIgual+1));
				$longEncabezado = strlen ($encabezado);
				$posDosPuntos1 = strpos($encabezado,$dosPuntos);
				$posDosPuntos2 = strrpos($encabezado,$dosPuntos);
				$posLagrimita1 = strpos($encabezado,$lagrimita);
				$posLagrimita2 = strrpos($encabezado,$lagrimita);
				$posComa = strpos($encabezado,$coma);

				//echo "El encabezado es: ".$encabezado."<br>";
				//echo "La posición de la posComa es: ".$posComa."<br>";
				//echo "La posición de la lagrimita 1 es: ".$posLagrimita1."<br>";
				//echo "La posición de la lagrimita 2 es: ".$posLagrimita2."<br>";
				//echo "La posición de los segundos 2 puntos es: ".$posDosPuntos2."<br>";
				//echo "La posición de los primeros 2 puntos es: ".$posDosPuntos1."<br>";

				$longEMG = $posComa-$posDosPuntos1;
				$nombreEMG = substr ($encabezado,$posDosPuntos1+1,$longEMG-1);
				//echo "El nombre del EMG es: ".$nombreEMG."<br>";

				$longEM = $posLagrimita2-$posDosPuntos2;
				$EMImp = abs (substr($encabezado,$posComa+4,$longEM-1));

				if(is_numeric($EMImp)){
					$contEM++;		//Incrementa el contador de EMs
					$cantEM++;		//Cuenta el número de EMs
					//$arrayEM[] = $contEM;
					//$numEM= count ($arrayEM);
					//$numMaxEM = max ($arrayEM);
					echo "El encabezado es: ".$encabezado."<br>";
					echo "El nombre del EMG es: ".$nombreEMG."<br>";
					echo "El EM en el impreso es: ".$EMImp."<br>";
					//echo "El contador de LI3s NC es: ".$contNC."<br>";
				}

				if($EMImp == 15){
					//echo "El número máximo de EMGs ".$nombreEMG."<br>";
					
					$cantNC=0;
					$contEM=0;
				}

				

				$diferenciaEM = $contEM-$EMImp;
				//echo "La diferencia entre EMs es: ".$diferenciaEM."<br>";
				//echo "El EM en el impreso es: ".$EMTempo."<br>";
				
				if($diferenciaEM == 1){
					 // se agrega el EM
					
					//echo "El contador de EMs es: ".$contEM."<br>";
				}
			}
		}
		
		echo "El contador de EMs en la central es: ".$cantEM."<br>";
		echo "La cantidad de LIs NC en la central es: ".$contLI3."<br>";
		

	fclose($archivo);
?>