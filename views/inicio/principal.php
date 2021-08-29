  <body>

    <!--Main Navigation-->
    
    <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-blue bg-green">
      <div class="container">

      <!-- Navbar brand --> 
        <!-- Logo -->
        <a class="navbar-brand font-small" href="index.html">
          <img src="img/logoTransparente.png" class="d-inline-block align-bottom" width="55" height="55" alt="Logo Syntropy">
          <h0>Syntropy</h0><br>
          Telecomunicaciones
        </a>
        <!-- /Logo -->

        <!-- Collapse button -->
        <button class="navbar-toggler navbar-toggler-rigth" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- /Collapse button -->

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navBar">

          <!-- Links -->
          <ul class="navbar-nav m-auto">
            <li class="nav-item active px-4" id="inicio">
              <a class="nav-link" href="index.html">Inicio</a>
              <!-- <span class="sr-only"></span> -->
            </li>

            <!-- Nosotros -->
            <li class="nav-item px-4">
              <a class="nav-link" href="nosotros.html">Nosotros</a>
            </li>
            <!-- /Nosotros -->

            <!-- Servicios -->
            <li class="nav-item dropdown px-4" id="menu_servicios" onclick="check_class();">
              <a class="nav-link dropdown-toggle" href="#" id="menuServicios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>

              <div class="dropdown-menu dropdown-primary" aria-labelledby="menuServicios">
                
                <a class="dropdown-item" onclick="check_class();" href="#">Ingenierías</a>
                <a class="dropdown-item" href="#">Radio Bases</a>
                <a class="dropdown-item" href="#">Radio Enlaces</a>
                <a class="dropdown-item" href="#">IBS</a>
                <a class="dropdown-item" href="#">Cableado estructurado</a>
                <a class="dropdown-item" href="#">Civil Work (Adecuaciones)</a>
                <a class="dropdown-item" href="#">CORE</a>
              </div>
            </li>
            <!-- /Servicios -->

            <!-- Unete -->
            <li class="nav-item px-4">
              <a class="nav-link" href="solicitudDeEmpleo.html">¡Únete!</a>
            </li>
            <!-- /Unete -->

          </ul>
          <!-- /Links -->

          <!-- Log in -->

          <!-- Bottom: Ingresa... -->
          <a href="#" id="" class="nav-link">
            <span class="clearfix d-none d-sm-inline-block font-weight-normal"
              data-toggle="modal"
              data-target="#login">Ingresa... 
              <i class="fa fa-sign-in mr-1"></i>
            </span>
          </a>
          <!-- /Bottom: Ingresa... -->

          <!-- Modal: Login / Register Form -->
          <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <!-- Modal: dialog -->
            <div class="modal-dialog cascading-modal" role="document">
              <!-- Content -->
              <div class="modal-content">
          
                <!-- Modal cascading tabs -->
                <div class="modal-c-tabs">
          
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs md-tabs tabs-2 light-blue text-white" role="tablist">
                    <!-- Ingreso -->
                    <li class="nav-item">
                      <a class="nav-link active text-dark" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                        Ingreso</a>
                    </li>
                    <!-- /Ingreso -->

                    <!-- Registro -->
                    <li class="nav-item">
                      <a class="nav-link text-body" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                        Registro</a>
                    </li>
                    <!-- /Registro -->
                  </ul>
                  <!-- /Nav tabs -->

                  <!-- Tab panels -->
                  <div class="tab-content">
                    <!-- Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
          
                      <!-- Body -->
                      <div class="modal-body mb-1">
                        <!-- user -->
                        <div class="md-form form-sm mb-5">
                          <i class="fas fa-user prefix"></i>
                          <input type="text" id="modalLRInput10" class="form-control form-control-sm validate">
                          <label data-error="wrong" data-success="right" for="modalLRInput10">Usuario</label>
                        </div>
                        <!-- /user -->

                        <!-- password -->
                        <div class="md-form form-sm mb-4">
                          <i class="fas fa-lock prefix"></i>
                          <input type="password" id="modalLRInput11" class="form-control form-control-sm validate">
                          <label data-error="wrong" data-success="right" for="modalLRInput11">Contraseña</label>
                        </div>
                        <!-- /password -->

                        <!-- button: Ingresa -->
                        <div class="text-center mt-2">
                          <button class="btn btn-info">Ingresa <i class="fa fa-send ml-2"></i></button>
                        </div>
                        <!-- /button: Ingresa -->
                        
                      </div>
                      <!-- /Body -->

                      <!-- Footer -->
                      <div class="modal-footer">
                        <!-- Not a member? -->
                        <div class="options text-center text-md-right mt-1">
                          <p>¿No estás registrado? <a href="#panel8" data-toggle="tab" role="tab" class="blue-text">Registro</a></p>
                          <p>¿Olvidaste <a href="#panel7" class="blue-text">tu contraseña?</a></p>
                        </div>
                        <!-- /Not a member? -->

                        <!-- button: Cerrar -->
                        <button type="button" class="btn btn-outline-info waves-effect ml-auto"
                          data-dismiss="modal">Cerrar</button>
                        <!-- /button: Cerrar -->
                      </div>
                      <!-- /Footer -->
                    </div>
                    <!-- /Panel 7-->
          
                    <!-- Panel 8 -->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">
          
                      <!-- Body -->
                      <div class="modal-body">
                        <!-- correo -->
                        <div class="md-form form-sm mb-5">
                          <i class="fas fa-envelope prefix"></i>
                          <input type="email" id="modalLRInput12" class="form-control form-control-sm validate">
                          <label data-error="wrong" data-success="right" for="modalLRInput12">Correo</label>
                        </div>
                        <!-- /correo -->

                        <!-- contraseña -->
                        <div class="md-form form-sm mb-5">
                          <i class="fas fa-lock prefix"></i>
                          <input type="password" id="modalLRInput13" class="form-control form-control-sm validate">
                          <label data-error="wrong" data-success="right" for="modalLRInput13">Contraseña</label>
                        </div>
                        <!-- /contraseña -->

                        <!-- Repite contraseña -->
                        <div class="md-form form-sm mb-4">
                          <i class="fas fa-lock prefix"></i>
                          <input type="password" id="modalLRInput14" class="form-control form-control-sm validate">
                          <label data-error="wrong" data-success="right" for="modalLRInput14">Repite contraseña</label>
                        </div>
                        <!-- /Repite contraseña -->

                        <!-- Sign up -->
                        <div class="text-center form-sm mt-2">
                          <button class="btn btn-info">Registrar <i class="fa fa-send ml-2"></i></i></button>
                        </div>
                        <!-- /Sign up -->
                      </div>
                      <!-- /Footer -->

                      <!-- Modal: Already have an account? -->
                      <div class="modal-footer">
                        <!-- Log In -->
                        <div class="options text-right">
                          <p class="pt-1">¿Ya estás registrado? <a href="#panel7" data-toggle="tab" href="#panel8"
                              role="tab" class="blue-text">Ingresa</a></p>
                        </div>
                        <!-- /Log In -->

                        <!-- button: close -->
                        <button type="button" class="btn btn-outline-info waves-effect ml-auto"
                          data-dismiss="modal">Cerrar</button>
                        <!-- /button: close -->
                      </div>
                      <!-- /Modal: Already have an account? -->
                    </div>
                    <!-- /Panel 8 -->
                  </div>
                  <!-- /Tab panels -->
                </div>
              </div>
              <!-- /Content -->
            </div>
            <!-- /Modal: dialog -->
          </div>
          <!-- /Modal: Login / Register Form-->
          <!-- /Modal Log in -->
          <!-- /Log in -->
        </div>
        <!-- /Collapsible content -->
      </div>
      <!-- /Navbar brand -->
    </nav>
    <!-- /Navbar -->

    </header>
    <!-- /Main Navigation-->

  
  <!-- Footer -->
  <footer class="page-footer bg-dark pt-1 mt-2">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row 1 -->
      <div class="row">

        <!-- Grid column 1/1 -->
        <div class="col-md-3 mt-md-0 mt-3">

          <!-- Logo(2) -->
          <a class="text-white font-small" href="index.html">
            <img src="img/logoTransparente.png" class="d-inline-block align-bottom" width="55" height="55" alt="Logo Syntropy">
            <h0>Syntropy</h0>
            <br> Telecomunicaciones <br>
          </a>
          <!-- /Logo(2) -->

          <!-- Bottom Contact-->
          <div class="container">
            <a href="#" id="" class="nav-link text-danger font-small">
              <span class="clearfix d-none d-sm-inline-block" data-toggle="modal" data-target="#contact">Contacto...
                <i class="fa fa-user-o" aria-hidden="true"></i>
              </span>
            </a>
          </div>
          <!-- /Bottom Contact-->

          <!-- Modal Contact-->
          <div class="modal fade left" id="contact" tabindex="-1" role="dialog" aria-labelledby="contact" aria-hidden="true">
            <!-- Modal: Contact form-->
            <div class="modal-dialog cascading-modal modal-sm modal-side modal-bottom-left" role="document">

              <!-- Modal: Content-->
              <div class="modal-content">

                <!-- Modal: Header -->
                <div class="modal-header info-color white-text">
                  <h4 class="title">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    Escríbenos...
                  </h4>
                  <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <!-- /Modal: Header -->

                <!-- Modal: Body-->
                <div class="modal-body">

                  <!-- Modal: input text Names -->
                  <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="Names" class="form-control">
                    <label for="Names">Nombre(s)...</label>
                  </div>
                  <!-- /Modal: input text Names -->

                  <!-- Modal: input text MiddleName -->
                  <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="MiddleName" class="form-control">
                    <label for="MiddleName">Apellido Paterno...</label>
                  </div>
                  <!-- /Modal: input text MiddleName -->

                  <!-- Modal: input text email -->
                  <div class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="materialFormContactEmailEx" class="form-control">
                    <label for="materialFormContactEmailEx">Tu correo es...</label>
                  </div>
                  <!-- /Modal: input text email -->

                  <!-- Modal: input text subject -->
                  <div class="md-form">
                    <i class="fa fa-tag prefix grey-text"></i>
                    <input type="text" id="materialFormContactSubjectEx" class="form-control">
                    <label for="materialFormContactSubjectEx">Asunto...</label>
                  </div>
                  <!-- /Modal: input text subject -->

                  <!-- Modal: textarea message -->
                  <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="materialFormContactMessageEx" class="form-control md-textarea" rows="3"></textarea>
                    <label for="materialFormContactMessageEx">Mensaje:</label>
                  </div>
                  <!-- /Modal: textarea message -->

                  <!-- Send buttom -->
                  <div class="text-center mt-4 mb-2">
                    <button class="btn btn-info">Enviar
                      <i class="fa fa-send ml-2"></i>
                    </button>

                    <!-- Phone icon -->
                    <div class="call">
                      <p>O si prefieres llamar...
                        <br>
                        <span>
                          <i class="fa fa-phone"> </i>
                        </span> 3123086700</p>
                    </div>
                    <!-- Phone icon -->
                  </div>
                  <!-- /Send buttom -->
                </div>
              </div>
              <!-- /Conten t-->
            </div>
            <!-- /Contact form -->
          </div>
          <!-- /Modal Contact -->
        </div>
        <!-- /Grid column 1/1 -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Column 2/1 -->
        <div class="col-md-3 mb-md-0 mb-3 text-white font-small">

          <!-- Address 1 -->
          <h6 class="text-left text-capitalize font-small">Oficina Administrativa</h6>
          Calle: Roberto Gaytán Araiza
          No.: 295-A <br>
          Col.: Juan José Ríos <br>
          Cd.: Villa de Álvarez <br>
          CP.: 28984 <br>
          Colima. <br>
          Tel.: 3123086700
          <!-- /Address 1 -->
        </div>
        <!-- /Column 2/1 -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Column 3/1 -->
        <div class="col-md-3 mb-md-0 mb-3 text-white font-small">

          <!-- Address 2 -->
          <h6 class="text-left text-capitalize font-small">Oficina Operativa-Méx</h6>
          Calle: Cuauhtémoc 18-A
          <br> Fracc. Residencial La Soledad
          <br> Cd.: Tlalnepantla
          <br> CP.: 12345
          <br> México
          <!-- /Address 2 -->
        </div>
        <!-- /Grid column 3/1 -->

        <!-- Column 4/1 -->
        <div class="col-md-3 mb-md-0 mb-3 text-white font-small">

          <!-- Address 3 -->
          <h6 class="text-left text-capitalize font-small">Oficina Operativa-Gdl</h6>
          Calle: José y Antonio Lucano No.: 1066
          <br> Fracc. Residencial La Soledad
          <br> Cd.: Tlaquepaque
          <br> CP: 45550
          <br> Jalisco
          <br> Tel.: 3336807070
          <!-- /Address 3 -->
        </div>
        <!-- /Grid column 4/1 -->
      </div>
      <!-- /Grid row 1 -->
    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-left ml-4 py-1 font-small">© 2018 Copyright:
      <a href="https://mdbootstrap.com/bootstrap-tutorial/"> Syntropy</a>
    </div>
    <!-- /Copyright -->
  </footer>
  <!-- /Footer -->


