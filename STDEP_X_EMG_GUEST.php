
<?php 

  $archivoEntrada = fopen("STDEP_LI3-SS3.txt", "r")
	or die ("Problemas al abrir el archivoEntrada STDEP_LI3-SS0.txt");
	
		$contLI3 = 0;
		$contSNB = 0;

    while (!feof  ($archivoEntrada)){
      $linea = fgets($archivoEntrada);
      $primaC = "H'";
      $LI3 = "LI3-";

      $posPrimaC = strpos($linea, $primaC);

      if ($posPrimaC>0){
				$devLI3 = trim(substr($linea,0, 10));  
				$snb = trim(substr($linea,$posPrimaC+6, 10));

				if(is_numeric($snb)){
					$contSNB ++;

          $SULIE = "SULIE:SNB=".$snb.", RES;";	//Comando SULIE
          $SUSCP = "SUSCP:SNB=".$snb.", LIST;";	//Comando SUSCP
				
					$SULIE_LI3 = "SULIE_LI3_GUEST.txt";   //Archivo SULIE
					$archivo = fopen($SULIE_LI3, "a");
					fwrite($archivo, $SULIE.PHP_EOL);
					//fwrite($archivo, $SUSCC.PHP_EOL);
					fclose($archivo);   

          $SUSCP_SNB = "SUSCP_SNB_GUEST.txt";   //Archivo SULIE
					$archivo = fopen($SUSCP_SNB, "a");
					fwrite($archivo, $SUSCP.PHP_EOL);
					//fwrite($archivo, $SUSCC.PHP_EOL);
          fclose($archivo);
          
					echo $SUSCP."<br>";
					//echo $snb."<br>";
				}
				else{					
					$contLI3 ++;

					$LI3_NC = "! ".trim(substr($linea,0, 8))." !";		//LI3 NC

					$SULIE_LI3 = "SULIE_LI3_GUEST.txt";   //Archivo SULIE
					$archivo = fopen($SULIE_LI3, "a");
					fwrite($archivo, $LI3_NC.PHP_EOL);
					fclose($archivo);

					echo $devLI3."<br>";
				}
        
			}      
		}
		
		echo "El número de SNBs es: ".$contSNB."<br>";
		echo "El número de LI3s libres es: ".$contLI3."<br>";


?>
