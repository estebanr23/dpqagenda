<?php include_once 'includes/templates/header.php'; ?>
    <div class="contenedor principal">
        <h1 class="centrar-texto h1-margin">Editar Reserva</h1>
        <div class="formulario-agenda">
            <form action="#">
                <div class="campo cliente">
                    <label for="cliente">Cliente</label>
                    <input type="text" placeholder="Nombre" value="Esteban Robert">
                </div>
                <div class="campo cliente">
                    <label for="dni">DNI / CUIT</label>
                    <input type="text" placeholder="Dni" value="40.434.082">
                </div>
                <div class="campo">
                    <label for="vehiculo">Vehiculo</label>
                    <select name="vehiculo" id="vehiculo">
                        <option value="#">Etios XLS 1.5 AT 5 Puertas</option>
                        <option value="#">Corolla Cross Seg 2.0 CVT</option>
                        <option value="#">Corolla AT</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria">
                        <option value="#">Alquiler</option>
                        <option value="#">TestDrive</option>
                        <option value="#">Prestamo</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="fechaini">Fecha Inicio</label>
                    <input type="date" placeholder="Fecha de inicio">
                </div>
                <div class="campo">
                    <label for="fechafin">Fecha Fin</label>
                    <input type="date" placeholder="Fecha de fin">
                </div>
                <div class="campo">
                    <label for="horaini">Hora Inicio</label>
                    <input type="time" placeholder="Fecha de inicio">
                </div>
                <div class="campo">
                    <label for="horafin">Hora Fin</label>
                    <input type="time" placeholder="Fecha de fin">
                </div>
                <div class="campo">
                    <label for="descripcion">Descripcion</label>
                    <textarea placeholder="Descripcion"></textarea>
                </div>
                <div class="campo">
                    <label for="total">Total</label>
                    <input type="number" placeholder="Total">
                </div>
                <input type="hidden" value="0"> <!-- Debe tomer el valor 1 al cerrar la reserva -->
                <div class="btn-agendar centrar-texto">
                    <input type="button" value="Eliminar" class="btn-eliminar">
                    <input type="button" value="Cerrar" class="btn-cerrar">
                    <input type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
<?php include_once 'includes/templates/footer.php'; ?>