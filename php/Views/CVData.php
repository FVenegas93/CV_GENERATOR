<?php
ob_start();
    include("../Views/Navbar.php");
    include("../Models/CVFunctions.php");
    include("../Models/LanguagesFunctions.php");
    include("../Models/TitlesFunctions.php");
    include("../Models/AboutmeFunctions.php");

    //FORMULARIO IDIOMAS
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

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-lang'])) {
            
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

    //TITLES FORM
    if(!isset($_SESSION['user']) || $_SESSION['role'] != "account") {
        header("Location: ../../html/ErrorPage.html");
    }
        
    if(isset($_GET["cod_cv"])) {
        $cod_cv = $_GET["cod_cv"];
        $user = $_SESSION["user"];

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add-title"])) {
            $title_name = $_POST["name_title"];
            $training_center = $_POST["training_center"];
            $begin = $_POST["title_beginning"];
            $end = $_POST["title_ending"];
            $description = $_POST["title_description"];

            if(!findTitleByUserAndTitleName($user, $title_name)) {
                createTitleByUser($title_name, $training_center, $begin, $end, $description, $user);
                $cod_title = findTitleID($user, $title_name)["cod_title"];
                createTitleInCV($cod_cv, $cod_title);
                header("Location: CVData.php?cod_cv=$cod_cv");
            }else {
                $cod_title = findTitleID($user, $title_name);
                createTitleInCV($cod_cv, $cod_title)["cod_title"];
                header("Location: CVData.php?cod_cv=$cod_cv");
            }
        }
    }

    //ABOUT FORM
    if(!isset($_SESSION['user']) || $_SESSION['role'] != "account") {
        header("Location: ../../html/ErrorPage.html");
    }
        
    if(isset($_GET["cod_cv"])) {
        $cod_cv = $_GET["cod_cv"];
        $user = $_SESSION["user"];

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add-about"])) {
            $name_about = $_POST["name_about"];
            $desc = $_POST["self_description"];
           
            if(!findAboutByUserAndName($user, $name_about)) {
                createAboutByUser($name_about, $desc, $user);
                $cod_about = findAboutID($user, $name_about)["cod_about"];
                createAboutInCV($cod_cv, $cod_about);
                header("Location: CVData.php?cod_cv=$cod_cv");
            }else {
                $cod_about = findAboutID($user, $name_about);
                createAboutInCV($cod_cv, $cod_about)["cod_about"];
                header("Location: CVData.php?cod_cv=$cod_cv");
            }
        }
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
            <div class="h-100 p-5 text-bg-dark rounded-3 padded">
            <h2>Idiomas</h2>

            <form action="CVData.php?cod_cv=<?php echo $cod_cv;?>" method="POST" id="lang-form">
                
                <select id="select-lang" name="name_lang" class="form-select form-select-lg mb-3 dark" aria-label=".form-select-lg example">
                    <option value="#" selected disabled>Seleccione un idioma</option>
                    <?php if(!$spanish) {echo "<option value='Español'>Español</option>";}?>
                    <?php if(!$english) {echo "<option value='Inglés'>Inglés</option>";}?>
                    <?php if(!$french) {echo "<option value='Francés'>Francés</option>";}?>
                    <?php if(!$german) {echo "<option value='Alemán'>Alemán</option>";}?>
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

                <button id="btn-lang" class="btn btn-outline-light btn-form nml" name="add-lang" type="submit"<?php if($disabled_submit) echo "disabled";?>>Añadir Idioma</button>

            </form>
            

            
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3 title padded">
            <h2>Formación</h2>
            
            <form action="CVData.php?cod_cv=<?php echo $cod_cv;?>" method="POST" id="title-form">
               
                <select id="title_name" name="name_title" class="form-select form-select-lg mb-3 dark" aria-label=".form-select-lg example">
                    <option value="#" selected disabled>Estudios</option>
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

                <div>
                    <div class="form-floating float-start w-50">
                        <input type="number" class="form-control" id="titleInput2" name="title_beginning" min="1940" max="2023"/>
                        <label for="titleInput2" class="label">Año de Inicio</label>
                    </div>
                        
                    <div class="form-floating float-end w-50">
                        <input type="number" class="form-control" id="titleInput3" name="title_ending" min="1940" max="2023"/>
                        <label for="titleInput3" class="label">Año de Finalización</label>
                    </div>
                </div>
                
                
                <div class="wrong">
                    <p id="wrong2"></p>
                </div>

                <div class="form-floating float-start w-100">
                    <textarea class="form-control" id="titleInput4" name="title_description" max="255"></textarea>
                    <label for="titleInput4">Descripción de la formación</label>
                </div>
                

                <button id="btn-lang" name="add-title" class="btn btn-outline-light btn-form nml" type="submit">Añadir Titulación</button>

            </form>

            </div>
        </div>
        </div>

        <div class="row align-items-md-stretch spaced">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Experiencia Laboral</h2>
           
                <form action="CVData.php?cod_cv=<?php echo $cod_cv;?>" method="POST" id="exp-form">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="aboutInput1" name="name_about" placeholder="Nombre descripción" />
                        <label for="aboutInput1">Nombre de la descripción</label>
                    </div>
                    <div class="wrong">
                        <p id="wrong1"></p>
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" id="aboutInput2" name="self_description" max="255"></textarea>
                        <label for="aboutInput2">Descríbete</label>
                    </div>
                    <div class="wrong">
                        <p id="wrong2"></p>
                    </div>

                    <button id="btn-lang" name="add-exp" class="btn btn-outline-light btn-form nml" type="submit">Añadir Exp</button>

                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
            <h2 class="darkh2">Sobre mí</h2>
            <form action="CVData.php?cod_cv=<?php echo $cod_cv;?>" method="POST" id="about-form">

                    <div class="form-floating">
                        <input type="text" class="form-control" id="aboutInput1" name="name_about" placeholder="Nombre descripción" />
                        <label for="aboutInput1">Nombre de la descripción</label>
                    </div>
                    <div class="wrong">
                        <p id="wrong1"></p>
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" id="aboutInput2" name="self_description" max="255"></textarea>
                        <label for="aboutInput2">Descríbete</label>
                    </div>
                    <div class="wrong">
                        <p id="wrong2"></p>
                    </div>

                    <button id="btn-lang" name="add-about" class="btn btn-outline-light btn-form nml" type="submit">Añadir Sobre mí</button>

                </form>
            </div>
        </div>
        </div>
    
    </main>
    <script src="../../js/scriptCVData.js"></script>
</body>
</html>