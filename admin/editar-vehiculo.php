<?php include_once 'funciones/sesiones.php';

      include_once '../includes/funciones/db_conexion.php';

      include_once 'templates/header.php'; 
      $id = $_GET['id'];
      if(!filter_var($id, FILTER_VALIDATE_INT)) { // La funcion comprueba que id sea un entero.
        die("Error!");
      }

      include_once 'templates/barra.php'; 

      include_once 'templates/navegacion.php'; 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Vehiculo
        <small>Puedes editar los datos de los vehiculos aqui</small>
      </h1>
    </section>
      
    <div class="row">
      <div class="col-md-8">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Vehiculos</h3>
            </div>
            <?php
              $sql = "SELECT * FROM `vehiculo` WHERE `id_vehiculo` = $id ";
              $resultado = $conn->query($sql);
              $vehiculo = $resultado->fetch_assoc();
            ?>
            <!-- form start -->
            <form role="form" name="guardar_registro" id="guardar-registro-archivo" method="POST" action="modelo-vehiculo.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="modelo">Modelo:</label>
                  <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" value="<?php echo $vehiculo['modelo']; ?>">
                </div>
                <div class="form-group">
                  <label for="dominio">Dominio:</label>
                  <input type="text" class="form-control" id="dominio" name="dominio" placeholder="Dominio" value="<?php echo $vehiculo['dominio']; ?>">
                </div>
                <div class="form-group">
                  <label for="titular">Titular:</label>
                  <input type="text" class="form-control" id="titular" name="titular" placeholder="Titular" value="<?php echo $vehiculo['titular']; ?>">
                </div>
                <div class="form-group">
                  <label for="anio">A??o:</label>
                  <input type="text" class="form-control" id="anio" name="anio" placeholder="A??o" value="<?php echo $vehiculo['anio']; ?>">
                  <span id="resultado_password" class="help-block"></span>
                </div>
                <div class="form-group">
                  <label for="imagen_actual">Imagen Actual:</label>
                  <br>
                  <img src="../img/vehiculos/<?php echo $vehiculo['url_imagen']; ?>" width="200">
                </div>
                <div class="form-group">
                  <label for="imagen_vehiculo">File input</label>
                  <input type="file" class="form-control" id="imagen_vehiculos" name="archivo_imagen">

                  <p class="help-block">A??ada la imagen aqui</p>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                <input type="hidden" name="url_imagen" value="<?php echo $vehiculo['url_imagen']; ?>"> <!-- Campo agregado para la imagen predeterminada de editar. -->
                <button type="submit" class="btn btn-primary" id="crear_registro_vehiculo">Guardar</button>
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
  
