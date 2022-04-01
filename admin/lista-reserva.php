<?php 
      include_once 'funciones/sesiones.php';
      
      include_once 'templates/header.php'; 

      include_once 'templates/barra.php'; 

      include_once 'templates/navegacion.php'; 

      include_once '../includes/funciones/db_conexion.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Reservas Cerradas
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja las reservas cerradas en esta seccion</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Vehiculo</th>
                    <th>Categoria</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    try {
                      $sql = " SELECT reserva.*, nombre, identificacion, modelo, nombre_cat, estado_res FROM reserva ";
                      $sql .= " INNER JOIN cliente ";
                      $sql .= " ON reserva.cliente = cliente.id_cliente ";
                      $sql .= " INNER JOIN vehiculo ";
                      $sql .= " ON reserva.vehiculo = vehiculo.id_vehiculo ";
                      $sql .= " INNER JOIN categoria ";
                      $sql .= " ON reserva.categoria = categoria.id_categoria ";
                      $sql .= " INNER JOIN estado_reserva ";
                      $sql .= " ON reserva.estado_reserva = id_est_res ";
                      $resultado = $conn->query($sql);
                    } catch(Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }

                    while($reserva = $resultado->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $reserva['nombre']; ?></td>
                        <td><?php echo $reserva['modelo']; ?></td>
                        <td><?php echo $reserva['nombre_cat']; ?></td>
                        <td><?php echo $reserva['fecha_ini']; ?></td>
                        <td><?php echo $reserva['fecha_fin']; ?></td>
                        <td><?php echo $reserva['estado_res']; ?></td>
                        <td><?php echo $reserva['total']; ?></td>
                        <td>
                          <a href="#" data-id="<?php echo $reserva['id_reserva']; ?>" data-tipo="reserva" class="btn bg-maroon bnt-flat margin borrar_registro">
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Cliente</th>
                    <th>Vehiculo</th>
                    <th>Categoria</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>
  
