<?php  

  if(!isset($_SESSION)){
    session_start();
  }


  class ClaseGlobal {
    
      private $databaseHost = '127.0.0.1';
      private $databaseNombre = 'basephp';
      private $databaseNombreUsuario = 'root';
      private $databaseContrasena = '1234';
      public $mysqli;
      public $resultado;

      function __construct(){

        $this->mysqli = mysqli_connect($this->databaseHost, $this->databaseNombreUsuario, $this->databaseContrasena, $this->databaseNombre);

      }

      //Función usada en registros, para verificar si un campo obligatorio y unico ya existe.
      public function SesionStatus(){
  
        if(!isset($_SESSION['conectado']) or $_SESSION['conectado'] == false){
          header("location: ../../vistas/acceso/login.php");
        }
  
      }

      //Función usada en registros, para verificar si un campo obligatorio y unico ya existe.
      public function ValorUnico($tabla,$campo,$valor){
  
        $this->resultado = mysqli_query($this->mysqli, "SELECT $campo FROM $tabla WHERE $campo='".$valor."' ");
  
        return mysqli_num_rows($this->resultado);
  
      }

      //Función usada en actualizaciones, para verificar si otro usuario tienen un campo existente, comparando el valor del registro a actualizar.
      public function ValorUnicoActualizable($tabla,$campo,$valor,$id_registro){
  
        $this->resultado = mysqli_query($this->mysqli, "SELECT * FROM $tabla WHERE $campo='".$valor."' AND id <> $id_registro");
  
        return mysqli_num_rows($this->resultado);
  
      }
  }
  
?>
