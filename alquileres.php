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
                    $sql .= " ORDER BY fecha_ini ";
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
                        <?php 
                            // setlocale(LC_TIME, 'es_ES.UTF-8'); Linux
                            setlocale(LC_TIME, 'spanish');
                            while($alquiler = $resultado->fetch_array(MYSQLI_ASSOC)) { 

                                $fecha_ini = strftime( "%B %d, %Y ", strtotime($alquiler['fecha_ini']));
                                $fecha_ini_mostrar = ucfirst($fecha_ini);

                                $fecha_fin = strftime( "%B %d, %Y ", strtotime($alquiler['fecha_fin']));
                                $fecha_fin_mostrar = ucfirst($fecha_fin);

                                $hora_ini = date("h:i A" , strtotime($alquiler['hora_ini']));
                                $hora_fin = date("h:i A" , strtotime($alquiler['hora_fin']));

                        ?>
                            <tr>
                                <td><a href="editar.php?id=<?php echo $alquiler['id_reserva']; ?>"><?php echo $alquiler['nombre']; ?></a></td>
                                <td><?php echo $alquiler['modelo']; ?></td>
                                <td><?php echo $fecha_ini_mostrar; ?></td>
                                <td><?php echo $fecha_fin_mostrar; ?></td>
                                <td><?php echo $hora_ini; ?></td>
                                <td><?php echo $hora_fin; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>     
    </main>    
<?php include_once 'includes/templates/footer.php'; ?>