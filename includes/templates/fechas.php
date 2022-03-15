<?php 
    setlocale(LC_TIME, 'es_ES.UTF-8'); // Linux
    // setlocale(LC_TIME, 'spanish');
    while($reserva = $resultado->fetch_array(MYSQLI_ASSOC)) { 

        $fecha_ini = strftime( "%B %d, %Y ", strtotime($reserva['fecha_ini']));
        $fecha_ini_mostrar = ucfirst($fecha_ini);

        $fecha_fin = strftime( "%B %d, %Y ", strtotime($reserva['fecha_fin']));
        $fecha_fin_mostrar = ucfirst($fecha_fin);

        $hora_ini = date("h:i A" , strtotime($reserva['hora_ini']));
        $hora_fin = date("h:i A" , strtotime($reserva['hora_fin']));

    ?>
    <tr>
        <?php if($_SESSION['nivel'] == 1 OR $_SESSION['nivel'] == 2) { ?>
            <td><a href="editar.php?id=<?php echo $reserva['id_reserva']; ?>"><?php echo $reserva['nombre']; ?></a></td>
        <?php } else { ?>
            <td><?php echo $reserva['nombre']; ?></td>
        <?php } ?>    
        <td><?php echo $reserva['modelo']; ?></td>
        <td><?php echo $fecha_ini_mostrar; ?></td>
        <td><?php echo $fecha_fin_mostrar; ?></td>
        <td><?php echo $hora_ini; ?></td>
        <td><?php echo $hora_fin; ?></td>
    </tr>
<?php } ?>