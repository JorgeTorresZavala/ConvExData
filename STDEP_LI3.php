
<?php 

  $rutaDelArchivo = "files/STDEP_LI3-Playas.txt";
  if(!file_exists ($rutaDelArchivo)) echo "El archivo no Existe";
  else{
    $conexion = new PDO('mysql:host=localhost;dbname=syntropy',"root", "",array(PDO::ATTR_PERSISTENT => true));
    try { 
      /* Creamos La Conexión con PDO, modificar los valores respectivos*/
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      /* Creamos la Transacción*/
      $conexion->beginTransaction();
      $sentencia = $conexion->prepare("INSERT INTO stdep_li3 (DEV,ESTADO,BLS,FTYPE,ADM,ABS1,SNB,SNBST,LIST) VALUES (:DEV,:ESTADO,:BLS,:FTYPE,:ADM,:ABS1,:SNB,:SNBST,:LIST)");
      $recurso = fopen($rutaDelArchivo, "r"); 
                                                                             
      //Lectura linea por línea, verificando que no sea el final del archivo con feof
      while (!feof($recurso)) { 
         
        //$linea = file($rutaDelArchivo, FILE_IGNORE_NEW_LINES);
        $linea = fgets($recurso); 
        
        //Datos iniciales...
        echo "<pre>";
        $Pos_LI3=strpos($linea, "LI3-");
        $Pos_PRIMA=strpos($linea, "H'");
        
        if($Pos_PRIMA>0){                                            
          $DEV=substr($linea,0,10);
          $ESTADO=substr($linea,15,4);
          $BLS=substr($linea,22,3);
          $FTYPE=substr($linea,27,4);
          $ADM=substr($linea,34,3);
          $ABS1=substr($linea,39,3);
          $SNB=substr($linea,45,10);
          $SNBST=substr($linea,59,5);
          $LIST=substr($linea,66,4);
          echo $DEV.$ESTADO.$BLS.$FTYPE.$ADM.$ABS1.$SNB.$SNBST.$LIST."<br>";

          $sentencia->bindValue(':DEV', $DEV, PDO::PARAM_STR);
          $sentencia->bindValue(':ESTADO', $ESTADO, PDO::PARAM_STR);
          $sentencia->bindValue(':BLS', $BLS, PDO::PARAM_STR);
          $sentencia->bindValue(':FTYPE', $FTYPE, PDO::PARAM_STR);
          $sentencia->bindValue(':ADM', $ADM, PDO::PARAM_STR);
          $sentencia->bindValue(':ABS1', $ABS1, PDO::PARAM_STR);
          $sentencia->bindValue(':SNB', $SNB, PDO::PARAM_STR);
          $sentencia->bindValue(':SNBST', $SNBST, PDO::PARAM_STR);
          $sentencia->bindValue(':LIST', $LIST, PDO::PARAM_STR);
          
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
