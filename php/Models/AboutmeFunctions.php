<?php
include("DatabaseConnection.php");

function createAboutByUser($name, $desc, $user) {
    $query = "INSERT INTO about (name_about, self_description, username) VALUES (?, ?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($name, $desc, $user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}

function createAboutInCV($cod_cv, $cod_about) {
    $query = "INSERT INTO cv_has_about (cod_cv, cod_about) VALUES (?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($cod_cv, $cod_about));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}

function findAllAboutsByUser($user) {
    $query = "SELECT * FROM about where username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    return $result;
}

function findAboutByUserAndName($user, $name) {
    $query = "SELECT * FROM about where username = ? and name_about = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $name));
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

function findAboutByUserAndNameAndCV($user, $name, $cod_cv) {
    $query = "SELECT about.* FROM about, cv_has_about 
    where about.username = ? and about.name_about = ? 
    and cv_has_about.cod_cv = ? and about.cod_about = cv_has_about.cod_about";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $name, $cod_cv));
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

function findAboutID($user, $name) {
    $query = "SELECT cod_about FROM about where username = ? and name_about = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $name));
        $res = $result->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    return $res;
}

function removeAboutByID($cod_about) {
    $query = "DELETE FROM about where cod_about = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($cod_about));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}

?>