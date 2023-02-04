<?php
include("Navbar.php");
include("../Models/AboutmeFunctions.php");

if(!isset($_SESSION['user']) || $_SESSION['role'] != "account") {
    header("Location: ../../html/ErrorPage.html");
}else {
    $user = $_SESSION['user'];
    $abouts = findAllAboutsByUser($user);
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
        <caption><h4>Listado de descripciones personales</h4></caption>
        <thead>
            <tr class="lead">
                <th>Nombre Descripción</th>
                <th>Descripción</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($abouts as $about) {
            ?>
            <tr>
                <td><?php echo $about["name_about"]?></td>
                <td><?php echo $about["self_description"]?></td>
                <td>
                    <a class="mb-0 linkcv" href="ModifyRecord.php?cod_about=<?php echo $about['cod_about']?>">
                        <img src="../../img/rename.png" class="opacity-85" alt="twbs" width="30" height="30" class="rounded-circle flex-shrink-0">
                    </a>
                </td>
                <td>
                    <a class="mb-0 opacity-75 linkcv" href="javascript: checkRemoveAbout('<?php echo $about["cod_about"] ?>')">
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
     function checkRemoveAbout($cod_about) {
            if(confirm("¿De verdad quieres eliminar esta Descripción?")) {
                window.location.href = '../Controllers/RemoveAbout.php?cod_about=' + $cod_about;
            }
        }
</script>
</body>
</html>