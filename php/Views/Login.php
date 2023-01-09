<?php
    ob_start();
    include("Navbar.php");
    include("../Models/UserFunctions.php");
    //VAR FOR WRONG USER AND/OR PASS
    $wrong_login = false;

    //IF USER IS ALREADY SIGNED IN, HE WILL BE LOCATED TO ERROR PAGE
    if(isset($_SESSION["user"])) {
        header('Location: ../../html/ErrorPage.html');
    }else {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST["user"];
            $passwd = $_POST["pass"];
            $user_found = validateUser($user, $passwd);
            $is_admin = isAdmin($user);

            if($user_found == true) {
                $wrong_login = false;
                $_SESSION["user"] = $user;
                if($is_admin) {
                    $_SESSION["role"] = "admin";
                }else {
                    $_SESSION["role"] = "account";
                }
                header('Location: ../Views/main.php');
            }else {
                $wrong_login = true;
            }
            
        }
    }
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
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto login-form" >
        <form action="Login.php" method="POST">  
        <?php   
            if($wrong_login == true) {
                echo "<p class='error'>Credenciales erróneas</p>";
            }else {
                echo "<h2 class='title-form'>Inicio de Sesión</h2>";
            }
        ?>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="user" placeholder="Tu usuario"/>
                <label for="floatingInput">Cuenta de usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" name="pass" placeholder="Tu contraseña"/>
                <label for="floatingInput">Contraseña</label>
            </div>
            <div class="btn-group">
                <button class="w-100 btn btn-lg btn-primary btn-form" type="submit" value="Aceptar">Aceptar</button>
                <button class="w-100 btn btn-lg btn-primary btn-form" type="button"><a class="button-anchor" href="../Controllers/CreateUser.php">Regístrate</a></button>
            </div>
        </form>
    <main>
</body>
</html>