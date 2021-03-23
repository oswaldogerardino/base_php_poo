<!--Header-->
<?php include('../../includes/header.php'); ?>
<?php include("../../clases/ClaseUsuario.php"); ?>

<?php

  $datos= $usuario->ConsultarUsuario($_GET['id']);
  
  if(isset($_POST['submit'])) {

    //Variables
    $nombre     = mysqli_real_escape_string($usuario->mysqli, $_POST['nombre']);
    $apellido   = mysqli_real_escape_string($usuario->mysqli, $_POST['apellido']);
    $cedula     = mysqli_real_escape_string($usuario->mysqli, $_POST['cedula']);
    $correo     = mysqli_real_escape_string($usuario->mysqli, $_POST['correo']);
    $genero     = mysqli_real_escape_string($usuario->mysqli, $_POST['genero']);
    $fecha_n    = mysqli_real_escape_string($usuario->mysqli, $_POST['fecha_nacimiento']);
    //Verificaciones de formulario
    /*
      1. Verificar si los campos obligatorios Cedula y Correo tienen datos.
      2. Verificar si las contraseñas tienen por lo menos 6 caracteres.
      3. Verificar si las contraseñas son iguales.
    */
      $cedula_unica = $usuario->ValorUnicoActualizable('usuarios','cedula',$cedula,$_GET['id']);
      $correo_unico = $usuario->ValorUnicoActualizable('usuarios','correo',$correo,$_GET['id']);

      if(!empty($nombre) and !empty($apellido) and !empty($cedula) and $cedula_unica == 0 and !empty($correo) and $correo_unico == 0){

        $resultado = $usuario->ActualizarUsuario($nombre,$apellido,$cedula,$correo,$genero,$fecha_n,$_GET['id']);

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
          <form method="POST" action="./actualizar.php?id=<?php echo $_GET['id']; ?>">
            <input type="hidden" name="submit" value="add" >

            <p class="card-description">
              - Todos los datos marcados con <code>(*)</code> son obligatorios.<br/>
              - Si deja en blanco los campos <strong>Contraseña</strong> y <strong>Confirmar</strong>, se le asignara al nuevo usuario la clave por defecto <code>1234</code>.
            </p>
            <?php

              if(isset($_POST['submit'])) {

                  //Cedula no vacia
                  if(empty($cedula)) {
                    echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Cédula es obligatorio.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    ';
                  }
                  //Nombre no vacio
                  elseif(empty($nombre)) {
                    echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Nombre es obligatorio.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    ';
                  }

                  //Apellido no vacio
                  elseif(empty($apellido)) {
                    echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Apellido es obligatorio.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    ';
                  }

                  elseif($cedula_unica > 0) {

                    echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Esta cédula ya ha sido registrada.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    ';

                  }
                  
                  //Correo no vacio
                  elseif(empty($correo)) {
                    echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Correo es obligatorio.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    ';
                  }

                  elseif($correo_unico > 0) {

                    echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Este correo ya ha sido registrado.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    ';

                  }

              }//submit

            ?>

            <!--Fila-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nombre <code>(*)</code></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $datos['nombre'] ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Apellido <code>(*)</code></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="apellido" value="<?php echo $datos['apellido'] ?>"/>
                  </div>
                </div>
              </div>
            </div>
            <!--/Fila-->

            <!--Fila-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Cédula <code>(*)</code></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="cedula" value="<?php echo $datos['cedula'] ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Correo <code>(*)</code></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="correo" value="<?php echo $datos['correo'] ?>"/>
                  </div>
                </div>
              </div>
            </div>
            <!--/Fila-->

            <!--Fila-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Genero</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="genero">
                      <?php
                        if($datos['correo'] == "femenino"){
                      ?>

                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>

                      <?php }else{ ?>

                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>

                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fecha nac.</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="date" name="fecha_nacimiento" placeholder="dd/mm/yyyy" value="<?php echo $datos['fecha_nac']; ?>"/>
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
        </div>
      </div>
    </div>

  </div>

<!--Footer-->
<?php include '../../includes/footer.php' ?>