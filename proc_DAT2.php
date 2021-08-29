<?php

$handle = opendir('PLY/DATOS/');
while (false !== ($entry = readdir($handle))) {
  $command = "";
  $command1 = "";
  $command2 = "";
  if ($entry != "." && $entry != "..") {
    $filename = 'PLY/DATOS/' . $entry;

    $fp = fopen($filename, "r");
    $content = fread($fp, filesize($filename));
    $lines = explode("\n", $content);
    fclose($fp);

    $emgs = array();
    $indice = 0;
    $indice_emg = 0;
    $indice_auxiliar = 0;
    foreach($lines as $line){

      if(strpos($lines[$indice], "<STBSP:EMG") > -1){

        $indice_auxiliar = $indice+1;

        $separado_igual = explode("=", $line);
        $separado_coma = explode(",", $separado_igual[1]);
        $emg = array();
        $emg['nombre'] = $separado_coma[0];
        $emg['cantidad_nc'] = 0;
        $emg['li3_nc'] = array();
        $emg['ems'] = array();
        array_push($emgs, $emg);
        for($i = $indice_auxiliar; trim($lines[$i]) != "END"; $i++){
          $pos = strpos($lines[$i], "LI3-");
          if($pos > -1){
            $li3_nc = trim(substr($lines[$i],$pos,15));
            array_push($emgs[$indice_emg]["li3_nc"], $li3_nc);
          }
        }
        $emgs[$indice_emg]["cantidad_nc"] = count($emgs[$indice_emg]["li3_nc"]);


        for($i = $indice_auxiliar; strpos($lines[$i], '<STBSP:EMG') === false and $i < count($lines)-1;  $i++){
          if(strpos($lines[$i], "<STDEP:DEV=LI3-") > -1){
            $stdep = str_replace(array("<","&",";"),"", $lines[$i]);
            $separado_guion = explode("-", htmlentities($stdep));
            $separado_espacio = explode(" ", $separado_guion[2]);
            $em_num = substr($separado_espacio[1],4,-1);
            $em = array();
            $em["numero_em"] = $em_num;
            $em["cantidad_nc"] = 0;
            $em["cantidad_con"] = 0;
            $em["li3_nc"] = array();
            $em["li3_con"] = array();
            array_push($emgs[$indice_emg]["ems"], $em);

            for($j = $i+1;  trim($lines[$j]) != "END"; $j++){
              if(strpos($lines[$j], 'LI3-') > -1){
                $inicio = strpos($lines[$j], 'LI3-');
                $li3 = array();
                $li3["dev"] = trim(substr($lines[$j],$inicio, 15));
                $li3["state"] = trim(substr($lines[$j],$inicio+15, 7));
                $li3["bls"] = trim(substr($lines[$j],$inicio+22, 5));
                $li3["ftype"] = trim(substr($lines[$j],$inicio+27, 7));
                $li3["adm"] = trim(substr($lines[$j],$inicio+34, 5));
                $li3["abs"] = trim(substr($lines[$j],$inicio+39, 6));
                $li3["snb"] = trim(substr($lines[$j],$inicio+45, 14));
                $li3["snbst"] = trim(substr($lines[$j],$inicio+59, 7));
                $li3["list"] = trim(substr($lines[$j],$inicio+66));

                if($li3["state"]=="BLOC"){
                  array_push($emgs[$indice_emg]["ems"][$indice_em]["li3_nc"], $li3);

                }else{
                  $command.="SUSCP:SNB=" . $li3["snb"] . ", LIST; !EMG:" . $emg['nombre'] . " !EM:!" . $em["numero_em"] . "! \n";
                  array_push($emgs[$indice_emg]["ems"][$indice_em]["li3_con"], $li3);
                }
              }
            }
            $emgs[$indice_emg]["ems"][$indice_em]["cantidad_nc"] = count($emgs[$indice_emg]["ems"][$indice_em]["li3_nc"]);
            $emgs[$indice_emg]["ems"][$indice_em]["cantidad_con"] = count($emgs[$indice_emg]["ems"][$indice_em]["li3_con"]);
            $indice_em++;
          }

          if(strpos($lines[$i], "<EXDEP:DEV=RT2-") > -1){
            $exdep = str_replace(array("<","&",";"),"", $lines[$i]);
            $separado_guion = explode("-", htmlentities($exdep));
            $separado_espacio = explode(" ", $separado_guion[1]);
            $em_num = substr($separado_espacio[1],4,-1);
            //$em = array();
            //$em["numero_em"] = $em_num;
            //$command.="";
            //echo $em_num."<br>";
            for($j = $i+1;  trim($lines[$j]) != "END"; $j++){
              $posicion_rt2 = strpos($lines[$j], 'RT2-');
              if($posicion_rt2 > -1 and substr($lines[$j-1], $posicion_rt2+14, 1) == "R" ){
                $command1.="STRSP:R=" . trim(substr($lines[$j], $posicion_rt2+14, 8)) . "; !EMG:" . $emg['nombre'] . " !EM:!" . $em_num . "!\n";
                $command2.= "NTCOP:SNT=" . trim(substr($lines[$j], $posicion_rt2+30, 26)) . "; !EMG:" . $emg['nombre'] . " !EM:!" . $em_num . "!\n";
                //echo $lines[$j]." en la posicion " . $posicion_rt2 . "<br>";
                /*$inicio = strpos($lines[$j], 'LI3-');
                $li3 = array();
                $li3["dev"] = trim(substr($lines[$j],$inicio, 15));
                $li3["state"] = trim(substr($lines[$j],$inicio+15, 7));
                $li3["bls"] = trim(substr($lines[$j],$inicio+22, 5));
                $li3["ftype"] = trim(substr($lines[$j],$inicio+27, 7));
                $li3["adm"] = trim(substr($lines[$j],$inicio+34, 5));
                $li3["abs"] = trim(substr($lines[$j],$inicio+39, 6));
                $li3["snb"] = trim(substr($lines[$j],$inicio+45, 14));
                $li3["snbst"] = trim(substr($lines[$j],$inicio+59, 7));
                $li3["list"] = trim(substr($lines[$j],$inicio+66));
                */
              }
            }

          }
        }
        $indice_emg++;
        $indice_em = 0;

      }
      $indice++;
    }

    //echo json_encode($emgs);
  }
  $command.=$command1;
  $command.=$command2;
  $output = fopen("PLY/COMANDOS/CMD_STATUS_ALL-PLY.txt","wb");
  fwrite($output,$command);
  fclose($output);
}

?>
