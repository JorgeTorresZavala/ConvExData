
<?php 

  $rutaDelArchivo = "files/EXPOP_DEV-ALL_Playas.txt";
  if(!file_exists ($rutaDelArchivo)) echo "El archivo no Existe";
  else{
    $conexion = new PDO('mysql:host=localhost;dbname=syntropy',"root", "",array(PDO::ATTR_PERSISTENT => true));
    try { 
      /* Creamos La Conexión con PDO, modificar los valores respectivos*/
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      /* Creamos la Transacción*/
      $conexion->beginTransaction();
      $sentencia = $conexion->prepare("INSERT INTO expop_li3 (DEV,POS) VALUES (:DEV,:POS)");
      $recurso = fopen($rutaDelArchivo, "r"); 
                                         
      //Lectura linea por línea, verificando que no sea el final del archivo con feof
      while (!feof($recurso)) { 
                                                        
        //$linea = file($rutaDelArchivo, FILE_IGNORE_NEW_LINES);
        $linea = fgets($recurso); 
        
        //Datos iniciales...
        echo "<pre>";
        $Pos_DEV=strpos($linea, "I3-");
        $Pos_Guion=strrpos($linea, "-");
        
        if($Pos_DEV>0&$Pos_Guion>0){

          $DEV=substr($linea,0,10);
          $POS=substr($linea,17,18);
          echo $DEV.$POS."<br>";

          $sentencia->bindValue(':DEV', $DEV, PDO::PARAM_STR);
          $sentencia->bindValue(':POS', $POS , PDO::PARAM_STR);
          
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
