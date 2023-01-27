<?php
ob_start();
include("../Views/Navbar.php");
include("../Models/UserFunctions.php");
include("../Models/DatabaseConnection.php");

/*if(isset($_SESSION["user"])) {
    header("Location: ../../html/ErrorPage.html");
}*/

$user = $_SESSION['user'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST["address"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $country = $_POST["country"];

    updateUsernameAddress($address, $country, $region, $city, $user);

    echo ($address." ".$city." ".$region." ".$country);
    header("Location: ../Views/index.php");

}
ob_end_flush();
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
    <main class="form-signin w-100 m-auto create-address-form" >
        <form action="CreateAddress.php" class="form" id="form_address" method="POST">
            <h2 class="title-form">Tu Dirección</h2>
            
            <!--FORMS FILLABLES BY THE USER WHO IS SIGNING IN-->
            <div class="form-floating">
                <select list="json-countries" class="form-control" id="input1" name="country" placeholder="País">
                    <option selected="true" disabled="disabled">Seleccione un país</option>
                </select>
                <label id="label1" for="floatingInput">País</label>
            </div>

            <div>
                <p></p>
            </div>

            <div class="form-floating">
                <select class="form-control" id="input2" name="region" placeholder="Provincia">
                    <option selected="true" disabled="disabled">Seleccione una provincia</option>
                </select>
                <label id="label2" for="floatingInput">Provincia</label>
            </div>

            <div>
                <p></p>
            </div>

           <div class="form-floating">
                <select class="form-control" id="input3" name="city" placeholder="Ciudad">
                    <option selected="true" disabled="disabled">Seleccione una ciudad</option>
                </select>
                <label id="label3" for="floatingInput">Ciudad</label>
            </div>

            <div>
                <p></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="input4" name="address" placeholder="Dirección"/>
                <label id="label4" for="floatingInput">Dirección</label>
            </div>

            <div>
                <p></p>
            </div>

            <div class="btn-group">
                <input class="w-100 btn btn-lg btn-primary btn-form" id="submit" name="submit" type="submit" value="Enviar" />
            </div>

            <div id="ajax_resp2"></div>

        </form>
    </main>

    <script src="../../js/scriptDirections.js"></script>
</body>
</html>