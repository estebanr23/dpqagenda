<?php 

include_once '../includes/funciones/db_conexion.php';
//include_once '/funciones/funciones.php';

$modelo = $_POST['modelo'];
$dominio = $_POST['dominio'];
$titular = $_POST['titular'];
$anio = $_POST['anio'];
$url_imagen = $_POST['url_imagen'];
$id_registro = $_POST['id_registro'];
$estado_vehiculo = 1;

if ($_POST['registro'] == 'nuevo') {

    try {
        $stmt = $conn->prepare("INSERT INTO vehiculo (modelo, dominio, titular, anio, estado_vehiculo, url_imagen) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssis", $modelo, $dominio, $titular, $anio, $estado_vehiculo, $url_imagen);
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

    die(json_encode($respuesta)); // Esta linea me devuelve como respuesta un array asociativo de php (por consola) al que puedo acceder con js como si fuera un objeto.
}

// Editar admin
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

// Eliminar Vehiculo
if ($_POST['registro'] == 'eliminar') { 
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM vehiculo WHERE id_vehiculo = ? ');
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
