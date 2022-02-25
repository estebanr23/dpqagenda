<?php 
    include_once 'includes/templates/header.php'; 
?>
    <main class="principal">
        <div class="contenedor">

            <?php 
                require_once('includes/funciones/db_conexion.php');
                $sql = " SELECT * FROM vehiculo ";
                $resultado = $conn->query($sql);
            ?>
            
            <form action="resultado.php" method="POST">
                <div class="buscador">
                    <input class="buscar" type="text" name="buscador" placeholder="Buscar">
                    <input class="btn-buscar" type="submit" value="Buscar">
                </div>
            </form>
            <h1 class="centrar-texto h1-margin">Vehiculos</h1>
            <div class="lista-vehiculos" id="lista-vehiculos">
                <?php while ($vehiculo = $resultado->fetch_assoc()) { ?>
                    <article class="vehiculo">
                        <img src="img/vehiculos/<?php echo $vehiculo['url_imagen']; ?>">
                        <div class="info-vehiculo">
                            <p>Modelo: <span><?php echo $vehiculo['modelo']; ?></span></p>
                            <p>Dominio: <span><?php echo $vehiculo['dominio']; ?></span></p>
                            <p>Titular: <span><?php echo $vehiculo['titular']; ?></span></p>
                            <p>Año: <span><?php echo $vehiculo['anio']; ?></span><span class="estado disponible">Disponible</span></p>
                        </div>
                        <div class="after-btn">
                            <div class="enlaces">
                                <a href="reservas.php?id=<?php echo $vehiculo['id_vehiculo']; ?>">Reservas</a>
                                <?php if($_SESSION['nivel'] == 1 OR $_SESSION['nivel'] == 2) { ?>
                                    <a href="formCliente.php?id=<?php echo $vehiculo['id_vehiculo']; ?>">Agendar</a>
                                <?php } ?>
                            </div>
                        </div>
                    </article>    
                <?php } ?>
            </div> 
        </div>       
    </main>
<?php include_once 'includes/templates/footer.php'; ?>