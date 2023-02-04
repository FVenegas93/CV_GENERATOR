<?php
include("../Models/AboutmeFunctions.php");

session_start();

if(isset($_GET["cod_about"]) && isset($_SESSION["user"])) {
    $cod_about = $_GET["cod_about"];
    removeAboutByID($cod_about);
    header("Location: ../Views/UserAbout.php");
}else{
    header("Location: ../../html/ErrorPage.html");
}
?>