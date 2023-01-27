<?php 
include('DatabaseConnection.php');

function findCVByUsername($user) {
    $query = "SELECT * FROM cv WHERE username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    $cv_exists = false;

    if($result->rowCount() == 0) {
        $cv_exists = false;
    }else {
        $cv_exists = true;
    }

    return $cv_exists;
}

?>