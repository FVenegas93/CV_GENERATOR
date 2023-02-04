<?php
session_start();
include("../Models/UserFunctions.php");
//VAR FOR WRONG USER AND/OR PASS


//IF USER IS ALREADY SIGNED IN, HE WILL BE LOCATED TO ERROR PAGE
if(isset($_SESSION["user"])) {
    header('Location: ../../html/ErrorPage.html');
}else {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST["user"];
        $passwd = $_POST["pass"];
        $user_found = validateUser($user, $passwd);
        $is_admin = isAdmin($user);
        $error_code = 0;

        if($user_found == true) {
            
            $_SESSION["user"] = $user;
            if($is_admin) {
                $_SESSION["role"] = "admin";
            }else {
                $_SESSION["role"] = "account";
            }
            
            $error_code = 1;
        }else {
            
            $error_code = 0;
        }
        
        if($error_code == 1) {
            echo $error_code;
        }else {
            echo "<p id='invalid-log'>Credenciales erróneas</p>";
        }
    }
}