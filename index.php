<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- especificacion de html-->
  <meta name="autor" content="Diana Lohra y Pedro Padilla">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- dice como comportarse -->
  <title>SAR</title>
  <link rel="icon" type="img/x-icon" href="img/favicon.ico">

    <!--links de bootstrap y jquery-->
    <link rel="stylesheet" href="css/bootstrap 5/bootstrap.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

   
<main class="form-signin">

  <form action="controllers/login.php" method="post">
    <img class="mb-4" src="img/itq-logo.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Por favor inicie sesion</h1>
											
    <div class="form-group">
      <input type="email" name="email"  class="form-control input-lg" placeholder="Correo Electrónico"  >
  
      <input type="password" name="password"  class="form-control input-lg" placeholder="Contraseña"  >

       <input type="submit" style="background-color: darkorange; border-color: darkorange; color: white;" class="w-100 btn btn-lg btn-primary"  >
     

</form>
</main>

</body>

</html>
