<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/container.css">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Registrar usuarios</title>
</head>

<body>

	<div class="container panel">
		<img class="imagenpanel" src="../img/mesa.png" alt="">
		<div class="row ">
			<div class="col m1 l1">

			</div>
			<div class="col s12 m10 l10 center-align background">
				<h3>Formulario Registro</h3>
				<form action="../controladores/gestion_usuarios.php" method="POST" >
					<label for="nombre">Nombre:</label><br>
					<input type="text" id="nombre" name="nombre" required><br>
					<label for="apellido">Apellido:</label><br>
					<input type="text" id="apellido" name="apellido" required><br>
					<label for="dni">Documento:</label><br>
					<input type="text" id="dni" name="dni" required><br>
					<label for="correo">Correo:</label><br>
					<input type="text" id="correo" name="correo"><br>
					<label for="telefono">Teléfono:</label><br>
					<input type="text" id="telefono" name="telefono"><br>
					<!-- <button >Enviar</button> -->
					<a class="waves-effect waves-light btn" type="submit">Enviar</a>
			</div>
			<div class="col m1 l1">

			</div>
		</div>
	</div>

</body>

</html>



</form>