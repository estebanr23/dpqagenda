<?php include_once 'includes/templates/header.php'; ?>
    <main class="principal">
        <div class="contenedor">
            <h1 class="centrar-texto h1-margin">Alquileres</h1>
            <div class="contenedor-tabla">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Vehiculo</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Fin</th>
                            <th>Hora de Inicio</th>
                            <th>Hora de Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="editar.php">Esteban Robert</a></td>
                            <td>Etios</td>
                            <td>15/12/2021</td>
                            <td>20/12/2021</td>
                            <td>09:00 am</td>
                            <td>18:00 pm</td>
                        </tr>
                        <tr>
                            <td>Fernando Rojas</td>
                            <td>Yaris</td>
                            <td>10/11/2021</td>
                            <td>16/12/2021</td>
                            <td>09:00 am</td>
                            <td>18:00 pm</td>
                        </tr>
                        <tr>
                            <td>Federico Aviles</td>
                            <td>Corolla</td>
                            <td>2/10/2021</td>
                            <td>13/10/2021</td>
                            <td>09:00 am</td>
                            <td>18:00 pm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>     
    </main>    
<?php include_once 'includes/templates/footer.php'; ?>