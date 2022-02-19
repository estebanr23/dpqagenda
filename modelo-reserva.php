<?php include_once 'includes/funciones/sesiones.php';

require_once('includes/funciones/db_conexion.php');

if($_POST['reg-cliente'] == 'nuevo') {
    $nombre = $_POST['nombre'];
    $identificacion = $_POST['identificacion'];

    try {
        $sql = " SELECT * FROM cliente WHERE identificacion = $identificacion";
        $resultado = $conn->query($sql);
        $cliente = $resultado->fetch_assoc();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    
    if(!$cliente) { // Si el cliente no existe lo crea.
    
        try {
            $stmt = $conn->prepare('INSERT INTO cliente (nombre, identificacion) VALUES (?, ?)');
            $stmt->bind_param("ss", $nombre, $identificacion);
            $stmt->execute();
            $id_insertado = $stmt->insert_id;
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_insertado' => $id_insertado
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );    
            }
            $stmt->close();
            $conn->close();
        
            // Envia los datos del nuevo cliente al siguiente formulario.
            //$_SESSION['cliente'] = $nombre;
            $_SESSION['identificacion'] = $identificacion;
            header('Location: formAgenda.php');
    
        } catch (\Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
        
        die(json_encode($respuesta));
    
    } else { // Si el cliente existe, solo envia los datos al siguiente formulario.
    
        //$_SESSION['cliente'] = $cliente['nombre'];
        $_SESSION['identificacion'] = $cliente['identificacion'];
        //header('Location: formAgenda.php?nombre='.$cliente_nombre);
    
        header('Location: formAgenda.php');
    }
}



// Crear Reserva
if($_POST['reg-reserva'] == 'nuevo') {
    $cliente = $_POST['cliente'];
    $vehiculo = $_POST['vehiculo'];
    $categoria = $_POST['categoria'];
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];
    $hora_ini = $_POST['hora_ini'];
    $hora_fin = $_POST['hora_fin'];
    $descripcion = $_POST['descripcion'];
    $total = $_POST['total'];
    $estado_reserva = 1;

    try {
        $stmt = $conn->prepare('INSERT INTO reserva (cliente, vehiculo, categoria, fecha_ini, fecha_fin, hora_ini, hora_fin, descripcion, total, estado_reserva) VALUES (?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('iiisssssdi', $cliente, $vehiculo, $categoria, $fecha_ini, $fecha_fin, $hora_ini, $hora_fin, $descripcion, $total, $estado_reserva);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );    
        }
        $stmt->close();
        $conn->close();

        //header('Location: index.php');
        
    } catch (\Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}


// Editar Reserva
if($_POST['reg-reserva'] == 'actualizar') {
    $cliente = $_POST['cliente'];
    $vehiculo = $_POST['vehiculo'];
    $categoria = $_POST['categoria'];
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];
    $hora_ini = $_POST['hora_ini'];
    $hora_fin = $_POST['hora_fin'];
    $descripcion = $_POST['descripcion'];
    $total = $_POST['total'];
    // Variable que cambia con JavaScript
    $estado_reserva = $_POST['estado_reserva'];
    $id_reserva = $_POST['id_reserva'];

    try {
        $stmt = $conn->prepare('UPDATE reserva SET cliente = ?, vehiculo = ?, categoria = ?, fecha_ini = ?, fecha_fin = ?, hora_ini = ?, hora_fin = ?, descripcion = ?, total = ?, estado_reserva = ?, editado = NOW() WHERE id_reserva = ?');
        $stmt->bind_param('iiisssssdii', $cliente, $vehiculo, $categoria, $fecha_ini, $fecha_fin, $hora_ini, $hora_fin, $descripcion, $total, $estado_reserva, $id_reserva);
        $stmt->execute();

        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $stmt->insert_id // No muestra el id de reserva actualizada
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();

    } catch (\Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

?>