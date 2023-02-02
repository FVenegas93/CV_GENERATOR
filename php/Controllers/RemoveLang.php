<?php
include("../Models/LanguagesFunctions.php");

session_start();

if(isset($_GET["cod_lang"]) && isset($_SESSION["user"])) {
    $cod_lang = $_GET["cod_lang"];
    removeLangByID($cod_lang);
    header("Location: ../Views/UserCVData.php");
}else{
    header("Location: ../../html/ErrorPage.html");
}
?>