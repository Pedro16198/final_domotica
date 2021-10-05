<?php
include '../funciones.php';
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href=" <?php echo base_url('css/containerAdmin.css') ?> ">
  <link rel="stylesheet" href=" <?php echo base_url('css/footer.css') ?> ">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- SWEET ALERT 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  
  <title>Panel Administrador</title>
</head>

<body>
  
  <?php require_once('navbar-Admin.php'); ?>  

  <div class="container">
    <img class="imagenpanel" src="../img/mesa.png" alt="">
    <div class="row ">
      <div class="col s1">

      </div>
      <div class="col s10 center-align background">
        <h3>Bienvenido :)</h3>
        <p></p>
        <div class="cards center-align">
          <div class="card small">
            <div class="card-content">
              <h4>Usuarios</h4>
              <p class="contText">Listado de usuarios</p>
              <p>.....</p>
              <p class="contText"><a href="lista-usuarios.php">Acceder</a></p>
            </div>
          </div>
          <div class="card small">
            <div class="card-content">
              <h4>Sensores</h4>
              <p class="contText">Sensores</p>
              <p>.....</p>
              <p class="contText"><a href="user-sensores.php">Acceder</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col s1">

      </div>
    </div>
    <!-- <div class="row">
      <div class="col s12">This div is 12-columns wide on all screen sizes</div>
    </div>
    <div class="row">
      <div class="col s12">This div is 12-columns wide on all screen sizes</div>
    </div>
    <div class="row">
      <div class="col s12">This div is 12-columns wide on all screen sizes</div>
    </div>
    <div class="row">
      <div class="col s12">This div is 12-columns wide on all screen sizes</div>
    </div> -->
  </div>

  
  

</body>

</html>