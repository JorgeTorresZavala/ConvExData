
<?php 

  $archivoEntrada = fopen("SUSCP_EMIR.txt", "r")
	or die ("Problemas al abrir el archivo de Entrada SUSCP_EMIR.txt");
    $snb_array = [];  //Arreglo snb
    //$contLIMA = 0;
    $contSNB = 0;
    //$contPBX = 0;
    //$contNPO = 0;
    //$scl1All = [];
    //$sclAll = [];
    //$index = 0;
    //$aux = 0;
    $snbGeneral = array();
    $nombreArchivo = "categorias.txt";
    $archivo = fopen($nombreArchivo, "w");
    $aux = -1;

    while (!feof  ($archivoEntrada)){ 
      
      $linea = fgets($archivoEntrada);
      $guion = "-";
      $LIMA = "LIMA-";
      $pbx = "PB";
      $NPO = "NPO";
      
      $posLIMA = strpos($linea, $LIMA);
      $posGuion = strpos($linea, $guion);
      $posPBX = strpos($linea, $pbx);
      $posNPO = strpos($linea, $NPO);
      
      $snb = trim(substr($linea,0, 10));

      if ($posGuion=15){ 
        $snb = trim(substr($linea,0, 10));
        $scl = trim(substr($linea, $posLIMA + 20, 15));
        $posCatGuion = strpos($linea, $guion);
        $digitos = strlen($snb);

        if(is_numeric($snb)&$digitos >9){
          $aux=$aux+1;
          $scl = trim(substr($linea, $posLIMA + 20, 15));          
          $snb_object = [];   //Se borra el arreglo 
          $snb_object["snb"] = $snb;  //Se agrega el SNB al arreglo 'snb'
          $snb_object["categorias"] = []; //Se borra el arreglo 'categorias'
          array_push($snb_object["categorias"], $scl);  //Se agrega la categoria al arreglo
          //fwrite($archivo, "SUSCC:SNB=" . $snb.PHP_EOL);
          //fwrite($archivo, $scl.PHP_EOL);
          array_push($snbGeneral, $snb_object);
        }

        if($posCatGuion>40){
          $scl = trim($linea);
          //array_push($snb_object["categorias"], $scl);  //Se agrega la categoria al arreglo
          //array_push($snb_array,$snb_object);   //Se agregan los snbs y categorias al arreglo
          
          array_push($snbGeneral[$aux]["categorias"], $scl);

          //echo('<pre>');
          //print_r ($snb_object);
          //echo('</pre>');
         
          //fwrite($archivo, $scl.PHP_EOL);
        }
        
      }
        
    } 


    for($i = 0; $i < count($snbGeneral); $i++){
      $comando = "SUSCC:SNB=" . $snbGeneral[$i]["snb"] . ",SCL=" . implode("&", $snbGeneral[$i]["categorias"]) . ";";
      $snbGeneral[$i]["comando"] = $comando;
      fwrite($archivo, $comando.PHP_EOL);
    }

    echo json_encode($snbGeneral);

    //fclose($archivo);
   
?>
