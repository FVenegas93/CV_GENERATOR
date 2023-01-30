<?php
ob_start();
    include("../Views/Navbar.php");
    include("../Models/CVFunctions.php");

    if(isset($_GET["cod_cv"])) {
        
        $cod_cv = $_GET['cod_cv'];

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_SESSION['user'];
            $name_cv = $_POST["name_cv"];
            updateCV($name_cv, $cod_cv, $user);
            //header("Location: ../Views/CVsList.php");
        }

    }else {
        
        
        if(!isset($_GET["cod_cv"])) {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $user = $_SESSION['user'];
                $name_cv = $_POST["name_cv"];
                createCV($name_cv, $user);
            }
        }
        //header("Location: ../../html/ErrorPage.html");
    }
ob_end_flush();   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RenameCV</title>
    <style>
        .renamecv-form {
            width: 300px !important;
            height: 331px !important;
            padding: 15px;
            border-radius: 10px;
            display: inline-block;
            justify-content: center;
            background-color: rgb(245, 239, 239);
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto renamecv-form" >
        <form id="rename-form" action="RenameCVForm.php?cod_cv=<?php echo $cod_cv;?>" method="POST">  
            <h2 class="title-form">
                <?php if(isset($_GET["cod_cv"])) {
                    echo "Renombrar CV";
                }else {
                    echo "Crear CV";
                }?>
            </h2>

            <div class="form-floating">
                <input type="text" id="name-cv" class="form-control" id="floatingInput" name="name_cv" placeholder="Nombre del CV"/>
                <label for="floatingInput">Nombre del CV</label>
            </div>
            <div class="wrong-name" id="wrong-name"></div>
            
            <div class="btn-group">
                <button class="w-100 btn btn-lg btn-primary btn-form" type="submit" id="btn" value="Aceptar">
                <?php if(isset($_GET["cod_cv"])) { 
                    echo "Renombrar";
                }  else {
                    echo "Crear";
                }?>
                </button>
                
            </div>

            <div class="ajax-resp"></div>
        </form>
    <main>
    <script src="../../js/renameCV.js"></script>
    

</body>
</html>