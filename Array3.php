<?php 

    $archivoEntrada = fopen("PLY-STDEP_LI3.txt", "r")
    or die ("Problemas al abrir el archivoEntrada CAR_DATOS_ALL-23122019Log.txt");

    $cantEM = 0;	//Cantidad de EMs por EMGs
		$contEM = 0;	//Cuenta TODOS los EMs de la central
    $contLI3 = 0;		//Cuenta el TOTAL de tarjetas LI3 
    $cantNC = 0;		//Cantidad TOTAL de LI3s NO CONECTADOS
    $cantSNB = 0;		//Cantidad TOTAL de SNBs
    $contLIs = 0;     //Cuenta el TOTAL de LI3s
    $cont0NCxTarj =0; //Contador de tarjetas con 0 abonados conectados
    $cont1NCxTarj =0; //Contador de tarjetas con 1 abonados conectados
    $cont2NCxTarj =0; //Contador de tarjetas con 2 abonados conectados
    $cont3NCxTarj =0; //Contador de tarjetas con 3 abonados conectados
    $cont4NCxTarj =0; //Contador de tarjetas con 4 abonados conectados
    $cont4SNBxTarj = 0; //Contador de tarjetas con 4 abonados conectados

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

        //Buscar rango
				if($posLagrimita>0){
          echo "<pre>";
          
          $rango = substr($linea,$posIgual+1, (($posPuntoComa-1)-$posIgual));
          echo "Rango: ".$rango."<br>";

          $nombreEMG = substr($linea, $posLagrimita+1, ($posComa-$posLagrimita)-1);
          echo $nombreEMG."<br>";

          $numeroEM = substr($linea, $posComa+1,($posUltimaLagrimita-$posComa)-1);
          echo $numeroEM."<br>";
					
					//echo "El EM es: ".$numeroEM."<br>";
					$cantEM++;	//Cantidad de EMs por EMGs
					$contEM++;	//Cuenta TODOS los EMs de la central
          echo "El contador de EMs es: ".$cantEM."<br>";

          
					//fwrite($archivoSalida, $rango);
					//echo htmlentities($linea)."<br>";
        
          //echo $nombreEMG.",".$numeroEM.", Rango:".$rango."\n";
          
					$nombresEMGs []=$nombreEMG;	//Guardo TODOS los nombres de los EMGs

					//saco el numero de elementos
					$longitud = count($nombresEMGs);
					$EMGs = array_unique($nombresEMGs);	//Elimina valores duplicados del arreglo $nombresEMGs
					$cantEMxEMG = array_count_values($nombresEMGs);	//Cuenta todos los valores del arreglo $nombresEMGs
					$contEMxEMG = array_values($cantEMxEMG);	//Cuenta todos los valores del arreglo $contEMxEMG
					$valorEMxEMG =count($contEMxEMG);

				} //Fin: Buscar rango

       //Captura de datos:
       $Pos_LI3=strpos($linea, "LI3-");
       $Pos_PRIMA=strpos($linea, "H'");
       
       if($Pos_PRIMA>0){          
         $DEV=substr($linea,4,8);
         $ESTADO=substr($linea,15,4);
         $BLS=substr($linea,22,3);
         $FTYPE=substr($linea,27,4);
         $ADM=substr($linea,34,3);
         //$ABS1=substr($linea,39,3);
         $SNB=substr($linea,45,10);
         $SNBST=substr($linea,59,5);
         $LIST=substr($linea,66,4);
         echo $DEV.$ESTADO.$BLS.$FTYPE.$ADM.$SNB.$SNBST.$LIST."<br>";
         //echo $DEV.$ESTADO.$BLS.$FTYPE.$ADM.$ABS1.$SNB.$SNBST.$LIST."<br>";
       }
        
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
