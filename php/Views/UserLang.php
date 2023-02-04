<?php
include("Navbar.php");
include("../Models/LanguagesFunctions.php");

if(!isset($_SESSION['user']) || $_SESSION['role'] != "account") {
    header("Location: ../../html/ErrorPage.html");
}else {
    $user = $_SESSION['user'];
    $languages = findAllLanguagesByUser($user);
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
                <th>Idioma</th>
                <th>Nivel</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($languages as $lang) {
            ?>
            <tr>
                <td><?php echo $lang["name_lang"]?></td>
                <td><?php echo $lang["lvl_lang"]?></td>
                <td>
                    <a class="mb-0 linkcv" href="ModifyRecord.php?cod_lang=<?php echo $lang['cod_lang']?>">
                        <img src="../../img/rename.png" class="opacity-85" alt="twbs" width="30" height="30" class="rounded-circle flex-shrink-0">
                    </a>
                </td>
                <td>
                    <a class="mb-0 opacity-75 linkcv" href="javascript: checkRemoveLang('<?php echo $lang["cod_lang"] ?>')">
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
     function checkRemoveLang($cod_lang) {
            if(confirm("¿De verdad quieres eliminar este Idioma?")) {
                window.location.href = '../Controllers/RemoveLang.php?cod_lang=' + $cod_lang;
            }
        }
</script>
</body>
</html>