<?php include_once 'includes/templates/header.php'; ?>
    <div class="contenedor principal">
        <h1 class="centrar-texto h1-margin">Agendar Cliente</h1>
        <div class="formulario-agenda">
            <form action="formAgenda.php">
                <!--
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" placeholder="Nombre">
                </div>
                <div class="campo">
                    <label for="apellido">Apellido</label>
                    <input type="text" placeholder="Apellido">
                </div>
                -->
                <div class="campo">
                    <label for="cliente">Cliente</label>
                    <input type="text" placeholder="Nombre">
                </div>
                <div class="campo">
                    <label for="dni">DNI / CUIT</label>
                    <input type="text" placeholder="Dni">
                </div>
                <div class="btn-agendar centrar-texto">
                    <input type="submit" value="Siguiente">
                </div>
            </form>
        </div>
    </div>
<?php include_once 'includes/templates/footer.php'; ?>