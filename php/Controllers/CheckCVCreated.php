<?php

    include ("../Models/CVFunctions.php");
   
    if(isset($_SESSION['user']) && $_SESSION['role'] == 'account') {
        $username = $_SESSION['user'];
        $cv_exists = checkCVByUser($username);
    }else {
        header("Location: ../../html/ErrorPage.html");
    }

?>