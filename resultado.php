<?php include_once 'includes/templates/header.php'; 
    $buscador = $_POST['buscador'];
?>

    <main class="principal">
        <div class="contenedor">
            <h1 class="centrar-texto h1-margin">Resultado de Busqueda</h1>
            <div class="contenedor-tabla">

            <?php 
                require_once('includes/funciones/db_conexion.php');
                $sql = " SELECT id_cliente, nombre, id_reserva, modelo, categoria, fecha_ini, fecha_fin, hora_ini, hora_fin, estado_reserva ";
                $sql .= " FROM cliente ";
                $sql .= " INNER JOIN reserva ";
                $sql .= " ON reserva.cliente = cliente.id_cliente ";
                $sql .= " INNER JOIN vehiculo ";
                $sql .= " ON reserva.vehiculo = vehiculo.id_vehiculo ";
                $sql .= " INNER JOIN categoria ";
                $sql .= " ON reserva.categoria = categoria.id_categoria ";
                $sql .= " AND nombre LIKE '%$buscador%'";
                $sql .= " AND estado_reserva = 1 ";
                $resultado = $conn->query($sql);
            ?>

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
                        <?php while ($reserva = $resultado->fetch_assoc()) { ?>
                            <tr>
                                <td><a href="editar.php?id=<?php echo $reserva['id_reserva']; ?>"><?php echo $reserva['nombre']; ?></a></td>
                                <td><?php echo $reserva['modelo']; ?></td>
                                <td><?php echo $reserva['fecha_ini']; ?></td>
                                <td><?php echo $reserva['fecha_fin']; ?></td>
                                <td><?php echo $reserva['hora_ini']; ?></td>
                                <td><?php echo $reserva['hora_fin']; ?></td>
                            </tr>
                        <?php } ?>

                        <!--
                        <tr>
                            <td>Fernando Rojas</td>
                            <td>Yaris</td>
                            <td>10/11/2021</td>
                            <td>16/12/2021</td>
                            <td>Kinto</td>
                        </tr>
                        <tr>
                            <td>Federico Aviles</td>
                            <td>Corolla</td>
                            <td>2/10/2021</td>
                            <td>13/10/2021</td>
                            <td>Toyota del Parque</td>
                        </tr>
                        -->
                    </tbody>
                </table>
            </div>
        </div>     
    </main>    
<?php include_once 'includes/templates/footer.php'; ?>