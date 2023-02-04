<?php
include("../Models/ExperiencesFunctions.php");

session_start();

if(isset($_GET["cod_exp"]) && isset($_SESSION["user"])) {
    $cod_exp = $_GET["cod_exp"];
    removeExpByID($cod_exp);
    header("Location: ../Views/UserExp.php");
}else{
    header("Location: ../../html/ErrorPage.html");
}
?>