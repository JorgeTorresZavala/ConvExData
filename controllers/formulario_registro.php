<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
		<div class="container">
			<div class="row justify-content-center mt-5 bt-5">
				<div class="col-md-7">
					<h1 class="display-4">Registro</h1>
					<hr class="bg-info">
					<p class="pb-0 mb-0">LLena los campos siguientes...</p>
					<p class="text-danger small pt-0 mt-0">* Todos los campos son obligatorios...</p>
				</div>
			
				<form class="needs-validation" name="form_registro" method="get" action="Insertar_Registros.php" novalidate>

					<div class="form-row">
						<h1></h1>
						<div class="col-md-4 mb-3">
							<label for="nombres">Nombres</label>
							<input type="text" class="form-control" name="nombres" id="nombres" value="" required>
							<div class="invalid-feedback">
								Escribe tu nombre(s)...
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apellidoPaterno">Apellido Paterno</label>
							<input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" value="" required>
							<div class="invalid-feedback">
							Escribe tu apellido paterno...
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="apellidoMaterno">Apellido Materno</label>
							<input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" value="" required>
							<div class="invalid-feedback">
							Escribe tu apellido materno...
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="tel_trabajo">Teléfono del trabajo</label>
							<input type="text" class="form-control" name="tel_trabajo" id="tel_trabajo" required>
							<div class="invalid-feedback">
								Escriba el teléfono de su oficina.
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<label for="correo_trabajo">Correo de Trabajo</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupPrepend">@</span>
								</div>
								<input type="email" class="form-control" name="correo_trabajo" id="correo_trabajo" aria-describedby="inputGroupPrepend" required>
								<div class="invalid-feedback">
								Escriba el correo de trabajo...
								</div>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="tel_personal">Teléfono personal</label>
							<input type="text" class="form-control" name="tel_personal" id="tel_personal" required>
							<div class="invalid-feedback">
							Escriba el teléfono de su casa.
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<label for="correo_personal">Correo Personal</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupPrepend">@</span>
								</div>
								<input type="email" class="form-control" name="correo_personal" id="correo_personal" aria-describedby="inputGroupPrepend" required>
								<div class="invalid-feedback">
									Escriba el correo de trabajo...
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<button class="btn btn-primary" type="submit">Enviar</button>
						</div>
						<div class="col-md-2">
							<input class="btn btn-primary" type="reset" value="Borrar">
						</div>
					</div>
				</form>
			</div>
		</div>
	

		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');
					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
		</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
  </body>
</html>