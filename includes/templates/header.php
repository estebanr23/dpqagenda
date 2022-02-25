<?php include_once 'includes/funciones/sesiones.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300;400;600;700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Toyota del Parque</title>
</head>
<body class="fondo-color">
    <header>
        <div class="site-header contenedor">
            <div>
                <h1 class="logo">TOYOTA <span>Del Parque</span></h1>
            </div>
            <div class="emblema">
                <img src="img/emblema.png" alt="Emblema Toyota">
            </div>
        </div>

        <div class="barra">
            <nav class="contenedor">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="alquileres.php">Alquileres</a></li>
                    <li><a href="testdrive.php">TestDrive</a></li>
                    <li><a href="prestamos.php">Prestamos</a></li>
                    <li>
                        <ul class="sub-menu">
                            <li id="usuario-menu"><a href="#"><img src="img/user-solid.svg" id="icono-user"> <?php echo $_SESSION['nombre']; ?></a></li>
                            <div id="opciones-menu">
                                <li><a href="admin/admin-area.php">Panel de Administracion</a></li>
                                <li><a href="login.php?cerrar_sesion=true">Cerrar Sesion</a></li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>