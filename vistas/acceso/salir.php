<?php
 include("../../clases/ClaseAcceso.php");
  $acceso->CerrarSesion();
  setcookie("msj_login_out", "Ha salido de la sesión!", time()+ 1,'/');
  header("location: ./login.php")
?>
