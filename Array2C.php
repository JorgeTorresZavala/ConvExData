
  <?php 

    $archivoEntrada = fopen("CAR_DATOS_ALL-23122019Log.txt", "r")
    or die ("Problemas al abrir el archivoEntrada CAR_DATOS_ALL-23122019Log.txt");

		//$archivoSalida = fopen("salida.txt","w");
			$contNC = 0;  //Cuenta el TOTAL de LI3s NO CONECTADOS
			$cantNC = 0;  //Cantidad TOTAL de LI3s NO CONECTADOS
			$cantNCxEM = 0; //Cuenta el TOTAL de LI3s NO CONECTADOS por EM
      $cantSNBxEM = 0;  //Cuenta el TOTAL de LI3s CONECTADOS por EM
      $cantNCxEMG = 0; //Cuenta el TOTAL de LI3s NO CONECTADOS por EMG
			$cantSNBxEMG = 0;  //Cuenta el TOTAL de LI3s CONECTADOS por EMG
			
			$contSNB = 0; //Cuenta el número de LI3 CONECTADOS
			$cantSNB = 0; //Cantidad TOTAL de SNBs
			$cantLI3xEM = 0;  //Cantidad de LI3s por EM
			//$contRango=0;
			$lagrimita = 0; //Delimitador de datos
			$contLIs = 0; //Cuenta el TOTAL de LI3s
			$tarjLI3 = 0; //Número de tarjeta LI3 en el EM
			$contLI3 = 0; //Cantidad TOTAL de tarjetas LI3
			//$cantLI3xEMG=0;
			$nombreEMG = 0; //Nombre del EMG
			$contNCxTarj = 0; //Cuenta el número de LI3 NC por tarjeta
			$contSNBxTarj = 0;  //Cuenta el número de tarjetas con LI3 CONECTADOS

			$cant0NCxTarj = 0;  //Cantidad de tarjetas LI3 con 0 NC
			$cant1NCxTarj = 0;  //Cantidad de tarjetas LI3 con 1 NC
			$cant2NCxTarj = 0;  //Cantidad de tarjetas LI3 con 2 NC
			$cant3NCxTarj = 0;  //Cantidad de tarjetas LI3 con 3 NC
			$cant4NCxTarj = 0;  //Cantidad de tarjetas LI3 con 4 NC
			$cant4SNBxTarj = 0; //Cantidad de tarjetas LI3 con 4 SNBs
			//$cantTarjxEM = 0;

			$contEM = 0;  //Cuenta TODOS los EMs de la central
			$cantEM = 0;  //Cantidad de EMs por EMGs
			$cantEMG = 0;	//Cantidad de EMGs
			$cantEMxEMG = 0; //Cantidad de EMs por EMG
			$nombresEMGs  = [];	//Arreglo contador de EMGs
			$cont0NCxTarj = 0;  //Contador de tarjetas LI3 con 0 NC
			$cont1NCxTarj = 0;  //Contador de tarjetas LI3 con 1 NC
			$cont2NCxTarj = 0;  //Contador de tarjetas LI3 con 2 NC
			$cont3NCxTarj = 0;  //Contador de tarjetas LI3 con 3 NC
			$cont4NCxTarj = 0;  //Contador de tarjetas LI3 con 4 NC
			$cont4SNBxTarj = 0; //Contador de tarjetas LI3 con 4 SNBs

			$cont0NCxTarjxEMG = 0;  //Contador de tarjetas LI3 con 0 NC por EMG
			$cont1NCxTarjxEMG = 0;  //Contador de tarjetas LI3 con 1 NC por EMG
			$cont2NCxTarjxEMG = 0;  //Contador de tarjetas LI3 con 2 NC por EMG
			$cont3NCxTarjxEMG = 0;  //Contador de tarjetas LI3 con 3 NC por EMG
			$cont4NCxTarjxEMG = 0;  //Contador de tarjetas LI3 con 4 NC por EMG
			$cantTarjxEMG = 0;  //Cantidad de tarjetas LI3 por EMG

			//$ultimoEM = 0;
			$cadena1EMG = 0;  //Nombre del EMG
			$cadena2EMG = 0;  //Nombre del EMG
			
			//$cant0NCxTarjxEM = 0;
			
			$cantTarjLI3 = 0; //Cantidad TOTAL de tarjetas LI3

      //Lectura del archivo
      while (!feof  ($archivoEntrada)){
        $linea = fgets($archivoEntrada);
				$igual= "=";
        $puntoComa=";";
        $lagrimita="!";
        $coma = ",";
        $posIgual = strpos($linea, $igual);
        $posPuntoComa = strpos($linea, $puntoComa);
        $posLagrimita = strpos($linea, $lagrimita);
        $posUltimaLagrimita = strrpos($linea, $lagrimita);
        
        $posComa = strpos($linea, $coma);

				//Captura de datos:
        $DEV = substr($linea,8,4);
        $ADM = substr($linea,42,2); 
        $SNB = substr($linea,53,10);       
        $LI3 = substr($linea,8,10);

        //Buscar rango
				if($posLagrimita>0){
          echo "<pre>";
          
          $rango = substr($linea,$posIgual+1, (($posPuntoComa-1)-$posIgual));
          //echo "Rango: ".$rango."<br>";

          $nombreEMG = substr($linea, $posLagrimita+1, ($posComa-$posLagrimita)-1);
          //echo $nombreEMG."<br>";

          $numeroEM = substr($linea, $posComa+1,($posUltimaLagrimita-$posComa)-1);
          //echo $numeroEM."<br>";
					
					//echo "El EM es: ".$numeroEM."<br>";
					$cantEM++;	//Cantidad de EMs por EMGs
					$contEM++;	//Cuenta TODOS los EMs de la central
          //echo "El contador de EMs es: ".$cantEM."<br>";

          
					//fwrite($archivoSalida, $rango);
					//echo htmlentities($linea)."<br>";
        
          echo $nombreEMG.",".$numeroEM.", Rango:".$rango."\n";
          
					$nombresEMGs []=$nombreEMG;	//Guardo TODOS los nombres de los EMGs

					//saco el numero de elementos
					$longitud = count($nombresEMGs);
					$EMGs = array_unique($nombresEMGs);	//Elimina valores duplicados del arreglo $nombresEMGs
					$cantEMxEMG = array_count_values($nombresEMGs);	//Cuenta todos los valores del arreglo $nombresEMGs
					$contEMxEMG = array_values($cantEMxEMG);	//Cuenta todos los valores del arreglo $contEMxEMG
					$valorEMxEMG =count($contEMxEMG);

				} //Fin: Buscar rango

        //Busca la cadena "LI3-"
        if($DEV=="LI3-") {
          $contLIs++;     //Cuenta el TOTAL de LI3s           

          //Busca LI3 "NC"
          if($ADM=="NC"){
						$cantNC++;		//Cantidad TOTAL de LI3s NO CONECTADOS
						$contNC++;		//Cuenta el TOTAL de LI3s NO CONECTADOS
						$cantNCxEM++;	//Cuenta el TOTAL de LI3s NO CONECTADOS por EM
						$stringNC=$nombreEMG.",".$numeroEM.", ".$LI3.$ADM."\n";
            echo  $stringNC."<br>";
          } //Fin: Busca LI3 "NC"

          //Busca "SNB"
          if($SNB>0){
						$cantSNB++;		//Cantidad TOTAL de SNBs	
						$contSNB++; 	//Cuenta el número de LI3 CONECTADOS
						$cantSNBxEM++;	//Cuenta el TOTAL de LI3s CONECTADOS por EM
						$stringSNB=$nombreEMG.",".$numeroEM.", ".$LI3.$SNB."\n";
						echo $stringSNB."<br>";     						  
					} //Fin: Busca "SNB"

          //Cálculo de tarjetas
          if ($contLIs%4==0){ //Múltiplo de 4 LI3s (una tarjeta)
						$tarjLI3++;		//Número de tarjeta LI3 en el EM
						$contLI3++;		//Cuenta el TOTAL de tarjetas LI3 

						if($contNC >= 0){	
							$contNCxTarj++; //Cuenta el número de tarjetas con LI3 NC
							$stringNC="Tarjeta: ".$tarjLI3.", ".$contNC." NC"."\n";
							//fwrite($archivoSalida, "Esta tarjeta ".$tarjLI3." tiene ".$contNC." NC/".$contSNB." SNB"."\n");		
							$contNCxTarj = $contNC;
							echo $stringNC."<br>";	
							$contNC=0;
						}

						if($contSNB>0){	
							$contSNBxTarj++;  //Cuenta el número de tarjetas con LI3 CONECTADOS
							$stringSNB="Tarjeta: ".$tarjLI3.", ".$contSNB." SNB "."\n";
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
							//echo "Ésta tarjeta ".$tarjLI3." está en la línea:".$contLIs.", éste es su: ".$linea."<br>";
							//echo "La tarjeta ".$tarjLI3." con ".$contNCxTarj." LI3, el valor del contador es ".$cant2NCxTarj."<br>";
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
							//echo "Ésta tarjeta ".$tarjLI3." está en la línea:".$contLIs.", éste es su: ".$linea."<br>";
							//echo "La tarjeta ".$tarjLI3." con ".$contNCxTarj." LI3 NC, el valor del contador es ".$cant4NCxTarj."<br>";
						}
						
						if ($nombreEMG <> ""){
							
							//Contador de tarjetas con LI3 NC y con SNBs
							if($tarjLI3%32 == 0){	//Múltiplo de 32 LI3s (un EM)
               
                echo "***************** Tarjetas por EM ******************"."<br>";
                                      
								echo $nombreEMG.",".$numeroEM.", NC: ".$cantNCxEM."<br>";
								echo $nombreEMG.",".$numeroEM.", SNB: ".$cantSNBxEM."<br>";
                
								//Se borran los contadores
								$tarjLI3 = 0;
								$cantNCxEM = 0;
                $cantSNBxEM = 0;
                                
							}

							//Contador de tarjetas con diferentes valores
							if($tarjLI3%32 == 0){	//Múltiplo de 32 LI3s (un EM)

								if($cant0NCxTarj > 0){
									echo $nombreEMG. ",".$numeroEM. ", 4SNB: ".$cant0NCxTarj."<br>";	
									$cant0NCxTarj = 0;
								}						
								
								if($cant1NCxTarj > 0){
									echo $nombreEMG. ",".$numeroEM. ", 1NC: ".$cant1NCxTarj."<br>";	
									$cant1NCxTarj = 0;
								}

								if($cant2NCxTarj > 0){
									echo $nombreEMG. ",".$numeroEM. ", 2NC: ".$cant2NCxTarj."<br>";
									$cant2NCxTarj = 0;	
								}

								if($cant3NCxTarj > 0){
									echo $nombreEMG. ",".$numeroEM. ", 3NC: ".$cant3NCxTarj."<br>";	
									$cant3NCxTarj = 0;
								}

								if($cant4NCxTarj > 0){
									echo $nombreEMG. ",".$numeroEM. ", 4NC: ".$cant4NCxTarj."<br>";	
									$cant4NCxTarj = 0;
								}

								if($cant4SNBxTarj > 0){
									//echo "El número de tarjetas con SNB es: ".$cont4SNBxTarj."<br>";	
									$cant4SNBxTarj = 0;	
								}                 

                  $NunEMxEMG = count($cantEMxEMG);
                  switch ($NunEMxEMG) {
                    case 1:
                      $cantTarjxEMG = $cont0NCxTarjxEMG + $cont1NCxTarjxEMG + $cont2NCxTarjxEMG + $cont3NCxTarjxEMG + $cont4NCxTarjxEMG;

                      echo $nombreEMG. ",".$numeroEM.", 0NC:".$cont0NCxTarjxEMG."<br>";
                      echo $nombreEMG. ",".$numeroEM.", 1NC:".$cont1NCxTarjxEMG."<br>";
                      echo $nombreEMG. ",".$numeroEM.", 2NC:".$cont2NCxTarjxEMG."<br>";
                      echo $nombreEMG. ",".$numeroEM.", 3NC:".$cont3NCxTarjxEMG."<br>";
                      echo $nombreEMG. ",".$numeroEM.", 4NC:".$cont4NCxTarjxEMG."<br>";
                      echo "Hasta aquí llevamos: ".$cantTarjxEMG." tarjetas"."<br>";
                      
                      $cantTarjxEMG = 0;
                      $cont0NCxTarjxEMG = 0;
                      $cont1NCxTarjxEMG = 0;
                      $cont2NCxTarjxEMG = 0;
                      $cont3NCxTarjxEMG = 0;
                      $cont4NCxTarjxEMG = 0;
                    break;

                    case 2:
                      

                      $cantTarjxEMG = $cont0NCxTarjxEMG + $cont1NCxTarjxEMG + $cont2NCxTarjxEMG + $cont3NCxTarjxEMG + $cont4NCxTarjxEMG;
                      echo "Este EM tiene: ".$cont0NCxTarjxEMG." tarjetas con 0 LI3 NO conectadas"."<br>";
                      echo "Este EM tiene: ".$cont1NCxTarjxEMG." tarjetas con 1 LI3 NO conectadas"."<br>";
                      echo "Este EM tiene: ".$cont2NCxTarjxEMG." tarjetas con 2 LI3 NO conectadas"."<br>";
                      echo "Este EM tiene: ".$cont3NCxTarjxEMG." tarjetas con 3 LI3 NO conectadas"."<br>";
                      echo "Este EM tiene: ".$cont4NCxTarjxEMG." tarjetas con 4 LI3 NO conectadas"."<br>";
                      echo "Hasta aquí llevamos: ".$cantTarjxEMG." tarjetas"."<br>";
                    break;

                    case 3:
                        echo "iNunEMxEMG es igual a 3"."<br>";
                        break;
                  }
                  
                

              }
              
							echo "****************************************************"."<br>";
						}
						
					}	//Fin: Cálculo de tarjetas
					
				} //Fin: Busca la cadena "LI3-"
        
			} //Fin: Lectura del archivo
			
			echo "**************** Fin: Lectura del archivo ******************"."<br>";
			$EMGs = array_unique($nombresEMGs);		
			$cantEMG = count($EMGs);
			
			echo "Esta central tiene: ".$cantEMG." EMGs"."<br>";

			echo "Los EMGs tienen los siguientes EMs: "."<br>";
			$cantEMxEMG = array_count_values($nombresEMGs);
			
			print_r($cantEMxEMG);

			echo "El Número TOTAL de EMs en la central es: ".$contEM."<br>";
			echo "La cantidad de tarjetas es: ".$contLI3."<br>";
      echo "El número de LI3 NC es: ".$cantNC."<br>";
			echo "El número de SNB es: ".$cantSNB."<br>";
			echo "El número TOTAL de LI3s es ".$contLIs."<br>";
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
