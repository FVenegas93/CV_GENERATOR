<?php
ob_start();
    include("../Views/Navbar.php");
    include("../Models/CVFunctions.php");
    include("../Models/LanguagesFunctions.php");
    include("../Models/CVAttributes.php");


    if(!isset($_SESSION['user']) || $_SESSION['role'] != 'account') {
        header("Location: ../../html/ErrorPage.html");
    }

    if(isset($_GET["cod_cv"])) {
        $cod_cv = $_GET["cod_cv"];
        $user = $_SESSION["user"];
        $disabled_submit = false;
        
        $spanish = findLangageByUserAndLangNameAndCV($user, "Español", $cod_cv);
        $english = findLangageByUserAndLangNameAndCV($user, "Inglés", $cod_cv);
        $french = findLangageByUserAndLangNameAndCV($user, "Francés", $cod_cv);
        $german = findLangageByUserAndLangNameAndCV($user, "Alemán", $cod_cv);

        if($spanish && $english && $french && $german) {
            $disabled_submit = true;
        }else {
            $disabled_submit = false;
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $name_lang = $_POST["name_lang"];
            $lvl_lang = $_POST["lvl_lang"];
    
    
            if(!findLangageByUserAndLangName($user, $name_lang)) {
                createLangByUser($name_lang, $lvl_lang, $user);
                $cod_lang = findLangID($user, $name_lang)["cod_lang"];
                createLangInCV($cod_cv, $cod_lang);
                header("Location: CVData.php?cod_cv=$cod_cv");
                
            }else {
                $cod_lang = findLangID($user, $name_lang)["cod_lang"];
                createLangInCV($cod_cv, $cod_lang);
                header("Location: CVData.php?cod_cv=$cod_cv");
            }     
        }

    }else {
        header("Location: ../../html/ErrorPage.html");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/jumbotron.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <main>
        <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-bg-dark rounded-3 lang">
            <h2>Idiomas</h2>

            <form action="CVData.php?cod_cv=<?php echo $cod_cv;?>" method="POST" id="lang-form">
                
                <select id="select-lang" name="name_lang" class="form-select form-select-lg mb-3 dark" aria-label=".form-select-lg example">
                    <option value="#" selected disabled>Seleccione un idioma</option>
                    <?php if(!$spanish) {echo "<option value='Español'>Español</option>";}?>
                    <?php if(!$english) {echo "<option value='Inglés'>Inglés</option>";}?>
                    <?php if(!$french) {echo "<option value='Francés'>Francés</option>";}?>
                    <?php if(!$german) {echo "<option value='Alemán'>Alemán</option>";}?>
                </select>

                <select id="lvl-lang" name="lvl_lang" class="form-select form-select-sm dark" aria-label=".form-select-sm example">
                    <option selected value="Nativo">Nativo</option>
                    <option value="Alto">Alto</option>
                    <option value="Medio">Medio</option>
                    <option value="Bajo">Bajo</option>
                </select>

                <button id="btn-lang" class="btn btn-outline-light btn-form" type="submit"<?php if($disabled_submit) echo "disabled";?>>Añadir</button>

            </form>
            

            
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3 title">
            <h2>Formación</h2>
            <form action="CVData.php?cod_cv=<?php echo $cod_cv;?>" method="POST" id="title-form">

                <select id="title_name" name="title_name" class="form-select form-select-lg mb-3 dark" aria-label=".form-select-lg example">
                    <option value="#" selected disabled>Seleccione un nivel formativo</option>
                    <option value="Enseñanza Secundaria Obligatoria">Enseñanza Secundaria Obligatoria</option>
                    <option value="Bachillerato">Bachillerato</option>
                    <option value="Ciclo Formativo Grado Medio"> Ciclo Formativo Grado Medio</option>
                    <option value="Ciclo Formativo Grado Superior">Ciclo Formativo Grado Superior</option>
                    <option value="Grado Universitario">Grado Universitario</option>
                    <option value="Máster">Máster</option>
                    <option value="Doctorado">Doctorado</option>
                    <option value="Curso">Curso</option>
                    <option value="Otros">Otros</option>
                </select>

                <div class="form-floating">
                    <input type="text" class="form-control" id="titleInput1" name="training_center" placeholder="Centro de formación" />
                    <label for="titleInput1">Centro formativo</label>
                </div>
                <div class="wrong">
                    <p id="wrong1"></p>
                </div>

                <div class="form-floating">
                    <input type="number" class="form-control" id="titleInput2" name="title_beginning" min="1940" max="2023"/>
                    <label for="titleInput2">Año de Inicio</label>
                </div>
                <div class="wrong">
                    <p id="wrong1"></p>
                </div>

                <div class="form-floating">
                    <input type="number" class="form-control" id="titleInput3" name="title_ending" min="1940" max="2023"/>
                    <label for="titleInput3">Año de Finalización</label>
                </div>
                <div class="wrong">
                    <p id="wrong1"></p>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" id="titleInput4" name="title_description" max="255"></textarea>
                    <label for="titleInput4">Descripción de la formación</label>
                </div>
                <div class="wrong">
                    <p id="wrong1"></p>
                </div>

                <button id="btn-lang" class="btn btn-outline-light btn-form" type="submit">Añadir</button>

            </form>

            </div>
        </div>
        </div>
        <div class="row align-items-md-stretch spaced">
        <div class="col-md-6">
            <div class="h-100 p-5 text-bg-dark rounded-3">
            <h2>Change the background</h2>
            <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
            <button class="btn btn-outline-light" type="button">Example button</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Add borders</h2>
            <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
            </div>
        </div>
        </div>
    
    </main>
    <script src="../../js/scriptLanguages.js"></script>
</body>
</html>