<?php
    ob_start();
    include ("../Models/CVFunctions.php");
   
    if(isset($_SESSION['user']) && $_SESSION['role'] == 'account') {
        $username = $_SESSION['user'];
        $cv_exists = checkCVByUser($username);
    }
    ob_end_flush();
?>