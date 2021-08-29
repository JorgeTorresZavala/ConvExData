<?php
  error_reporting(E_WARNING);
  $destino = "../SUBIDOS/";
  $temporal = $_FILES['fichero']['tmp_name'];
  $nombre = $_FILES['fichero']['name'];
  move_uploaded_file($temporal, $destino . $nombre);


  $filename = $destino . $nombre;
  $separado = explode("_", $nombre);
  $mainFolder = "../COMANDOS/".$separado[0];
  //if(!file_exists($mainFolder)){
  @mkdir($mainFolder, 0777, true);
  //}
  $fp = fopen($filename, "r");
  $content = fread($fp, filesize($filename));
  $lines = explode("\n", $content);
  fclose($fp);

  $indice = 0;
  $emg_found = 0;
  $superior_emg = 0;
  $inferior_emg = 0;
  $emgs = array();
  $indice_emg = 0;

  foreach($lines as $line){

    if(trim($line) == 'EMG'){

      $emg = array();
      $emg['nombre'] = trim($lines[$indice+1]);
      $emg['ems'] = array();
      //echo trim($lines[$indice+1]) . "<br>";
      $emg_found = true;
      $superior_emg = $indice+2;
      $indice_emg++;
      array_push($emgs, $emg);

    }
    
    if(trim($line) == '' and $emg_found == true){
      $inferior_emg = $indice;
    }
    //echo "Superior: " . $superior_emg . "<br>";
    //echo "Inferior: " . $inferior_emg . "<br>";
    for($i = $superior_emg; $i < $inferior_emg; $i++){
      
      if(trim($lines[$i]) == 'EM'){
        //echo trim($lines[$i+1]) . "<br>"; 
        $em = array();
        $em['em_num'] = trim($lines[$i+1]);
        $em['em_data'] = array();
        array_push($emgs[($indice_emg-1)]['ems'], $em);
        $indice_temporal = $indice_em;
        $indice_em++;
        //echo json_encode($emgs[($indice_emg-1)]);
      }else{
        if(trim($lines[$i+2]) != 'EM' and (int)(trim($lines[$i+2]))== false and trim($lines[$i+2])!='' and trim($lines[$i+2])!='END'){
          $data = array();
          $data['SUNAME'] = trim(substr($lines[$i+2], 0, 9));
          $data['SUID'] = trim(substr($lines[$i+2], 9, 32));
          $data['EQM'] = trim(substr($lines[$i+2], 41, 23));
          $data['SUP'] = trim(substr($lines[$i+2], 64, 7));
          array_push($emgs[($indice_emg-1)]['ems'][$indice_temporal]['em_data'], $data);
        }
      }
    }
    
    $indice_em = 0;
    $indice++;
  }
  echo json_encode($emgs);
  //return;
  $emg_cmd = array();
  for($i = 0; $i < count($emgs); $i++){
    $emg_cmd[$i]['nombre'] = $emgs[$i]['nombre'];

    $emg_cmd[$i]['LI3'] = array();
    $emg_cmd[$i]['RT2'] = array();
    $emg_cmd[$i]['SLCT'] = array();
    $emg_cmd[$i]['JT'] = array();
    $emg_cmd[$i]['KR2'] = array();
    $emg_cmd[$i]['SULTD'] = array();
    $emg_cmd[$i]['EXAL0'] = array();
    $emg_cmd[$i]['TW'] = array();
    $emg_cmd[$i]['HOWL'] = array();
    $emg_cmd[$i]['ACCSD'] = array();
    $emg_cmd[$i]['RT3'] = array();
    $emg_cmd[$i]['LIPRA'] = array();
    $emg_cmd[$i]['RT2E155'] = array();

    for($j = 0; $j < count($emgs[$i]['ems']); $j++){
      for($k = 0; $k < count($emgs[$i]['ems'][$j]['em_data']); $k++){
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'LI3') > -1){
          array_push($emg_cmd[$i]['LI3'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'RT2') > -1){
          array_push($emg_cmd[$i]['RT2'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'SLCT') > -1){
          array_push($emg_cmd[$i]['SLCT'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'JT') > -1){
          array_push($emg_cmd[$i]['JT'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'KR2') > -1){
          array_push($emg_cmd[$i]['KR2'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'SULTD') > -1){
          array_push($emg_cmd[$i]['SULTD'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'EXAL0') > -1){
          array_push($emg_cmd[$i]['EXAL0'],  "ALEXP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'TW') > -1){
          array_push($emg_cmd[$i]['TW'],  "IOIOP:IO=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'HOWL') > -1){
          array_push($emg_cmd[$i]['HOWL'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'ACCSD') > -1){
          array_push($emg_cmd[$i]['ACCSD'],  "EXAMP:ACCSMODULE=".explode("-",$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'])[1].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'RT3') > -1){
          array_push($emg_cmd[$i]['RT3'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'LIPRA') > -1){
          array_push($emg_cmd[$i]['LIPRA'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
        if(strpos($emgs[$i]['ems'][$j]['em_data'][$k]['EQM'], 'RT2E155') > -1){
          array_push($emg_cmd[$i]['RT2E155'],  "STDEP:DEV=".$emgs[$i]['ems'][$j]['em_data'][$k]['EQM'].";!EM:" . $emgs[$i]['ems'][$j]['em_num'] . "!");
        }
      }
    }
  }
  $command = "";
  for($i = 0; $i < count($emg_cmd); $i++){
    if(count($emg_cmd[$i]['LI3']) > 0 ||
      count($emg_cmd[$i]['RT2']) > 0 ||
      count($emg_cmd[$i]['SLCT']) > 0 ||
      count($emg_cmd[$i]['JT']) > 0 ||
      count($emg_cmd[$i]['KR2']) > 0 ||
      count($emg_cmd[$i]['SULTD']) > 0 ||
      count($emg_cmd[$i]['EXAL0']) > 0 ||
      count($emg_cmd[$i]['TW']) > 0 ||
      count($emg_cmd[$i]['HOWL']) > 0 ||
      count($emg_cmd[$i]['ACCSD']) > 0 ||
      count($emg_cmd[$i]['RT3']) > 0 ||
      count($emg_cmd[$i]['LIPRA']) > 0 ||
      count($emg_cmd[$i]['RT2E155']) > 0){
      $output = fopen($mainFolder."/CMD_EMG_". trim($emg_cmd[$i]['nombre']) .".txt","wb");
      $command.= "!CLC!\n";
      $command.= "EXCLP:EMG=" . $emg_cmd[$i]['nombre'] . ";\n";
      $command.= "EXCPP:EMG=" . $emg_cmd[$i]['nombre'] . ";\n";
      if(count($emg_cmd[$i]['LI3']) > 0){
        $command.= "!DEVICE:LI3!\n";
        for($j = 0; $j < count($emg_cmd[$i]['LI3']); $j++){
          $command.=$emg_cmd[$i]['LI3'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['RT2']) > 0){
        $command.= "!DEVICE:RT2!\n";
        for($j = 0; $j < count($emg_cmd[$i]['RT2']); $j++){
          $command.=$emg_cmd[$i]['RT2'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['SLCT']) > 0){
        $command.= "!DEVICE:SLCT!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SLCT']); $j++){
          $command.=$emg_cmd[$i]['SLCT'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['JT']) > 0){
        $command.= "!DEVICE:JT!\n";
        for($j = 0; $j < count($emg_cmd[$i]['JT']); $j++){
          $command.=$emg_cmd[$i]['JT'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['KR2']) > 0){
        $command.= "!DEVICE:KR2!\n";
        for($j = 0; $j < count($emg_cmd[$i]['KR2']); $j++){
          $command.=$emg_cmd[$i]['KR2'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['SULTD']) > 0){
        $command.= "!DEVICE:SULTD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SULTD']); $j++){
          $command.=$emg_cmd[$i]['SULTD'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['EXAL0']) > 0){
        $command.= "!DEVICE:EXAL0!\n";
        for($j = 0; $j < count($emg_cmd[$i]['EXAL0']); $j++){
          $command.=$emg_cmd[$i]['EXAL0'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['TW']) > 0){
        $command.= "!DEVICE:TW!\n";
        for($j = 0; $j < count($emg_cmd[$i]['TW']); $j++){
          $command.=$emg_cmd[$i]['TW'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['HOWL']) > 0){
        $command.= "!DEVICE:HOWL!\n";
        for($j = 0; $j < count($emg_cmd[$i]['HOWL']); $j++){
          $command.=$emg_cmd[$i]['HOWL'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['ACCSD']) > 0){
        $command.= "!DEVICE:ACCSD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['ACCSD']); $j++){
          $command.=$emg_cmd[$i]['ACCSD'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['RT3']) > 0){
        $command.= "!DEVICE:RT3!\n";
        for($j = 0; $j < count($emg_cmd[$i]['RT3']); $j++){
          $command.=$emg_cmd[$i]['RT3'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['LIPRA']) > 0){
        $command.= "!DEVICE:LIPRA!\n";
        for($j = 0; $j < count($emg_cmd[$i]['LIPRA']); $j++){
          $command.=$emg_cmd[$i]['LIPRA'][$j]."\n";
        }
      }
      if(count($emg_cmd[$i]['RT2E155']) > 0){
        $command.= "!DEVICE:RT2E155!\n";
        for($j = 0; $j < count($emg_cmd[$i]['RT2E155']); $j++){
          $command.=$emg_cmd[$i]['RT2E155'][$j]."\n";
        }
      }
      fwrite($output,$command);
      fclose($output);
      $command = "";
    }
  }
rename($destino . $nombre, '../PROCESADOS/' . $nombre);
//header('Location: ' . $_SERVER['HTTP_REFERER']);
// echo json_encode($emg_cmd);

/*
$output = fopen("salida/RT2.txt","wb");
$command = "";
for($i = 0; $i < count($emg_cmd); $i++){
  if(count($emg_cmd[$i]['RT2']) > 0){
    $command.= "!EMG:".$emg_cmd[$i]['nombre']."!\n";
    for($j = 0; $j < count($emg_cmd[$i]['RT2']); $j++){
      $command.=$emg_cmd[$i]['RT2'][$j]."\n";
    }
  }
}
fwrite($output,$command);
fclose($output);
*/

?>
