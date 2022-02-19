<?php 

include_once '../includes/funciones/db_conexion.php';
//include_once '/funciones/funciones.php';

// Reabrir Reserva
if ($_POST['registro'] == 'reabrir') {
    $estado_reserva = 1;
    $id_reabrir = $_POST['id'];

    try {
        $stmt = $conn->prepare("UPDATE reserva SET estado_reserva = ?, editado = NOW() WHERE id_reserva = ?");
        $stmt->bind_param("ii", $estado_reserva, $id_reabrir);      
        $stmt->execute();
        // Crear campo editado
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_reabrir
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    
    die(json_encode($respuesta));
}


// Cerrar Reserva
if ($_POST['registro'] == 'cerrar') {
    $estado_reserva = 2;
    $id_cerrar = $_POST['id'];

    try {
        $stmt = $conn->prepare("UPDATE reserva SET estado_reserva = ?, editado = NOW() WHERE id_reserva = ?");
        $stmt->bind_param("ii", $estado_reserva, $id_cerrar);      
        $stmt->execute();
        // Crear campo editado
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_cerrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    
    die(json_encode($respuesta));
}


// Eliminar Reserva
if ($_POST['registro'] == 'eliminar') { 
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM reserva WHERE id_reserva = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}
