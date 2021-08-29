<?php

$handle = opendir('PLY/DATOS/');
while (false !== ($entry = readdir($handle))) {
  if ($entry != "." && $entry != "..") {
    $filename = 'PLY/DATOS/' . $entry;

    $fp = fopen($filename, "r");
    $content = fread($fp, filesize($filename));
    $lines = explode("\n", $content);
    fclose($fp);

    $emgs = array();
    $indice = 0;
    $indice_emg = 0;

    foreach($lines as $line){
      if(strpos($line, "STBSP:EMG") > -1){
        $separado_igual = explode("=", $line);
        $separado_coma = explode(",", $separado_igual[1]);
        $emg = array();
        $emg['nombre'] = $separado_coma[0];
        $emg['cantidad_nc'] = 0;
        //$emg['cantidad_con'] = 0;
        $emg['li3_nc'] = array();
        $emg['ems'] = array();

        array_push($emgs, $emg);
        $indice_emg++;
        for($i = $indice+1; trim($lines[$i])!="END"; $i++){
          if(strpos($lines[$i], "LI3-") > -1){
            $emgs[$indice_emg-1]["cantidad_nc"]++;
            array_push($emgs[$indice_emg-1]["li3_nc"], trim(substr($lines[$i], strpos($lines[$i], "LI3-"), 15)));
          }
        }
      }

      if(strpos($line, "STDEP:DEV=LI3-") > -1){

        $stdep = str_replace(array("<","&",";"),"", $line);
        $separado_guion = explode("-", htmlentities($stdep));
        $inicial = $separado_guion[1];
        $separado_espacio = explode(" ", $separado_guion[2]);
        $final = $separado_espacio[0];
        $em_num = substr($separado_espacio[1],4,-1);

        $em = array();
        $em["numero_em"] = $em_num;
        $em["cantidad_nc"] = 0;
        $em["cantidad_con"] = 0;
        $em["li3_nc"] = array();
        $em["li3_con"] = array();

        for($i = 0; $i < count($emgs); $i++){

          if(array_search($em_num, array_column($emgs[$i]["ems"], 'numero_em')) === false){
            array_push($emgs[$i]["ems"], $em);
          }

          $indice_em = array_search($em,$emgs[$i]["ems"]);

          for($k = 0; $k < count($emgs[$i]["li3_nc"]); $k++){
            $li = explode("-",$emgs[$i]["li3_nc"][$k])[1];
            if($li >= $inicial && $li <= $final){
              array_push($emgs[$i]["ems"][$indice_em]["li3_nc"], $emgs[$i]["li3_nc"][$k]);
              $emgs[$i]["ems"][$indice_em]["cantidad_nc"]++;
            }
          }
          if($emgs[$i]["ems"][$indice_em]["cantidad_nc"] == 0 and $emgs[$i]["ems"][$indice_em]["cantidad_con"] == 0){
            unset($emgs[$i]["ems"][$indice_em]);
          }
        }
      }
      $indice++;

    }
    echo json_encode($emgs);
    //echo "<h4 align='center'>Información leida del fichero <b style='color:red;'>" . $entry . " </b></h4><br>";

    $total_nc = 0;
    for($j = 0; $j < count($emgs); $j++){
      $table = "<table border = '1' align='center'>";
      $table.="<tr><th>EMG: " . $emgs[$j]["nombre"] . "</th><th>Cantidad " . $emgs[$j]["cantidad_nc"] . "</th></tr>";
      $total_nc = $total_nc + $emgs[$j]["cantidad_nc"];
      //$table.="<tr><td colspan='2'>LI3 Disconnected</td></tr>";
      for($k = 0; $k < count($emgs[$j]["li3_nc"]); $k++){
        $table.="<tr><td colspan='2'>" . $emgs[$j]["li3_nc"][$k] . "</td></tr>";
      }
      $table.="</table><br>";
      //echo $table;
    }
    //echo "<br><br> El total de LI3 No conectados es de " . $total_nc;
  }

}

?>
