<?php
if(!isset($_SESSION)){
  session_start();
}

?>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="../../vistas/principal/principal.php">BASE</a>
    <a class="navbar-brand brand-logo-mini " href="../../vistas/principal/principal.php">BASE</a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="ti-view-list"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <i class="ti-settings text-dark display-3"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <span class="dropdown-item">
            Hola &nbsp;<b><?php echo $_SESSION['nombre']; ?></b>
          </span>
          <hr>
          <a class="dropdown-item" href="../../vistas/acceso/salir.php">
            <i class="ti-power-off text-primary"></i>
            Salir
          </a>
        </div>
      </li>
    </ul>

    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="ti-view-list"></span>
    </button>
    
  </div>
</nav>