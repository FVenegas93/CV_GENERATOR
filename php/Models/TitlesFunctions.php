<?php
    include("DatabaseConnection.php");

    function createTitleByUser($name, $center, $begin, $end, $desc, $user) {
        $query = "INSERT INTO titles (name_title, training_center, title_beginning, title_ending, title_description, username) VALUES (?, ?, ?, ?, ?, ?)";
    
        try {
            $result = $GLOBALS["bd"]->prepare($query);
            $result->execute(array($name, $center, $begin, $end, $desc, $user));
        }catch(PDOException $e) {
            echo "Error en la conexión " . $e->getMessage();
            header("Location: ../../html/ErrorPage.html");
        }
    }

    function createTitleInCV($cod_cv, $cod_title) {
        $query = "INSERT INTO cv_has_title(cod_cv, cod_title) VALUES(?, ?)";

        try {
            $result = $GLOBALS["bd"]->prepare($query);
            $result->execute(array($cod_cv, $cod_title));
        }catch(PDOException $e) {
            echo "Error en la conexión " . $e->getMessage();
            header("Location: ../../html/ErrorPage.html");
        }
    }

    function findTitleByUserAndTitleName($user, $name) {
        $query = "SELECT * FROM titles where username = ? and name_title = ?";

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

    function findTitleID($user, $name_title) {
        $query = "SELECT cod_title FROM titles where username = ? and name_title = ?";
    
        try {
            $result = $GLOBALS["bd"]->prepare($query);
            $result->execute(array($user, $name_title));
            $res = $result->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e) {
            echo "Error en la conexión " . $e->getMessage();
            header("Location: ../../html/ErrorPage.html");
        }
    
        return $res;
    }
?>