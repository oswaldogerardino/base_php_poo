<?php include("../../clases/ClaseAcceso.php"); ?>

<?php 

  $acceso->CerrarSesion();
  header("location: ./login.php")
?>
