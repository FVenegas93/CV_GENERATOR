<?php 
include('DatabaseConnection.php');

function createCV($cv_name, $user) {
    $query = "INSERT INTO cv(name_cv, username) VALUES(?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($cv_name, $user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}
function checkCVByUser($user) {
    $query = "SELECT * FROM cv WHERE username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    $res = true;

    if ($result->rowCount() == 0) {
        $res = false;
    }else {
        $res = true;
    }

    return $res;
}

function findAllCVByUser($user) {
    $query = "SELECT * FROM cv WHERE username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
    
    return $result;
}

function updateCV($name_cv, $cod_cv, $user) {
    $query = "UPDATE cv SET name_cv = ? where cod_cv = ? and username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($name_cv, $cod_cv, $user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}

function removeCVByID($cod_cv) {
    $query = "DELETE FROM cv where cod_cv = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($cod_cv));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}
?>


