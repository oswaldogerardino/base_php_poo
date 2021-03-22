<?php

  include('../../config/config.php');
  
  class ClasePrincipal extends ClaseGlobal {

    private $cantidadUsuarios;

    public function CantidadUsuarios(){

      $this->datos = mysqli_query($this->mysqli, "SELECT * FROM usuarios");  
      $this->cantidadUsuarios = mysqli_num_rows($this->datos);

      return $this->cantidadUsuarios;
    }

  }
  
  $principal = new ClasePrincipal();
  $principal->SesionStatus();
?>