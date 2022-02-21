<?php
    header("Content-Type:application/xls");
    header("Content-Disposition: attachment; filename=reservas ". date('Y:m:d:m:s').".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
 
    $fecha_desde = date("Y-m-d H:i:s", strtotime($_POST['fecha_desde']));
    $fecha_hasta = date("Y-m-d H:i:s", strtotime($_POST['fecha_hasta']));

    include_once '../includes/funciones/db_conexion.php';
/*
    try {
        $sql = " SELECT reserva.*, nombre, identificacion, modelo, nombre_cat FROM reserva";
        $sql .= " INNER JOIN cliente ";
        $sql .= " ON reserva.cliente = cliente.id_cliente ";
        $sql .= " INNER JOIN vehiculo ";
        $sql .= " ON reserva.vehiculo = vehiculo.id_vehiculo ";
        $sql .= " INNER JOIN categoria ";
        $sql .= " ON reserva.categoria = categoria.id_categoria ";
        $sql .= " AND reserva.estado_reserva = 2 ";
        $sql .= " AND $fecha_desde <= reserva.editado <= $fecha_hasta";
        $resultado = $conn->query($sql);
      } catch(Exception $e) {
        $error = $e->getMessage();
        echo $error;
      }

      while($reserva = $resultado->fetch_assoc()) {
        $editado = $reserva['editado'];
        $fecha_cierre = date("Y-m-d", strtotime($editado));
      }

      die(json_encode($fecha_cierre));
*/
    $output = "";

    if(isset($_POST['registro']) == 'export') {
        $output .= "
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Vehiculo</th>
                        <th>Categoria</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
        ";

        try {
            $sql = " SELECT reserva.*, nombre, identificacion, modelo, nombre_cat FROM reserva";
            $sql .= " INNER JOIN cliente ";
            $sql .= " ON reserva.cliente = cliente.id_cliente ";
            $sql .= " INNER JOIN vehiculo ";
            $sql .= " ON reserva.vehiculo = vehiculo.id_vehiculo ";
            $sql .= " INNER JOIN categoria ";
            $sql .= " ON reserva.categoria = categoria.id_categoria ";
            $sql .= " AND reserva.estado_reserva = 2 ";
            $sql .= " AND $fecha_desde < reserva.editado AND reserva.editado < $fecha_hasta"; // Revisar
            $resultado = $conn->query($sql);
          } catch(Exception $e) {
            $error = $e->getMessage();
            echo $error;
          }

          while($reserva = $resultado->fetch_assoc()) {
                $output .= "
                <tr>
                    <td>".$reserva['nombre']."</td>
                    <td>".$reserva['modelo']."</td>
                    <td>".$reserva['nombre_cat']."</td>
                    <td>".$reserva['fecha_ini']."</td>
                    <td>".$reserva['fecha_fin']."</td>
                    <td>".$reserva['total']."</td>
                </tr>    
                ";

              }

          $output .= "
                </tbody>
            </table>
          ";

          echo $output;

    }
?>