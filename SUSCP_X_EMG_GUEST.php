
<?php 

  $archivoEntrada = fopen("SUSCP_SNB_SS3II-GUEST.txt", "r")
	or die ("Problemas al abrir el archivoEntrada SUSCP_SS0-PLY.txt");
    $snb_array = [];
		$contLI3 = 0;
    $contSNB = 0;
    $contPBX = 0;
    $contNPO = 0;
    $scl1All = [];
    $sclAll = [];
    $index = 0;
    $aux = 0;

    while (!feof  ($archivoEntrada)){
      $linea = fgets($archivoEntrada);
      $guion = "-";
      $LI3 = "LI3-";
      $pbx = "PB";
      $NPO = "NPO";
      
      $posLI3 = strpos($linea, $LI3);
      $posGuion = strpos($linea, $guion);
      $posPBX = strpos($linea, $pbx);
      $posNPO = strpos($linea, $NPO);

      $snb = trim(substr($linea,0, 10));

      echo $posGuion."<br>";
      $digitos = strlen($snb);
      //echo "Digitos: ".$digitos."<br>";
      
      if (is_numeric($snb)&$posLI3>10){ 
        $contSNB ++;
        $scl = trim(substr($linea, $posLI3 + 20, 15));
        $sclAll [] = $scl;
        //$snb_object = [];
        $snb_object["snb"] = $snb;
        $snb_object["categorias"] = [];
        //array_push($snb_object["categorias"], $scl);
        //array_push($snb_array,$snb_object);
        $aux = $index;
        $index++;
        echo $snb."<br>";
        echo $scl."<br>";
      }
    }     
?>
