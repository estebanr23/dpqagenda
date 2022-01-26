<?php include_once 'funciones/sesiones.php';

      include_once 'funciones/funciones.php';

      include_once 'templates/header.php'; 

      include_once 'templates/barra.php'; 

      include_once 'templates/navegacion.php'; 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Administrador
        <small>Llena el formulario para crear un administrador</small>
      </h1>
    </section>
      
    <div class="row">
      <div class="col-md-8">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Admin</h3>
            </div>
            <!-- form start -->
            <form role="form" name="guardar_registro" id="guardar-registro-archivo" method="POST" action="modelo-vehiculo.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="modelo">Modelo:</label>
                  <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
                </div>
                <div class="form-group">
                  <label for="dominio">Dominio:</label>
                  <input type="text" class="form-control" id="dominio" name="dominio" placeholder="Dominio">
                </div>
                <div class="form-group">
                  <label for="titular">Titular:</label>
                  <input type="text" class="form-control" id="titular" name="titular" placeholder="Titular">
                </div>
                <div class="form-group">
                  <label for="anio">Año:</label>
                  <input type="text" class="form-control" id="anio" name="anio" placeholder="Año">
                  <span id="resultado_password" class="help-block"></span>
                </div>
                <div class="form-group">
                  <label for="imagen_invitado">File input</label>
                  <input type="file" class="form-control" id="imagen_vehiculo" name="archivo_imagen">

                  <p class="help-block">Añada la imagen aqui</p>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary">Añadir</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </section>
        <!-- /.content -->
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>
  
