<?php 

/* Verificar Conexion a la Base de Datos

if($conn->ping()) {
    echo "Conectado";
} else{
    echo "NO!";
}
*/
include_once '../includes/funciones/db_conexion.php';

if($_POST['registro'] != 'eliminar') {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $nivel = $_POST['nivel'];
    $password = $_POST['password'];
}

// Crear admin
if ($_POST['registro'] == 'nuevo') {
    
    $opciones = array(
        'cost' => 12
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
        $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password, nivel) VALUES (?,?,?,?)");
        $stmt->bind_param("sssi", $usuario, $nombre, $password_hashed, $nivel);
        $stmt->execute();
        $id_registro = $stmt->insert_id; // Obtener el ID generado en la operación INSERT anterior.
        // affected_row Devuelve el número total de filas cambiadas, borradas, o insertadas por la última sentencia ejecutada.
        // if($stmt->affected_rows) { // Si se inserto algo en la base de datos quiero esta respuesta.
        if($id_registro > 0) { // El id de un registro es mayor a 0 siempre.
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
    $id_registro = $_POST['id_registro'];
    
    try {
        // empty() cheque si una variable esta vacia.
        if(empty($_POST['password'])) {
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, nivel = ?, editado = NOW() WHERE id_admins = ?");
            $stmt->bind_param("ssii", $usuario, $nombre, $nivel, $id_registro);
        } else {
            $opciones = array(
                'cost' => 12
            );
    
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            $stmt = $conn->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ?, nivel = ?, editado = NOW() WHERE id_admins = ?');
            $stmt->bind_param("sssii", $usuario, $nombre, $hash_password, $nivel, $id_registro);
        }
        
        $stmt->execute();
        if($stmt->affected_rows > 0) {
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

// Eliminar admin
if ($_POST['registro'] == 'eliminar') { 
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM admins WHERE id_admins = ? ');
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
