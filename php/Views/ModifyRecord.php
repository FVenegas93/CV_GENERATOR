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
        <form action="../Controllers/UpdateTitle.php?cod_title=<?php echo $_GET["cod_title"];?>" method="POST" id="title-form">
               
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
               

               <button id="btn-title" name="add-title" class="btn btn-outline-light btn-form nml" type="submit">Editar Titulación</button>

           </form>
    </div>

    <?php }else if(isset($_GET["cod_exp"])) {?>
    <h1 class="pb-2 border-bottom">Editar Experiencia</h1>
    <div class="card">

        <div class="card-body">
        <form action="../Controllers/UpdateExp.php?cod_exp=<?php echo $_GET["cod_exp"];?>" method="POST" id="exp-form">

            <div class="form-floating">
                <input type="text" class="form-control" id="expInput1" name="name_exp" placeholder="Nombre experiencia" />
                <label for="expInput1">Nombre de la experiencia</label>
            </div>
            <div class="wrong">
                <p id="wrong1"></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="expInput2" name="business" placeholder="Empresa" />
                <label for="expInput2">Empresa</label>
            </div>
            <div class="wrong">
                <p id="wrong2"></p>
            </div>

            <div>
                <div class="form-floating float-start w-50">
                    <input type="number" class="form-control" id="expInput3" name="exp_beginning" min="1940" max="2023"/>
                    <label for="expInput3" class="label">Año de Inicio</label>
                </div>
                    
                <div class="form-floating float-end w-50">
                    <input type="number" class="form-control" id="expInput4" name="exp_ending" min="1940" max="2023"/>
                    <label for="expInput4" class="label">Año de Finalización</label>
                </div>
            </div>

            <div class="wrong">
                <p id="wrong3"></p>
            </div>

            <div class="form-floating float-start w-100">
                <input type="text" class="form-control" id="expInput5" name="job" placeholder="Puesto" />
                <label for="expInput5">Puesto</label>
            </div>
            <div class="wrong">
                <p id="wrong4"></p>
            </div>


            <button id="btn-exp" name="add-exp" class="btn btn-outline-light btn-form nml" type="submit">Editar Exp</button>

        </form>
        </div>
    </div>

    <?php }else if(isset($_GET["cod_about"])) {?>
    <h1 class="pb-2 border-bottom">Editar Descripción</h1>
    <div class="card">

        <div class="card-body">
        <form action="../Controllers/UpdateAbout.php?cod_about=<?php echo $_GET["cod_about"];?>" method="POST" id="about-form">

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

            <button id="btn-about" name="add-about" class="btn btn-outline-light btn-form nml" type="submit">Editar Sobre mí</button>

        </form>
        </div>
    </div>
    <?php }else if(isset($_GET["username"])) { ?>
        <h1 class="pb-2 border-bottom">Editar Datos</h1>
        <div class="card">

        <div class="card-body">
            <form action="../Controllers/UpdateUser.php?username=<?php echo $_GET["username"];?>" method="POST" id="update-user-form">

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput5" name="first_name" placeholder="Tu nombre"/>
                <label id="label5" for="floatingInput">Tu nombre</label>
            </div>
            <div class="wrong">
                <p id="wrong5"></p>
            </div>
            
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput6" name="first_surname" placeholder="Primer apellido"/>
                <label id="label6" for="floatingInput">Primer apellido</label>
            </div>
            <div class="wrong">
                <p id="wrong6"></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput7" name="nif" placeholder="NIF"/>
                <label id="label7" for="floatingInput">NIF (Ej: 12345678T)</label>
            </div>
            <div class="wrong">
                <p id="wrong7"></p>
            </div>
            

            <div class="form-floating">
                <select list="json-countries" class="form-control" id="input1" name="country" placeholder="País">
                    <option selected="true" disabled="disabled">Seleccione un país</option>
                </select>
                <label id="label1" for="floatingInput">País</label>
            </div>

            <div>
                <p></p>
            </div>

            <div class="form-floating">
                <select class="form-control" id="input2" name="region" placeholder="Provincia">
                    <option selected="true" disabled="disabled">Seleccione una provincia</option>
                </select>
                <label id="label2" for="floatingInput">Provincia</label>
            </div>

            <div>
                <p></p>
            </div>

           <div class="form-floating">
                <select class="form-control" id="input3" name="city" placeholder="Ciudad">
                    <option selected="true" disabled="disabled">Seleccione una ciudad</option>
                </select>
                <label id="label3" for="floatingInput">Ciudad</label>
            </div>

            <div>
                <p></p>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="input4" name="address" placeholder="Dirección"/>
                <label id="label4" for="floatingInput">Dirección</label>
            </div>

            <div class="wrong">
                <p id="wrong8"></p>
            </div>
            
            
            <button id="btn-user" name="add-about" class="btn btn-outline-light btn-form nml" type="submit">Editar Sobre mí</button>

            </form>

            <div class="ajax-resp"></div>
        </div>
        </div>
    <?php }?>

    <script src="../../js/modifyRecords.js"></script>
    <script src="../../js/modifyRecords2.js"></script>
    <script src="../../js/modifyUser.js"></script>
</body>
</html>