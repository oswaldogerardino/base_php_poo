<!--Header-->
<?php
  include('../../includes/header.php');
  include("../../clases/ClaseUsuario.php");
  
  if(isset($_POST['submit'])) {

    //Variables
    $nombre     = mysqli_real_escape_string($usuario->mysqli, $_POST['nombre']);
    $apellido   = mysqli_real_escape_string($usuario->mysqli, $_POST['apellido']);
    $cedula     = mysqli_real_escape_string($usuario->mysqli, $_POST['cedula']);
    $correo     = mysqli_real_escape_string($usuario->mysqli, $_POST['correo']);
    $genero     = mysqli_real_escape_string($usuario->mysqli, $_POST['genero']);
    $fecha_n    = mysqli_real_escape_string($usuario->mysqli, $_POST['fecha_nacimiento']);
    $contra     = mysqli_real_escape_string($usuario->mysqli, $_POST['contra']);
    $confirmar  = mysqli_real_escape_string($usuario->mysqli, $_POST['confirmar']);
    //Verificaciones de formulario
    /*
      1. Verificar si los campos obligatorios Cedula y Correo tienen datos.
      2. Verificar si las contraseñas tienen por lo menos 6 caracteres.
      3. Verificar si las contraseñas son iguales.
    */
      $cedula_unica = $usuario->ValorUnico('usuarios','cedula',$cedula);
      $correo_unico = $usuario->ValorUnico('usuarios','correo',$correo);

      if(!empty($nombre) and !empty($apellido) and !empty($cedula) and $cedula_unica == 0 and !empty($correo) and $correo_unico == 0 and !empty($contra) and strlen($contra) > 5 and $contra == $confirmar and $correo_unico == 0){

        $resultado = $usuario->CrearUsuario($nombre,$apellido,$cedula,$correo,$genero,$fecha_n,$contra);

        if($resultado){

          setcookie("msj_usuario", "Registro exitoso", time()+ 1,'/');
          header("Location: ./lista.php");
        }
  
      }
      
  }
?>
<!-- Contenedor principal -->
<div class="main-panel">
  <div class="content-wrapper">
    
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">CREAR NUEVO USUARIO </h4>
          <form method="POST" action="./crear.php">
            <input type="hidden" name="submit" value="add" >

            <p class="card-description">
              - Todos los datos marcados con <code>(*)</code> son obligatorios.<br/>
            </p>
            <?php

              if(isset($_POST['submit'])) {

                  //Nombre no vacio
                  if(empty($nombre)) {
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

                  //Cedula no vacia
                  elseif(empty($cedula)) {
                    echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Cédula es obligatorio.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    ';
                  }

                  //Cedula no vacia
                  elseif(!is_numeric($cedula)) {
                    echo '
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        La Cédula debe ser un numero.
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

                  //Clave no vacia
                  elseif(empty($contra)) {

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

            <!--Fila-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nombre <code>(*)</code></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Apellido <code>(*)</code></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="apellido" value="<?php echo isset($_POST['apellido']) ? $_POST['apellido'] : '' ?>"/>
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
                    <input type="text" class="form-control" name="cedula" value="<?php echo isset($_POST['cedula']) ? $_POST['cedula'] : '' ?>"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Correo <code>(*)</code></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="correo" value="<?php echo isset($_POST['correo']) ? $_POST['correo'] : '' ?>"/>
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
                        if(isset($_POST['genero']) and $_POST['genero'] == "femenino"){
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
                    <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>"  name="fecha_nacimiento"/>
                  </div>
                </div>
              </div>
            </div>
            <!--/Fila-->

            <p class="card-description">
              Seguridad. 
            </p>
            <!--Fila-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Contraseña <code>(*)</code></label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="contra"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Confirmar</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="confirmar" />
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