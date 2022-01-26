<?php 

include_once '../includes/funciones/db_conexion.php';
//include_once '/funciones/funciones.php';

// Editar Reserva
if ($_POST['registro'] == 'actualizar') {

    try {
        $stmt = $conn->prepare("UPDATE vehiculo SET modelo = ?, dominio = ?, titular = ?, anio = ?, estado_vehiculo = ?, url_imagen = ? WHERE id_vehiculo = ?");
        $stmt->bind_param("ssssisi", $modelo, $dominio, $titular, $anio, $estado_vehiculo, $url_imagen, $id_registro);      
        $stmt->execute();
        // Crear campo editado
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $stmt->insert_id
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
        if($stmt->affected_rows){
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
