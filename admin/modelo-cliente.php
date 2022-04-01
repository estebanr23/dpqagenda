<?php 

include_once '../includes/funciones/db_conexion.php';

if($_POST['registro'] != 'eliminar') {
    $nombre = $_POST['nombre'];
    $iden = $_POST['identificacion'];
}

if ($_POST['registro'] == 'nuevo') {

    try {
        $stmt = $conn->prepare("INSERT INTO cliente (nombre, identificacion) VALUES (?,?)");
        $stmt->bind_param("ss", $nombre, $iden);
        $stmt->execute();
        $id_registro = $stmt->insert_id; 

        if($id_registro > 0) { 
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_registro
            ); 
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta)); 
}

// Editar admin
if ($_POST['registro'] == 'actualizar') {
    
    $id_registro = $_POST['id_registro'];
    
    try {
        $stmt = $conn->prepare('UPDATE cliente SET nombre = ?, identificacion = ?, editado = NOW() WHERE id_cliente = ?');
        $stmt->bind_param("ssi", $nombre, $iden, $id_registro);
        $stmt->execute();
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

// Eliminar cliente
if ($_POST['registro'] == 'eliminar') { 
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM cliente WHERE id_cliente = ? ');
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
