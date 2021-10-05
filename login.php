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
  <title>Log-In</title>
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
      <div class="col s12 m4 l4 card2">
        <div class="card grey darken-4">
            <div class="card-action right-align">
            <a title="Si ya te registraste, podes ingresar con tu MAIL y tu número de DNI" href="#"><i class="small material-icons right">live_help</i></a>
            </div>
          <div class="card-content white-text">
            <h4>Ingreso</h4>
            <form action="controladores/gestion_usuarios.php" method="POST">
              <input hidden type="text" name="action" value="login">
              <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" id="autocomplete-usu" class="autocomplete white-text" name="user">
                <label for="autocomplete-usu">Usuario</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">vpn_key</i>
                <input type="password" id="autocomplete-con" class="autocomplete white-text" name="password">
                <label for="autocomplete-con">Contraseña</label>
              </div>
              <div class="card-action center-align">
                <button class="btn waves-effect waves-light" type="submit">Iniciar Sesión
                  <i class="material-icons right">verified_user</i>
                </button>
              </div>
            </form>
            <div class="card-action center-align">
              <a class="waves-effect waves-teal btn-flat" href="index.php">Registrarme</a>
              <a class="waves-effect waves-teal btn-flat" href="vistas/cambia-pass.php">Olvide mi Contraseña</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if (!empty($_SESSION['error_login']) && $_SESSION['error_login']) { ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Informacion Incorrecta',
          showConfirmButton: false,
          timer: 1500
        });
      </script>
    <?php
    } ?>
</body>

</html>