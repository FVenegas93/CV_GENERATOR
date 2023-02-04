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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous"></script>
    
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
                    <a class="mb-0 linkcv" href="#">Some placeholder content in a paragraph.</a><br>
                    <a class="mb-0 linkcv" id="rename-link" href="../Controllers/RenameCVForm.php?cod_cv=<?php echo $cv['cod_cv'] ?>"> Renombrar proyecto 
                        <img src="../../img/rename.png" alt="twbs" width="20" height="20" class="rounded-circle flex-shrink-0">
                    </a><br>
                    
                    
                    <a class="mb-0 linkcv" href="CVData.php?cod_cv=<?php echo $cv['cod_cv'] ?>">Añadir Datos al CV</a><br>
                    
                    
                </div>
                
                <a class="mb-0 linkcv" href="#" onclick="removeCV('<?php echo $cv['cod_cv']?>')">
                    <img src="../../img/delete.png" class="opacity-85" alt="twbs" width="30" height="30" class="rounded-circle flex-shrink-0">
                </a>
                
            </div>
        </div>

        
    <?php } ?>
    
    <p>
        <a href="../Controllers/RenameCVForm.php" class="btn btn-primary my-2 btn-form">Crear Nuevo CV</a>
    </p>
    <script src="../../js/removeCV.js"></script>

</body>
</html>