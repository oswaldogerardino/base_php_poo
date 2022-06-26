<!--Header-->
<?php
  include('../../includes/header.php');
  include('../../clases/ClaseUsuario.php');

  //checkear el status de la session
  $usuario->SesionStatus();
?>
<!-- Contenedor principal -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Listado de usuarios</h4>
            <div class="d-flex flex-row-reverse">
              <a class="btn btn-primary btn-sm"" href="./crear.php"><i class="ti-plus text-white font-weight-bold"></i> Nuevo</a>
            </div>
            <p class="card-description">
              Listado de usuarios del sistema.
            </p>

            <?php if(isset($_COOKIE['msj_usuario'])){ ?>
              
              <div class="alert alert-success" role="alert">
                <?php echo $_COOKIE['msj_usuario']; ?>
              </div>
                            
            <?php } ?>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Nombre
                    </th>
                    <th>
                      Apellido
                    </th>
                    <th>
                      Correo
                    </th>
                    <th>
                      Rol
                    </th>
                    <th>
                      Opciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <!--Item-->
                    <?php 
                      $datos = $usuario->ListaUsuario();
                      foreach ($datos as $d) {
                    ?>
                        <tr>
                          <td>
                            <a href="./actualizar.php?id=<?php echo $d['id']; ?>"><?php echo $d['nombre']; ?></a>
                          </td>
                          <td>
                          <a href="./actualizar.php?id=<?php echo $d['id']; ?>"><?php echo $d['apellido']; ?></a>
                          </td>
                          <td>
                          <a href="./actualizar.php?id=<?php echo $d['id']; ?>"><?php echo $d['correo']; ?></a>
                          </td>
                          <td>
                          <a href="./actualizar.php?id=<?php echo $d['id']; ?>"><?php echo $d['rol']; ?></a>
                          </td>
                          <td>
                            <a title="Actualizar contraseña" href="./actualizar_contrasena.php?id=<?php echo $d['id']; ?>"><i class="ti-lock"></i></a>
                            &nbsp;
                            <a title="Actualizar datos" href="./actualizar.php?id=<?php echo $d['id']; ?>"><i class="ti-pencil"></i></a>
                            &nbsp;
                            <?php  if($d['correo'] != $_SESSION['correo']){ ?>
                            <a title="Borrar registro" href="./confirmar_borrado.php?id=<?php echo $d['id']; ?>"><i class="ti-trash"></i></a>
                            <?php }else{ ?>
                              <a title="Borrar registro" href="#" onclick="javascript:alert('Aviso: No puede borrar su propio usuario!')"><i class="ti-trash"></i></a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php } ?>
                  <!--/Item-->

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<!--Footer-->
<?php include '../../includes/footer.php' ?>