<?php
    include("Navbar.php");
    include("../Models/UserFunctions.php");

    /*if(!isset($_SESSION["user"]) || $_SESSION["role"] != "admin") {
        header("Location: ../../html/ErrorPage.html");
    }*/

    $users = findAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>

<div class="table-responsive-sm">
    <table class="table caption-top table-lg table-hover">
        <caption>Listado de usuarios</caption>
        <tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Apellido 1</th>
            <th>Apellido 2</th>
            <th>NIF</th>
            <th>Dirección</th>
            <th>País</th>
            <th>Provincia</th>
            <th>Ciudad</th>
            <th>Teléfono</th>
            <th>Código</th>
        </tr>

        <?php
            foreach($users as $user) {
        ?>

        <tr>
            <td><?php echo $user["username"]?></td>
            <td><?php echo $user["passwd"]?></td>
            <td><?php echo $user["email"]?></td>
            <td><?php echo $user["first_name"]?></td>
            <td><?php echo $user["first_surname"]?></td>
            <td><?php echo $user["second_surname"]?></td>
            <td><?php echo $user["nif"]?></td>
            <td><?php echo $user["address"]?></td>
            <td><?php echo $user["country"]?></td>
            <td><?php echo $user["region"]?></td>
            <td><?php echo $user["city"]?></td>
            <td><?php echo $user["phone"]?></td>
            <td><?php echo $user["activation_code"]?></td>
        </tr>

        <?php
            }
        ?>
    </table>
</div>
</body>
</html>