
<?php 

  $rutaDelArchivo = "files/NTCOP_Playas.txt";
  if(!file_exists ($rutaDelArchivo)) echo "El archivo no Existe";
  else{
    $conexion = new PDO('mysql:host=localhost;dbname=syntropy',"root", "",array(PDO::ATTR_PERSISTENT => true));
    try { 
      /* Creamos La Conexión con PDO, modificar los valores respectivos*/
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      /* Creamos la Transacción*/
      $conexion->beginTransaction();
      $sentencia = $conexion->prepare("INSERT INTO ntcop (SNT,SNTV,SNTP,DIP,DEV,DEVP) VALUES (:SNT,:SNTV,:SNTP,:DIP,:DEV,:DEVP)");
      $recurso = fopen($rutaDelArchivo, "r"); 
                                         
      //Lectura linea por línea, verificando que no sea el final del archivo con feof
      while (!feof($recurso)) { 
                                                        
        //$linea = file($rutaDelArchivo, FILE_IGNORE_NEW_LINES);
        $linea = fgets($recurso); 
        
        //Datos iniciales...
        echo "<pre>";
        $Pos_TSM=strpos($linea, "TSM-");
        $Pos_Guion=strrpos($linea, "-");
        
        if($Pos_TSM>0||$Pos_Guion>0){

          $SNT=substr($linea,0,10);
          $SNTV=substr($linea,17,5);
          $SNTP=substr($linea,23,9);
          $DIP=substr($linea,34,8);
          $DEV=substr($linea,42,20);
          $DEVP=substr($linea,64,3);
          echo $SNT.$SNTV.$SNTP.$DIP.$DEV.$DEVP."<br>";

          $sentencia->bindValue(':SNT', $SNT, PDO::PARAM_STR);
          $sentencia->bindValue(':SNTV', $SNTV , PDO::PARAM_STR);
          $sentencia->bindValue(':SNTP', $SNTP , PDO::PARAM_STR);
          $sentencia->bindValue(':DIP', $DIP , PDO::PARAM_STR);
          $sentencia->bindValue(':DEV', $DEV, PDO::PARAM_STR);
          $sentencia->bindValue(':DEVP', $DEVP, PDO::PARAM_STR);
          
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
