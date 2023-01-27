<?php
    include("../Views/Navbar.php");

    if(isset($_SESSION['user']) && $_SESSION['role'] == 'account') {
        $username = $_SESSION['user'];
       
    }else {
        header("Location: ../../html/ErrorPage.html");
    }
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
            
            <select id="select-lang" class="form-select form-select-lg mb-3 dark" aria-label=".form-select-lg example">
                <option selected value="Español">Español</option>
                <option value="Francés">Francés</option>
                <option value="Inglés">Inglés</option>
                <option value="Italiano">Italiano</option>
                <option value="Alemán">Alemán</option>
            </select>

            <select id="lvl-lang" class="form-select form-select-sm dark" aria-label=".form-select-sm example">
                <option selected value="Nativo">Nativo</option>
                <option value="Alto">Alto</option>
                <option value="Medio">Medio</option>
                <option value="Bajo">Bajo</option>
            </select>

            <button id="btn-lang" class="btn btn-outline-light btn-form" type="button">Añadir</button>
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
        <input id='user' type="hidden" value="<?php echo $username;?>"/>
    </main>
    <script src="../../js/scriptLanguages.js"></script>
</body>
</html>