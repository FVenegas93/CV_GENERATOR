<?php
    include("NavBar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddDirection</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto create-user-form" >
        <form action="AddDirection.php" class="form" id="form" method="POST">
            <h2 class="title-form">Tu Dirección</h2>
            
            <!--FORMS FILLABLES BY THE USER WHO IS SIGNING IN-->
            <div class="form-floating">
                <select list="json-countries" class="form-control" id="input1" name="country" placeholder="País"></select>
                
                <label id="label1" for="floatingInput">País</label>
            </div>
            <div class="wrong">
                <p id="wrong1"></p>
            </div>

            <div class="form-floating">
                <select class="form-control" id="input2" name="region" placeholder="Provincia">
                    
                </select>
                <label id="label2" for="floatingInput">Provincia</label>
            </div>
            <div class="wrong">
                <p id="wrong1"></p>
            </div>

           <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput3" name="repeat_passwd" placeholder="Ciudad"/>
                <label id="label3" for="floatingInput">Ciudad</label>
            </div>
            <div class="wrong">
                <p id="wrong1"></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput4" name="email" placeholder="Correo electrónico"/>
                <label id="label4" for="floatingInput">Email (Ej: srDebian@gmail.com)</label>
            </div>
            <div class="wrong">
                <p id="wrong4"></p>
            </div>

            <div class="btn-group">
                <input class="w-100 btn btn-lg btn-primary btn-form" id="submit" name="submit" type="submit" value="Enviar" />
            </div>

        </form>
    </main>

    <script src="../../js/scriptDirections.js"></script>
</body>
</html>