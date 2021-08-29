
  <?php 

    $archivoEntrada = fopen("CAR_DATOS_ALL-23122019Log.txt", "r")
    or die ("Problemas al abrir el archivoEntrada CAR_DATOS_ALL-23122019Log.txt");

		//$archivoSalida = fopen("salida.txt","w");
			$contNC=0;
			$cantNC=0;
			$cantNCxEM=0;
			$cantSNBxEM=0;
			
			$contSNB=0;
			$cantSNB=0;
			$cantLI3xEM=0;
			$contRango=0;
			$lagrimita=0;
			$contLIs=0;
			$tarjLI3=0;
			$cantLI3=0;
			$cantLI3xEMG=0;
			$nombreEMG=0;
			$contNCxTarj=0;
			$contSNBxTarj=0;

			$cant0NCxTarj = 0;
			$cant1NCxTarj = 0;
			$cant2NCxTarj = 0;
			$cant3NCxTarj = 0;
			$cant4NCxTarj = 0;
			$cant4SNBxTarj = 0;
			$cantTarjxEM = 0;

			$contEM = 0;
			$cantEM = 0;
			$cantEMG = 0;
			$contEMxEMG [] = 0;
			$contEMG [] = 0;
			$cont0NCxTarj = 0;
			$cont1NCxTarj = 0;
			$cont2NCxTarj = 0;
			$cont3NCxTarj = 0;
			$cont4NCxTarj = 0;
			$cont4SNBxTarj = 0;

			$cont0NCxTarjxEMG = 0;
			$cont1NCxTarjxEMG = 0;
			$cont2NCxTarjxEMG = 0;
			$cont3NCxTarjxEMG = 0;
			$cont4NCxTarjxEMG = 0;
			$contTarjxEMG = 0;

			$ultimoEM = 0;
			$cadena1EMG = 0;
			$cadena2EMG = 0;
			
			$cant0NCxTarjxEM = 0;
			
			$cantTarjLI3 = 0;

      while (!feof  ($archivoEntrada)){
        $linea = fgets($archivoEntrada);
				$lagrimita="!";
				$dosPuntos=":";
				$coma=",";
				$posLagrimita = strpos($linea, $lagrimita);
				
				//Captura de datos:
        $DEV=substr($linea,8,4);
        $ADM=substr($linea,42,2); 
        $SNB=substr($linea,53,10);       
        $LI3=substr($linea,8,10);

				if($posLagrimita>0){
					$rango = substr($linea,19,35);
					//fwrite($archivoSalida, $rango);
					//echo htmlentities($linea)."<br>";
					//echo "El rango es: ".$rango."<br>";

					$posComa = strpos($rango, $coma);	
					$posDosPuntos1 = strpos($rango, $dosPuntos);
					$posDosPuntos2 = strrpos($rango, $dosPuntos);

					$longEMG = $posComa-$posDosPuntos1;
					$nombreEMG = substr($rango,$posDosPuntos1+1, $longEMG-1);
					$posLagrimita2 = strrpos($rango, $lagrimita);
					$longEM = $posLagrimita2-$posDosPuntos2;
					$numeroEM = abs(substr($rango,$posDosPuntos2+1,$longEM-1));	//Número del EM
					$cantEM++;	//Sirve para contar los EMs por EMGs
					$contEM++;	//Sive para contar TODOS los EMs de la central

					if($numeroEM >= 0){
						//echo "El EM obtenido es: ".$numeroEM."<br>";
						//echo "El EM calculado es: ".$cantEM."<br>";
					}

					//$contEMtempo = count($contEMxEMG);
					//echo "El valor del contador es: ".$contEMtempo."<br>";
					//$cadena1EMG = "EMG: ".$nombreEMG.", EM: ".$numeroEM."<br>";
					//$cadena2EMG = "EMG: ".$nombreEMG.", EM: ".$cantEM."<br>";

					//echo trim($cadena1EMG)."<br>";
					//echo trim($cadena2EMG)."<br>";

					//$comparador = strcmp($cadena1EMG,$cadena2EMG);
					//echo "El valor del comparador es: ".$comparador."<br>";


					//echo "La diferencia es: ".$diferencia."<br>";

					//echo "El EM obtenido es: ".$numeroEM."<br>";
					//echo "El EM calculado es: ".$contEM."<br>";
					//fwrite($archivoSalida, "EMG: ".$nombreEMG.", EM: ".$numeroEM."\n");
				}

        if($DEV=="LI3-") {
          $contLIs++;     //Cuenta el TOTAL de LI3s           

          if($ADM=="NC"){
						$cantNC++;		//Cantidad TOTAL de LI3s NO CONECTADOS
						$contNC++;		//Cuenta el TOTAL de LI3s NO CONECTADOS por tarjeta
						$cantNCxEM++;
						$stringNC="El LI3 NC es: ".$contLIs." ".$LI3."\n";
						//echo  $stringNC."<br>";
          }

          if($SNB>0){
						$cantSNB++;		//Cantidad TOTAL de SNBs	
						$contSNB++; 	//Cuenta el TOTAL de Abonados por tarjeta
						$cantSNBxEM++;
						$stringSNB="El SNB es: ".$contLIs." ".$LI3.$SNB."\n";
						//echo $stringSNB."<br>";     						  
					}
					
          if ($contLIs%4==0){     //Múltiplo de 4 LI3s (una tarjeta)
						$tarjLI3++;		//Número de tarjeta LI3
						$cantLI3++;		//Cantidad de tarjetas LI3 

						if($contNC >= 0){	//Cuenta el número de tarjetas con LI3 NC
							$contNCxTarj++;
							$stringNC="Esta tarjeta ".$tarjLI3." tiene ".$contNC." NC"."\n";
							//fwrite($archivoSalida, "Esta tarjeta ".$tarjLI3." tiene ".$contNC." NC/".$contSNB." SNB"."\n");		
							$contNCxTarj = $contNC;
							echo $stringNC."<br>";	
							$contNC=0;
						}

						if($contSNB>0){	//Cuenta el úmero de tarjetas con LI3 CONECTADOS
							$contSNBxTarj++;
							$stringSNB="Esta tarjeta ".$tarjLI3." tiene ".$contSNB." SNB "."\n";
							$contSNBxTarj = $contSNB;
							echo $stringSNB."<br>";										
							$contSNB=0;
						}

						if($contLIs%4 == 0 && $contSNBxTarj == 4 && $contNCxTarj == 0){
							$cant4SNBxTarj++;
							$cont4SNBxTarj++;
							//echo "Ésta tarjeta ".$tarjLI3." está en la línea:".$contLIs.", éste es su: ".$linea."<br>";
							//echo "La tarjeta ".$tarjLI3." con ".$contSNBxTarj." SNBs, el valor del contador es ".$cant4SNBxTarj."<br>";
						}

						if($contLIs%4 == 0 && $contNCxTarj == 0){
							$cant0NCxTarj++;
							$cont0NCxTarj++;
							$cont0NCxTarjxEMG++;
							//echo "Ésta tarjeta ".$tarjLI3." está en la línea:".$contLIs.", éste es su: ".$linea."<br>";
							//echo "La tarjeta ".$tarjLI3." con ".$contNCxTarj." LI3, el valor del contador es ".$cant0NCxTarj."<br>";
						}

						if($contLIs%4 == 0 && $contNCxTarj == 1){
							$cant1NCxTarj++;
							$cont1NCxTarj++;
							$cont1NCxTarjxEMG++;
							//echo "Ésta tarjeta ".$tarjLI3." está en la línea:".$contLIs.", éste es su: ".$linea."<br>";
							//echo "La tarjeta ".$tarjLI3." con ".$contNCxTarj." LI3, el valor del contador es ".$cant1NCxTarj."<br>";
						}

						if($contLIs%4 == 0 && $contNCxTarj == 2){
							$cant2NCxTarj++;
							$cont2NCxTarj++;
							$cont2NCxTarjxEMG++;
							echo "Ésta tarjeta ".$tarjLI3." está en la línea:".$contLIs.", éste es su: ".$linea."<br>";
							echo "La tarjeta ".$tarjLI3." con ".$contNCxTarj." LI3, el valor del contador es ".$cant2NCxTarj."<br>";
						}

						if($contLIs%4 == 0 && $contNCxTarj == 3){
							$cant3NCxTarj++;
							$cont3NCxTarj++;
							$cont3NCxTarjxEMG++;
							//echo "Ésta tarjeta ".$tarjLI3." está en la línea:".$contLIs.", éste es su: ".$linea."<br>";
							//echo "La tarjeta ".$tarjLI3." con ".$contNCxTarj." LI3 NC, el valor del contador es ".$cant3NCxTarj."<br>";
						}

						if($contLIs%4 == 0 && $contNCxTarj == 4){
							$cant4NCxTarj++;
							$cont4NCxTarj++;
							$cont4NCxTarjxEMG++;
							echo "Ésta tarjeta ".$tarjLI3." está en la línea:".$contLIs.", éste es su: ".$linea."<br>";
							echo "La tarjeta ".$tarjLI3." con ".$contNCxTarj." LI3 NC, el valor del contador es ".$cant4NCxTarj."<br>";
						}

						if($tarjLI3%32 == 0){
							$cantLI3xEM = $cantNCxEM + $cantSNBxEM;
							echo "EMG: ".$nombreEMG.", EM: ".$numeroEM." tiene: ".$cantNCxEM." LI3 NC"."<br>";
							echo "EMG: ".$nombreEMG.", EM: ".$numeroEM." tiene: ".$cantSNBxEM." LI3 con SNB"."<br>";
							echo "El número de LI3s por EM es: ".$cantLI3xEM."<br>";

							$tarjLI3=0;
							$cantNCxEM=0;
							$cantSNBxEM=0;							
						}

						// Contador de tarjetas con diferentes valores

						if($tarjLI3%32 == 0 && $cant0NCxTarj > 0){							
							//echo "El número de tarjetas por EM con 0 LI3 NC es: ".$cant0NCxTarj."<br>";	
							$cant0NCxTarj = 0;						
						}

						if($tarjLI3%32 == 0 && $cant1NCxTarj > 0){
							//echo "El número de tarjetas por EM con 1 LI3 NC es: ".$cant1NCxTarj."<br>";	
							$cant1NCxTarj = 0;						
						}

						if($tarjLI3%32 == 0 && $cant2NCxTarj > 0){
							echo "El número de tarjetas por EM con 2 LI3 NC es: ".$cant2NCxTarj."<br>";	
							$cant2NCxTarj = 0;						
						}

						if($tarjLI3%32 == 0 && $cant3NCxTarj > 0){
							//echo "El número de tarjetas por EM con 3 LI3 NC es: ".$cant3NCxTarj."<br>";	
							$cant3NCxTarj = 0;						
						}

						if($tarjLI3%32 == 0 && $cant4NCxTarj > 0){
							echo "El número de tarjetas por EM con 4 LI3 NC es: ".$cant4NCxTarj."<br>";	
							$cant4NCxTarj = 0;						
						}

						if($tarjLI3%32 == 0 && $cant4SNBxTarj > 0){							
							//echo "El número de tarjetas con SNB es: ".$cont4SNBxTarj."<br>";	
							$cant4SNBxTarj = 0;						
						}
						
						if($cantEM >= 17){	
							$cantEM = 0;	//Resetea el contador de EMs
							$contTarjxEMG = $cont0NCxTarjxEMG + $cont1NCxTarjxEMG +	$cont2NCxTarjxEMG +	$cont3NCxTarjxEMG + $cont4NCxTarjxEMG;


							//echo "El EMG: ".$nombreEMG.", EM: ".$numeroEM."<br>";
							echo "En este EMG: ".$nombreEMG." el número de tarjetas con 0 LI3 NC en este EMG es: ".$cont0NCxTarjxEMG."<br>";
							echo "En este EMG: ".$nombreEMG." el número de tarjetas con 1 LI3 NC en este EMG es: ".$cont1NCxTarjxEMG."<br>";
							echo "En este EMG: ".$nombreEMG." el número de tarjetas con 2 LI3 NC en este EMG es: ".$cont2NCxTarjxEMG."<br>";
							echo "En este EMG: ".$nombreEMG." el número de tarjetas con 3 LI3 NC en este EMG es: ".$cont3NCxTarjxEMG."<br>";
							echo "En este EMG: ".$nombreEMG." el número de tarjetas con 4 LI3 NC en este EMG es: ".$cont4NCxTarjxEMG."<br>";
							echo "En este EMG: ".$nombreEMG." el número de tarjetas con 4 SNB es: ".$cont4SNBxTarj."<br>";
							echo "El número de tarjetas en este EMG: ".$nombreEMG." es".$contTarjxEMG."<br>";
						}
					}	
				}
      }

			echo "**********************************"."<br>";
			echo "El Número TOTAL de EMs en la central es: ".$contEM."<br>";
			echo "La cantidad de tarjetas es: ".$cantLI3."<br>"; 
			echo "El número TOTAL de LI3s es ".$contLIs."<br>";
      echo "El número de LI3 NC es: ".$cantNC."<br>";
			echo "El número de SNB es: ".$cantSNB."<br>";
			echo "**********************************"."<br>";
			$cantTarjLI3 = $cont0NCxTarj + $cont1NCxTarj + $cont2NCxTarj + $cont3NCxTarj + $cont4NCxTarj;
			echo "El número de tarjetas con 0 LI3 NC es ".$cont0NCxTarj."<br>";
			echo "El número de tarjetas con 1 LI3 NC es ".$cont1NCxTarj."<br>";
			echo "El número de tarjetas con 2 LI3 NC es ".$cont2NCxTarj."<br>";
			echo "El número de tarjetas con 3 LI3 NC es ".$cont3NCxTarj."<br>";
			echo "El número de tarjetas con 4 LI3 NC es ".$cont4NCxTarj."<br>";
			echo "El número de tarjetas con 4 SNBs es ".$cont4SNBxTarj."<br>";
			echo "La cantidad de tarjetas es: ".$cantTarjLI3."<br>";
	
				
			//fclose($archivoSalida);

  ?>
