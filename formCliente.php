<?php include_once 'includes/templates/header.php'; 
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Se ha producido un Error.");
    }
?>
    <div class="contenedor principal">
        <h1 class="centrar-texto h1-margin">Agendar Cliente</h1>
        <div class="formulario-agenda">
            <form action="modelo-reserva.php" method="POST" id="form-cliente" name="form-cliente">
                <div class="campo">
                    <label for="cliente">Cliente</label>
                    <input type="text" placeholder="Nombre" name="nombre">
                </div>
                <div class="campo">
                    <label for="dni">DNI / CUIT</label>
                    <input type="text" placeholder="DNI" name="identificacion">
                </div>
                <input type="hidden" name="reg-cliente" value="nuevo">
                <div class="btn-agendar centrar-texto">
                    <input type="submit" value="Siguiente">
                </div>
            </form>
        </div>
    </div>
<?php include_once 'includes/templates/footer.php'; ?>