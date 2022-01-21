<?php include_once 'includes/templates/header.php'; 
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Se ha producido un Error.");
    }
?>
    <div class="contenedor principal">
        <?php
            try {
                require_once('includes/funciones/db_conexion.php');
                $sql = " SELECT reserva.*, nombre, identificacion, id_cliente, id_vehiculo, modelo, id_categoria ,nombre_cat ";
                $sql .= " FROM reserva ";
                $sql .= " INNER JOIN cliente ";
                $sql .= " ON reserva.cliente = cliente.id_cliente ";
                $sql .= " INNER JOIN vehiculo ";
                $sql .= " ON reserva.vehiculo = vehiculo.id_vehiculo ";
                $sql .= " INNER JOIN categoria ";
                $sql .= " ON reserva.categoria = categoria.id_categoria ";
                $sql .= " AND id_reserva = $id ";
                $resultado = $conn->query($sql);
                $reserva = $resultado->fetch_assoc();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            
        ?>

        <h1 class="centrar-texto h1-margin">Editar Reserva</h1>
        <div class="formulario-agenda">
            <form action="modelo-reserva.php" method="POST">
                <div class="campo cliente">
                    <label for="cliente">Cliente</label>
                    <p><?php echo $reserva['nombre']; ?></p>
                </div>
                <div class="campo cliente">
                    <label for="dni">DNI / CUIT</label>
                    <p><?php echo $reserva['identificacion']; ?></p>
                </div>
                <input type="hidden" name="cliente" value="<?php echo $reserva['id_cliente']; ?>">
                <div class="campo">
                    <label for="vehiculo">Vehiculo</label>
                    <select name="vehiculo" id="vehiculo">
                        <option value="<?php echo $reserva['id_vehiculo']; ?>"><?php echo $reserva['modelo']; ?></option>
                    </select>
                </div>
                <div class="campo">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria">
                    <option value="<?php echo $reserva['id_categoria']; ?>"><?php echo $reserva['nombre_cat']; ?></option>
                    </select>
                </div>
                <div class="campo">
                    <label for="fechaini">Fecha Inicio</label>
                    <input type="date" placeholder="Fecha de inicio" name="fecha_ini" value="<?php echo $reserva['fecha_ini']; ?>">
                </div>
                <div class="campo">
                    <label for="fechafin">Fecha Fin</label>
                    <input type="date" placeholder="Fecha de fin" name="fecha_fin" value="<?php echo $reserva['fecha_fin']; ?>">
                </div>
                <div class="campo">
                    <label for="horaini">Hora Inicio</label>
                    <input type="time" placeholder="Hora de inicio" name="hora_ini" value="<?php echo $reserva['hora_ini']; ?>">
                </div>
                <div class="campo">
                    <label for="horafin">Hora Fin</label>
                    <input type="time" placeholder="Hora de fin" name="hora_fin" value="<?php echo $reserva['hora_fin']; ?>">
                </div>
                <div class="campo">
                    <label for="descripcion">Descripcion</label>
                    <textarea placeholder="Descripcion" name="descripcion"><?php echo $reserva['descripcion']; ?></textarea>
                </div>
                <div class="campo">
                    <label for="total">Total</label>
                    <input type="number" placeholder="Total" name="total" value="<?php echo $reserva['total']; ?>">
                </div>

                <input type="hidden" id="estado_reserva" name="estado_reserva" value="1"> <!-- Debe tomer el valor 1 al cerrar la reserva -->
                <input type="hidden" name="id_reserva" value="<?php echo $reserva['id_reserva']; ?>">
                <input type="hidden" name="reg-reserva" value="actualizar">

                <div class="btn-agendar centrar-texto">
                    <input type="button" value="Eliminar" class="btn-eliminar"> <!-- Eliminar Reserva -->
                    <input type="button" id="cerrar-reserva" value="Cerrar" class="btn-cerrar"> <!-- Cerrar Reserva -->
                    <input type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
<?php include_once 'includes/templates/footer.php'; ?>