<?php
ob_start();
include("Navbar.php");


ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto login-form" >
        <form action="../Controllers/LoginValidation.php" method="POST" id="form-login">  
            <h2 class="title-form">Inicio de Sesión</h2>
            
            <div class="invalid-log"><p id="invalid-log"></p></div>

            <div class="form-floating">
                <input type="text" class="form-control" id="user" name="user" placeholder="Tu usuario"/>
                <label for="floatingInput">Cuenta de usuario</label>
            </div>

            <div>
                <p></p>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Tu contraseña"/>
                <label for="floatingInput">Contraseña</label>
            </div>
            <div class="btn-group">
                <button class="w-100 btn btn-lg btn-primary btn-form" type="submit" value="Aceptar">Aceptar</button>
                <button class="w-100 btn btn-lg btn-primary btn-form" type="button"><a class="button-anchor" href="../Controllers/CreateUser.php">Regístrate</a></button>
            </div>
        </form>
    <main>
        <script src="../../js/login.js">

        </script>
</body>
</html>