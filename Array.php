
  <?php 

    $archivo = fopen("STDEP_0-127.txt", "r")
    or die ("Problemas al abrir el archivo STDEP-SSC.txt");
    $num_lineas = 0;  
    $contNC=0;
    $contSNB=0;
    $NC[]=0;
    $SUB[]=0;
    $contLIs=0;
    $cantLIs=0;
    $tarjLI3=0;
    $cantTarj1=0;
    $cantTarj2=0;
    $cantTarj[]=0;
    $cantTarjNC=0;
    $cantLI3NC=0;
    $cantLI3conNC=0;
    
      while (!feof  ($archivo)){
        $linea = fgets($archivo);
        
        $guionUno=strpos($linea,"-");
        $guionDos=strrpos($linea,"-");
        $hasta=strpos($linea,"&&");
        $coma=strpos($linea,";");
        $longRangoIni=($hasta-$guionUno-1);
        $longRangoFin=($coma-$guionDos-1);
        $rangoIni=substr($linea,$guionUno+1,$longRangoIni);
        $rangoFin=substr($linea,$guionDos+1,$longRangoFin);
      
        //Captura de datos:
        $DEV=substr($linea,8,4);
        $ADM=substr($linea,42,2); 
        $SNB=substr($linea,53,10);       
        $LI3=substr($linea,8,10);

        if($DEV=="LI3-"){
          $contLIs++;     //Cuenta los LI3s           
          
          if($ADM=="NC"){
            $contNC++;
            //$contTarj[]=$contLIs;               
            //$cantLI3NC=count($contTarj);
            echo "El LI3 No Conectado es: ".$contLIs." ".$LI3."<br>";  

            $factor=$contLIs;
            $factor++;
            //echo "el pivote es: ".$contLIs."<br>";
            //echo "el valor del factor es: ".$factor." y el siguiente pivote es: ".$contLIs."<br>";

            if($factor-$contLIs==1){
              $cantLI3conNC++;
              //echo "El LI3 NC consecutivo es: ".$contLIs." ".$LI3."<br>";
              //echo "La cantidad de LI3 NC es: ".$cantLI3conNC."<br>";

              if($cantLI3conNC==4){
                echo "Esta tarjeta tiene 4 LI3 NC"."<br>";
              }
              //}
              //else{
                
                  //echo "El LI3 NC es consecutivo ".$contLIs."<br>";
                  //echo "La cantidad de Tarjetas con LI3 NC: ".$cantTarjNC."<br>";
              //}
                
              }
              
              //echo "La cantidad de LI3 NC es: ".$cantLI3NC."<br>";
            
            //echo "El incremento es: ".$incremento."<br>";

          }

          if($SNB>0){
            $contSNB++; 
            echo "El abonado es: ".$contLIs." ".$LI3.$SNB."<br>";
          }

          if ($contLIs%4==0){     
            $tarjLI3++;       
            echo "El número de tarjeta es: ".$tarjLI3."<br>";
          }
        }  
      }

        echo "El número de LI3 NO CONECTADAS es: ".$contNC."<br>";
        echo "El número de LI3 CONECTADAS es: ".$contSNB."<br>";
        echo "El número TOTAL de LI3s es ".$contLIs."<br>";
        echo "El número de LI3 NO CONECTADAS es: ".$cantLI3NC."<br>";
       
        
          
    fclose($archivo);
  ?>
