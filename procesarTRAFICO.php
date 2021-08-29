<?php 

  $archivoEntrada = fopen("CTI_AFFILE_CAR.txt", "r")
  or die ("Problemas al abrir el archivoEntrada CTI_AFFILE_CAR.txt");
    
    //Lectura del archivo
    while (!feof  ($archivoEntrada)){
      $linea = fgets($archivoEntrada);
      $indice = 0;

      $DATE = "DATE";
      $TIME = "TIME";

      $posDATE = strpos($linea, $DATE);
      $posTIME = strpos($linea,$TIME);

      $valDATE = substr($linea,29,6);
      $valTIME = substr($linea,36,4);

      $longDATE = strlen($valDATE);
      $longTIME = strlen($valTIME);


      //echo "La fecha es: ".$valDATE."<br>";
      //echo "La pos de DATE es: ".$posDATE."<br>";
      //echo "El TIME es: ".$valTIME."<br>";

      if(is_numeric($valDATE)){
        echo "El TIME es: ".$valTIME."<br>";
        //$linea->next();
        //echo "Esta es la segunda linea: ".$valDATE."<br>";
      }
    } //Fin: Lectura del archivo  

    //fclose($archivoSalida);

    
?>
