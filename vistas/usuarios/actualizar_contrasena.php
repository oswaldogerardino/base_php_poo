<!--Header-->
<?php

  include('../../includes/header.php');
  include("../../clases/ClaseUsuario.php");
  
  if(isset($_GET['id'])){

   $datos= $usuario->ConsultarUsuario($_GET['id']);

  }
  
  if(isset($_POST['submit'])) {

    //Variables
    $contra     = mysqli_real_escape_string($usuario->mysqli, $_POST['contra']);
    $confirmar  = mysqli_real_escape_string($usuario->mysqli, $_POST['confirmar']);
    //Verificaciones de formulario
    /*
      1. Verificar si las contraseñas tienen por lo menos 6 caracteres.
      2. Verificar si las contraseñas son iguales.
    */
      if(!empty($contra) and strlen($contra) > 5 and $contra == $confirmar){

        $resultado = $usuario->ActualizarContrasena($contra,$_GET['id']);
        setcookie("msj_usuario", "Contraseña actualizada", time()+ 1,'/');
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
          <h4 class="card-title">ACTUALIZAR USUARIO </h4>
          <?php if($datos){ ?>

            <form method="POST" action="./actualizar_contrasena.php?id=<?php echo $_GET['id']; ?>">
              <input type="hidden" name="submit" value="add" >

              <p class="card-description">
                - Todos los datos marcados con <code>(*)</code> son obligatorios.<br/>
                - Si deja en blanco los campos <strong>Contraseña</strong> y <strong>Confirmar</strong>, se le asignara al nuevo usuario la clave por defecto <code>1234</code>.
              </p>
              <?php

                if(isset($_POST['submit'])) {

                    //Clave no vacia
                    if(empty($contra)) {

                      echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          La contraseña es obligatoria.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      ';

                    }

                    //Cantidad de caracteres minimos 6 o mas
                    elseif(strlen($contra) < 6) {

                      echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          La contraseña debe tener m&aacute;s de 6 caracteres.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      ';

                    }

                    //Contraseñas no coinciden
                    elseif($contra != $confirmar) {

                      echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Las contraseñas no coinciden.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      ';

                    }

                }//submit

              ?>

              <p class="card-description">
                Seguridad. 
              </p>
              <!--Fila-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Contraseña <code>(*)</code></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="contra"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Confirmar <code>(*)</code></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="confirmar" />
                    </div>
                  </div>
                </div>
              </div>
              <!--/Fila-->

              <!--Fila-->
              <div class="row">
                <div class="col-md-6">
                  <a href="./lista.php" class="btn btn-secondary btn-icon-text text-white">
                  <i class="ti-back-left btn-icon-prepend"></i>Volver
                  </a>
                  <button type="submit" class="btn btn-primary btn-icon-text text-white">
                    <i class="ti-save btn-icon-prepend"></i>                                                    
                    Guardar
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