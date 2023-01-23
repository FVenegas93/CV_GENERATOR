<?php
    include("Navbar.php");
    include("../Controllers/NullDirection.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/transitions.css">

  </head>
<body>



<section class="py-5 text-center container">
    <div class="row py-lg-5" id="welcome-msg">
      <div class="col-lg-6 col-md-8 mx-auto">

        <!--PRINTS A MESSAGE WITH THE USERNAME ON IT AND ASKS FOR AN ADDRESS IF NOT SETTED-->
        <?php if(isset($_SESSION['user'])) { ?>
            <h1 class="fw-light">Bienvenido/a <?php echo $_SESSION['user'];?></h1>
            <?php if($address == NULL || $address == "") { ?>
                <p class="lead text-muted">No tienes ninguna dirección todavía, ¿te gustaría añadir una?</p>
                
                <p>
                <a href="AddDirection.php" class="btn btn-primary my-2 btn-form">¡Vamos a ello!</a>
                </p>
            <?php }else { ?>
            
            <?php } ?>

        <?php }else { ?>
            <h1 class="fw-light">Bienvenido/a</h1>
            <p class="lead text-muted">Esta poderosa herramienta web le permitirá crear un CV de forma sencilla y amigable.</p>

            <!--CAROUSEL-->
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">

                <div class="carousel-item active">
                  <img src="../../img/CV1.png" class="d-block w-100" alt="...">
                  <p class="lead text-muted">¿Necesitas crear un CV moderno y atractivo pero no sabes cómo?</p>
                </div>
                
                <div class="carousel-item">
                  <img src="../../img/CV2.jpg" class="d-block w-100" alt="...">
                  <p class="lead text-muted">No te preocupes, CV Generator te da la solución. 
                    Te guiaremos paso a paso para crear un perfil adaptado a tu situación laboral.</p>
                </div>

                <div class="carousel-item">
                  <img src="../../img/CV3.jpg" class="d-block w-100" alt="...">
                  <p class="lead text-muted">Imprime tu increíble CV y aplica tu candidatura a las empresas.</p>
                </div>
              </div>

              <button style="color:red" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>

              <button style="color:red" class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

        <?php } ?>

      </div>
    </div>
  </section>

  <script >
    $(document).ready(function() {
      $('#welcome-msg').toggleClass("fade");
    });
  </script>
</body>
</html>