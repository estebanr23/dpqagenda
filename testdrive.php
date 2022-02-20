<?php include_once 'includes/templates/header.php'; ?>
    <main class="principal">
        <div class="contenedor">

            <?php 
                try {
                    require_once('includes/funciones/db_conexion.php');
                    $sql = " SELECT id_reserva, nombre, modelo, categoria, fecha_ini, fecha_fin, hora_ini, hora_fin, estado_reserva ";
                    $sql .= " FROM reserva ";
                    $sql .= " INNER JOIN cliente ";
                    $sql .= " ON reserva.cliente = cliente.id_cliente ";
                    $sql .= " INNER JOIN vehiculo ";
                    $sql .= " ON reserva.vehiculo = vehiculo.id_vehiculo ";
                    $sql .= " INNER JOIN categoria ";
                    $sql .= " ON reserva.categoria = categoria.id_categoria ";
                    $sql .= " AND categoria.id_categoria = 2 ";
                    $sql .= " AND reserva.estado_reserva = 1 ";
                    $sql .= " ORDER BY fecha_ini ";
                    $resultado = $conn->query($sql);
                } catch(\Exception $e) {
                    echo $e->getMessage();
                }
            ?>

            <h1 class="centrar-texto h1-margin">TestDrive</h1>
            <div class="contenedor-tabla">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Vehiculo</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Fin</th>
                            <th>Hora de Inicio</th>
                            <th>Hora de Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($testdrive = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td><a href="editar.php?id=<?php echo $testdrive['id_reserva']; ?>"><?php echo $testdrive['nombre']; ?></a></td>
                                <td><?php echo $testdrive['modelo']; ?></td>
                                <td><?php echo $testdrive['fecha_ini']; ?></td>
                                <td><?php echo $testdrive['fecha_fin']; ?></td>
                                <td><?php echo $testdrive['hora_ini']; ?></td>
                                <td><?php echo $testdrive['hora_fin']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>     
    </main>    
<?php include_once 'includes/templates/footer.php'; ?>