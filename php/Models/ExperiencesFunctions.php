<?php 
include("DatabaseConnection.php");

/*
This function creates an experience having all data but AI ID as parameters
*/
function createExpByUser($name_exp, $business, $begin, $end, $job, $user) {
    $query = "INSERT INTO experiences (name_exp, business, beginning, ending, job, username) VALUES (?, ?, ?, ?, ?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($name_exp, $business, $begin, $end, $job, $user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}

/*
This function creates an N:M table having cod_cv and cod_exp as parameters
*/
function createExpInCV($cod_cv, $cod_exp) {
    $query = "INSERT INTO cv_has_exp (cod_cv, cod_exp) VALUES (?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($cod_cv, $cod_exp));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}

function findExpByID($cod_exp) {
    $query = "SELECT * FROM experiences where cod_exp = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($cod_exp));
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

/*
This function finds an experience register by the username and returns the query's result
*/
function findAllExpByUser($user) {
    $query = "SELECT * FROM experiences where username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    return $result;
}

function findExpByUserAndExpName($user, $name_exp) {
    $query = "SELECT * FROM experiences where username = ? and name_exp = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $name_exp));
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

function findExpByUserAndCV($user, $cod_cv) {
    $query = "SELECT experiences.* FROM experiences, cv_has_exp
    where experiences.username = ?
    and cv_has_exp.cod_cv = ?
    and experiences.cod_exp = cv_has_exp.cod_exp";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $cod_cv));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    return $result;
}

function findExpByUserAndExpNameAndCV($user, $name_exp, $cod_cv) {
    $query = "SELECT experiences.* FROM experiences, cv_has_exp 
    where experiences.username = ? and experiences.name_exp = ? 
    and cv_has_exp.cod_cv = ? and experiences.cod_exp = cv_has_exp.cod_exp";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $name_exp, $cod_cv));
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

function findExpID($user, $name_exp) {
    $query = "SELECT cod_exp FROM experiences where username = ? and name_exp = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $name_exp));
        $res = $result->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    return $res;
}

function updateExpByID($name_exp, $business, $begin, $end, $job, $cod_exp) {
    $query = "UPDATE experiences set name_exp = ? , business = ?, beginning = ?, ending = ?, job = ? where cod_exp = ?";
    
    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($name_exp, $business, $begin, $end, $job, $cod_exp));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}

function removeExpByID($cod_exp) {
    $query = "DELETE FROM experiences where cod_exp = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($cod_exp));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}
?>