<?php
include("../Models/DatabaseConnection.php");
sleep(1);

if(!empty($_POST['username'])) {
    
    $user = (string)$_POST['username'];

    $query = "SELECT * FROM users WHERE username = '$user'";

    try {
        $result = $GLOBALS["bd"]->query($query);
        
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    if($result->rowCount() == 0) {

        echo "<div class='wrong' id='username_exists'></div>";
    }else {
        
        echo "<div class='wrong' id='username_exists'>Nombre de usuario no disponible</div>";
       
    }
    return $result;
    
}

?>