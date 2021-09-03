<!DOCTYPE html>
<html lang="es">

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
 
 <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

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
            <a class="nav-link font-weight-bold font-italic" href="">ARCO</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link font-weight-bold font-italic" href="Compactacion.php">Compactación</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link font-weight-bold font-italic" href="Consolidacion.php">Consolidación</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link font-weight-bold font-italic" href="Migracion.php">Migración</a>
          </li>
        </ul>
      </div>  <!-- /Menú del botón Collapse -->
    </nav>
  </div>

  <!-- Encabezado -->
  <div class="container">       
    <div class="row justify-content-center pt-5">
      <h3 class="display-4" style=color:#0E8744;>ARCO</h3>
    </div>      
    <div class="row justify-content-center pb-2">
      <h3>
        <small>(<em class="text-success font-weight-bolder">A</em>nálisis de <em class="text-success font-weight-bolder">R</em class="text-success font-weight-bolder">endimiento y <em class="text-success font-weight-bolder">C</em>onfiabilidad <em class="text-success font-weight-bolder">O</em>perativa)</small>
      </h3>
    </div>
  </div>  <!-- /Encabezado -->
  <hr>

  <SECTION>
    <!-- Contenedor: acordeón -->
    <div class="container">
      <!-- Acordeón -->
      <div class="accordion" id="ARCO_acordeon">
        <!-- Pestaña: Información General del Proyecto -->
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#ARCO_IGP" aria-expanded="true" aria-controls="ARCO_IGP">
                IGP (Información General del Proyecto)
              </button>
            </h2>
          </div>

          <div id="ARCO_IGP" class="collapse" aria-labelledby="headingOne" data-parent="#ARCO_acordeon">
            <!-- Tarjeta: Información General del Proyecto -->
            <div class="card-body">
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
                          <option value="1">TELNOR</option>
                          <option value="2">Metro Poniente</option>
                          <option value="3">Metro Sur</option>
                          <option value="4">Norte</option>
                        </select>                       
                      </div>  <!-- Opción: /Dirección Divisional -->

                      <!-- Opción: /Área Operativa -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="AreaOperativa">Área Operativa</label>
                        </div>
                        <select class="custom-select" id="AreaOperativa">
                          <option selected>Área Operativa...</option>
                          <option value="1">Tijuana</option>
                          <option value="2">Mexicali</option>
                          <option value="3">Metro Sur Área I</option>
                          <option value="4">Metro Sur Área II</option>
                          <option value="5">Metro Sur Área III</option>
                          <option value="6">Metro Poniente Área I</option>
                          <option value="7">Metro Poniente Área II</option>
                          <option value="8">Metro Poniente Área III</option>
                        </select>                        
                      </div>  <!-- Opción: /Área Operativa -->

                      <!-- Opción: /Central -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="Central">Central</label>
                        </div>
                        <select class="custom-select" id="Central">
                          <option selected>Central...</option>
                          <option value="1">Playas</option>
                          <option value="2">CTI-PIO</option>
                          <option value="3">Lomas</option>
                          <option value="4">Anáhuac</option>
                          <option value="5">Arboledad 3-5</option>
                          <option value="6">Bosques 2-4</option>
                          <option value="7">Ciudad López Mateos 2-5</option>
                          <option value="8">Cuajimalpa (Contadero) 1-2</option>
                          <option value="9">Echegaray 3-6</option>
                          <option value="10">Madrid 7</option>
                          <option value="11">Molinito 1-3</option>
                        </select>                        
                      </div>  <!-- Opción: /Central -->

                      <!-- Opción: /Nombre corto -->
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="NomCorto">Nombre corto</label>
                        </div>
                        <select class="custom-select" id="NomCorto">
                          <option selected>Nombre corto...</option>
                          <option value="1">PLY</option>
                          <option value="2">PIO</option>
                          <option value="3">LOM</option>
                          <option value="4">ANA</option>
                          <option value="5">AR03</option>
                          <option value="6">BO02</option>
                          <option value="7">CLM2</option>
                          <option value="8">CUJ2</option>
                          <option value="9">EC03</option>
                          <option value="10">MA07</option>
                          <option value="11">MN01</option>
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
                          <option value="2">CLMTXMARDS3</option>
                          <option value="3">CLMTXMARDS3</option>
                          <option value="4">CLMTXMARDS3</option>
                          <option value="5">CLMTXMARDS3</option>
                          <option value="6">CDMXDFBODS2</option>
                          <option value="7">CDMXDFCJDS2</option>
                          <option value="8">NCPNXMECDS3</option>
                          <option value="9">CDMXDFMADS7</option>
                          <option value="10">NCPNXMMNDS1</option>
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
                        <span><button type="button" class="btn btn-success btn-sm">Nuevo</button>
                        </span>   
                        </span>
                        <span><button type="button" class="btn btn-danger btn-sm">Borrar</button>
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
            
            </div>  <!-- Tarjeta: /Información General del Proyecto -->
          </div>
        </div>  <!-- /Pestaña: Información General del Proyecto -->
        <!-- Pestaña: Data Transcript -->
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ARCO_DataTranscript" aria-expanded="false" aria-controls="ARCO_DataTranscript">
              Obtención y regeneración de datos de central...
            </button>
            </h2>
          </div>
          <div id="ARCO_DataTranscript" class="collapse" aria-labelledby="headingTwo" data-parent="#ARCO_acordeon">
            <!-- Tarjeta: Data Transcript -->
            <div class="card-body">
              
              <div class="row">
                <!-- Tarjeta: Impresos -->
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Impresos de datos de la central</h5>
                      <p class="card-text">Selecciona el grupo de impresos original</p>
  
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="SSS">
                        <label class="form-check-label" for="SSS">
                            SSS (Subscriber Switch Subsystem)
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="GSS">
                        <label class="form-check-label" for="GSS">
                            GSS (Group Switch Subsystem)
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="TSS">
                        <label class="form-check-label" for="TSS">
                            TSS (Trunk Signalling Subsystem)
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="CPS">
                        <label class="form-check-label" for="CPS">
                            CPS (Central Processor Subsystem)
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="IOG">
                        <label class="form-check-label" for="IOG">
                            IOG (Input Output Group)
                        </label>
                      </div> 

                      <div class="input-group">
                        <form action = "http://localhost/ConvExData/controllers/Proc_EXEDP.php" method="post" enctype="multipart/form-data">
                          <div>
                            <input type="file" name="fichero" id="inputGroupFile02">
                          </div>
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Enviar</button>
                          </div>
                        </form>
                      </div>

                    </div>
                   
                  </div>

                </div>  <!-- /Tarjeta: Impresos -->

                <!-- Tarjeta: Data Transcript -->
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Data Transcript</h5>
                      <p class="">Regeneración de los impresos básicos...</p>
                      
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" id="inputGroupFile02" lang="es">
                          <label class="custom-file-label" for="inputGroupFile02" data-browse="Buscar">Busca el archivo de los impresos...</label>
                        </div>
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">Enviar</button>
                        </div>
                      </div>
                      
                      <p class="mt-4">Archivo de comandos que se enviarán a la central AXE...</p>                     
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" id="inputGroupFile02" lang="es">
                          <label class="custom-file-label" for="inputGroupFile02" data-browse="Buscar">Guarda el archivo de los impresos...</label>
                        </div>
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">Guardar</button>
                        </div>
                      </div>

                      <p class="mt-4">Regeneración de los impresos finales...</p>                     
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" id="inputGroupFile02" lang="es">
                          <label class="custom-file-label" for="inputGroupFile02" data-browse="Buscar">Último archivo regenerado...</label>
                        </div>
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">Guardar</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>  <!-- /Tarjeta: Data Transcript -->

              </div>

            </div>  <!-- Tarjeta: /Data Transcript -->
          </div>
        </div>  <!-- /Pestaña: Data Transcript -->        
        <!-- Pestaña: Resultados -->
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ARCO_Resultados" aria-expanded="false" aria-controls="ARCO_Resultados">
                Resultados
              </button>
            </h2>
          </div>
          <div id="ARCO_Resultados" class="collapse" aria-labelledby="headingThree" data-parent="#ARCO_acordeon">
            <!-- Tarjeta: Resultados -->
            <div class="card-body">
              <!-- Tabulador -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <!-- Tab:Resumen -->
                <li class="nav-item">
                  <a class="nav-link active" id="Resumen-tab" data-toggle="tab" href="#tab_Resumen" role="tab" aria-controls="tab_Resumen"
                    aria-selected="true">Resúmen</a>
                </li> <!-- /Tab:Resumen -->
                <!-- Tab:SSS -->
                <li class="nav-item">
                  <a class="nav-link" id="SSS-tab" data-toggle="tab" href="#tab_SSS" role="tab" aria-controls="tab_SSS"
                    aria-selected="false">SSS</a>
                </li> <!-- /Tab:SSS -->
                <!-- Tab:GSS -->
                <li class="nav-item">
                  <a class="nav-link" id="GSS-tab" data-toggle="tab" href="#tab_GSS" role="tab" aria-controls="tab_GSS"
                    aria-selected="false">GSS</a>
                </li> <!-- /Tab:GSS --> 
               <!-- Tab:TSS -->                
                <li class="nav-item">
                  <a class="nav-link" id="TSS-tab" data-toggle="tab" href="#tab_TSS" role="tab" aria-controls="tab_TSS"
                    aria-selected="false">TSS</a>
                </li> <!-- /Tab:TSS -->
                
                <!-- CPS --> 
                <li class="nav-item">
                  <a class="nav-link" id="CPS-tab" data-toggle="tab" href="#tab_CPS" role="tab" aria-controls="tab_CPS"
                    aria-selected="false">CPS</a>
                </li>                  
                <!-- /CPS -->               
              </ul>
              <!-- Opciones -->             
              <div class="tab-content" id="myTabContent">
                <!-- Op: Resumen -->
                <div class="tab-pane fade show active" id="tab_Resumen" role="tabpanel" aria-labelledby="tab_Resumen"><div class="card-body">
                  <h5 class="card-title">Datos generales</h5> 
                  
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="CLLI">CLLI</label>
                      </div>
                        <input type="text" class="form-control" id="CLLI">                       
                    </div>  
                  </div>

                  <div class="col-md-4">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="APZ">APZ</label>
                      </div>
                        <input type="text" class="form-control" id="APZ">                       
                    </div>  
                  </div>

                  <div class="col-md-4">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="IOG">IOG/APG</label>
                      </div>
                        <input type="text" class="form-control" id="IOG">                       
                    </div>  
                  </div>

                </div>  
              </div>

              <div class="row">
              <!-- Resúmen SSS -->
                <div class="col-md-4">
                  <h6 class="text-center text-success">SSS</h6>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">EMG</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">NOC</th>
                        <th scope="col">CON</th>
                        <th scope="col">%OC</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">SS0</th>
                        <td>CENTRAL</td>
                        <td>120</td>
                        <td>20</td>
                        <td>21</td>
                      </tr>
                      <tr>
                        <th scope="row">SS1</th>
                        <td>CENTRAL</td>
                        <td>80</td>
                        <td>40</td>
                        <td>60</td>
                      </tr>
                      <tr>
                        <th scope="row">RSS0</th>
                        <td>REMOTE</td>
                        <td>20</td>
                        <td>108</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <th scope="row">RSS1</th>
                        <td>REMOTE</td>
                        <td>120</td>
                        <td>8</td>
                        <td>91</td>
                    </tbody>
                  </table>

                  <!-- Concentrado EMGs -->
                  <div class="row">
                    <div class="container">
                      <h4>Concentrado</h4>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">EMGs</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">NOC</th>
                            <th scope="col">CON</th>
                            <th scope="col">%OC</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">2</th>
                            <td>CENTRAL</td>
                            <td>240</td>
                            <td>321</td>
                            <td>45</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>REMOTE</td>
                            <td>128</td>
                            <td>420</td>
                            <td>34</td>
                          </tr>
                        </tbody>


                      </table>
                      <hr>

                    </div>

                  </div>  <!-- /Concentrado EMGs -->

                </div>  <!-- Resúmen SSS -->

                <!-- Resúmen GSS -->
                <div class="col-md-4">
                  <h6 class="text-center text-primary">GSS</h6>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">SNT</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">NOC</th>
                        <th scope="col">CON</th>
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
                      <tr>
                        <th scope="row">4</th>
                        <td>Jorge</td>
                        <td>Torres</td>
                        <td>@coyote</td>
                      </tr>
                    </tbody>
                  </table>

                </div>  <!-- /Resúmen GSS -->

                <!-- Resúmen TSS -->
                <div class="col-md-4">
                  <h6 class="text-center text-danger">TSS</h6>
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

                </div>  <!-- Resúmen TSS -->

              </div>

            </div>  <!-- /Op: Resumen -->

            <!-- Op: SSS -->
            <div class="tab-pane fade" id="tab_SSS" role="tabpanel" aria-labelledby="tab_SSS">
              <br>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="EMG">EMG</label>
                        </div>
                        <input type="text" class="form-control" id="EMG">
                      </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="EMG">RPs</label>
                      </div> 
                      <input type="text" class="form-control" id="RPs">
                    </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="Pos" data-toggle="tooltip" data-placement="bottom" title="Posición de los RPs">Pos.</label>
                      </div>
                      <input type="text" class="form-control" id="Pos">
                    </div>
                    
                  </div>  
                  
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">EM</th>
                        <th scope="col">EQM</th>
                        <th scope="col">SNT</th>
                        <th scope="col">NOC</th>
                        <th scope="col">CON</th>
                        <th scope="col">%OC</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Otto</td>
                      
                        <td>20</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Thornton</td>
                        
                        <td>25</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        
                        <td>@twitter</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>30</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Jorge</td>
                        <td>Torres</td>
                        <td>@coyote</td>
                        
                        <td>@coyote</td>
                        <td>50</td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Omar</td>
                        <td>Torres</td>
                        <td>@coyote</td>
                        
                        <td>@coyote</td>
                        <td>60</td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="row">
                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="NOC">NOC</label>
                        </div>
                        <input type="text" class="form-control" id="NOC">
                      </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="CON">CON</label>
                      </div> 
                      <input type="text" class="form-control" id="CON">
                    </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="%OCxEMG">%OC</label>
                      </div>
                      <input type="text" class="form-control" id="%OC">
                    </div>
                    
                  </div> 
                    
                </div>

            
                <div class="col-md-6">
                  
                  <div class="row">
                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="EMG">EMG</label>
                        </div>
                        <input type="text" class="form-control" id="EMG">
                      </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="RPs">RPs</label>
                      </div> 
                      <input type="text" class="form-control" id="RPs">
                    </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="Pos" data-toggle="tooltip" data-placement="bottom" title="Posición de los RPs">Pos.</label>
                      </div>
                      <input type="text" class="form-control" id="Pos">
                    </div>
                    
                  </div>

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">EM</th>
                        <th scope="col">EQM</th>
                        <th scope="col">SNT</th>
                        <th scope="col">NOC</th>
                        <th scope="col">CON</th>
                        <th scope="col">%OC</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Otto</td>
                      
                        <td>20</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Thornton</td>
                        
                        <td>25</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        
                        <td>@twitter</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>30</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Jorge</td>
                        <td>Torres</td>
                        <td>@coyote</td>
                        
                        <td>@coyote</td>
                        <td>50</td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="row">
                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="NOC">NOC</label>
                        </div>
                        <input type="text" class="form-control" id="NOC">
                      </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="CON">CON</label>
                      </div> 
                      <input type="text" class="form-control" id="CON">
                    </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="%OCxEMG">%OC</label>
                      </div>
                      <input type="text" class="form-control" id="%OC">
                    </div>
                    
                  </div>
                  
                </div>

              </div>

            </div>  <!-- /Op: SSS -->
            <!-- Op: GSS -->
            <div class="tab-pane fade" id="tab_GSS" role="tabpanel" aria-labelledby="tab_GSS">
              <div class="row">
                <div class="col-md-6 text-center">
                  
                  <br>               

                  <div class="row">
                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="TSM">TSM (A&B)</label>
                        </div>
                        <input type="text" class="form-control" id="TSM">
                      </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="RPs">RPs</label>
                      </div> 
                      <input type="text" class="form-control" id="RPs">
                    </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="Pos" data-toggle="popover" title="Posición de los TSMs" data-content="TSM_Pos">Pos.</label>
                      </div>
                      <input type="text" class="form-control" id="Pos">
                    </div>
                    
                  </div>
                                    
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">SNT</th>
                        <th scope="col">DEV</th>
                        <th scope="col">EdoSNT</th>
                        <th scope="col">DIP</th>
                        <th scope="col">EdoDIP</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Mark</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Mark</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>Mark</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="col-md-6 text-center">
                  <br>

                  <div class="row">
                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="TSM">TSM (A&B)</label>
                        </div>
                        <input type="text" class="form-control" id="TSM">
                      </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="RPs">RPs</label>
                      </div> 
                      <input type="text" class="form-control" id="RPs">
                    </div>

                    <div class="col input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="Pos" data-toggle="popover" title="Posición de los TSMs" data-content="TSM_Pos">Pos.</label>
                      </div>
                      <input type="text" class="form-control" id="Pos">
                    </div>
                    
                  </div>

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        
                      </tr>

                      <tr>
                        <th scope="row">4</th>
                        <td>Jorge</td>
                        <td>Torres</td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>  <!-- Op: GSS -->

            <!-- Op: TSS -->
            <div class="tab-pane fade" id="tab_TSS" role="tabpanel" aria-labelledby="tab_TSS">
            <div class="row">
                <div class="col-md-6 text-center">
                  <br>
                  <h6>SNT-1</h6>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="col-md-6 text-center">
                  <br>
                  <h6>DIP-1</h6>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        
                      </tr>

                      <tr>
                        <th scope="row">4</th>
                        <td>Jorge</td>
                        <td>Torres</td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="col-md-3 text-center">
                  <br>
                  <h6>SNT-2</h6>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="col-md-3 text-center">
                  <br>
                  <h6>DIP-2</h6>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        
                      </tr>

                      <tr>
                        <th scope="row">4</th>
                        <td>Jorge</td>
                        <td>Torres</td>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>  <!-- Op: TSS -->

            <!-- Op: CPS -->
            <div class="tab-pane fade" id="tab_CPS" role="tabpanel" aria-labelledby="tab_CPS">Esto es el CPS/IO mixtape
              wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack
              lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
              locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
              squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
              etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog
              stumptown. Pitchfork sustainable tofu synth chambray yr.
            </div>  <!-- Op: CPS -->

              </div>  <!-- /Opciones -->
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