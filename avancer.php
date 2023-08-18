<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- especificacion de html-->
    <meta name="autor" content="Diana Lohra, Pedro Padilla">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- dice como comportarse -->
    <title>Instituto Tecnológico Campus Querétaro</title>
    <link rel="icon" type="img/x-icon" href="img/favicon.ico">
  
      <!--links de bootstrap y jquery-->
      <link rel="stylesheet" href="css/bootstrap 5/bootstrap.min.css">
      <script src="js/jquery-3.6.0.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
  
  <!--barrita de navegación-->	
  <nav  class="navbar navbar-expand-lg fixed-top" >
       <div id ="barra" class="container-fluid bcontent">
        <a id="texto" class="navbar-brand" href="#">TECNMCQ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" 			aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <li class="nav-item">
                <a id="texto" class="nav-link" href="mainpager.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a id="texto" class="nav-link" href="asesoresr.php">Asesor</a>
              </li>
              <li class="nav-item dropdown">
                <a id="texto" class="nav-link active dropdown-toggle" data-toggle="dropdown" aria-current="page" href="#">Citas</a>
                <div class="dropdown-menu" style="background-color: rgb(240, 240, 240);">
                          <a id="texto" class="dropdown-item" href="citas1r.php">Agendar cita</a>
                          <a id="texto" class="dropdown-item" href="citas2r.php">Citas asignadas</a>
                          <a id="texto" class="dropdown-item" href="citas3r.php">Citas por aprobar</a>
                          <a id="texto" class="dropdown-item" href="citas4r.php">Reportes y cancelaciones de citas</a>
                      </div>
                  </li>
 
                  <li class="nav-item">
                <a id="texto" class="nav-link" href="index.html">Cerrar Sesión</a>
              </li>
            </div>
  
          </div>
        </div>
    </nav>
    <link rel="stylesheet" href="css/estilos.css">
  </head>

<body>
<div class="container">
<label class="agendar">Avances</label>
<p>Por favor suba el documento solicitado por su asesor.<br>Favor de asegurarse de subir el documento correcto ya que no podrá borrarlo una vez subido.</p>

  <form action="#" method="post" enctype="multipart/form-data">
      Selecciona el documento:
      <input class="archivo" type="file" name="select_excel" id="fileToUpload" ><br><br>
      <input type="submit" value="Entregar" name="submit" class="subir">
  </form>

</body>
</html>