<?php
include("Navbar.php");
include("../Models/TitlesFunctions.php");

if(!isset($_SESSION['user']) || $_SESSION['role'] != "account") {
    header("Location: ../../html/ErrorPage.html");
}else {
    $user = $_SESSION['user'];
    $titles = findAllTitlesByUser($user);
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
        <caption><h4>Listado de idiomas</h4></caption>
        <thead>
            <tr class="lead">
                <th>Título</th>
                <th>Centro</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Descripción</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($titles as $title) {
            ?>
            <tr>
                <td><?php echo $title["name_title"]?></td>
                <td><?php echo $title["training_center"]?></td>
                <td><?php echo $title["title_beginning"]?></td>
                <td><?php echo $title["title_ending"]?></td>
                <td><?php echo $title["title_description"]?></td>
                <td>
                    <a class="mb-0 linkcv" href="#">
                        <img src="../../img/rename.png" class="opacity-85" alt="twbs" width="30" height="30" class="rounded-circle flex-shrink-0">
                    </a>
                </td>
                <td>
                    <a class="mb-0 opacity-75 linkcv" href="javascript: checkRemoveTitle('<?php echo $title["cod_title"] ?>')">
                        <img src="../../img/delete.png" class="opacity-85" alt="twbs" width="30" height="30" class="rounded-circle flex-shrink-0">
                    </a>
                </td>
            </tr>

            <?php
                }
            ?>
        </tbody>
        
        
    </table>
</div>


<script>
     function checkRemoveTitle($cod_title) {
            if(confirm("¿De verdad quieres eliminar este Título?")) {
                window.location.href = '../Controllers/RemoveTitle.php?cod_title=' + $cod_title;
            }
        }
</script>
</body>
</html>