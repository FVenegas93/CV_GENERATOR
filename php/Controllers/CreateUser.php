<?php
ob_start();
    include("../Views/Navbar.php");
    include("../Models/UserFunctions.php");
    include("../Models/DatabaseConnection.php");

    if(isset($_SESSION["user"])) {
        header("Location: ../../html/ErrorPage.html");
    }

    //POSSIBLE MISTAKES
    $user_already_exists = false;
    $passwords_dont_match = false;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //STACKING FILLED INPUTS INTO VAR
        $user = $_POST["username"];
        $passwd = $_POST["passwd"];
        $repeat_passwd = $_POST["repeat_passwd"];
        $email = $_POST["email"];
        $name = $_POST["first_name"];
        $first_surname = $_POST["first_surname"];
        //$second_surname = $_POST["second_surname"];
        $nif = $_POST["nif"];
       /* $address = $_POST["address"];
        $country = $_POST["country"];
        $region = $_POST["region"];
        $city = $_POST["city"];*/
        $phone = $_POST["phone"]; 
        $admin = 0;
        $code = generateCode();

        //IF PASSWORDS MATCH A NEW USER AND IF USERNAME DOES NOT EXISTS THE NEW USER IS CREATED
        if($passwd == $repeat_passwd) {
            if(!findUserByUser($user)) {
                createUser($user, $passwd, $email, $name, $first_surname, $second_surname, $nif, $address, $country, $region, $city, $phone, $admin, $code);
                header("Location: ../Views/Login.php");
                
            }else {
                $user_already_exists = true;
            }
        }else {
            $passwords_dont_match = true;
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
    <title>Sign in</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto create-user-form" >
        <form action="CreateUser.php" class="form" id="form" method="POST">
            <h2 class="title-form">Registro de Usuario</h2>
            
            <!--FORMS FILLABLES BY THE USER WHO IS SIGNING IN-->
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput1" name="username" placeholder="Nombre de usuario"/>
                <label id="label1" for="floatingInput">Nombre de usuario</label>
            </div>
            <div class="wrong">
                <p id="wrong1"></p>
            </div>
            <div class="wrong" id="username_exists"></div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput2" name="passwd" placeholder="Contraseña"/>
                <label id="label2" for="floatingInput">Contraseña</label>
            </div>
            <div class="wrong">
                <p id="wrong2"></p>
            </div>

           <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput3" name="repeat_passwd" placeholder="Repetir contraseña"/>
                <label id="label3" for="floatingInput">Repetir contraseña</label>
            </div>
            <div class="wrong">
                <p id="wrong3"></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput4" name="email" placeholder="Correo electrónico"/>
                <label id="label4" for="floatingInput">Email (Ej: srDebian@gmail.com)</label>
            </div>
            <div class="wrong">
                <p id="wrong4"></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput5" name="first_name" placeholder="Tu nombre"/>
                <label id="label5" for="floatingInput">Tu nombre</label>
            </div>
            <div class="wrong">
                <p id="wrong5"></p>
            </div>
            
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput6" name="first_surname" placeholder="Primer apellido"/>
                <label id="label6" for="floatingInput">Primer apellido</label>
            </div>
            <div class="wrong">
                <p id="wrong6"></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput7" name="nif" placeholder="NIF"/>
                <label id="label7" for="floatingInput">NIF (Ej: 12345678T)</label>
            </div>
            <div class="wrong">
                <p id="wrong7"></p>
            </div>

            <!--<div class="form-floating">
                <input type="text" class="form-control" id="floatingInput9" name="address" placeholder="Dirección"/>
                <label id="label9" for="floatingInput">Dirección (Ej: C/Cid,43)</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput10" name="country" placeholder="País"/>
                <label id="label10" for="floatingInput">País</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput11" name="region" placeholder="Provincia"/>
                <label id="label11" for="floatingInput">Provincia</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput12" name="city" placeholder="Ciudad"/>
                <label id="label12" for="floatingInput">Ciudad</label>
            </div>-->

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput8" name="phone" placeholder="Teléfono"/>
                <label id="label8" for="floatingInput">Teléfono (Ej: 659659659)</label>
            </div>
            <div class="wrong">
                <p id="wrong8"></p>
            </div>

            <br><input type="checkbox" id="floatingInput9" name="privacy_policy"/>
            <label id="label9" for="floatingInput">Acepto las condiciones de privacidad</label>
            
            <div class="btn-group">
                <input class="w-100 btn btn-lg btn-primary btn-form" id="submit" name="submit" type="submit" value="Enviar" />
            </div>

            <div class="ajax-resp">
                
            </div>
            
        </form>
    <main>
    <script src="../../js/scriptRegex.js"></script>
</body>

</html>