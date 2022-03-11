<?php include_once 'funciones/sesiones.php';
      
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
        Dashboard
        <small>Informacion</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <h2 class="page-header">Resumen de Registros</h2>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(id_cliente) AS clientes FROM cliente ";
                    $resultado = $conn->query($sql);
                    $clientes = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                    <h3><?php echo $clientes['clientes']; ?></h3>

                    <p>Total Clientes</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-user"></i>
                    </div>
                    <a href="lista-cliente.php" class="small-box-footer">
                    Mas Información <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(id_vehiculo) AS vehiculos FROM vehiculo";
                    $resultado = $conn->query($sql);
                    $vehiculos = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                    <h3><?php echo $vehiculos['vehiculos']; ?></h3>

                    <p>Total Vehiculos</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-users"></i>
                    </div>
                    <a href="lista-vehiculo.php" class="small-box-footer">
                    Mas Informaión <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(id_reserva) AS reservas FROM reserva WHERE estado_reserva = 1";
                    $resultado = $conn->query($sql);
                    $reservas = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                    <h3><?php echo $reservas['reservas']; ?></h3>

                    <p>Reservas Abiertas</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-user-times"></i>
                    </div>
                    <a href="lista-reserva-open.php" class="small-box-footer">
                    Mas Informaión <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <?php 
                    $sql = "SELECT COUNT(id_reserva) AS reservas FROM reserva WHERE estado_reserva = 2";
                    $resultado = $conn->query($sql);
                    $reservas = $resultado->fetch_assoc();
                ?>
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                    <h3><?php echo $reservas['reservas']; ?></h3>

                    <p>Reservas Cerradas</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-user-times"></i>
                    </div>
                    <a href="lista-reserva-close.php" class="small-box-footer">
                    Mas Informaión <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
            <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>
  
