<?php
  include("../../clases/ClaseAcceso.php");
  if(isset($_POST['submit'])) {

    //Variables
    $contra=$_POST['contra'];
    $correo=$_POST['correo'];

    //Verificaciones de formulario
    /*
      1. Verificar si las contraseñas tienen por lo menos 6 caracteres.
      2. Verificar si las contraseñas son iguales.

    */
      if($acceso->ConsultaAcceso($correo,$contra) > 0){
        
        session_start();
        $datos= $acceso->ConsultarDatos($correo);

        $_SESSION['correo']    = $correo;
        $_SESSION['nombre']    = $datos['nombre'];
        $_SESSION['apellido']  = $datos['apellido'];
        $_SESSION['conectado'] = true;

        header("Location: ../principal/principal.php ");
  
      }else{
        
        setcookie("msj_login", "Datos incorrectos, intente otra vez!", time()+ 1,'/');
        header("Location: ./login.php");

      }
      

  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Base php</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->

    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/login.jpg" />
  </head>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../assets/images/login.png" alt="logo">
              </div>
              <h4>Ingrese sus datos para continuar...</h4>

              <?php if(isset($_COOKIE['msj_login'])){ ?>
              
                <div class="alert alert-danger" role="alert">
                  <?php echo $_COOKIE['msj_login']; ?>
                </div>

              <?php }elseif(isset($_COOKIE['msj_login_out'])){ ?>
              
                <div class="alert alert-info" role="alert">
                  <?php echo $_COOKIE['msj_login_out']; ?>
                </div>
                
              <?php } ?>

              <form action="./login.php" method="POST" class="pt-3 pb-2">
                <input type="hidden" name="submit" value="add" >
                <div class="form-group">
                  <input name="correo" type="text" class="form-control form-control-lg" placeholder="Correo">
                </div>
                <div class="form-group">
                  <input name="contra" type="password" class="form-control form-control-lg" placeholder="Contraseña">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">                                             
                    Entrar
                  </button>
                </div>
              </form>

              <h6><a href="./registrar.php">Registrarme...</a></h6>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</html>
