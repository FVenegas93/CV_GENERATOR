<?php
include("Navbar.php");
include("../Models/UserFunctions.php");
include("../Models/LanguagesFunctions.php");
include("../Models/TitlesFunctions.php");
include("../Models/ExperiencesFunctions.php");
include("../Models/AboutmeFunctions.php");

if(!isset($_SESSION['user']) || !isset($_SESSION['role']) == "account" || !isset($_GET["cod_cv"])) {
    header("Location: ../../html/ErrorPage.html");
}else {
    $user = $_SESSION['user'];
    $cod_cv = $_GET['cod_cv'];
    $userdata = findAllDataByUser($user)->fetch(PDO::FETCH_ASSOC);
    $langdata = findLanguagesByUserAndCV($user, $cod_cv);
    $titledata = findTitlesByUserAndCV($user, $cod_cv);
    $expdata = findExpByUserAndCV($user, $cod_cv);
    $aboutdata = findAboutsByUserAndCV($user, $cod_cv);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Overview</title>
    <link rel="stylesheet" href="../../css/CVstyle.css">
</head>
<body>
    <main>
        <!--NAME AND CONTACT DATA-->
        <div class="bg-dark text-secondary px-4 py-5 text-center not-padded">
            <div class="py-5">
            <h2 class="display-5 fw-bold text-white name"><?php echo $userdata['first_name']." ".$userdata['first_surname']?></h2>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4"><?php echo '<strong>Email</strong>: '.$userdata['email']?></p>
                <p class="fs-5 mb-4"><?php echo '<strong>Teléfono</strong>: '.$userdata['phone']?></p>
                <p class="fs-5 mb-4"><?php echo '<strong>Dirección: </strong>'.$userdata['address'].", ".$userdata['city']." (".$userdata['region'].")"?></p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
            </div>
        </div>

        <!--CV DATA-->
        <div class="container px-4 py-5 not-padded" id="icon-grid">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#bootstrap"/></svg>
                <div>
                
                <h3 class="fw-bold mb-0 fs-4 coloured">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                    <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
                    <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
                    </svg> 
                IDIOMAS</h3>

                <?php foreach($langdata as $lang) { ?>
                    <p><?php echo "<strong>".$lang['name_lang']."</strong>".", nivel: ".$lang['lvl_lang']?></p>
                <?php } ?>

                </div>
            </div>
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#cpu-fill"/></svg>
                <div>
                <h3 class="fw-bold mb-0 fs-4 coloured">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg>   
                TÍTULOS</h3>

                <?php foreach($titledata as $title) { ?>
                    <p><?php echo "<strong>Nivel: </strong>".$title['name_title']." <br><strong>Centro:</strong> ".
                    $title['training_center']." <br><strong>Fecha: </strong>".$title['title_beginning']."-".$title['title_ending']
                    ."<br><strong>Descripción: </strong>".$title['title_description']?></p>
                <?php } ?>


                </div>
            </div>
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#calendar3"/></svg>
                <div>
                <h3 class="fw-bold mb-0 fs-4 coloured">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                    </svg>
                EXPERIENCIA</h3>

                <?php foreach($expdata as $exp) { ?>
                <p><?php echo "<strong>Experiencia: </strong>".$exp['name_exp']." <br><strong>Empresa:</strong> ".
                    $exp['business']." <br><strong>Fecha: </strong>".$exp['beginning']."-".$exp['ending']
                    ."<br><strong>Puesto: </strong>".$exp['job']?></p>
                <?php } ?>

                </div>
            </div>
            <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#home"/></svg>
                <div>
                <h3 class="fw-bold mb-0 fs-4 coloured">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    </svg>
                SOBRE MÍ</h3>

                <?php foreach($aboutdata as $about) { ?>
                    <p><?php echo "<strong>".$about['name_about']."<br></strong>".$about['self_description']?></p>
                <?php } ?>
                <p></p>
                </div>
            </div>

    </div>
  </div>
    </main>
</body>
</html>