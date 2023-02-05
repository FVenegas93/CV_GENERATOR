<?php
    include("../Models/TitlesFunctions.php");

    session_start();

    if(isset($_GET["cod_title"]) && isset($_SESSION["user"])) {
        $cod_title = $_GET["cod_title"];
        $user = $_SESSION['user'];

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name_title = $_POST["name_title"];
            $training_center = $_POST["training_center"];
            $begin = $_POST["title_beginning"];
            $end = $_POST["title_ending"];
            $desc = $_POST["title_description"];
            
            $error_code = 0;
            $title_found = findTitleByID($cod_title);
        }

        if($title_found == true) {
            $error_code = 1;
        }else {
            $error_code = 0;
        }
        
        if($error_code == 1) {
            echo $error_code;
            updateTitleByID($name_title, $training_center, $begin, $end, $desc, $cod_title);
        }
        
    }else{
        header("Location: ../../html/ErrorPage.html");
    }
?>