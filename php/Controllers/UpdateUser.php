<?php
    include("../Models/UserFunctions.php");

    session_start();

    //THE USERNAME HAS TO APPEAR IN THE URL AND THE SESSION MUST BE SETTED TO VISIT THIS PAGE

    if(isset($_GET["username"]) && isset($_SESSION["user"])) {
        $username = $_GET["username"];

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["first_name"];
            $surname = $_POST["first_surname"];
            $nif = $_POST["nif"];
            $country = $_POST["country"];
            $region = $_POST["region"];
            $city = $_POST["city"];
            $address = $_POST["address"];
            
            $error_code = 0;
            $user_found = findUserByUser($username);
        }

        if($user_found == true) {
            $error_code = 1;
        }else {
            $error_code = 0;
        }
        
        if($error_code == 1) {
            echo $error_code;
            updateUser($name, $surname, $nif, $address, $country, $region, $city, $username);
            //header("Location: ../Views/UserPersonalData.php");
        }
        
    }else{
        header("Location: ../../html/ErrorPage.html");
    }
?>