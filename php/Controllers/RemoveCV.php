<?php
    include("../Models/CVFunctions.php");

    session_start();

    if(isset($_GET["cod_cv"]) && isset($_SESSION["user"])) {
        $cod_cv = $_GET["cod_cv"];
        removeCVByID($cod_cv);
        header("Location: ../Views/CVsList.php");
    }else{
        header("Location: ../../html/ErrorPage.html");
    }
?>