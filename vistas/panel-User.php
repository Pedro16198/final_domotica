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
  <link rel="stylesheet" href=" <?php echo base_url('css/container.css') ?> ">
  <link rel="stylesheet" href=" <?php echo base_url('css/footer.css') ?> ">
  
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- SWEET ALERT 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>Panel de Usuario</title>
</head>

<body>

  <?php require_once('navbar-User.php'); ?>

  <div class="container panel">
    <img class="imagenpanel" src="../img/mesa.png" alt="">
    <div class="row ">
      <div class="col m1 l1">

      </div>
      <div class="col s12 m10 l10 center-align background">
        <h3>Bienvenido :)</h3>
        <p>A tu panel donde podrás acceder a toda las funcionales ofrecidas por Home Security</p>
        <div class="cards">
          <div class="card small ">
            <div class="card-content border">
              <h4>Mi Casa</h4>
              <p class="contText">Aquí podrás acceder al estado de tu hogar. Además de poder revisar tu historial.</p>
              <p>.....</p>
              <p class="contText"><a href="user-sensores.php">Acceder</a></p>
            </div>
          </div>
          <div class="card small">
            <div class="card-content border">
              <h4>Servicio Técnico</h4>
              <p class="contText">Estamos para ayudarte, en esta sección podrás acceder a toda la información que necesites.</p>
              <p>.....</p>
              <p class="contText"><a href="#">Acceder</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col m1 l1">

      </div>
    </div>
  </div>

  <?php require_once('footer.php'); ?>

</body>

</html>