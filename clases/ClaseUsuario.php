<?php

  include('../../config/config.php');
  
  class ClaseUsuario extends ClaseGlobal {

    private $datos;

    public function ListaUsuario() {
      
      $this->datos = mysqli_query($this->mysqli, "SELECT * FROM usuarios ORDER BY nombre ASC");
      
      return $this->datos;

    }

    public function CrearUsuario($nombre,$apellido,$cedula,$correo,$genero=null,$fecha_n=null,$contrasena, $rol) {
      
      $sql = "INSERT INTO usuarios(nombre,apellido,cedula,correo,genero,fecha_nac,contrasena,rol) VALUES('".$nombre."','".$apellido."','".$cedula."','".$correo."','".$genero."','".$fecha_n."','".md5($contrasena)."','".$rol."')";
      $this->datos = mysqli_query($this->mysqli, $sql);

      return $this->datos;
  
    }

    public function ActualizarUsuario($nombre=null,$apellido=null,$cedula,$correo,$genero=null,$fecha_n=null,$id, $rol) {
      
      $this->datos = mysqli_query($this->mysqli, "UPDATE usuarios SET nombre='$nombre',apellido='$apellido',cedula='$cedula',correo='$correo',genero='$genero',fecha_nac='$fecha_n',rol='$rol' WHERE id=$id");
      
      $this->datos;
  
    }

    public function ActualizarContrasena($contrasena,$id) {
      
      $this->datos = mysqli_query($this->mysqli, "UPDATE usuarios SET contrasena='".md5($contrasena)."' WHERE id=$id");
      
      $this->datos;
  
    }

    public function BorrarUsuario($id=null) {
      
      $sql = "DELETE FROM usuarios WHERE id=$id";
      $this->datos = mysqli_query($this->mysqli, $sql);

      return $this->datos;
  
    }

    public function ConsultarUsuario($id=null) {
      
      $this->datos = mysqli_query($this->mysqli, "SELECT * FROM usuarios WHERE id=$id");
      
      return mysqli_fetch_assoc($this->datos);
  
    }


  }
  
  $usuario = new ClaseUsuario();
?>