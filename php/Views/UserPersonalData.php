<?php
include("Navbar.php");
include("../Models/UserFunctions.php");

if(!isset($_SESSION['user']) || $_SESSION['role'] != "account") {
    header("Location: ../../html/ErrorPage.html");
}else {
    $user = $_SESSION['user'];
    $data = findAllDataByUser($user)->fetch(PDO::FETCH_ASSOC);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/tables.css">
</head>
<body>
    <div class="table-responsive-sm">
    <table class="table caption-top table-sm ">
        <caption><h4>Datos Personales de <?php echo $_SESSION['user'];?></h4></caption>
        <thead>
            <tr class="lead">
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Email</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>NIF</th>
                <th>Dirección</th>
                <th>País</th>
                <th>Provincia</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td><?php echo $data["username"]?></td>
                <td><?php echo $data["passwd"]?></td>
                <td><?php echo $data["email"]?></td>
                <td><?php echo $data["first_name"]?></td>
                <td><?php echo $data["first_surname"]?></td>
                <td><?php echo $data["nif"]?></td>
                <td><?php echo $data["address"]?></td>
                <td><?php echo $data["country"]?></td>
                <td><?php echo $data["region"]?></td>
                <td><?php echo $data["city"]?></td>
                <td><?php echo $data["phone"]?></td>
                <td>
                    <a class="mb-0 linkcv" href="ModifyRecord.php?username=<?php echo $data['username']?>">
                        <img src="../../img/rename.png" class="opacity-85" alt="twbs" width="30" height="30" class="rounded-circle flex-shrink-0">
                    </a>
                </td>
                
            </tr>

            
        </tbody>
        
        
    </table>


</div>
<script></script>
</body>
</html>