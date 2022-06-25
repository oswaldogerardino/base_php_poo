<!--Header-->
<?php

  include('../../includes/header.php');
  include("../../clases/ClaseUsuario.php");

  //consultar al usuario por el id
  $datos= $usuario->ConsultarUsuario($_GET['id']);
  
  if(isset($_POST['submit'])) {

    $id = $_GET['id'];
    $resultado= $usuario->BorrarUsuario($id);

    if($resultado){
      setcookie("msj_usuario", "Borrado exitoso", time()+ 1,'/');
      header("Location: ./lista.php");
    }
  }

?>
<!-- Contenedor principal -->
<div class="main-panel">
  <div class="content-wrapper">
    
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Confirmar</h4>

          <?php if($datos){ ?>

            <form method="POST" action="./confirmar_borrado.php?id=<?php echo $_GET['id']; ?>">
              <input type="hidden" name="submit" value="add" >
              <!--Fila-->
              <div class="row">
                <div class="col-md-12">
                  <label>¿Esta seguro que desea eliminar al usuario <b><?php echo (isset($datos)) ?  strtoupper($datos['nombre'])." ".strtoupper($datos['apellido']):'ERROR'; ?>?</b></label>
                </div>
              </div>
              <!--/Fila-->
              
              <!--Fila-->
              <div class="row">
                <div class="col-md-6">
                  <a href="./lista.php" class="btn btn-secondary btn-icon-text text-white">
                  <i class="ti-back-left btn-icon-prepend"></i>Volver
                  </a>
                  <button type="submit" class="btn btn-success btn-icon-text text-white">
                    <i class="ti-trash btn-icon-prepend"></i>                                                    
                    Confirmar
                  </button>
                </div>
              </div>
              <!--/Fila-->

            </form>
          
          <?php } else{  ?>
            
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              El usuario que intenta consultar no existe.
              <a href="./lista.php" class="btn btn-secondary btn-icon-text text-white">
                <i class="ti-back-left btn-icon-prepend"></i>Volver
              </a>
            </div>

          <?php } ?>

        </div>
      </div>
    </div>

  </div>

<!--Footer-->
<?php include '../../includes/footer.php' ?>