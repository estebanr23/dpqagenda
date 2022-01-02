<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300;400;600;700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Login</title>
</head>
<body>
    <div class="fondo-login">
        <div class="logo-contenedor">
            <div>
                <h1 class="logo">TOYOTA <span>Del Parque</span></h1>
            </div>
            <div class="emblema">
                <img src="img/emblema.png" alt="Emblema Toyota">
            </div>
        </div>
        
        <div class="formulario-login centrar-texto">
            <h3>Iniciar Sesión</h3>
            <form action="modelo-login.php" method="POST">
                <div class="campo">
                    <input type="text" name="usuario" placeholder="Usuario">
                </div>
                <div class="campo">
                    <input type="password" name="password" placeholder="Contraseña">
                </div>
                <input type="hidden" name="login-admin" value="1">
                <input type="submit" class="btn-login" value="Ingresar">
            </form>
        </div>
    </div>
</body>
</html>