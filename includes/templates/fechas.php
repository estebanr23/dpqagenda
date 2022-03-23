<?php 
    while($reserva = $resultado->fetch_array(MYSQLI_ASSOC)) { 

        $fecha_ini = strftime( "%d, %Y ", strtotime($reserva['fecha_ini']));
        $fecha_ini_mes = strftime( "%B", strtotime($reserva['fecha_ini']));
        //$fecha_ini_mostrar = ucfirst($fecha_ini);

        $fecha_fin = strftime( "%d, %Y ", strtotime($reserva['fecha_fin']));
        $fecha_fin_mes = strftime( "%B", strtotime($reserva['fecha_fin']));
        //$fecha_fin_mostrar = ucfirst($fecha_fin);

        $hora_ini = date("h:i A" , strtotime($reserva['hora_ini']));
        $hora_fin = date("h:i A" , strtotime($reserva['hora_fin']));

        $mes_es = array(
            'January' => 'Enero', 
            'February' => 'Febrero', 
            'March' => 'Marzo', 
            'April' => 'Abril', 
            'May' => 'Mayo', 
            'June' => 'Junio', 
            'July' => 'Julio', 
            'August' => 'Agosto', 
            'September' => 'Septiembre', 
            'October' => 'Octubre', 
            'November' => 'Noviembre', 
            'December' => 'Diciembre', 
        );

        $fecha_ini_mostrar = $mes_es[$fecha_ini_mes] .' '. $fecha_ini;
        $fecha_fin_mostrar = $mes_es[$fecha_fin_mes] .' '. $fecha_fin;

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