
<?php 

  // Devuelve el contenido de un archivo en un array:

  $contenido = file("files/EXROP_Playas.txt", FILE_IGNORE_NEW_LINES);

    //Datos iniciales...
    echo "<pre>";
    $R_JT = array();  //Arreglo para guardar los datos de las rutas de JTs
    $R_KR2 = array();  //Arreglo para guardar los datos de las rutas de KRs
    $R_CSK = array();  //Arreglo para guardar los datos de las rutas de CSKs
    $R_UPDN3 = array();  //Arreglo para guardar los datos de las rutas de UPDN3s
    $R_CJ = array();  //Arreglo para guardar los datos de las rutas de CJs
    $R_LITS = array();  //Arreglo para guardar los datos de las rutas de LITSs
    $R_RT2 = array();  //Arreglo para guardar los datos de las rutas de RT2s
    $R_RT3 = array();  //Arreglo para guardar los datos de las rutas de RT3s
    $DEV_R = array();  //Arreglo para guardar los datos de los dispositovs de las rutas

    //Lectura del contenido del arreglo...
    foreach ($contenido as $linea) {
      //echo "Valor actual de \$contenido: $linea.\n";
      $Pos_Titulo=strpos($linea, "DATA");
      $Pos_JT=strpos($linea, "=JT");
      $Pos_KR2=strpos($linea, "=KR");
      $Pos_CSK=strpos($linea, "=CSK");
      $Pos_UPDN3=strpos($linea, "=UPDN3");
      $Pos_CJ=strpos($linea, "=CJ");
      $Pos_LITS=strpos($linea, "=LITS");
      $Pos_EMG=strpos($linea, "EMG=");
      $Pos_RT2=strpos($linea, "=RT2");
      $Pos_RT3=strpos($linea, "=RT3");
      
      if ($Pos_Titulo>1){  //DATA
        $Titulo=$linea;
        //echo $Titulo."<br>";
        $ROUTE=substr($linea,0,8);
        $DETY=substr($linea,9,8);
        if($ROUTE="ROUTE"){
          echo "$Titulo"."<br>";
        }
      }
      
      if ($Pos_JT>0){ 
        $ROUTE=substr($linea,0,8);
        $R=strlen(trim($ROUTE));
        //echo $R."<br>";

        if($R>0){
          $JT=substr($linea,14,8);
          echo $ROUTE.$JT."<br>";
          array_push($R_JT, "$ROUTE");
        }        
      }

      if ($Pos_KR2>0){ 
        $ROUTE=substr($linea,0,8);
        $R=strlen(trim($ROUTE));
        //echo $R."<br>";

        if($R>0){
          $KR2=substr($linea,14,8);
          echo $ROUTE.$KR2."<br>";
          array_push($R_KR2, "$ROUTE");
        }        
      }

      if ($Pos_CSK>0){ 
        $ROUTE=substr($linea,0,8);
        $R=strlen(trim($ROUTE));
        //echo $R."<br>";
        if($R>0){
          $CSK=substr($linea,14,8);
          echo $ROUTE.$CSK."<br>";
          array_push($R_CSK, "$ROUTE");
        }       
      }

      if ($Pos_UPDN3>0){ 
        $ROUTE=substr($linea,0,8);
        $R=strlen(trim($ROUTE));
        //echo $R."<br>";
        if($R>0){
          $UPDN3=substr($linea,14,8);
          echo $ROUTE.$UPDN3."<br>";
          array_push($R_UPDN3, "$ROUTE");
        }       
      }

      if ($Pos_CJ>0){ 
        $ROUTE=substr($linea,0,8);
        $EMG=substr($linea,23,10);
        $R=strlen(trim($ROUTE));
        //echo $R."<br>";
        if($R>0&$Pos_EMG>0){
          $CJ=substr($linea,14,8);
          echo $ROUTE.$CJ.$EMG."<br>";
          array_push($R_CJ, "$ROUTE");
        }       
      }

      if ($Pos_LITS>0){ 
        $ROUTE=substr($linea,0,8);
        $R=strlen(trim($ROUTE));
        //echo $R."<br>";
        if($R>0){
          $LITS=substr($linea,14,8);
          echo $ROUTE.$LITS."<br>";
          array_push($R_LITS, "$ROUTE");
        }       
      }

      if ($Pos_RT2>0){ 
        $ROUTE=substr($linea,0,8);
        $R=strlen(trim($ROUTE));
        //echo $R."<br>";
        if($R>0){
          $RT2=substr($linea,14,8);
          echo $ROUTE.$RT2."<br>";
          array_push($R_RT2, "$ROUTE");
        }       
      }

      if ($Pos_RT3>0){ 
        $ROUTE=substr($linea,0,8);
        $R=strlen(trim($ROUTE));
        //echo $R."<br>";
        if($R>0){
          $RT3=substr($linea,14,8);
          echo $ROUTE.$RT3."<br>";
          array_push($R_RT3, "$ROUTE");
        }       
      }
 
    } //Fin: Lectura del contenido del arreglo...
      
    //print_r($R_RT2);
    
?>
