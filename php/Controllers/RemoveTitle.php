<?php
include("../Models/TitlesFunctions.php");

session_start();

if(isset($_GET["cod_title"]) && isset($_SESSION["user"])) {
    $cod_title = $_GET["cod_title"];
    removeTitleByID($cod_title);
    header("Location: ../Views/UserTitles.php");
}else{
    header("Location: ../../html/ErrorPage.html");
}
?>