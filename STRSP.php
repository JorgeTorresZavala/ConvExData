
<?php 

  $rutaDelArchivo = "files/STRSP_Playas.txt";
  if(!file_exists ($rutaDelArchivo)) echo "El archivo no Existe";
  else{
    $conexion = new PDO('mysql:host=localhost;dbname=syntropy',"root", "",array(PDO::ATTR_PERSISTENT => true));
    try { 
      /* Creamos La Conexión con PDO, modificar los valores respectivos*/
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      /* Creamos la Transacción*/
      $conexion->beginTransaction();
      $sentencia = $conexion->prepare("INSERT INTO strsp (R,NDV,NOCC,NIDL,NBLO,RSTAT) VALUES (:R,:NDV,:NOCC,:NIDL,:NBLO,:RSTAT)");
      $recurso = fopen($rutaDelArchivo, "r"); 

      //Lectura linea por línea, verificando que no sea el final del archivo con feof
      while (!feof($recurso)) { 
         
        //$linea = file($rutaDelArchivo, FILE_IGNORE_NEW_LINES);
        $linea = fgets($recurso); 
        
        //Datos iniciales...
        echo "<pre>";
        $Pos_NORES=strpos($linea, "NORES");
        $Pos_BLOC=strpos($linea, "BLOC");
        
        if($Pos_NORES>0||$Pos_BLOC>0){
          $R=substr($linea,0,8);
          $NDV=substr($linea,9,6);
          $NOCC=substr($linea,15,6);
          $NIDL=substr($linea,21,6);
          $NBLO=substr($linea,26,6);
          $RSTAT=substr($linea,32,6);
          echo $R.$NDV.$NOCC.$NIDL.$NBLO.$RSTAT."<br>";

          $sentencia->bindValue(':R', $R, PDO::PARAM_STR);
          $sentencia->bindValue(':NDV', $NDV , PDO::PARAM_STR);
          $sentencia->bindValue(':NOCC', $NOCC , PDO::PARAM_STR);
          $sentencia->bindValue(':NIDL', $NIDL , PDO::PARAM_STR);
          $sentencia->bindValue(':NBLO', $NBLO, PDO::PARAM_STR);
          $sentencia->bindValue(':RSTAT', $RSTAT, PDO::PARAM_STR);
          
          //$sentencia->bindValue(':estadoRuta', $estadoRuta, PDO::PARAM_STR);
          $sentencia->execute();
        }
        
      } 
        /* Aplicamos los Cambios en La BD */
      $conexion->commit();
    }
    catch (Exception $e) {
         /* Cancelamos La Transacción por si exista Error*/
        $conexion->rollBack();
        echo "Se Presento Un Error :  " . $e->getMessage();
    }
  }

?>
