<?php
    include("../Models/AboutmeFunctions.php");

    session_start();

    if(isset($_GET["cod_about"]) && isset($_SESSION["user"])) {
        $cod_about = $_GET["cod_about"];
        $user = $_SESSION['user'];

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name_about = $_POST["name_about"];
            $desc = $_POST["self_description"];
            $error_code = 0;
            $about_found = findAboutByID($cod_about);
        }

        if($about_found == true) {
            $error_code = 1;
        }else {
            $error_code = 0;
        }
        
        if($error_code == 1) {
            echo $error_code;
            updateAboutByID($name_about, $desc, $cod_about);
            
        }
        
    }else{
        header("Location: ../../html/ErrorPage.html");
    }
?>