<?php

$user = "FernanVS93";
$pass = "Indestructibl3";
$connection = "mysql:dbname=cvbd;host=127.0.0.1";

try {
    $GLOBALS["bd"] = new PDO($connection, $user, $pass, array(PDO::ATTR_PERSISTENT => true));

}catch (PDOException $e) {
    echo "Error en la conexión ". $e->getMessage();
    header("Location:../../html/BDConectionError.html");
}

?>