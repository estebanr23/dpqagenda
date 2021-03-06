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
        Listado de Clientes
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los clientes en esta seccion</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Identificacion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    try {
                      $sql = "SELECT id_cliente, nombre, identificacion FROM cliente";
                      $resultado = $conn->query($sql);
                    } catch(Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }

                    while($cliente = $resultado->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $cliente['nombre']; ?></td>
                        <td><?php echo $cliente['identificacion']; ?></td>
                        <td>
                          <a href="editar-cliente.php?id=<?php echo $cliente['id_cliente']; ?>" class="btn bg-orange btn-flat margin">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="#" data-id="<?php echo $cliente['id_cliente']; ?>" data-tipo="cliente" class="btn bg-maroon bnt-flat margin borrar_registro">
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Identificacion</th>
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
  
