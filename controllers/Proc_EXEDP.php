<?php
  error_reporting(E_WARNING);
  $destino = "../SUBIDOS/";
  $temporal = $_FILES['fichero']['tmp_name'];
  $EMG = $_FILES['fichero']['name'];
  move_uploaded_file($temporal, $destino . $EMG);


  $filename = $destino . $EMG;
  $separado = explode("_", $EMG);
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
  $emgs = array();  //Se crea el arreglo $emgs
  $indice_emg = 0;

  foreach($lines as $line){

    if(trim($line) == 'EMG'){ //Si se encuentra el string EMG

      $emg = array();   //Se crea el arreglo de EMGs
      $emg['EMG'] = trim($lines[$indice+1]);  //Se guarda el nombre del EMG, en el elemento 'EMG', dentro del arreglo $emg.
      $emg['EMs'] = array();  //Se crea un arreglo de EMs, en el elemento 'EMs' dentro del arreglo $emg. Arreglo bidimensional
      //echo trim($lines[$indice+1]) . "<br>";
      $emg_found = true;  //Nombre del EMG
      $superior_emg = $indice+2;  //Salto de 2 lineas
      $indice_emg++;  //Se incrementa el contador de EMGs
      array_push($emgs, $emg);  //Se guarda en el arreglo $emgs, el contenido del arreglo $emg (nombre del EMG).
    }
    
    if(trim($line) == '' and $emg_found == true){ //Si es el final del impreso del EMG
      $inferior_emg = $indice;  //Guarda la linea final del impreso del EMG
    }
    //echo "Superior: " . $superior_emg . "<br>";
    //echo "Inferior: " . $inferior_emg . "<br>";
    for($i = $superior_emg; $i < $inferior_emg; $i++){  //Recorrido de todas las lineas del EMG
      
      if(trim($lines[$i]) == 'EM'){ //SI se encuentra el string EM...
        //echo trim($lines[$i+1]) . "<br>"; 
        $em = array();  //Se crea el arreglo $em
        $em['EM'] = trim($lines[$i+1]); //Se guarda el numero de EM, en el elemento EM del arreglo $em
        $em['DatosEM'] = array(); //Se crea el arreglo 'DatosEM', como elemento del arreglo $em. Arreglo bidimensional.
        array_push($emgs[($indice_emg-1)]['EMs'], $em); //Se almacenan los EMs correspondientes al EMG
        $indice_temporal = $indice_em;  //Se inicializa en 0 el $indice_temporal
        $indice_em++; //Se incrementa el $indice_em
        //echo json_encode($emgs[($indice_emg-1)]);
      }else{  //NO se encuentra el string EM
        if(trim($lines[$i+2]) != 'EM' and trim($lines[$i+2]) != 'EMG' and (int)(trim($lines[$i+2]))== false and trim($lines[$i+2])!='' and trim($lines[$i+2])!='END'){  //Si NO encuentra el string EM&EMG&noEsNumero&NoesLineaVacia&NoTieneEND
          $data = array();  //Se crea el arreglo $data
          $data['SUNAME'] = trim(substr($lines[$i+2], 0, 9)); //Se guarda en el elemento SUNAME el contenido de la linea
          $data['SUID'] = trim(substr($lines[$i+2], 9, 32));  //Se guarda en el elemento SUID el contenido de la linea
          $data['EQM'] = trim(substr($lines[$i+2], 41, 23));  //Se guarda en el elemento EQM el contenido de la linea
          $data['SUP'] = trim(substr($lines[$i+2], 64, 7)); //Se guarda en el elemento SUP el contenido de la linea
          array_push($emgs[($indice_emg-1)]['EMs'][$indice_temporal]['DatosEM'], $data);  //Se guarda en DatosEM, todo el arreglo $data
        }
      }
    }
    
    $indice_em = 0; //Se inicializa en 0
    $indice++;
  }
  echo json_encode($emgs);

  $table = "";

  $emg_cmd = array();
  for($i = 0; $i < count($emgs); $i++){
    
    $emg_cmd[$i]['EMG'] = $emgs[$i]['EMG'];
    $emg_cmd[$i]['LI3'] = array();
    $emg_cmd[$i]['RT2'] = array();
    $emg_cmd[$i]['SLCT'] = array();
    $emg_cmd[$i]['JT'] = array();
    $emg_cmd[$i]['JT2'] = array();
    $emg_cmd[$i]['KR2'] = array();
    $emg_cmd[$i]['SULTD'] = array();
    $emg_cmd[$i]['EXAL0'] = array();
    $emg_cmd[$i]['TW'] = array();
    $emg_cmd[$i]['HOWL'] = array();
    $emg_cmd[$i]['ACCSD'] = array();
    $emg_cmd[$i]['RT3'] = array();
    $emg_cmd[$i]['LIPRA'] = array();
    $emg_cmd[$i]['ETAUS'] = array();

    for($j = 0; $j < count($emgs[$i]['EMs']); $j++){
     
      for($k = 0; $k < count($emgs[$i]['EMs'][$j]['DatosEM']); $k++){
        $table.=str_pad($emgs[$i]['EMG'], 9);
        $table.=str_pad($emgs[$i]['EMs'][$j]["EM"], 3);
        $table.=str_pad($emgs[$i]['EMs'][$j]["DatosEM"][$k]["SUNAME"], 10);
        $table.=str_pad($emgs[$i]['EMs'][$j]["DatosEM"][$k]["SUID"], 30);
        $table.=str_pad($emgs[$i]['EMs'][$j]["DatosEM"][$k]["EQM"], 20);
        $table.=str_pad($emgs[$i]['EMs'][$j]["DatosEM"][$k]["SUP"], 10);
        $table.="\n";
        /*
        $table.="<tr style='border: 1px solid;'><td>" . $emgs[$i]['EMG'] . "</td>";
        $table.= "<td>" . $emgs[$i]['EMs'][$j]["EM"] . "</td>";
        $table.= "<td>" . $emgs[$i]['EMs'][$j]["DatosEM"][$k]["SUNAME"] . "</td>";
        $table.= "<td>" . $emgs[$i]['EMs'][$j]["DatosEM"][$k]["SUID"] . "</td>";
        $table.= "<td>" . $emgs[$i]['EMs'][$j]["DatosEM"][$k]["EQM"] . "</td></tr>";
        */
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'LI3') > -1){
          array_push($emg_cmd[$i]['LI3'],  "STDEP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
          array_push($emg_cmd[$i]['LI3'],  "EXPOP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'RT2') > -1){
          array_push($emg_cmd[$i]['RT2'],  "STDEP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
          array_push($emg_cmd[$i]['RT2'],  "EXPOP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'SLCT') > -1){
          array_push($emg_cmd[$i]['SLCT'],  "STDEP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'JT-') > -1){
          array_push($emg_cmd[$i]['JT'],  "STDEP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
          array_push($emg_cmd[$i]['JT'],  "EXPOP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'JT2') > -1){
          array_push($emg_cmd[$i]['JT2'],  "STDEP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
          array_push($emg_cmd[$i]['JT2'],  "EXPOP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'KR2') > -1){
          array_push($emg_cmd[$i]['KR2'],  "STDEP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'SULTD') > -1){
          array_push($emg_cmd[$i]['SULTD'],  "STDEP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'EXAL0') > -1){
          array_push($emg_cmd[$i]['EXAL0'],  "ALEXP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'EXAL0') > -1){
          array_push($emg_cmd[$i]['EXAL0'],  "ALRDP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'TW') > -1){
          array_push($emg_cmd[$i]['TW'],  "IOIOP:IO=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'HOWL') > -1){
          array_push($emg_cmd[$i]['HOWL'],  "STDEP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'ACCSD') > -1){
          array_push($emg_cmd[$i]['ACCSD'],  "EXAMP:ACCSMODULE=".explode("-",$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'])[1].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'RT3') > -1){
          array_push($emg_cmd[$i]['RT3'],  "STDEP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
          array_push($emg_cmd[$i]['RT3'],  "EXPOP:DEV=".$emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:". $emg_cmd[$i]['EMG'].","."EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'LIPRA') > -1){
          array_push($emg_cmd[$i]['LIPRA'],  "STDEP:DEV=" . $emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:" .  $emg_cmd[$i]['EMG'] . "," . "EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
          array_push($emg_cmd[$i]['LIPRA'],  "EXPOP:DEV=" . $emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'].";!EMG:" .  $emg_cmd[$i]['EMG'] . "," . "EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
        if(strpos($emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'], 'ETAUS') > -1){
          array_push($emg_cmd[$i]['ETAUS'],  "STDEP:DEV=" . $emgs[$i]['EMs'][$j]['DatosEM'][$k]['EQM'] . ";!EMG:". $emg_cmd[$i]['EMG'] . "," . "EM:" . $emgs[$i]['EMs'][$j]['EM'] . "!");
        }
      }
    }
  //$table.= "</tr>";
  }
  //$table.= "</table>";
  //echo $table;
  
  $output_winfiol = fopen($mainFolder . "/" . $EMG ,"wb");  //Se crea el archivo EXEDP, con la extension del nombre del EMG
  fwrite($output_winfiol,$table);   //Se escribe en el archivo EXEDP
  fclose($output_winfiol);    //Se cierra el archivo EXEDP
 
  $fileStatus = fopen($mainFolder . "/CMD1_STATUS.txt","cb"); //Se abre el archivo para escritura, en modo binario
  $cmdStatus.= "CACLP;" . "\n";
  $cmdStatus.= "IOEXP;" . "\n";

  $command = "";
  
  //Busca dispositivos en EQM
  for($i = 0; $i < count($emg_cmd); $i++){
    
    //STATUS    
    if(count($emg_cmd[$i]['RT2']) > 0 ||
      count($emg_cmd[$i]['JT']) > 0){  
      $cmdStatus.= "STBSP:EMG=" . $emg_cmd[$i]['EMG'] . ";\n";
          
      if(count($emg_cmd[$i]['LI3']) > 0){    
        $cmdStatus.= "!DEVICE:LI3!\n";
        for($j = 0; $j < count($emg_cmd[$i]['LI3']); $j++){
          $cmdStatus.=$emg_cmd[$i]['LI3'][$j] . "\n";
        }
      }

      fwrite($fileStatus,$cmdStatus);
      $cmdStatus = "";

    } //Fin: STATUS
    
    // RSS   
    if(count($emg_cmd[$i]['RT2']) > 0){  
      //Se guardan los datos en archivos con el nombre del EMG...
      $output = fopen($mainFolder . "/CMD1_" . trim($emg_cmd[$i]['EMG']) . "_RSS.txt","wb");
      $command.= "@L " . "LOG1_" . trim($emg_cmd[$i]['EMG']) . ".txt" . "\n";
      $command.= "CACLP;" . "\n";
      $command.= "IOEXP;" . "\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ",CSTINFO" . ";\n";
      $command.= "EXCPP:EMG=" . $emg_cmd[$i]['EMG'] . ",RDL" . ";\n";
      $command.= "STBSP:EMG=" . $emg_cmd[$i]['EMG'] . ",DETY=LI3,NC" . ";\n";
      $command.= "EXEPP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      $command.= "EXPOP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      $command.= "EXEDP:EMG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXCLP:EQM=ALL" .";\n";
      $command.= "EXEGP:DEV=ALL" .";\n";
      
      if(count($emg_cmd[$i]['LI3']) > 0){    
        $command.= "!DEVICE:LI3!\n";
        for($j = 0; $j < count($emg_cmd[$i]['LI3']); $j++){
          $command.=$emg_cmd[$i]['LI3'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['RT2']) > 0){
        $command.= "!DEVICE:RT2!\n";
        for($j = 0; $j < count($emg_cmd[$i]['RT2']); $j++){
          $command.=$emg_cmd[$i]['RT2'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['SLCT']) > 0){
        $command.= "!DEVICE:SLCT!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SLCT']); $j++){
          $command.=$emg_cmd[$i]['SLCT'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['KR2']) > 0){
        $command.= "!DEVICE:KR2!\n";
        for($j = 0; $j < count($emg_cmd[$i]['KR2']); $j++){
          $command.=$emg_cmd[$i]['KR2'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['SULTD']) > 0){
        $command.= "!DEVICE:SULTD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SULTD']); $j++){
          $command.=$emg_cmd[$i]['SULTD'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['EXAL0']) > 0){
        $command.= "!DEVICE:EXAL0!\n";
        for($j = 0; $j < count($emg_cmd[$i]['EXAL0']); $j++){
          $command.=$emg_cmd[$i]['EXAL0'][$j] . "\n";
        }
      }

      if(count($emg_cmd[$i]['TW']) > 0){
        $command.= "!DEVICE:TW!\n";
        for($j = 0; $j < count($emg_cmd[$i]['TW']); $j++){
          $command.=$emg_cmd[$i]['TW'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['HOWL']) > 0){
        $command.= "!DEVICE:HOWL!\n";
        for($j = 0; $j < count($emg_cmd[$i]['HOWL']); $j++){
          $command.=$emg_cmd[$i]['HOWL'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['ACCSD']) > 0){
        $command.= "!DEVICE:ACCSD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['ACCSD']); $j++){
          $command.=$emg_cmd[$i]['ACCSD'][$j] . "\n";
        }
      }

      $command.= "@C";
      fwrite($output,$command);
      fclose($output);
      $command = "";
    } //Fin: RSS
      
    // CSS
    if(count($emg_cmd[$i]['JT']) > 0){  
      $output = fopen($mainFolder . "/CMD1_" . trim($emg_cmd[$i]['EMG']) . "_CSS.txt","wb");
      $command.= "@L " ."LOG1_" . trim($emg_cmd[$i]['EMG']) . ".txt" . "\n";  //Se guardan los datos en archivos con el nombre del EMG
      $command.= "CACLP;" . "\n";
      $command.= "IOEXP;" . "\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ",CSTINFO" . ";\n";
      $command.= "EXCPP:EMG=" . $emg_cmd[$i]['EMG'] . ",RDL" . ";\n";
      $command.= "STBSP:EMG=" . $emg_cmd[$i]['EMG'] . ",DETY=LI3,NC" . ";\n";
      $command.= "EXEPP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      $command.= "EXPOP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      $command.= "EXCLP:EQM=ALL" .";\n";
      $command.= "EXEGP:DEV=ALL" .";\n";
      
      if(count($emg_cmd[$i]['LI3']) > 0){    
        $command.= "!DEVICE:LI3!\n";
        for($j = 0; $j < count($emg_cmd[$i]['LI3']); $j++){
          $command.=$emg_cmd[$i]['LI3'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['JT']) > 0){
        $command.= "!DEVICE:JT!\n";
        for($j = 0; $j < count($emg_cmd[$i]['JT']); $j++){
          $command.=$emg_cmd[$i]['JT'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['SLCT']) > 0){
        $command.= "!DEVICE:SLCT!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SLCT']); $j++){
          $command.=$emg_cmd[$i]['SLCT'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['KR2']) > 0){
        $command.= "!DEVICE:KR2!\n";
        for($j = 0; $j < count($emg_cmd[$i]['KR2']); $j++){
          $command.=$emg_cmd[$i]['KR2'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['SULTD']) > 0){
        $command.= "!DEVICE:SULTD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SULTD']); $j++){
          $command.=$emg_cmd[$i]['SULTD'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['EXAL0']) > 0){
        $command.= "!DEVICE:EXAL0!\n";
        for($j = 0; $j < count($emg_cmd[$i]['EXAL0']); $j++){
          $command.=$emg_cmd[$i]['EXAL0'][$j] . "\n";
        }
      }

      if(count($emg_cmd[$i]['TW']) > 0){
        $command.= "!DEVICE:TW!\n";
        for($j = 0; $j < count($emg_cmd[$i]['TW']); $j++){
          $command.=$emg_cmd[$i]['TW'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['HOWL']) > 0){
        $command.= "!DEVICE:HOWL!\n";
        for($j = 0; $j < count($emg_cmd[$i]['HOWL']); $j++){
          $command.=$emg_cmd[$i]['HOWL'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['ACCSD']) > 0){
        $command.= "!DEVICE:ACCSD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['ACCSD']); $j++){
          $command.=$emg_cmd[$i]['ACCSD'][$j] . "\n";
        }
      }

      $command.= "@C";
      fwrite($output,$command);   //Se escriben los datos en los archivos con el nombre del EMG
      fclose($output);    //Se cierra el archivo con el nombre del EMG
      $command = "";
    } //Fin: CSS
    
    // ISDN (LOCAL)
    if(count($emg_cmd[$i]['JT2']) > 0 ){  
      $output = fopen($mainFolder . "/CMD1_" . trim($emg_cmd[$i]['EMG']) . "_ISDN.txt","wb");
      $command.= "@L " . "LOG1_" . trim($emg_cmd[$i]['EMG']) . ".txt" . "\n"; //Se guardan los datos en archivos con el nombre del EMG
      $command.= "CACLP;" . "\n";
      $command.= "IOEXP;" . "\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ",CSTINFO" . ";\n";
      $command.= "EXCPP:EMG=" . $emg_cmd[$i]['EMG'] . ",RDL" . ";\n";
      $command.= "STBSP:EMG=" . $emg_cmd[$i]['EMG'] . ",DETY=LI3,NC" . ";\n";
      $command.= "EXCLP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      $command.= "EXGPP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      
      if(count($emg_cmd[$i]['LI3']) > 0){    
        $command.= "!DEVICE:LI3!\n";
        for($j = 0; $j < count($emg_cmd[$i]['LI3']); $j++){
          $command.=$emg_cmd[$i]['LI3'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['JT2']) > 0){
        $command.= "!DEVICE:JT2!\n";
        for($j = 0; $j < count($emg_cmd[$i]['JT2']); $j++){
          $command.=$emg_cmd[$i]['JT2'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['RT3']) > 0){
        $command.= "!DEVICE:RT3!\n";
        for($j = 0; $j < count($emg_cmd[$i]['RT3']); $j++){
          $command.=$emg_cmd[$i]['RT3'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['LIPRA']) > 0){
        $command.= "!DEVICE:LIPRA!\n";
        for($j = 0; $j < count($emg_cmd[$i]['LIPRA']); $j++){
          $command.=$emg_cmd[$i]['LIPRA'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['SLCT']) > 0){
        $command.= "!DEVICE:SLCT!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SLCT']); $j++){
          $command.=$emg_cmd[$i]['SLCT'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['KR2']) > 0){
        $command.= "!DEVICE:KR2!\n";
        for($j = 0; $j < count($emg_cmd[$i]['KR2']); $j++){
          $command.=$emg_cmd[$i]['KR2'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['SULTD']) > 0){
        $command.= "!DEVICE:SULTD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SULTD']); $j++){
          $command.=$emg_cmd[$i]['SULTD'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['EXAL0']) > 0){
        $command.= "!DEVICE:EXAL0!\n";
        for($j = 0; $j < count($emg_cmd[$i]['EXAL0']); $j++){
          $command.=$emg_cmd[$i]['EXAL0'][$j] . "\n";
        }
      }

      if(count($emg_cmd[$i]['TW']) > 0){
        $command.= "!DEVICE:TW!\n";
        for($j = 0; $j < count($emg_cmd[$i]['TW']); $j++){
          $command.=$emg_cmd[$i]['TW'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['HOWL']) > 0){
        $command.= "!DEVICE:HOWL!\n";
        for($j = 0; $j < count($emg_cmd[$i]['HOWL']); $j++){
          $command.=$emg_cmd[$i]['HOWL'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['ACCSD']) > 0){
        $command.= "!DEVICE:ACCSD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['ACCSD']); $j++){
          $command.=$emg_cmd[$i]['ACCSD'][$j] . "\n";
        }
      }

      $command.= "@C";
      fwrite($output,$command);   //Se escriben los datos en los archivos con el nombre del EMG
      fclose($output);    //Se cierra el archivo con el nombre del EMG
      $command = "";
    } //Fin: ISDN (LOCAL)
    
    // ISDN (REMOTE)
    if(count($emg_cmd[$i]['RT3']) > 0 ){  
      $output = fopen($mainFolder . "/CMD1_" . trim($emg_cmd[$i]['EMG']) . "_ISDN.txt","wb");
      $command.= "@L " ."LOG1_" . trim($emg_cmd[$i]['EMG']) . ".txt" . "\n";  //Se guardan los datos en archivos con el nombre del EMG
      $command.= "CACLP;" . "\n";
      $command.= "IOEXP;" . "\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ",CSTINFO" . ";\n";
      $command.= "EXCPP:EMG=" . $emg_cmd[$i]['EMG'] . ",RDL" . ";\n";
      $command.= "STBSP:EMG=" . $emg_cmd[$i]['EMG'] . ",DETY=LI3,NC" . ";\n";
      $command.= "EXCLP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      
      if(count($emg_cmd[$i]['LI3']) > 0){    
        $command.= "!DEVICE:LI3!\n";
        for($j = 0; $j < count($emg_cmd[$i]['LI3']); $j++){
          $command.=$emg_cmd[$i]['LI3'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['JT2']) > 0){
        $command.= "!DEVICE:JT2!\n";
        for($j = 0; $j < count($emg_cmd[$i]['JT2']); $j++){
          $command.=$emg_cmd[$i]['JT2'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['RT3']) > 0){
        $command.= "!DEVICE:RT3!\n";
        for($j = 0; $j < count($emg_cmd[$i]['RT3']); $j++){
          $command.=$emg_cmd[$i]['RT3'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['LIPRA']) > 0){
        $command.= "!DEVICE:LIPRA!\n";
        for($j = 0; $j < count($emg_cmd[$i]['LIPRA']); $j++){
          $command.=$emg_cmd[$i]['LIPRA'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['SLCT']) > 0){
        $command.= "!DEVICE:SLCT!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SLCT']); $j++){
          $command.=$emg_cmd[$i]['SLCT'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['KR2']) > 0){
        $command.= "!DEVICE:KR2!\n";
        for($j = 0; $j < count($emg_cmd[$i]['KR2']); $j++){
          $command.=$emg_cmd[$i]['KR2'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['SULTD']) > 0){
        $command.= "!DEVICE:SULTD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['SULTD']); $j++){
          $command.=$emg_cmd[$i]['SULTD'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['EXAL0']) > 0){
        $command.= "!DEVICE:EXAL0!\n";
        for($j = 0; $j < count($emg_cmd[$i]['EXAL0']); $j++){
          $command.=$emg_cmd[$i]['EXAL0'][$j] . "\n";
        }
      }

      if(count($emg_cmd[$i]['TW']) > 0){
        $command.= "!DEVICE:TW!\n";
        for($j = 0; $j < count($emg_cmd[$i]['TW']); $j++){
          $command.=$emg_cmd[$i]['TW'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['HOWL']) > 0){
        $command.= "!DEVICE:HOWL!\n";
        for($j = 0; $j < count($emg_cmd[$i]['HOWL']); $j++){
          $command.=$emg_cmd[$i]['HOWL'][$j] . "\n";
        }
      }
      if(count($emg_cmd[$i]['ACCSD']) > 0){
        $command.= "!DEVICE:ACCSD!\n";
        for($j = 0; $j < count($emg_cmd[$i]['ACCSD']); $j++){
          $command.=$emg_cmd[$i]['ACCSD'][$j] . "\n";
        }
      }

      $command.= "@C";  
      fwrite($output,$command);   //Se escriben los datos en los archivos con el nombre del EMG
      fclose($output);  //Se cierra el archivo con el nombre del EMG
      $command = "";

    } //Fin: ISDN(REMOTE)
     
    // EAR
    if(count($emg_cmd[$i]['ETAUS']) > 0 ){       
      $output = fopen($mainFolder . "/CMD1_" . trim($emg_cmd[$i]['EMG']) . "_EAR.txt","wb");
      $command.= "@L " ."LOG1_" . trim($emg_cmd[$i]['EMG']) . ".txt"."\n";  //Se guardan los datos en archivos con el nombre del EMG
      $command.= "CACLP;" . "\n";
      $command.= "IOEXP;" . "\n";
      $command.= "EXMCP;" . "\n";
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ";\n";      
      $command.= "EXEGP:EMG=" . $emg_cmd[$i]['EMG'] . ",CSTINFO" . ";\n";
      $command.= "EXCPP:EMG=" . $emg_cmd[$i]['EMG'] . ",RDL" . ";\n";
      $command.= "NNSTP:MACCG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "PWESP:MACCG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "NNUPP:MACCG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXTCP:MACCG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXPCP:MACCG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXPUP:MACCG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "NNCDP:MACCG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXHWP:MACCG=" . $emg_cmd[$i]['EMG'] . ";\n";
      $command.= "EXEDP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      $command.= "EXEPP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      $command.= "EXPOP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL" . ";\n";
      $command.= "EXEIP:EMG=" . $emg_cmd[$i]['EMG'] . ",EM=ALL,LARGE" . ";\n";
         
      if(count($emg_cmd[$i]['TW']) > 0){
        $command.= "!DEVICE:TW!\n";
        for($j = 0; $j < count($emg_cmd[$i]['TW']); $j++){
          $command.=$emg_cmd[$i]['TW'][$j] . "\n";
        }
      }
  
      $command.= "@C";
      fwrite($output,$command);   //Se escriben los datos en los archivos con el nombre del EMG
      fclose($output);    //Se cierra el archivo con el nombre del EMG
      $command = "";
    } //Fin: EAR
    
  } //Fin: Busca dispositivos en EQM
  
  fclose($fileStatus);  //Se cierra el archivo...


rename($destino . $EMG, '../PROCESADOS/' . $EMG);
//header('Location: ' . $_SERVER['HTTP_REFERER']);
// echo json_encode($emg_cmd);

/*
$output = fopen("salida/RT2.txt","wb");
$command = "";
for($i = 0; $i < count($emg_cmd); $i++){
  if(count($emg_cmd[$i]['RT2']) > 0){
    $command.= "!EMG:".$emg_cmd[$i]['EMG']."!\n";
    for($j = 0; $j < count($emg_cmd[$i]['RT2']); $j++){
      $command.=$emg_cmd[$i]['RT2'][$j]."\n";
    }
  }
}
fwrite($output,$command);
fclose($output);
*/

?>
