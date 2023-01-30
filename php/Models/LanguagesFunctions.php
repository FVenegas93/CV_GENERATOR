<?php 
include("DatabaseConnection.php");

function createLangByUser($name_lang, $lvl_lang, $user) {
    $query = "INSERT INTO languages (name_lang, lvl_lang, username) VALUES (?, ?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($name_lang, $lvl_lang, $user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }
}

function createLangInCV($cod_cv, $cod_lang) {
    $query = "INSERT INTO cv_has_lang (cod_cv, cod_lang) VALUES (?, ?)";
    
    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($cod_cv, $cod_lang));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/LanguageAlreadyExists.html");
    }
}

function findAllLanguagesByUser($user) {
    $query = "SELECT * FROM languages where username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    return $result;
}

function findLangageByUserAndLangName($user, $name_lang) {
    $query = "SELECT * FROM languages where username = ? and name_lang = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $name_lang));
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

function findLangageByUserAndLangNameAndCV($user, $name_lang, $cod_cv) {
    $query = "SELECT languages.* FROM languages, cv_has_lang 
    where languages.username = ? and languages.name_lang = ? 
    and cv_has_lang.cod_cv = ? and languages.cod_lang = cv_has_lang.cod_lang";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $name_lang, $cod_cv));
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

function findLangID($user, $name_lang) {
    $query = "SELECT cod_lang FROM languages where username = ? and name_lang = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $name_lang));
        $res = $result->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    return $res;
}


?>