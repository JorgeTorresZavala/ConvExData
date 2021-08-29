
<?php 

  $archivoEntrada = fopen("EMG_SS0_PLY.txt", "r")
  or die ("Problemas al abrir el archivoEntrada CAR_DATOS_ALL-23122019Log.txt");
    while (!feof  ($archivoEntrada)){
      $linea = fgets($archivoEntrada);
      $igual= "=";
      $coma = ",";
      $ALL = "ALL";
      $strEM = "EM";
      $LI3 = "LI3-";   
      $SLCT = "SLCT-";
      $JT = "JT-";  
      $KR2 = "KR2-";

      $ampersand = "&";

      $posIgual = strpos($linea, $igual);
      $posComa = strpos($linea, $coma);
      $posALL = strpos($linea, $ALL);
      $posEM = strpos($linea, $strEM);
      $posLI3 = strpos($linea, $LI3);
      $posSLCT = strpos($linea, $SLCT);
      $posJT = strpos($linea, $JT);
      $posKR2 = strpos($linea, $KR2);

      $posAmpersand = strpos($linea, $ampersand);

      $longLinea = strlen($linea);

      //echo "Número de caracteres: ".$longLinea."<br>";

      if ($posIgual>0){
        echo "Posición del igual: ".$posIgual."<br>";
      }

      if ($posComa>0){
        echo "Posición de la coma es: ".$posComa."<br>";
      }
      
      if($posALL>0&$posComa>0){
        $EMG = substr($linea,$posIgual+1, (($posComa-1)-$posIgual));
          echo "EMG: ".$EMG."<br>";
      }
      
      $numeroEM = trim(substr($linea, 0,2));

      if (is_numeric($numeroEM)){       
        $rango = "! EMG: ".$EMG.", EM: ".$numeroEM." !";
        echo $rango."<br>";
      }

      if ($posLI3>0){
        $devLI3 = substr($linea,$posLI3, 20);

        $STDEP_LI3 = "STDEP:DEV=".trim($devLI3).";";  //Comando STDEP
        echo "Estado: ".$STDEP_LI3."<br>";

        $EDO_LI3 = "STDEP_LI3.txt";   //Archivo STDEP
        $archivo = fopen($EDO_LI3, "a");
        fwrite($archivo, $rango.PHP_EOL);
        fwrite($archivo, $STDEP_LI3.PHP_EOL);
        fclose($archivo);   

        $BLODE_LI3 = "BLODE:DEV=".trim($devLI3).";";  //Comando BLODE
        echo "Desbloqueo: ".$BLODE_LI3."<br>";

        $DES_LI3 = "BLODE_LI3.txt";   //Archivo BLODE
        $archivo = fopen($DES_LI3, "a");
        fwrite($archivo, $BLODE_LI3.PHP_EOL);
        fclose($archivo);
      }   

      if ($posSLCT>0){
        $devSLCT = substr($linea,$posSLCT, 20);

        $STDEP_SLCT = "STDEP:DEV=".trim($devSLCT).";";  //Comando STDEP
        echo "Estado: ".$STDEP_SLCT."<br>";

        $EDO_SLCT = "STDEP_SLCT.txt";   //Archivo STDEP
        $archivo = fopen($EDO_SLCT, "a");
        fwrite($archivo, $STDEP_SLCT.PHP_EOL);
        fclose($archivo);

        $BLODE_SLCT = "BLODE:DEV=".trim($devSLCT).";";  //Comando BLODE
        echo "BLODE: ".$BLODE_SLCT."<br>";

        $DES_SLCT = "BLODE_SLCT.txt";   //Archivo BLODE
        $archivo = fopen($DES_SLCT, "a");
        fwrite($archivo, $BLODE_SLCT.PHP_EOL);
        fclose($archivo);

        $BLODI_SLCT = "BLODI:DEV=".trim($devSLCT).";";  //Comando BLODI
        echo "BLODI: ".$BLODI_SLCT."<br>";

        $BLO_SLCT = "BLODI_SLCT.txt";   //Archivo BLODE
        $archivo = fopen($BLO_SLCT, "a");
        fwrite($archivo, $BLODI_SLCT.PHP_EOL);
        fclose($archivo);
               
      } 
      
      if ($posJT>0){
        $devJT = substr($linea,$posJT, 20);
        $STDEP_JT = "STDEP:DEV=".trim($devJT).";";
        echo "Estado: ".$STDEP_JT."<br>";

        $archivoJT = "STDEP_JT.txt";
        $archivo = fopen($archivoJT, "a");
        fwrite($archivo, $STDEP_JT.PHP_EOL);
        fclose($archivo);
      } 

      if ($posKR2>0){
        $devKR2 = substr($linea,$posKR2, 20);

        $STDEP_KR2 = "STDEP:DEV=".trim($devKR2).";";  //Comando STDEP
        echo "Estado: ".$STDEP_KR2."<br>";

        $EDO_KR2 = "STDEP_KR2.txt";   //Archivo STDEP
        $archivo = fopen($EDO_KR2, "a");
        fwrite($archivo, $STDEP_KR2.PHP_EOL);
        fclose($archivo);

        $DES_KR2 = "BLODE:DEV=".trim($devKR2).";";  //Comando BLODE
        echo "BLODE: ".$DES_KR2."<br>";

        $BLODE_KR2 = "BLODE_KR2.txt";   //Archivo BLODE
        $archivo = fopen($BLODE_KR2, "a");
        fwrite($archivo, $DES_KR2.PHP_EOL);
        fclose($archivo);

        $BLO_KR2 = "BLODI:DEV=".trim($devKR2).";";  //Comando BLODI
        echo "BLODI: ".$BLO_KR2."<br>";

        $BLODI_KR2 = "BLODI_KR2.txt";   //Archivo BLODI
        $archivo = fopen($BLODI_KR2, "a");
        fwrite($archivo, $BLO_KR2.PHP_EOL);
        fclose($archivo);

      }
      
    }

?>
