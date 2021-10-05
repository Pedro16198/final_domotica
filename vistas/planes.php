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
      <div class="col s4 m4 l4 center-align background">
        <h3>Servicio Tecnico</h3>
        <!-- <img class="serviciot" src="../img/st.jpg" alt=""> -->
        <img class="responsive-img serviciot" src="../img/st.jpg">
        <p class="textst">Home Security, sabe que lo más importante es mantener nuestro hogar o empresa en las mejores manos. Es por ello que nosotros ofrecemos este servicio donde podrás consultarnos o contactarnos cada vez que lo necesites. Nuestros equipos están capacitados para notificar cada vez que surga alguna irregularidad o para hacerte saber que esta todo bien.<p>
        <p class="mje">Muchas gracias por confiar con nosotros, esperamos ayudarte en lo que necesites.</p>
      </div>
      <div class="col s4 m4 l4 center-align background">
        <h3>Servicio Tecnico</h3>
        <!-- <img class="serviciot" src="../img/st.jpg" alt=""> -->
        <img class="responsive-img serviciot" src="../img/st.jpg">
        <p class="textst">Home Security, sabe que lo más importante es mantener nuestro hogar o empresa en las mejores manos. Es por ello que nosotros ofrecemos este servicio donde podrás consultarnos o contactarnos cada vez que lo necesites. Nuestros equipos están capacitados para notificar cada vez que surga alguna irregularidad o para hacerte saber que esta todo bien.<p>
        <p class="mje">Muchas gracias por confiar con nosotros, esperamos ayudarte en lo que necesites.</p>
      </div>
     <div class="col s4 m4 l4 center-align background">
        <h3>Servicio Tecnico</h3>
        <!-- <img class="serviciot" src="../img/st.jpg" alt=""> -->
        <img class="responsive-img serviciot" src="../img/st.jpg">
        <p class="textst">Home Security, sabe que lo más importante es mantener nuestro hogar o empresa en las mejores manos. Es por ello que nosotros ofrecemos este servicio donde podrás consultarnos o contactarnos cada vez que lo necesites. Nuestros equipos están capacitados para notificar cada vez que surga alguna irregularidad o para hacerte saber que esta todo bien.<p>
        <p class="mje">Muchas gracias por confiar con nosotros, esperamos ayudarte en lo que necesites.</p>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col s12 m12 l12 center-align background">
      <a class="waves-effect waves-light btn"><i class="material-icons left">border_color</i>Contacto</a>
      <a class="waves-effect waves-light btn"><i class="material-icons left">build</i>Ayuda</a>
      </div>
    </div> -->
  </div>
</body>
</html>