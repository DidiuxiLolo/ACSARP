<?php

//Nombre del server
$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";
//$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";

//Nombre de la base de datos
$connectionInfo = array( "Database"=>"prueba");

//Verifica la conexión con la base de datos
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//Si existe la conexión envía un mensaje de conexión establecida si no, manda otro mensaje 
//con el error ocurrido
if( $conn ){
    echo "Conexión establecida. <br />";
}else{
    echo "Conexión no establecida. <br />";
    die( print_r( sqlsrv_errors(), true));
}
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
</head>

<body>
<div class="container">
<label class="citasagendadas">Agendar Citas</label>
</div>

<div class="container1">
  <form action="controllers/citas.php" method="POST">
  <div class="row">
    <div class="col-25">
      <label for="residente">Residente</label>
    </div>
    <div class="col-75">
      <select class="selector" id="nombre" name="nombre">

      <?php
      //$query1 = "SELECT * FROM asres WHERE id = '".$_SESSION['id']."'";
      $query1 = "SELECT ar.idresidente AS idresidente, ar.idasesor AS idasesor, 
      re.nombre AS nombre, re.noCon AS noCon FROM asres ar JOIN residentes re ON ar.idresidente=re.id WHERE idasesor = '".$_SESSION['idasesor']."'";

      $result = sqlsrv_query($conn,$query1);

      if(sqlsrv_has_rows($result)){
        while($row=sqlsrv_fetch_array($result)){
          $idasesor= $row["idasesor"];
          $idresidente= $row["idresidente"];
          $nombreresidente= $row["nombre"];
          $noCon= $row["noCon"];
          echo '<option value="'.$idresidente.'">'.$nombreresidente.'</option>';
        }
      }
      ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fechalabel">Fecha</label>
    </div>
    <div class="col-75">
      <input type="date" name="fecha" value="2022-04-16 14:45" class="default" />
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="horalabel">Hora</label>
    </div>
    <div class="col-75">
      <input type="time" id="tiempo" name="hora" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="asunto">Asunto</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="asunto" name="asunto" placeholder="Ingrese su asunto">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Descripción</label>
    </div>
    <div class="col-75">
      <textarea id="descripcion" class="textarea1" name="descripcion" placeholder="Describa brevemente el tema de la cita" style="height:200px"></textarea>
    </div>
  </div>
  <br>
  <div class="boton">
    <input type="submit" class="BotonEnviar" value="Enviar" style="width: 300px;">
  </div>
  </form> 
  <?php
  //echo $_SESSION['nombre'];
  ?>
</div>

</body>
</html>