<?php include_once 'includes/templates/header.php'; 

    //$nombre = $_SESSION['cliente'];
    $iden = $_SESSION['identificacion'];
?>

    <div class="contenedor principal">
        <h1 class="centrar-texto h1-margin">Agendar Cliente</h1>
        <div class="formulario-agenda">
            <form action="modelo-reserva.php" method="POST" id="form-agenda" name="form-agenda">
                <?php 
                    include_once 'includes/funciones/db_conexion.php';
                    $sql = " SELECT * FROM cliente WHERE identificacion = $iden ";
                    $resultado = $conn->query($sql);
                    $cliente = $resultado->fetch_assoc();
                ?>
                <div class="campo cliente">
                    <label for="cliente">Cliente</label>
                    <p><?php echo $cliente['nombre']; ?></p>
                </div>
                <div class="campo cliente">
                    <label for="dni">DNI / CUIT</label>
                    <p><?php echo $cliente['identificacion']; ?></p>
                </div>
                <input type="hidden" name="cliente" value="<?php echo $cliente['id_cliente']; ?>"> <!-- Envia el id del cliente -->
                
                <div class="campo">
                    <?php 
                        try {
                            $sql = " SELECT * FROM vehiculo ";
                            $resultado = $conn->query($sql);
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>
                    <label for="vehiculo">Vehiculo</label>
                    <select name="vehiculo" id="vehiculo">
                        <?php while ($vehiculos = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $vehiculos['id_vehiculo']; ?>"><?php echo $vehiculos['modelo']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="campo">
                    <?php 
                        $sql = " SELECT * FROM categoria ";
                        $resultado = $conn->query($sql);
                    ?>
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria">
                        <?php  while ($categorias = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $categorias['id_categoria']; ?>"><?php echo $categorias['nombre_cat']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="campo">
                    <label for="fechaini">Fecha Inicio</label>
                    <input type="date" placeholder="Fecha de inicio" name="fecha_ini">
                </div>
                <div class="campo">
                    <label for="fechafin">Fecha Fin</label>
                    <input type="date" placeholder="Fecha de fin" name="fecha_fin">
                </div>
                <div class="campo">
                    <label for="horaini">Hora Inicio</label>
                    <input type="time" placeholder="Fecha de inicio" name="hora_ini">
                </div>
                <div class="campo">
                    <label for="horafin">Hora Fin</label>
                    <input type="time" placeholder="Fecha de fin" name="hora_fin">
                </div>
                <div class="campo">
                    <label for="descripcion">Descripcion</label>
                    <textarea placeholder="Descripcion" name="descripcion"></textarea>
                </div>
                <div class="campo">
                    <label for="total">Total</label>
                    <input type="number" placeholder="Total" name="total">
                </div>
                <input type="hidden" name="reg-reserva" value="nuevo">
                <div class="btn-agendar centrar-texto">
                    <input type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
<?php include_once 'includes/templates/footer.php'; ?>