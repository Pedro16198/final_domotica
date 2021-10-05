<?php
//session_start();
include '../funciones.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href=" <?php echo base_url('css/estilos.css') ?> ">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/materialize/css/materialize.css') ?>">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- SWEET ALERT 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- JS -->
  <script src="<?php echo base_url('js/jquery-3.5.1.js') ?>"></script>
  <title>Cambio-password</title>
</head>

<body>
  <!--MODALES-->
  <!-- Modal Structure -->
  <div id="modal_cambia_pass" class="modal">
    <div class="modal-content">
      <h4 style="color: black">Cambiar Contraseña</h4>
      <div class="input-field col s12">
        <i class="material-icons prefix">vpn_key</i>
        <input type="text" id="new_pass" class="autocomplete black-text" name="new_pass">
          <label for="new_pass">Ingrese Nueva Contraseña</label>
        </div>
    </div>
    <div class="modal-footer">
      <a id="btn_confirmar" href="#!" class="waves-effect waves-green btn-flat">Cambiar</a>
      <a id="btn-cerrar" href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>    
  <!-- FIN MODALES -->
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
    <img src="../img/back3.svg" alt="">
      <div class="col m8 l8"></div>
      <div class="col s12 m4 l4 card2">
        <div class="card grey darken-4">
          <div class="card-content white-text">
            <h4>Cambio de Contraseña</h4>
            <!--<form action="controladores/gestion_usuarios.php" method="POST">-->
              <input hidden type="text" name="action" value="login">
              <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" id="correo" class="autocomplete white-text" name="user">
                <label for="correo">Ingrese Usuario</label>
              </div>
              <div class="card-action center-align">
                <button id="localizauser" class="btn waves-effect waves-light" type="submit">Verificar
                  <i class="material-icons right">verified_user</i>
                </button>
              </div>
            <!-- </form> -->
            <div class="card-action center-align">
              <a class="waves-effect waves-teal btn-flat" href="../index.php">Registrarme</a>
              <a class="waves-effect waves-teal btn-flat" href="../login.php">Ingresar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
<script>
  base_url = 'http://localhost/Proyecto_Domotica/';
  $(document).ready(function(){
    $("#modal_cambia_pass").modal();
    $("#localizauser").click(function(){
      var correo = $("#correo").val();
      $.ajax({
        url: base_url+'controladores/ajax_verificapass.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          action : 'verificar',
          correo : correo
        },
      }).done(function(data) {
          if(data == 'true'){
            $("#modal_cambia_pass").modal('open');
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Intente Nuevamente',
              showConfirmButton: false,
              timer: 1500
            });
          }    
        });
            });

    $("#btn_confirmar").on('click',function(){
      new_pass = $("#new_pass").val();
      correo = $("#correo").val()
      $.ajax({
        url: base_url+'controladores/ajax_verificapass.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          action : 'confirmar',
          correo : correo,
          password : new_pass
        },
      }).done(function(data) {
          if(data == 'true'){
            Swal.fire({
              icon: 'success',
              title: 'Contraseña Actualizada!!',
              showConfirmButton: false,
              timer: 1500
            });
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Intentelo Nuevamente',
              showConfirmButton: false,
              timer: 1500
            });
          }    
        });
    });
  });
      </script>
        <!-- Compiled and minified JavaScript -->
  <script src="<?php echo base_url('assets/materialize/js/materialize.js') ?>"></script>
</body>

</html>