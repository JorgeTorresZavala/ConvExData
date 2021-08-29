<?php

if ($handle = opendir('PLY/IMPRESOS/')) {
  while (false !== ($entry = readdir($handle))) {
    if ($entry != "." && $entry != "..") {
      //echo $entry."<br>";
      $filename = 'PLY/IMPRESOS/' . $entry;
      //echo $filename."<br>";
      $separatedName = explode("-", $entry);
      //echo $separatedName[0]."<br>";
      $end = end($separatedName);

      $separado = explode(".",$end)[0];
      //echo $separado."<br>";
      $mainFolder = "COMANDOS/".$separado[0];
      //echo $mainFolder."<br>";

      //Lectura del archivo, línea por línea...
      $fp = fopen($filename, "r");
      $content = fread($fp, filesize($filename));
      $lines = explode("\n", $content);
      //echo $lines[10]."<br>";
      fclose($fp);

      //Datos iniciales para procesar los impresos EXEGP:EMG=ALL; y EXEGP:EMG=ALL,CSTINFO;
      $indice = 0;
      $emgs = array();  //Arreglo para guardar los datos de los EMGs
      $indice_emg = 0;
      $indice_types = 0;
      $table = 1;

      //Lectura del archivo
      foreach($lines as $line){ //recorre el arreglo $lines. En cada iteración, el valor del elemento actual se asigna a $line y el puntero interno del arreglo avanza una posición
        //Proceso del impreso EXEGP:EMG=ALL;
        if(strpos(trim($line), "EMG  ") > -1){  //Busca la cadena "EMG  "
          //echo $line."<br>";
          switch(true){
            case $table == 1:
              for($i = $indice+1; trim($lines[$i]) != "END"; $i++){
                if(trim($lines[$i]) != "END"){  //Si la línea no tiene END...
                  //echo $lines[$i]."<br>";
                  $linea = explode(" ", trim(preg_replace('/\s+/', ' ', $lines[$i])));  //Separa el contenido de $line por espacios y los guarda en el arreglo $linea
                  if(!array_search("PAGE", $linea)){  //Si la línea no tiene "PAGE"
                    $emg = array(); //Arreglo para guardar datos de cada EMG
                    if(count($linea) == 7){ //Si el arreglo $linea, tiene 7 elementos
                      $emg["nombre"] = $linea[0]; //Elemento "nombre", del arreglo $emg 
                      $emg["ems"] = array();      //Elemento "ems", del arreglo $emg
                      $emg["types"] = array();    //Elemento "types", del arreglo $emg
                      $emg["types"][$indice_types]["type"] = $linea[1]; //Elemento "type", del arreglo "types"
                      $emg["types"][$indice_types]["side"] = $linea[2]; //Elemento "side", del arreglo "types"
                      $emg["types"][$indice_types]["link"] = $linea[3]; //Elemento "link", del arreglo "types"
                      $emgs[$indice_emg] = $emg;  //Guarda: "nombres", "ems" (arreglo vacio), "type", "side" y "link"...
                      $indice_emg++;
                      $indice_types++;                      
                    }

                    else{ //Si el arreglo $linea, NO tiene 7 elementos
                      $emgs[($indice_emg-1)]["types"][$indice_types]["type"] = $linea[0];
                      $emgs[($indice_emg-1)]["types"][$indice_types]["side"] = $linea[1];
                      $emgs[($indice_emg-1)]["types"][$indice_types]["link"] = $linea[2];
                      $indice_types = 0;
                    }
                  }
                }
              }
            //echo "El último indice fue: ".$indice." y tiene la linea: " . $linea[1];
            break;

            //Proceso del impreso EXEGP:EMG=ALL,CSTINFO;
            case $table == 2 and (strpos(trim(htmlentities($lines[($indice-2)])),'CSTINFO') > -1 //Busca la cadena "CSTINFO"
              || strpos(trim(htmlentities($lines[($indice-3)])),'CSTINFO') > -1 
              || strpos(trim(htmlentities($lines[($indice-4)])),'CSTINFO') > -1):

              for($i = $indice+1; trim($lines[$i]) != "END"; $i++){
                if(trim($lines[$i]) != "END"){ //Si la línea no tiene END...
                  $linea = explode(" ", trim(preg_replace('/\s+/', ' ', $lines[$i])));  //Separa el contenido de $line por espacios y los guarda en el arreglo $linea
                  if(!array_search("PAGE", $linea)){  //Si la línea no tiene "PAGE"
                    if(strlen($linea[0]) > 1){  //$linea[0] tiene el nombre del EMG            
                      $indice_emg = array_search($linea[0], array_column($emgs, 'nombre'));
                      $indice_types = array_search($linea[1], array_column($emgs[$indice_emg]["types"], 'side'));
                      if(count($linea) == 5){ //Si el arreglo $linea, tiene 5 elementos
                        $emgs[$indice_emg]["types"][$indice_types]["str_type"] = $linea[2];
                        $emgs[$indice_emg]["types"][$indice_types]["stc_family"] = $linea[3];
                        $emgs[$indice_emg]["types"][$indice_types]["rp"] = $linea[4];
                      }

                     
                      if(count($linea) == 4){ //Si el arreglo $linea, tiene 4 elementos
                        $emgs[$indice_emg]["types"][$indice_types]["str_type"] = $linea[2];
                        //$emgs[$indice_emg]["types"][$indice_types]["stc_family"] = $linea[1];
                        $emgs[$indice_emg]["types"][$indice_types]["rp"] = $linea[3];
                      }

                    }
                    else{  //$linea[0] NO tiene en nombre del EMG
                      $indice_types = array_search($linea[0], array_column($emgs[$indice_emg]["types"], 'side'));
                      if(count($linea) == 4){ //Si el arreglo $linea, tiene 4 elementos
                        $emgs[$indice_emg]["types"][$indice_types]["str_type"] = $linea[1];
                        $emgs[$indice_emg]["types"][$indice_types]["stc_family"] = $linea[2];
                        $emgs[$indice_emg]["types"][$indice_types]["rp"] = $linea[3];

                      }else{  //Si el arreglo $linea, NO tiene 4 elementos
                        $emgs[$indice_emg]["types"][$indice_types]["str_type"] = $linea[1];
                        $emgs[$indice_emg]["types"][$indice_types]["rp"] = $linea[2];
                      }
                    }
                  }
                }
              }
            break;
          }
          $table++;
        }
        $indice++;
      }


      //echo json_encode($emgs);
      $emg_remotos = 0;
      $emg_centrales = 0;
      echo "<h4 align='center'>Información leída del archivo <b style='color:red;'>" . $entry . " </b></h4><br>";

      $table = "<table border = '1' align='center'>";

      for($j = 0; $j < count($emgs); $j++){ //Número de EMGs
        if(strtoupper($emgs[$j]["types"][0]["type"]) == "REMOTE"){
          $emg_remotos++;
        }else if(strtoupper($emgs[$j]["types"][0]["type"]) == "CENTRAL"){
          $emg_centrales++;
        }
        //Se crea la tabla
        $table.="<tr><th colspan='6'>EMG: " . $emgs[$j]["nombre"] . "</th></tr>"; //Nombre de los EMGs
        $table.="<tr><td>TYPE</td><td>SIDE</td><td>LINK</td><td>STR TYPE</td><td>STC FAMILY</td><td>RP</td></tr>";  //Encabezados
        for($k = 0; $k < count($emgs[$j]["types"]); $k++){  //Itera el arreglo $emg, del campo "types"
          $table.="<tr> 
                   <td>" . $emgs[$j]["types"][$k]["type"] . "</td> 
                   <td>" . $emgs[$j]["types"][$k]["side"] . "</td>
                   <td>" . $emgs[$j]["types"][$k]["link"] . "</td>";

          if(isset($emgs[$j]["types"][$k]["str_type"])){
            $table.="<td>" . $emgs[$j]["types"][$k]["str_type"] . "</td>";
          }
          else{
            $table.="<td>No encontrado</td>";
          }

          if(isset($emgs[$j]["types"][$k]["stc_family"])){
            $table.="<td>" . $emgs[$j]["types"][$k]["stc_family"] . "</td>";
          }
          else{
            $table.="<td></td>";
          }

          if(isset($emgs[$j]["types"][$k]["rp"])){
            $table.="<td>" . $emgs[$j]["types"][$k]["rp"] . "</td>";
          }else {
            $table.="<td>No encontrado</td>";
          }
        "</tr>";
        }
      }
      $table.="</table><div align='center'><br>Remotos: " . $emg_remotos . "<br>Centrales: ".$emg_centrales."<br><br></div>";
      echo $table;
      
    //$separado
    }
  }
}
?>
