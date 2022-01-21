<?php include_once 'funciones/sesiones.php';

    include_once 'funciones/funciones.php';

    include_once 'templates/header.php'; 

    include_once 'templates/barra.php'; 

    include_once 'templates/navegacion.php'; 

    include_once '../includes/funciones/db_conexion.php';

    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Error!");
    }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Cliente
        <small>Puedes editar los datos del cliente aqui</small>
      </h1>
    </section>

    <?php
        $sql = "SELECT * FROM cliente WHERE id_cliente = $id";
        $resultado = $conn->query($sql);
        $cliente = $resultado->fetch_assoc();
    ?>
      
    <div class="row">
      <div class="col-md-8">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Cliente</h3>
            </div>
            <!-- form start -->
            <form role="form" name="guardar_registro" id="guardar_registro" method="POST" action="modelo-cliente.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo" value="<?php echo $cliente['nombre']; ?>">
                </div>
                <div class="form-group">
                  <label for="password">DNI / CUIT:</label>
                  <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="DNI" value="<?php echo $cliente['identificacion']; ?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary">Guardar</button>
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
  
