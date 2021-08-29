<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Syntropy</title>
  <link rel="shortcut icon" href="../img/logoTransparente.ico">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
  <!-- My custom styles -->
  <link href="../css/style1.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #3333;
    }

    .subnav {
      color: red;
    }
  </style>
 
</head>

<body>

  <div class="container-fluid navbar-light sticky-top" style="background-color: #e3f2fd;">
    <nav class="navbar navbar-expand-md container navbar-light" style="background-color: #e3f2fd;">
      <!-- Logo -->
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">
          <img src="../img/logoTransparente.png" width="50" height="50" class="d-inline-block" alt="" loading="lazy">
          <h0 class="display-7 font-italic">Syntropy</h0> 
          <br>
          <h0 class="display-7 font-italic">Telecomunicaciones</h0>          
        </a>       
      </nav>  <!-- /Logo -->
      <!-- Botón: Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> <!-- /Botón: Collapse -->
      <!-- Menú del botón Collapse -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
          <li class="nav-item px-4 active">
            <a class="nav-link font-weight-bold font-italic" href="paginaPrincipal.php">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link font-weight-bold font-italic" href="ARCO.php">ARCO</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link font-weight-bold font-italic" href="Compactacion.php">Compactación</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link font-weight-bold font-italic" href="Consolidacion.php">Consolidación</a>
          </li>
        </ul>
      </div>  <!-- /Menú del botón Collapse -->
    </nav>
  </div>
 
 <!-- Encabezado -->
  <div class="container">       
    <div class="row justify-content-center pt-5">
      <h3 class="display-4" style=color:#0E8744;>CONSOLIDACIÓN</h3>
    </div>      
    <div class="row justify-content-center pb-2">
      <h3>
        <small>(Agrupar físicamente en un sóla central, las que existan en un mismo edificio)</small>
      </h3>
    </div>
  </div>  <!-- /Encabezado -->
  <hr>

  <SECTION>
    <!-- Contenedor: acordeón -->
    <div class="container">
      <!-- Acordeón -->
      <div class="accordion" id="CON_acordeon">
        <!-- Pestaña: Información General del Proyecto HOST -->
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#IGP-H" aria-expanded="true" aria-controls="IGP-H">
                IGP-H (Información General del Proyecto, Host).
              </button>
            </h2>
          </div>
          <div id="IGP-H" class="collapse" aria-labelledby="headingOne" data-parent="#CON_acordeon">
            <!-- Tarjeta: Información General del Proyecto, HOST -->
            <div class="card-body">
              <h5 class="card-title">Selecciona el tipo de equipo</h5>
              <div class="container">
                <div class="row">
                  <div class="col">
                    <span class="radio">
                    <label>
                      <input type="radio" class="radiobox" name="style-0a2">
                    <span> AXE10</span> 
                    </label>
                  </div>
                  <div class="col">
                    <span class="radio">
                    <label>
                      <input type="radio" class="radiobox" name="style-0a2">
                    <span> S1240</span> 
                    </label>
                  </div>
                  <div class="col">
                    <span class="radio">
                    <label>
                      <input type="radio" class="radiobox" name="style-0a2">
                    <span> 5E400</span> 
                    </label>
                  
                  </div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
            
              <!-- Buscador -->
              <div class="row">
                <!-- Dirección Divisional -->
                <div class="col-sm-4">
                  <div class="card">
                    <!-- Datos: Diección divisional -->
                    <div class="card-body">
                      <h5 class="card-title">Dirección Divisional</h5>
                      <!-- Opción: /Dirección Divisional -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Direccion">Dirección</label>
                        </div>
                        <select class="custom-select" id="Direccion">
                          <option selected>Dirección Divisional...</option>
                          <option value="1">Metro Poniente</option>
                          <option value="2">Metro Sur</option>
                          <option value="3">Norte</option>
                        </select>                       
                      </div>  <!-- Opción: /Dirección Divisional -->

                      <!-- Opción: /Área Operativa -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="AreaOperativa">Área Operativa</label>
                        </div>
                        <select class="custom-select" id="AreaOperativa">
                          <option selected>Área Operativa...</option>
                          <option value="1">Metro Sur Área I</option>
                          <option value="2">Metro Sur Área II</option>
                          <option value="3">Metro Sur Área III</option>
                          <option value="4">Metro Poniente Área I</option>
                          <option value="5">Metro Poniente Área II</option>
                          <option value="6">Metro Poniente Área III</option>
                        </select>                        
                      </div>  <!-- Opción: /Área Operativa -->

                      <!-- Opción: /Central -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Central">Central</label>
                        </div>
                        <select class="custom-select" id="Central">
                          <option selected>Central...</option>
                          <option value="1">Arboledad 3-5</option>
                          <option value="2">Bosques 2-4</option>
                          <option value="3">Ciudad López Mateos 2-5</option>
                          <option value="4">Cuajimalpa (Contadero) 1-2</option>
                          <option value="5">Echegaray 3-6</option>
                          <option value="6">Madrid 7</option>
                          <option value="7">Molinito 1-3</option>
                        </select>                        
                      </div>  <!-- Opción: /Central -->

                      <!-- Opción: /Nombre corto -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="NomCorto">Nombre corto</label>
                        </div>
                        <select class="custom-select" id="NomCorto">
                          <option selected>Nombre corto...</option>
                          <option value="1">AR03</option>
                          <option value="2">BO02</option>
                          <option value="3">CLM2</option>
                          <option value="4">CUJ2</option>
                          <option value="5">EC03</option>
                          <option value="6">MA07</option>
                          <option value="7">MN01</option>
                        </select>                        
                      </div>  <!-- Opción: /Nombre corto -->

                      <!-- Opción: /CLLI -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="CLLI">CLLI</label>
                        </div>
                        <select class="custom-select" id="CLLI">
                          <option selected>CLLI...</option>
                          <option value="1">CLMTXMARDS3</option>
                          <option value="2">CDMXDFBODS2</option>
                          <option value="3">CDMXDFCJDS2</option>
                          <option value="4">NCPNXMECDS3</option>
                          <option value="5">CDMXDFMADS7</option>
                          <option value="6">NCPNXMMNDS1</option>
                        </select>                        
                      </div>  <!-- Opción: /CLLI -->
                    </div>  

                  </div>  <!-- /Datos: Dirección divisional -->

                </div>  <!-- /Dirección Divisional -->
               
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">                     
                      <h5 class="card-title">Tipo de equipo:</h5>
                      
                      <!-- Tarjeta: Tipo de equipo -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">                        
                          <label class="input-group-text" for="TipoEqpo">Tipo de equipo</label>                       
                        </div>                        
                        <select class="custom-select" id="TipoEqpo">
                          <option selected>Tipo de equipo...</option>
                          <option value="1">AXE</option>
                          <option value="2">S-1240</option>
                          <option value="3">5ESS</option>
                          <option value="4">RSS</option>
                          <option value="5">CSS</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Tipo de equipo -->

                        <!-- Tarjeta: Tipo de CPU -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="CPU">Tipo de CPU</label>
                        </div>
                        <select class="custom-select" id="CPU">
                          <option selected>CPU...</option>
                          <option value="1">211 11</option>
                          <option value="2">212-11</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Tipo de CPU -->
                      
                      <!-- Tarjeta: Tipo de IO -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="CPU_HW">Tipo de IO</label>
                        </div>
                        <select class="custom-select" id="CPU_HW">
                          <option selected>Tipo de IO...</option>
                          <option value="1">IOG11</option>
                          <option value="2">IOG20</option>
                          <option value="3">APG30</option>
                          <option value="4">APG40</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Tipo de IO -->

                      <!-- Tarjeta: Tipo de HW -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="HW">Tipo de HW</label>
                        </div>
                        <select class="custom-select" id="HW">
                          <option selected>Tipo de HW...</option>
                          <option value="1">BYB 202</option>
                          <option value="2">BYB 501</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Tipo de HW -->

                      <!-- CRUD -->
                      <div class="">
                        <span>
                          <button type="button" class="btn btn-primary btn-sm">Buscar</button>
                        </span> 
                        <span><button type="button" class="btn btn-warning btn-sm">Actualizar</button>
                        </span>                
                      </div>  <!-- /CRUD -->  

                    </div>
                  </div>
                </div>  

                <!-- Ubicación -->
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Ubicación</h5>

                      <!-- Tarjeta: Estado -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Estado">Estado</label>
                        </div>
                        <select class="custom-select" id="Estado">
                          <option selected>Estado...</option>
                          <option value="1">México</option>
                          <option value="2">CDMX</option>
                          <option value="3">Hidalgo</option>
                          <option value="4">Morelos</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Estado -->

                      <!-- Tarjeta: Municipio -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Municipio">Municipio</label>
                        </div>
                        <select class="custom-select" id="Municipio">
                          <option selected>Municipio...</option>
                          <option value="1">Atizapán de Zaraoza</option>
                          <option value="2">Miguel Hidalgo</option>
                          <option value="3">Naucalpan de Juárez</option>
                          <option value="4">Azcapotzalco</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Municipio -->

                      <!-- Tarjeta: Localidad -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Localidad">Localidad</label>
                        </div>
                        <select class="custom-select" id="Localidad">
                          <option selected>Localidad...</option>
                          <option value="1">La Quebrada</option>
                          <option value="2">Condesa</option>
                          <option value="3">Guerrero</option>
                          <option value="4">Doctores</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Localidad -->

                      <!-- Tarjeta: Domicilio -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Domicilio</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                      </div>  <!-- /Tarjeta: Domicilio -->

                    </div>
                  </div>
                </div>  <!-- /Ubicación -->

              </div>  <!-- /Buscador -->
            
            </div>  <!-- Tarjeta: /Información General del Proyecto-->
          </div>
        </div>  <!-- /Pestaña: Información General del Proyecto HOST -->
        <!-- Pestaña: Información General del Proyecto GUEST -->
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#IGP-G" aria-expanded="false" aria-controls="IGP-G">
              IGP-G (Información General del Proyecto, Guest).
            </button>
            </h2>
          </div>
          <div id="IGP-G" class="collapse" aria-labelledby="headingTwo" data-parent="#CON_acordeon">
            <!-- Tarjeta: Información General del Proyecto, GUEST -->
            <div class="card-body">
              <h5 class="card-title">Selecciona el tipo de equipo</h5> 
              <div class="container">
                <div class="row">
                  <div class="col">
                    <span class="radio">
                    <label>
                      <input type="radio" class="radiobox" name="style-0a2">
                    <span> AXE10</span> 
                    </label>
                  </div>
                  <div class="col">
                    <span class="radio">
                    <label>
                      <input type="radio" class="radiobox" name="style-0a2">
                    <span> S1240</span> 
                    </label>
                  </div>
                  <div class="col">
                    <span class="radio">
                    <label>
                      <input type="radio" class="radiobox" name="style-0a2">
                    <span> 5E400</span> 
                    </label>
                  
                  </div>
                  <div class="col"></div>
                  <div class="col"></div>
                </div>
              </div>
              <!-- Buscador -->
              <div class="row">
                <!-- Dirección Divisional -->
                <div class="col-sm-4">
                  <div class="card">
                    <!-- Datos: Diección divisional -->
                    <div class="card-body">
                      <h5 class="card-title">Dirección Divisional</h5>
                      <!-- Opción: /Dirección Divisional -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Direccion">Dirección</label>
                        </div>
                        <select class="custom-select" id="Direccion">
                          <option selected>Dirección Divisional...</option>
                          <option value="1">Metro Poniente</option>
                          <option value="2">Metro Sur</option>
                          <option value="3">Norte</option>
                        </select>                       
                      </div>  <!-- Opción: /Dirección Divisional -->

                      <!-- Opción: /Área Operativa -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="AreaOperativa">Área Operativa</label>
                        </div>
                        <select class="custom-select" id="AreaOperativa">
                          <option selected>Área Operativa...</option>
                          <option value="1">Metro Sur Área I</option>
                          <option value="2">Metro Sur Área II</option>
                          <option value="3">Metro Sur Área III</option>
                          <option value="4">Metro Poniente Área I</option>
                          <option value="5">Metro Poniente Área II</option>
                          <option value="6">Metro Poniente Área III</option>
                        </select>                        
                      </div>  <!-- Opción: /Área Operativa -->

                      <!-- Opción: /Central -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Central">Central</label>
                        </div>
                        <select class="custom-select" id="Central">
                          <option selected>Central...</option>
                          <option value="1">Arboledad 3-5</option>
                          <option value="2">Bosques 2-4</option>
                          <option value="3">Ciudad López Mateos 2-5</option>
                          <option value="4">Cuajimalpa (Contadero) 1-2</option>
                          <option value="5">Echegaray 3-6</option>
                          <option value="6">Madrid 7</option>
                          <option value="7">Molinito 1-3</option>
                        </select>                        
                      </div>  <!-- Opción: /Central -->

                      <!-- Opción: /Nombre corto -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="NomCorto">Nombre corto</label>
                        </div>
                        <select class="custom-select" id="NomCorto">
                          <option selected>Nombre corto...</option>
                          <option value="1">AR03</option>
                          <option value="2">BO02</option>
                          <option value="3">CLM2</option>
                          <option value="4">CUJ2</option>
                          <option value="5">EC03</option>
                          <option value="6">MA07</option>
                          <option value="7">MN01</option>
                        </select>                        
                      </div>  <!-- Opción: /Nombre corto -->

                      <!-- Opción: /CLLI -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="CLLI">CLLI</label>
                        </div>
                        <select class="custom-select" id="CLLI">
                          <option selected>CLLI...</option>
                          <option value="1">CLMTXMARDS3</option>
                          <option value="2">CDMXDFBODS2</option>
                          <option value="3">CDMXDFCJDS2</option>
                          <option value="4">NCPNXMECDS3</option>
                          <option value="5">CDMXDFMADS7</option>
                          <option value="6">NCPNXMMNDS1</option>
                        </select>                        
                      </div>  <!-- Opción: /CLLI -->
                    </div>  

                  </div>  <!-- /Datos: Dirección divisional -->

                </div>  <!-- /Dirección Divisional -->
               
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">                     
                      <h5 class="card-title">Tipo de equipo:</h5>
                      
                      <!-- Tarjeta: Tipo de equipo -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">                        
                          <label class="input-group-text" for="TipoEqpo">Tipo de equipo</label>                       
                        </div>                        
                        <select class="custom-select" id="TipoEqpo">
                          <option selected>Tipo de equipo...</option>
                          <option value="1">AXE</option>
                          <option value="2">S-1240</option>
                          <option value="3">5ESS</option>
                          <option value="4">RSS</option>
                          <option value="5">CSS</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Tipo de equipo -->

                        <!-- Tarjeta: Tipo de CPU -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="CPU">Tipo de CPU</label>
                        </div>
                        <select class="custom-select" id="CPU">
                          <option selected>CPU...</option>
                          <option value="1">211 11</option>
                          <option value="2">212-11</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Tipo de CPU -->
                      
                      <!-- Tarjeta: Tipo de IO -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="CPU_HW">Tipo de IO</label>
                        </div>
                        <select class="custom-select" id="CPU_HW">
                          <option selected>Tipo de IO...</option>
                          <option value="1">IOG11</option>
                          <option value="2">IOG20</option>
                          <option value="3">APG30</option>
                          <option value="4">APG40</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Tipo de IO -->

                      <!-- Tarjeta: Tipo de HW -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="HW">Tipo de HW</label>
                        </div>
                        <select class="custom-select" id="HW">
                          <option selected>Tipo de HW...</option>
                          <option value="1">BYB 202</option>
                          <option value="2">BYB 501</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Tipo de HW -->

                      <!-- CRUD -->
                      <div class="">
                        <span>
                          <button type="button" class="btn btn-primary btn-sm">Buscar</button>
                        </span> 
                        <span><button type="button" class="btn btn-warning btn-sm">Actualizar</button>
                        </span>                
                      </div>  <!-- /CRUD -->  

                    </div>
                  </div>
                </div>  

                <!-- Ubicación -->
                <div class="col-sm-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Ubicación</h5>

                      <!-- Tarjeta: Estado -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Estado">Estado</label>
                        </div>
                        <select class="custom-select" id="Estado">
                          <option selected>Estado...</option>
                          <option value="1">México</option>
                          <option value="2">CDMX</option>
                          <option value="3">Hidalgo</option>
                          <option value="4">Morelos</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Estado -->

                      <!-- Tarjeta: Municipio -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Municipio">Municipio</label>
                        </div>
                        <select class="custom-select" id="Municipio">
                          <option selected>Municipio...</option>
                          <option value="1">Atizapán de Zaraoza</option>
                          <option value="2">Miguel Hidalgo</option>
                          <option value="3">Naucalpan de Juárez</option>
                          <option value="4">Azcapotzalco</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Municipio -->

                      <!-- Tarjeta: Localidad -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Localidad">Localidad</label>
                        </div>
                        <select class="custom-select" id="Localidad">
                          <option selected>Localidad...</option>
                          <option value="1">La Quebrada</option>
                          <option value="2">Condesa</option>
                          <option value="3">Guerrero</option>
                          <option value="4">Doctores</option>
                        </select>                        
                      </div>  <!-- /Tarjeta: Localidad -->

                      <!-- Tarjeta: Domicilio -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Domicilio</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                      </div>  <!-- /Tarjeta: Domicilio -->

                    </div>
                  </div>
                </div>  <!-- /Ubicación -->

              </div>  <!-- /Buscador -->
            </div>  <!-- Tarjeta: /Información General del Proyecto, GUEST -->
          </div>
        </div>  <!-- /Pestaña: Información General del Proyecto GUEST -->        
        <!-- Pestaña: Resultados -->
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#CON_Resultados" aria-expanded="false" aria-controls="CON_Resultados">
                Resultados
              </button>
            </h2>
          </div>
          <div id="CON_Resultados" class="collapse" aria-labelledby="headingThree" data-parent="#CON_acordeon">
            <!-- Tarjeta: Resultados -->
            <div class="card-body">
              <h5 class="card-title">Resultados de ambas centrales</h5> 
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <h6>Datos de la central HOST</h6>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-6">
                    <h6>Datos de la central GUEST</h6>
                    <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
              <!-- Tabulador -->
                          
              <!-- /Tabulador -->
            </div>  <!-- /Tarjeta: Resultados -->
          </div>
        </div>  <!-- /Pestaña: Resultados -->
      </div>  <!-- /Acordeón -->
    </div>  <!-- /Contenedor: acordeón-->
  </SECTION>

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>