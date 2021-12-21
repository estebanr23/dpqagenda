<?php include_once 'includes/templates/header.php'; ?>
    <main class="principal">
        <div class="contenedor">
            
            <form action="resultado.php">
                <div class="buscador">
                    <input class="buscar" type="text" placeholder="Buscar">
                    <input class="btn-buscar" type="submit" value="Buscar">
                </div>
            </form>
 
            <h1 class="centrar-texto h1-margin">Vehiculos</h1>
            <div class="lista-vehiculos" id="lista-vehiculos">
                <article class="vehiculo">
                    <img src="img/etios.jpg">
                    <div class="info-vehiculo">
                        <p>Modelo: <span>Etios XLS 1.5 AT 5 Puertas</span></p>
                        <p>Dominio: <span>AF123YU</span></p>
                        <p>Titular: <span>Del Parque</span></p>
                        <p>Año: <span>2021</span><span class="estado disponible">Disponible</span></p>
                    </div>
                    <div class="after-btn">
                        <div class="enlaces">
                            <a href="alquileres.php">Reservas</a>
                            <a href="formCliente.php">Agendar</a>
                        </div>
                    </div>
                </article>

                <article class="vehiculo">
                    <img src="img/corolla-cross.jpg">
                    <div class="info-vehiculo">
                        <p>Modelo: <span>Corolla Cross Seg 2.0 CVT</span></p>
                        <p>Dominio: <span>AF123YU</span></p>
                        <p>Titular: <span>Del Parque</span></p>
                        <p>Año: <span>2021</span><span class="estado disponible">Disponible</span></p>
                    </div>
                    <div class="after-btn">
                        <div class="enlaces">
                            <a href="alquileres.php">Reservas</a>
                            <a href="formCliente.php">Agendar</a>
                        </div>
                    </div>
                </article>
                <article class="vehiculo">
                    <img src="img/corolla.jpg">
                    <div class="info-vehiculo">
                        <p>Modelo: <span>Corolla AT</span></p>
                        <p>Dominio: <span>AF123YU</span></p>
                        <p>Titular: <span>Toyota Tasa</span></p>
                        <p>Año: <span>2019</span><span class="estado no-disponible">No Disponible</span></p>
                    </div>
                    <div class="after-btn">
                        <div class="enlaces">
                            <a href="alquileres.php">Reservas</a>
                            <a href="formCliente.php">Agendar</a>
                        </div>
                    </div>
                </article>
                <article class="vehiculo">
                    <img src="img/corolla-cross.jpg">
                    <div class="info-vehiculo">
                        <p>Modelo: <span>Etios XLS 1.5 AT 5 Puertas</span></p>
                        <p>Dominio: <span>AF123YU</span></p>
                        <p>Titular: <span>Del Parque</span></p>
                        <p>Año: <span>2021</span><span class="estado disponible">Disponible</span></p>
                    </div>
                    <div class="after-btn">
                        <div class="enlaces">
                            <a href="alquileres.php">Reservas</a>
                            <a href="formCliente.php">Agendar</a>
                        </div>
                    </div>
                </article>
                <article class="vehiculo">
                    <img src="img/etios.jpg">
                    <div class="info-vehiculo">
                        <p>Modelo: <span>Etios XLS 1.5 AT 5 Puertas</span></p>
                        <p>Dominio: <span>AF123YU</span></p>
                        <p>Titular: <span>Del Parque</span></p>
                        <p>Año: <span>2021</span><span class="estado no-disponible">No Disponible</span></p>
                    </div>
                    <div class="after-btn">
                        <div class="enlaces">
                            <a href="alquileres.php">Reservas</a>
                            <a href="formCliente.php">Agendar</a>
                        </div>
                    </div>
                </article>
            </div> 
        </div>       
    </main>
<?php include_once 'includes/templates/footer.php'; ?>