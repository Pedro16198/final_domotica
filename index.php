<?php
//session_start();
include 'funciones.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href=" <?php echo base_url('css/estilos.css') ?> ">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- SWEET ALERT 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- JS -->
  <script src="<?php echo base_url('js/jquery-3.5.1.js') ?>"></script>
  <title>Registrar</title>
</head>

<body>
  <!-- Navbar goes here -->
  <!-- <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
        <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
        <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
      </ul>
    </div>
  </nav> -->
  <!-- Page Layout here -->
  <div class="container">
    <div class="row">
      <img src="img/back3.svg" alt="">
      <div class="col m8 l8"></div>
      <div class="col s12 m4 l4">
        <div class="card grey darken-4">
          <div class="card-content white-text">
            <h4>Registro</h4>
            <form action="controladores/gestion_usuarios.php" method="POST">
              <input hidden type="text" name="action" value="registrar">
              <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" id="autocomplete-nombre" class="autocomplete white-text" name="nombre">
                <label for="autocomplete-nombre">Nombre</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" id="autocomplete-apellido" class="autocomplete white-text" name="apellido">
                <label for="autocomplete-apellido">Apellido</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">picture_in_picture</i>
                <input type="text" id="autocomplete-dni" class="autocomplete white-text" name="dni">
                <label for="autocomplete-dni">DNI</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">mail</i>
                <input type="text" id="autocomplete-mail" class="autocomplete white-text" name="correo" required>
                <label for="autocomplete-mail">Correo</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">local_phone</i>
                <input type="text" id="autocomplete-tel" class="autocomplete white-text" name="telefono">
                <label for="autocomplete-tel">Telefono</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">vpn_key</i>
                <input type="text" id="autocomplete-pass" class="autocomplete white-text" name="password" required>
                <label for="autocomplete-pass">Contraseña</label>
              </div>
          </div>
          <div class="card-action center-align">
            <button id="registrar" class="btn waves-effect waves-light" type="submit">Registrarme
              <i class="material-icons right">send</i>
            </button>
            </form>
          </div>
          <div class="card-action center-align">
            <a class="waves-effect waves-teal btn-flat" href="login.php">Ingresar</a>
            <a class="waves-effect waves-teal btn-flat" href="vistas/cambia-pass.php" >Olvide mi Contraseña</a>
          </div>
        </div>
      </div>
      <script>
        $("#registrar").click(function() {
          Swal.fire({
            icon: 'success',
            title: 'Registrado satisfactoriamente',
            showConfirmButton: false,
            timer: 5500
          });
        });
      </script>
</body>
</html>