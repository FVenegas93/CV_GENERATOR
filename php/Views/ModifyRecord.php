<?php
ob_start();
include("Navbar.php");

if(isset($_GET["cod_lang"])) {
    
}else if(isset($_GET["cod_title"])) {
    
}else if(isset($_GET["cod_exp"])) {
    
}else if(isset($_GET["cod_about"])) {
    
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/modifyRecord.css">
</head>
<body>
    <?php if(isset($_GET["cod_lang"])) {?>
    <h1 class="pb-2 border-bottom">Editar Idioma</h1>
    <div class="card">

        <div class="card-body">
            <form action="../Controllers/UpdateLang.php?cod_lang=<?php echo $_GET["cod_lang"];?>" method="POST" id="lang-form">
                    
                    <select id="select-lang" name="name_lang" class="form-select form-select-lg mb-3 dark" aria-label=".form-select-lg example">
                        <option value="#" selected disabled>Seleccione un idioma</option>
                        <option value='Español'>Español</option>
                        <option value='Inglés'>Inglés</option>
                        <option value='Francés'>Francés</option>
                        <option value='Alemán'>Alemán</option>
                    </select>
                    <div class="wrong">
                        <p></p>
                    </div>

                    <select id="lvl-lang" name="lvl_lang" class="form-select form-select-lg mb-3 dark" aria-label=".form-select-lg example">
                        <option selected value="Nativo">Nativo</option>
                        <option value="Alto">Alto</option>
                        <option value="Medio">Medio</option>
                        <option value="Bajo">Bajo</option>
                    </select>
                    <div class="wrong">
                        <p></p>
                    </div>

                    <button id="btn-lang" class="btn btn-outline-light btn-form nml" name="add-lang" type="submit">Editar Idioma</button>

                </form>
            
        </div>
    </div>

    <?php }else if(isset($_GET["cod_title"])) {?>
    <h1 class="pb-2 border-bottom">Editar Titulo</h1>
    <div class="card">

        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary" onclick="updateLang('<?php echo $_GET['cod_lang']?>')">Go somewhere</a>
        </div>
    </div>

    <?php }else if(isset($_GET["cod_exp"])) {?>
    <h1 class="pb-2 border-bottom">Editar Experiencia</h1>
    <div class="card">

        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

    <?php }else if(isset($_GET["cod_about"])) {?>
    <h1 class="pb-2 border-bottom">Editar Descripción</h1>
    <div class="card">

        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <?php } ?>

    <script src="../../js/modifyRecords.js"></script>
</body>
</html>