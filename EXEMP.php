
<?php 
  $rutaDelArchivo = "files/EXEMP_Playas.txt";
  if(!file_exists ($rutaDelArchivo)) echo "El archivo no Existe";
  else{
    $conexion = new PDO('mysql:host=localhost;dbname=syntropy',"root", "",array(PDO::ATTR_PERSISTENT => true));
    try { 
      /* Creamos La Conexión con PDO, modificar los valores respectivos*/
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      /* Creamos la Transacción*/
      $conexion->beginTransaction();
      $sentencia = $conexion->prepare("INSERT INTO exemp (RP,TIPO,EM,EQM,TWIN,CNTRL,PP,ESTADO) VALUES (:RP,:TIPO,:EM,:EQM,:TWIN,:CNTRL,:PP,:ESTADO)");
      $recurso = fopen($rutaDelArchivo, "r"); 
                                         
      //Lectura linea por línea, verificando que no sea el final del archivo con feof
      while (!feof($recurso)) { 
         
        //$linea = file($rutaDelArchivo, FILE_IGNORE_NEW_LINES);
        $linea = fgets($recurso); 
        
        //Datos iniciales...
        echo "<pre>";
        $Pos_PRIM=strpos($linea, "PRIM");
        $Pos_SEC=strpos($linea, "SEC");
        
        if($Pos_PRIM>0||$Pos_SEC>0){

          $RP=substr($linea,0,4);
          $TIPO=substr($linea,6,6);
          $EM=substr($linea,13,2);
          $EQM=substr($linea,17,20);
          $TWIN=substr($linea,43,4);
          $CNTRL=substr($linea,49,5);
          $PP=substr($linea,56,2);
          $ESTADO=substr($linea,63,6);
          echo $RP.$TIPO.$EM.$EQM.$TWIN.$CNTRL.$PP.$ESTADO."<br>";

          $sentencia->bindValue(':RP', $RP, PDO::PARAM_STR);
          $sentencia->bindValue(':TIPO', $TIPO , PDO::PARAM_STR);
          $sentencia->bindValue(':EM', $EM , PDO::PARAM_STR);
          $sentencia->bindValue(':EQM', $EQM , PDO::PARAM_STR);
          $sentencia->bindValue(':TWIN', $TWIN, PDO::PARAM_STR);
          $sentencia->bindValue(':CNTRL', $CNTRL, PDO::PARAM_STR);
          $sentencia->bindValue(':PP', $PP, PDO::PARAM_STR);
          $sentencia->bindValue(':ESTADO', $ESTADO, PDO::PARAM_STR);
          
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
