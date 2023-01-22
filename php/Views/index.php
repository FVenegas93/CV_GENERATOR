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

        <?php if(isset($_SESSION['user'])) { ?>
            <h1 class="fw-light">Bienvenido/a <?php echo $_SESSION['user'];?></h1>
            <?php if($address == NULL || $address == "") { ?>
                <p class="lead text-muted">No hay ninguna dirección, ¿te gustaría añadir una?</p>
                
                <p>
                <a href="#" class="btn btn-primary my-2">¡Vamos a ello!</a>
                <a href="#" class="btn btn-secondary my-2">Ahora no</a>
                </p>
            <?php }else { ?>
            
            <?php } ?>

        <?php }else { ?>
            <h1 class="fw-light">Bienvenido/a</h1>
            <p class="lead text-muted">Esta poderosa herramienta web le permitirá crear un CV de forma sencilla y amigable.</p>
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