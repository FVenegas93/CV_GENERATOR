<?php
    include("Navbar.php");
    include("../Models/CVFunctions.php");

    if(isset($_SESSION['user']) && $_SESSION['role'] == 'account') {
        $user = $_SESSION['user'];
        $cvs = findAllCVByUser($user);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/cvlist.css">
    
</head>
<body>
    
    <?php foreach($cvs as $cv) { ?>
        <div class="list-group w-auto cont">
            <div id="main-cont" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="../../img/cvicon.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6><?php echo $cv["name_cv"];?>
                        
                        
                    </h6>
                    <a class="mb-0 linkcv" id="rename-link" href="../Controllers/RenameCVForm.php?cod_cv=<?php echo $cv['cod_cv'] ?>"> Renombrar proyecto 
                        <img src="../../img/rename.png" alt="twbs" width="20" height="20" class="rounded-circle flex-shrink-0">
                    </a><br>
                        
                    <a class="mb-0 opacity-75 linkcv" href="CVData.php?cod_cv=<?php echo $cv['cod_cv'] ?>">Añadir Datos al CV</a><br>
                    <a class="mb-0 opacity-75 linkcv" href="#">Some placeholder content in a paragraph.</a><br>
                    <a class="mb-0 opacity-75 linkcv" href="javascript: checkRemoveCV('<?php echo $cv["cod_cv"] ?>')">Eliminar proyecto</a>
                </div>
                <small class="opacity-50 text-nowrap">now</small>
                </div>
        </div>

        
    <?php } ?>
    
    <p>
        <a href="../Controllers/RenameCVForm.php" class="btn btn-primary my-2 btn-form">Crear Nuevo CV</a>
    </p>
    <script>
        function checkRemoveCV($cod_cv) {
            if(confirm("¿De verdad quieres eliminar este CV?")) {
                window.location.href = '../Controllers/RemoveCV.php?cod_cv=' + $cod_cv;
            }
        }
    </script>
</body>
</html>