
  <?php 

    $archivo = fopen("CAR_DATOS_ALL-23122019_Proc.txt", "r")
    or die ("Problemas al abrir el archivo CAR_DATOS_ALL-23122019_Proc.txt");
      
      $contNC=0;
      $cantNC=0;
		  $cont1NC=0;
      $cont2NC=0;
      $cont3NC=0;
      $cont4NC=0;

			$contRango=0;
			$lagrimita=0;
	
      while (!feof  ($archivo)){
        $linea = fgets($archivo);
				$lagrimita="!";
				$posRango = strpos($linea, $lagrimita);
        
        $mensaje1="tiene 1 NC";
        $posMensaje1=strpos($linea, $mensaje1);

        $mensaje2="tiene 2 NC";
        $posMensaje2=strpos($linea, $mensaje2);

        $mensaje3="tiene 3 NC";
        $posMensaje3=strpos($linea, $mensaje3);

        $mensaje4="tiene 4 NC";
        $posMensaje4=strpos($linea, $mensaje4);
        
				if($posRango>0){
					$rangoTempo=substr($linea,$posRango);
					echo "Rango: ".$rangoTempo."<br>";
				}

        if($posMensaje1>0){
          $cont1NC++;
          echo "La cantidad de tarjetas con 1 LI3 NC es:".$cont1NC."<br>";

        }
        
        if($posMensaje2>0){
          $cont2NC++;
          echo "La cantidad de tarjetas con 2 LI3 NC es:".$cont2NC."<br>";

        }

        if($posMensaje3>0){
          $cont3NC++;
          echo "La cantidad de tarjetas con 3 LI3 NC es:".$cont3NC."<br>";

        }

        if($posMensaje4>0){
          $cont4NC++;
          echo "La cantidad de tarjetas con 4 LI3 NC es:".$cont4NC."<br>";

        }
        
      }  
       
			fclose($archivo);
	
  ?>
