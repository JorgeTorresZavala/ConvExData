<?php 
    $archivoEntrada = fopen("SULIE_LI3_GUEST.txt", "r")
    or die ("Problemas al abrir el archivoEntrada SULIE_LI3_GUEST.txt");

	  //Lectura del archivo
    while (!feof  ($archivoEntrada)){

      $linea = fgets($archivoEntrada);
      //echo "SNB: ".$linea."<br>";

      $igual= "=";
      $guion = "-";
      $LI3 = "LI3-";

      $posIgual = strpos($linea, $igual);
      $posLI3 = strpos($linea, $LI3);

      if ($posIgual>0){
        $snb = trim(substr($linea,$posIgual+1, 10));
        echo $snb."<br>";
      }

      if ($posLI3>0){
        echo $linea."<br>";
      }

    } //Fin: Lectura del archivo
					
?>
