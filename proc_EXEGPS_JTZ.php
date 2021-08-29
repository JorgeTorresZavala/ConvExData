<?php

if ($handle = opendir('PLY/IMPRESOS/')) {
  while (false !== ($entry = readdir($handle))) {
    if ($entry != "." && $entry != "..") {

      $filename = 'PLY/IMPRESOS/' . $entry;

      $separatedName = explode("-", $entry);

      $end = end($separatedName);

      $separado = explode(".",$end)[0];

      //echo $separado;

      //$mainFolder = "COMANDOS/".$separado[0];

      $fp = fopen($filename, "r");
      $content = fread($fp, filesize($filename));
      $lines = explode("\n", $content);
      fclose($fp);

      $indice = 0;
      $emgs = array();
      $indice_emg = 0;
      $indice_em = 0;
      $indice_types = 0;
      $table = 1;

      foreach($lines as $line){
        if(strpos(trim($line), "EMG  ") > -1){
          switch(true){
            case $table == 1:
            for($i = $indice+1; trim($lines[$i]) != "END"; $i++){
              if(trim($lines[$i]) != "END"){
                $linea = explode(" ", trim(preg_replace('/\s+/', ' ', $lines[$i])));
                if(!array_search("PAGE", $linea)){
                  $emg = array();
                  if(count($linea) == 7){
                    $emg["nombre"] = $linea[0];
                    $emg["ems"] = array();
                    $emg["types"] = array();
                    $emg["types"][$indice_types]["type"] = $linea[1];
                    $emg["types"][$indice_types]["side"] = $linea[2];
                    $emg["types"][$indice_types]["link"] = $linea[3];
                    $emgs[$indice_emg] = $emg;
                    $indice_emg++;
                    $indice_types++;
                  }
                  else{
                    $emgs[($indice_emg-1)]["types"][$indice_types]["type"] = $linea[0];
                    $emgs[($indice_emg-1)]["types"][$indice_types]["side"] = $linea[1];
                    $emgs[($indice_emg-1)]["types"][$indice_types]["link"] = $linea[2];
                    $indice_types = 0;
                  }
                }
              }
            }
            echo "El último indice fue: ".$indice." y tiene la linea: " . $linea[2];
            break;
            //&& strpos(trim($lines[($indice-4)]), 'CSTINFO') > -1
            case $table > 1 and (strpos(trim(htmlentities($lines[($indice-2)])),'CSTINFO') > -1 || strpos(trim(htmlentities($lines[($indice-3)])),'CSTINFO') > -1 || strpos(trim(htmlentities($lines[($indice-4)])),'CSTINFO') > -1):

            for($i = $indice+1; trim($lines[$i]) != "END"; $i++){
              //echo "segunda tabla: ".$lines[$i]."<br>";
              if(trim($lines[$i]) != "END"){
                $linea = explode(" ", trim(preg_replace('/\s+/', ' ', $lines[$i])));
                if(!array_search("PAGE", $linea)){
                  if(strlen($linea[0]) > 1){
                    $indice_emg = array_search($linea[0], array_column($emgs, 'nombre'));
                    $indice_types = array_search($linea[1], array_column($emgs[$indice_emg]["types"], 'side'));
                    if(count($linea) == 5){
                      $emgs[$indice_emg]["types"][$indice_types]["str_type"] = $linea[2];
                      $emgs[$indice_emg]["types"][$indice_types]["rp"] = $linea[4];
                    }else{
                      $emgs[$indice_emg]["types"][$indice_types]["str_type"] = $linea[2];
                      $emgs[$indice_emg]["types"][$indice_types]["rp"] = $linea[3];
                    }
                  }else{
                    $indice_types = array_search($linea[0], array_column($emgs[$indice_emg]["types"], 'side'));
                    if(count($linea) == 4){
                      $emgs[$indice_emg]["types"][$indice_types]["str_type"] = $linea[1];
                      $emgs[$indice_emg]["types"][$indice_types]["rp"] = $linea[3];
                    }else{
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

        if(trim($lines[$indice])=="EMG" and strpos($lines[$indice+4], 'SUNAME') > -1){
          //echo trim($lines[$indice+1])."<br>";

          $indice_emg = array_search(trim($lines[$indice+1]), array_column($emgs, 'nombre'));
          //array_push($emgs[$indice_emg]["ems"], $em);
          //echo "EL EMG  " . trim($lines[$indice+1]) . " tiene los EM:<br>";
          //echo $lines[$indice+3]."<br>";
          $indice_temporal = 0;
          for($j = $indice; trim($lines[$j]) != "" and trim($lines[$j]) != "END"; $j++){
              //echo $lines[$j]."<br>";
              if(trim($lines[$j]) == "EM"){
                $em = array();
                $em["numero"] = trim($lines[$j+1]);
                $em["equipo"] = array();
                array_push($emgs[$indice_emg]["ems"], $em);
                $indice_temporal = $indice_em;
                $indice_em++;
                //echo "El indice es: " . $j . " y su valor es " . $lines[$j] ."<br>";

              }else{
                if(trim($lines[$j])!=$emgs[$indice_emg]["nombre"] and trim($lines[$j])!="EMG" and trim($lines[$j+1])!="EM" and strpos($lines[$j+1], 'SUNAME')===false and trim($lines[$j+1]) !="" and trim($lines[$j+1])!="END"){
                  $data = array();
                  ctype_alpha($lines[$j+1][0]) ? $inicio = 0 : $inicio = 8;
                  $data['SUNAME'] = trim(substr($lines[$j+1], $inicio, 9));
                  $data['SUID'] = trim(substr($lines[$j+1], $inicio + 9, 32));
                  $data['EQM'] = trim(substr($lines[$j+1], $inicio + 41, 23));
                  $data['SUP'] = trim(substr($lines[$j+1], $inicio + 64 ,7));
                  array_push($emgs[($indice_emg)]['ems'][$indice_temporal]['equipo'], $data);
                  //echo trim(substr($lines[$j+1], $inicio, 9))." iniciando en " . $inicio . "<br>";
                  //echo trim(substr($lines[$j+1], 9, 32));
                  //echo trim(substr($lines[$j+1], 41, 23));
                  //echo trim(substr($lines[$j+1], 64, 7));
                  //echo json_encode($linea);
                  //echo "<b>Equipo es: " . $lines[$j+1]."</b> <br>";

                }
              }
          }
          $indice_em = 0;
        }

        $indice++;
      }
      //echo json_encode($emgs);
      /*$emg_remotos = 0;
      $emg_centrales = 0;
      echo "<h4 align='center'>Información leida del fichero <b style='color:red;'>" . $entry . " </b></h4><br>";

      $table = "<table border = '1' align='center'>";

      for($j = 0; $j < count($emgs); $j++){
        if(strtoupper($emgs[$j]["types"][0]["type"]) == "REMOTE"){
          $emg_remotos++;
        }else if(strtoupper($emgs[$j]["types"][0]["type"]) == "CENTRAL"){
          $emg_centrales++;
        }
        $table.="<tr><th colspan='5'>EMG: " . $emgs[$j]["nombre"] . "</th></tr>";
        $table.="<tr><td>TYPE</td><td>SIDE</td><td>LINK</td><td>STR TYPE</td><td>RP</td></tr>";
        for($k = 0; $k < count($emgs[$j]["types"]); $k++){
          $table.="<tr><td>" . $emgs[$j]["types"][$k]["type"] . "</td><td>" . $emgs[$j]["types"][$k]["side"] . "</td><td>" . $emgs[$j]["types"][$k]["link"]. "</td>";
          if(isset($emgs[$j]["types"][$k]["str_type"])){
            $table.="<td>" . $emgs[$j]["types"][$k]["str_type"] . "</td>";
          }else{
            $table.="<td>No encontrado</td>";

          }
          if(isset($emgs[$j]["types"][$k]["rp"])){
            $table.="<td>" . $emgs[$j]["types"][$k]["rp"] . "</td>";
          }else {
            $table.="<td>No encontrado</td>";
          }
        }
      }
      /*$table.="</table><div align='center'><br>Remotos: " . $emg_remotos . "<br>Centrales: ".$emg_centrales."<br><br></div>";
      echo $table;
      */
      $command = "";
      for($i = 0; $i < count($emgs); $i++){
        $command.="!EMG: " . $emgs[$i]["nombre"] . ";\n";
        $command.="STBSP:EMG=" . $emgs[$i]["nombre"] . ",DETY=LI3,NC;\n";
        for($j = 0; $j < count($emgs[$i]["ems"]); $j++){
          for($k = 0; $k < count($emgs[$i]["ems"][$j]["equipo"]); $k++){
            if($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] != ""){
              echo "El equipo es: " . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "<br>";
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'RT2-') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $split = explode("-", $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"]);
                $command.="EXDEP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="EXPOP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'LI3') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $split = explode("-", $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"]);
                $command.="EXDEP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="EXPOP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'SLCT') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="EXPOP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'KR2') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $split = explode("-", $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"]);
                $command.="EXDEP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="EXPOP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'RT3') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $split = explode("-", $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"]);
                $command.="EXDEP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="EXPOP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'LIPRA') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $split = explode("-", $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"]);
                $command.="EXDEP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="EXPOP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'JT') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $split = explode("-", $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"]);
                $command.="EXDEP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="EXPOP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'SULTD') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'EXAL0') > -1){
                $command.="ALEXP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="ALRDP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'TW') > -1){
                $command.="IOIOP:IO1=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'HOWL') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $split = explode("-", $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"]);
                $command.="EXDEP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="EXPOP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
              if(strpos($emgs[$i]["ems"][$j]["equipo"][$k]["EQM"], 'RT2E155-') > -1){
                $command.="STDEP:DEV=" . $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $split = explode("-", $emgs[$i]["ems"][$j]["equipo"][$k]["EQM"]);
                $command.="EXDEP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
                $command.="EXPOP:DEV=" . $split[0] . "-" . $split[2] . "; !EM:" . $emgs[$i]["ems"][$j]["numero"] . "!\n";
              }
            }
          }
        }
      }
      //$output = fopen("PLY/COMANDOS/CMD_DATOS_ALL-".$separado.".txt","wb");

      fwrite($output,$command);
      fclose($output);
    }
    //$separado
  }
}
?>
