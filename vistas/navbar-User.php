<nav>
  <div class="nav-wrapper grey darken-4">
    <!-- <a href="http://127.1.1.0:8080/Proyecto_Domotica/index.php" class="brand-logo"> <i class="material-icons">store</i> Inicio </a> -->
    <a href="<?php echo base_url('vistas/panel-User.php') ?>" class="brand-logo"> <i class="material-icons">store</i> Inicio </a>
    <ul class="right hide-on-med-and-down">

      <li>
        <a href="#">
          <i class="material-icons left"> perm_identity </i> <?php echo $_SESSION['usuario'].' - '.$_SESSION['rol'];?>
        </a>
      </li>
      <li> <a href="<?php echo base_url('vistas/user-sensores.php') ?>"><i class="material-icons left"> home </i> Mi casa </a> </li>
      <li> <a href="#"><i class="material-icons left"> build </i> Servicio Técnico </a> </li>
      <li> 
        <?php 
          switch (3) 
          {
             case '1':
               { echo '<a href="#"><i class="material-icons left"> notifications_active </i> Notificaciones </a>'; }
               break;
             
             case '2':
               { echo '<a href="#"><i class="material-icons left"> report_problem </i> Notificaciones </a>'; }
               break;

             default:
               { echo '<a href="#"><i class="material-icons left"> notifications </i> Notificaciones </a>'; }
               break;
           } 
           ?>
      </li>
      <li> <a href="#"><i class="material-icons left"> exit_to_app </i> Salir </a> </li>
    </ul>
  </div>
</nav>