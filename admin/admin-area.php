<?php include_once 'funciones/sesiones.php';
      
      include_once 'templates/header.php'; 

      include_once 'templates/barra.php'; 

      include_once 'templates/navegacion.php'; 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de Administracion
        <small>Pagina principal</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title">Informatica</h3>
        </div>
        <div class="box-body">
          Comenza a editar los parametros desde aqui.
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <div class="row">
        <div class="col-md-8">
          <!-- Main content -->
          <section class="content">
            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Exportar Reservas</h3>
              </div>
              <!-- form start -->
              <form role="form" name="form_excel" id="form_excel" method="POST" action="export-excel.php">
                <div class="box-body">
                  <div class="form-group">
                    <label for="fecha_desde">Fecha Desde:</label>
                    <input type="date" class="form-control" id="fecha_desde" name="fecha_desde">
                  </div>
                  <div class="form-group">
                    <label for="fecha_hasta">Fecha Hasta:</label>
                    <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta">
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="hidden" name="registro" value="export">
                  <button type="submit" class="btn btn-primary">Exportar</button>
                </div>
              </form>
            </div>
            <!-- /.box -->
          </section>
          <!-- /.content -->
        </div>
      </div> <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>
  
