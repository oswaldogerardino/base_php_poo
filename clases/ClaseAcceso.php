<?php

  include('../../config/config.php');
  
  class ClaseAcceso extends ClaseGlobal {

    private $datos,$resultados,$contrasena_encrypted;

    public function ConsultaAcceso($correo,$contrasena) {

      $this->contrasena_encrypted = md5($contrasena);
      
      $this->datos = mysqli_query($this->mysqli, "SELECT * FROM usuarios WHERE correo='".$correo."' AND contrasena='".$this->contrasena_encrypted."' ");  
      $this->resultado = mysqli_num_rows($this->datos);

      return $this->resultado;
  
    }
    
    public function ConsultarDatos($correo) {
      
      $this->datos = mysqli_query($this->mysqli, "SELECT nombre, apellido, correo FROM usuarios WHERE correo='$correo'");

      return mysqli_fetch_assoc($this->datos);
  
    }

    public function CerrarSesion() {
      
      session_destroy();
  
    }


  }
  
  $acceso = new ClaseAcceso();
?>