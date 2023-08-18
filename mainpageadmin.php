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
    <script src="js/bootstrap.bundle.min.js"></script>


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
        			<a class="nav-link" href="mainpageadmin.php">Inicio</a>
        		</li>
        		<li class="nav-item">
        			<a class="nav-link" href="residentesadmin.php">Residentes</a>
        		</li>
                <li class="nav-item">
                    <a class="nav-link" href="asesoresadmin.php">Asesores</a>
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
<label class="agendar">Bienvenido </label><br>
	<label class="subagendar">Enero-Junio 2022</label>
	
	<form action="controllers/upload.php" method="post" enctype="multipart/form-data">
  		Selecciona el documento:
  		<input type="file" name="select_excel" id="fileToUpload"><br><br>
  		<input type="submit" value="Actualizar" name="submit">
	</form>

	<div class="container1">

  
</div>

	<div class="containerRA">
		<div >
			<h3><br>Residentes</h3>
			<?php


//Nombre del server
//$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";
$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";

//Nombre de la base de datos
$connectionInfo = array( "Database"=>"prueba");

//Verifica la conexión con la base de datos
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//Query para la base de datos
$query= "SELECT nombre FROM residentes";

$stmt = sqlsrv_query( $conn, $query, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

echo "<table>";

echo "<tr><th>Nombre</th></tr>";

while($Row=sqlsrv_fetch_array($stmt)){

    
    echo "<tr><td>" . $Row['nombre']  . "</td></tr>";
}   

echo "</table>";

?>
        
		</div>
		<div class="tagasesores"><h3>Asesores</h3></div>
		<?php


//Nombre del server
//$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";
$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";

//Nombre de la base de datos
$connectionInfo = array( "Database"=>"prueba");

//Verifica la conexión con la base de datos
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//Query para la base de datos
$query= "SELECT nombre FROM asesores";

//Verifica que haya una conexión con la base de datos y que se inserta el elemento en la bd y tabla solicitada
$stmt = sqlsrv_query( $conn, $query, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

echo "<table>";

echo "<tr><th>Nombre</th></tr>";

while($Row=sqlsrv_fetch_array($stmt)){

    
    echo "<tr><td>" . $Row['nombre']  . "</td></tr>";
}   

echo "</table>";

//echo $_SESSION['id'];
?>
	</div>


</div>


</body>
</html>