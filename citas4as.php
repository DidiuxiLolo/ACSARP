<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- especificacion de html-->
	<meta name="autor" content="Diana Lohra">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- dice como comportarse -->
	<title>Instituto Tecnológico Campus Querétaro</title>
  <link rel="icon" type="img/x-icon" href="img/favicon.ico">

		<!--links de bootstrap y jquery-->
    <link rel="stylesheet" href="css/bootstrap 5/bootstrap.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!--barrita de navegación-->	
	<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
	 	<div class="container-fluid bcontent">
    	<a class="navbar-brand" href="#">TECNMCQ</a>
    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" 			aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>
    	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      		<div class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="mainpageas.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="controllers/residentesas.php">Residentes</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" data-toggle="dropdown" aria-current="page" href="#">Citas</a>
          <div class="dropdown-menu">
                        <a class="dropdown-item" href="citas1as.php">Agendar cita</a>
                        <a class="dropdown-item" href="citas2as.php">Citas asignadas</a>
                        <a class="dropdown-item" href="citas3as.php">Citas por aprobar</a>
                        <a class="dropdown-item" href="citas4as.php">Reportes y cancelaciones de citas</a>
                    </div>
                </li>
                <li class="nav-item">
              <a class="nav-link" href="index.html">Cerrar Sesión</a>
            </li>
          </div>

      	</div>
  		</div>
	</nav>
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<div class="container">
<label class="citasagendadas">Reportes y cancelaciones de citas </label>
</div>

<div class="container1">
  <form action="controllers/Reportes.php" method="post">
  <div class="row">
    <div class="col-25">
      <label for="motivo">Motivo del Reporte</label>
    </div>
    <div class="col-75">
      <select id="motivo" name="motivo">
        <option value="Cancelar cita">Cancelar cita</option>
        <option value="El residente no asiste a citas">El residente no asiste a citas</option>
        <option value="Comportamiento de residente">Comportamiento de residente</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="namerep">Nombre de Reporte</label>
    </div>
    <div class="col-75">
      <input type="text" id="asunto" name="namerep" placeholder="Ingrese el Nombre">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Descripción</label>
    </div>
    <div class="col-75">
      <textarea id="descripcion" name="descripcion" placeholder="Describa detalladamente el motivo del reporte" style="height:200px"></textarea>
    </div>
  </div>
  <br>
  <div class="boton">
    <input type="submit" onclick="myFunction()" class="BotonEnviar" value="Enviar" style="width: 300px;">
    
    <p id="demo"></p>

<script>
function myFunction() {
  var txt;
  if (confirm("Reporte enviado")) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>

  </div>  
  </form>
</div>



</body>
</html>