<?php
    include("../Views/Navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION["user"])) {
         echo "<h1>Bienvenido/a ".$_SESSION["user"]."</h1>";
    }else {
        echo "<h1>Hola</h1>";
        echo "<h4>Aquí es donde se crean CVs to guapos</h4>";
    }?>
</body>
</html>