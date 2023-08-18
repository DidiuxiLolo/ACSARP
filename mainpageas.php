<?php
  session_start();
?>
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

<link href='librerias/calen/main.css' rel='stylesheet' />
<script src='librerias/calen/main.js'></script>
<script src='librerias/calen/locales/es.js'></script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var fecha = new Date();
    const añoActual = fecha.getFullYear();
    const hoy = fecha.getDate();
    const mesActual = fecha.getMonth() + 1; 

    fecha =  añoActual +'-'+mesActual+'-'+hoy;


    $.ajax({
        url: 'controllers/loadA.php',
        type: 'POST',
        async: false,
        data: { Id: 1 },
        success: function (data) {
            obj = [data];
        },
        error: function (xhr, err) {
            alert("readyState: " + xhr.readyState + "\nstatus: " + xhr.status);
            alert("responseText: " + xhr.responseText);
        }
    });

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        
      },
      dayMaxEvents: true, // allow "more" link when too many events
      locale: 'es',
      height: 650,
      events: JSON.parse(obj)
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    padding-top: 40px;
    max-width: 1100px;
    margin: 0 auto;
    height: auto;
  }

</style>


	 

</head>

<body>
<div class="container">
    <h1><br>Bienvenido</h1>
</div>

<div id='calendar'></div>


<?php
// start a session
//session_start();
//echo $_SESSION['id'];
// manipulate session variables
?>

</body>
</html>