<?php
    include("../Models/LanguagesFunctions.php");

    session_start();

    if(isset($_GET["cod_lang"]) && isset($_SESSION["user"])) {
        $cod_lang = $_GET["cod_lang"];
        $user = $_SESSION['user'];

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name_lang = $_POST["name_lang"];
            $lvl_lang = $_POST["lvl_lang"];
            $error_code = 0;
            $lang_found = findLangByID($cod_lang);
        }

        if($lang_found == true) {
            $error_code = 1;
        }else {
            $error_code = 0;
        }
        
        if($error_code == 1) {
            echo $error_code;
            updateLangByID($name_lang, $lvl_lang, $cod_lang);
        }
        
    }else{
        header("Location: ../../html/ErrorPage.html");
    }
?>