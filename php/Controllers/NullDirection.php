<?php
    include ("../Models/UserFunctions.php");

    
    if(isset($_SESSION['user']) && $_SESSION['role'] == 'account') {
        $username = $_SESSION['user'];
        $address = findDirectionByUsername($username)["address"];

    }else {
        $address = "fd";
    }
        
    
?>