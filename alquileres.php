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
                    $sql .= " AND categoria.id_categoria = 1 ";
                    $sql .= " AND reserva.estado_reserva = 1 ";
                    $resultado = $conn->query($sql);
                } catch(\Exception $e) {
                    echo $e->getMessage();
                }
            ?>

            <h1 class="centrar-texto h1-margin">Alquileres</h1>
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
                        <?php while($alquiler = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td><a href="editar.php?id=<?php echo $alquiler['id_reserva']; ?>"><?php echo $alquiler['nombre']; ?></a></td>
                                <td><?php echo $alquiler['modelo']; ?></td>
                                <td><?php echo $alquiler['fecha_ini']; ?></td>
                                <td><?php echo $alquiler['fecha_fin']; ?></td>
                                <td><?php echo $alquiler['hora_ini']; ?></td>
                                <td><?php echo $alquiler['hora_fin']; ?></td>
                            </tr>
                        <?php } ?>

<!--                        
                        <tr>
                            <td><a href="editar.php">Esteban Robert</a></td>
                            <td>Etios</td>
                            <td>15/12/2021</td>
                            <td>20/12/2021</td>
                            <td>09:00 am</td>
                            <td>18:00 pm</td>
                        </tr>
                        <tr>
                            <td>Fernando Rojas</td>
                            <td>Yaris</td>
                            <td>10/11/2021</td>
                            <td>16/12/2021</td>
                            <td>09:00 am</td>
                            <td>18:00 pm</td>
                        </tr>
                        <tr>
                            <td>Federico Aviles</td>
                            <td>Corolla</td>
                            <td>2/10/2021</td>
                            <td>13/10/2021</td>
                            <td>09:00 am</td>
                            <td>18:00 pm</td>
                        </tr>
-->
                    </tbody>
                </table>
            </div>
        </div>     
    </main>    
<?php include_once 'includes/templates/footer.php'; ?>