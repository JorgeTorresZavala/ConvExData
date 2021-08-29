
<?php 
  //Clase
  class InicioControlador{
    private $modelo;

    public function __CONSTRUCT(){
      //echo "Este es el mensaje del constructor del controlador inicioControlador.php"."<br>";
    }
    public function Inicio(){
      //echo "Este mensaje viene del procedimiento InicioControlador";
      $bd = Conectar::conexion();  
      require_once ("views/encabezado.php");    
      require_once ("views/inicio/principal.php");
      require_once ("views/pie.php");     
    }
  }
  
?>