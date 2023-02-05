<?php
    include("../Models/ExperiencesFunctions.php");

    session_start();

    if(isset($_GET["cod_exp"]) && isset($_SESSION["user"])) {
        $cod_exp = $_GET["cod_exp"];
        $user = $_SESSION['user'];

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name_exp = $_POST["name_exp"];
            $business = $_POST["business"];
            $begin = $_POST["exp_beginning"];
            $end = $_POST["exp_ending"];
            $job = $_POST["job"];
            
            $error_code = 0;
            $exp_found = findExpByID($cod_exp);
        }

        if($exp_found == true) {
            $error_code = 1;
        }else {
            $error_code = 0;
        }
        
        if($error_code == 1) {
            echo $error_code;
            updateExpByID($name_exp, $business, $begin, $end, $job, $cod_exp);
           
        }
        
    }else{
        header("Location: ../../html/ErrorPage.html");
    }
?>