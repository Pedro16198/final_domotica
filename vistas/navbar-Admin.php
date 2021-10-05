  <nav>
    <div class="nav-wrapper grey darken-4">
      <a href="<?php echo base_url('vistas/panel-Admin.php') ?>" class="brand-logo"> <i class="material-icons">store</i> Inicio </a>
      <ul class="right hide-on-med-and-down">

        <li> <a href="#"> <i class="material-icons left"> perm_identity </i> <?php echo $_SESSION['usuario'].' - '.$_SESSION['rol'];?> </a> </li>
        <li> <a href="<?php echo base_url('vistas/lista-usuarios.php') ?>"><i class="material-icons left"> people </i> Listar Clientes </a> </li>
        <li> <a href="#"><i class="material-icons left"> confirmation_number </i> Configuración </a> </li>
        <li> <a href="#"><i class="material-icons left"> add </i> Otro </a> </li>
        <li> <a href="#"><i class="material-icons left"> exit_to_app </i> Salir </a> </li>
      </ul>
    </div>
  </nav>