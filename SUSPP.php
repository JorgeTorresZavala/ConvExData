
<?php 

  $rutaDelArchivo = "files/SUSPP_Playas.txt";
  if(!file_exists ($rutaDelArchivo)) echo "El archivo no Existe";
  else{
    $conexion = new PDO('mysql:host=localhost;dbname=syntropy',"root", "",array(PDO::ATTR_PERSISTENT => true));
    try { 
      /* Creamos La Conexión con PDO, modificar los valores respectivos*/
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      /* Creamos la Transacción*/
      $conexion->beginTransaction();
      $sentencia = $conexion->prepare("INSERT INTO suspp (SNB) VALUES (:SNB)");
      $recurso = fopen($rutaDelArchivo, "r"); 
                                         
      $SNBs = array();  //Arreglo para guardar los datos de los SNBs
      
      //Lectura linea por línea, verificando que no sea el final del archivo con feof
      while (!feof($recurso)) { 
                                                        
        $linea = fgets($recurso); 
        
        echo "<pre>";
        $SNB1=trim(substr($linea,0,10));
        $SNB2=trim(substr($linea,15,10));
        $SNB3=trim(substr($linea,30,10));
        $SNB4=trim(substr($linea,45,10));
        $SNB5=trim(substr($linea,60,10));
        
        if(is_numeric($SNB1)){
          array_push($SNBs, "$SNB1");          
        }

        if(is_numeric($SNB2)){
          array_push($SNBs, "$SNB2");          
        }  
        
        if(is_numeric($SNB3)){
          array_push($SNBs, "$SNB3");          
        }

        if(is_numeric($SNB4)){
          array_push($SNBs, "$SNB4");          
        }

        if(is_numeric($SNB5)){
          array_push($SNBs, "$SNB5");          
        }
        
      } 

      //Cantidad de elementos del arrgelo SNBs
      $contador=count($SNBs);
      
      //Recorro todos los elementos del arreglo SNBs
      for($i=0; $i<$contador; $i++)
        {
          $sentencia->bindValue(':SNB',$SNBs[$i], PDO::PARAM_STR);
          $sentencia->execute();        
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
