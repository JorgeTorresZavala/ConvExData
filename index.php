
<!-- Front controller -->
<!-- Maneja las rutas que reciba la URL
para poder instanciar los controladores
que están dentro del proyecto -->


<?php

  require_once ("models/conectarBDD.php");
  
  //Si no hay datos (controlador) en la URL
  if(!isset($_GET['ctrl'])){  
    require_once ("controllers/inicioControlador.php");
    $controlador = new InicioControlador();
    call_user_func(array($controlador,"Inicio")); //Inicio es un método que tienen todos los controladores para que carquen una vista de inicio.
  }
  
  else{
    $controlador = $_GET['ctrl'];
    require_once ("controllers/$controlador.Controlador.php");
    $controlador = ucwords($controlador)."Controlador";
    $controlador = new $controlador;
    $accion = isset($_GET['action']) ? $_GET['action']:"Inicio";  //Inicio es un método que tienen todos los controladores para que carquen una vista de inicio.
    call_user_func(array($controlador,$accion));
  }
?>
