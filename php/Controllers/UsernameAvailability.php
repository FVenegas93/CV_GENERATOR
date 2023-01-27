<?php
include("../Models/DatabaseConnection.php");


if(!empty($_POST['username'])) {
    $file = '../../json/bool.json';

    if(file_exists($file)) {
        unlink('../../json/bool.json');
    }
    
    $user = (string)$_POST['username'];
    $bool = false;
    

    $query = "SELECT * FROM users WHERE username = '$user'";

    try {
        $result = $GLOBALS["bd"]->query($query);
        
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    if($result->rowCount() == 0) {
        echo "<div class='wrong' id='username_exists'></div>";
        $bool = true;
        
    }else {
        echo "<div class='wrong' id='username_exists'>Nombre de usuario no disponible</div>";
        $bool = false;
        $json = json_encode(($bool));
    }

    $json = json_encode($bool);
    file_put_contents($file, $json);
    
    return $result;
}

?>