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
    <link rel="stylesheet" href="../css/bootstrap 5/bootstrap.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>


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
              <a class="nav-link" href="../mainpageas.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="residentesas.php">Residentes</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" data-toggle="dropdown" aria-current="page" href="#">Citas</a>
          <div class="dropdown-menu">
                        <a class="dropdown-item" href="../citas1as.php">Agendar cita</a>
                        <a class="dropdown-item" href="../citas2as.php">Citas asignadas</a>
                        <a class="dropdown-item" href="../citas3as.php">Citas por aprobar</a>
                        <a class="dropdown-item" href="../citas4as.php">Reportes y cancelaciones de citas</a>
                    </div>
                </li>
                <li class="nav-item">
              <a class="nav-link" href="../index.html">Cerrar Sesión</a>
            </li>
          </div>

      	</div>
  		</div>
	</nav>
  <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
<div class="container">
	<h1>. </h1>
    <h2>Residentes </h2>
</div>

 <div id="accordion">
  <div class="card">
    <div class="card-header">
      <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
        Alumno
      </a>
    </div>
    <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
      <div class="card-body">
       <div class="card-body">


<?php


//Nombre del server
$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";

//Nombre de la base de datos
$connectionInfo = array( "Database"=>"prueba");

//Verifica la conexión con la base de datos
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//Query para la base de datos
$query= "SELECT ar.idresidente AS idresidente, ar.idasesor AS idasesor, 
re.id AS id, re.noCon AS noCon, re.nombre AS nombre, re.carrera AS carrera, re.semestre AS semestre, re.correo AS correo, 
re.fedi AS fedi, re.fecen AS fecen FROM asres ar 
JOIN residentes re ON ar.idresidente=re.id WHERE idasesor = '".$_SESSION['idasesor']."'";

//Verifica que haya una conexión con la base de datos y que se inserta el elemento en la bd y tabla solicitada
$stmt = sqlsrv_query( $conn, $query, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

echo "<table>";

echo "<tr><th>No. Control</th><th>Nombre</th><th>Carrera</th><th>Semestre</th><th>Correo</th><th>Fecha de dictamen</th><th>Fecha de entrega</th></tr>";

while($Row=sqlsrv_fetch_array($stmt)){

    
    echo "<tr><td>" . $Row['noCon'] . "<td>" . $Row['nombre']
     . "</td><td>" . $Row['carrera'] . "<td>" . $Row['semestre'] . "</td><td>" . $Row['correo'] . "</td><td>" . $Row['fedi'] . "</td><td>" . 
    $Row['fecen'] . "</td></tr>";
}   

echo "</table>";

?>
          
        <!--<div class="btn-group">
        <form action="#">
          <button type="submit" style="background-color: darkorange; border-color: orange; color: white;" class="btn btn-primary">Avances</button>
          </form>
        </div> -->
      </div>
    </div>
  </div>

  
    </div>
  </div>

</div> 



</body>
</html>