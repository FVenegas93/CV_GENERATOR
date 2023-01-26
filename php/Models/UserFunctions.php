<?php
include('DatabaseConnection.php');

function findUserByUser($user) {
    $query = "SELECT * FROM users WHERE username = '$user'";
    $result = $GLOBALS["bd"]->query($query);
    $res = true;

    if($result->rowCount() == 0) {
        $res = false;
    }
    return $res;
}

function createUser($user, $pass, $email, $f_name, $f_surname, $nif, $address, $country, $region, $city, $phone, $admin, $code) {
    $query = "INSERT into users(username, passwd, email, first_name, first_surname, nif, address, country, region, city, phone, is_admin, activation_code)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $pass, $email, $f_name, $f_surname, $nif, $address, $country, $region, $city, $phone, $admin, $code));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

}

function validateUser($user, $pass) {
    $query = "SELECT * FROM users where username = ? and passwd = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user, $pass));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    $user_found = false;

    if($result->rowCount() == 0) {
        $user_found = false;
    }else {
        $user_found = true;
    }

    return $user_found;
}

function generateCode() {
    $rng = rand(1111, 9999);
    return $rng;
}

function isAdmin($user) {
    $query = "SELECT * from users where is_admin = '1' and username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    $admin = false;

    if($result->rowCount() == 0) {
        $admin = false;
    }else {
        $is_admin = $result->fetch(PDO::FETCH_ASSOC)["is_admin"];
        if($is_admin == 1) {
            $admin = true;
        }
    }

    return $admin;
}

function findAllUsers() {
    $query = "SELECT * from users";

    try {
        $result = $GLOBALS["bd"]->query($query);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    return $res;
}

function findDirectionByUsername($user) {
    $query = "SELECT address FROM users WHERE username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($user));
        $res = $result->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        header("Location: ../../html/ErrorPage.html");
    }

    return $res;
}

function updateUsernameAddress($address, $country, $region, $city, $user) {
    $query = "UPDATE users set address = ?, country = ?, region = ?, city = ? where username = ?";

    try {
        $result = $GLOBALS["bd"]->prepare($query);
        $result->execute(array($address, $country, $region, $city, $user));
    }catch(PDOException $e) {
        echo "Error en la conexión " . $e->getMessage();
        //header("Location: ../../html/ErrorPage.html");
    }
}

?>