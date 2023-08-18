<?php
	session_start();
?>

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
    <script src="js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

<!--barrita de navegación-->	
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" >
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
<label class="agendar">Asesores</label>
</div>



<div id="accordion">
  <div class="card">
    <div class="card-header">
      <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
        Lista de asesores
      </a>
    </div>
    <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
      <div class="card-body">
       <div class="card-body">
       <?php


//Nombre del server
$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";
//$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";

//Nombre de la base de datos
$connectionInfo = array( "Database"=>"prueba");

//Verifica la conexión con la base de datos
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//Query para la base de datos
$query= "SELECT * FROM asesores";

//Verifica que haya una conexión con la base de datos y que se inserta el elemento en la bd y tabla solicitada
$stmt = sqlsrv_query( $conn, $query, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

echo "<table>";

echo "<tr><th>id</th><th>Nombre</th><th>Correo</th><th>Departamento asignado</th></tr>";

while($Row=sqlsrv_fetch_array($stmt)){

    
    echo "<tr><td>" . $Row['id'] . "</td><td>" . $Row['nombre'] . "<td>" . $Row['correo']
     . "</td><td>" . $Row['deptasig'] . "</td></tr>";
}   

echo "</table>";

?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
        Agregar asesores
      </a>
    </div>
    <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
      <div class="card-body">
      <form action="controllers/agrmr.php" method="POST">
  Añadir usuario manualmente:
  <div class="row">
    <div class="col-25">
      <label for="fechalabel">Nombre</label>
    </div>
    <div class="col-75">
	<input type="text" class="inputt" id="nombre" name="nombre" placeholder="Ingrese el nombre del asesor">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="asuntolabel">Correo</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="correo" name="correo" placeholder="Ingrese correo de asesor">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="deptasig">Departamento asignado</label>
    </div>
    <div class="col-75">
      <input id="deptasig" class="textarea1" name="deptasig" placeholder="Ingrese departamento asignado">
    </div>
  </div>
  </div>
  <br>
  <div class="boton">
    <input type="submit" onclick="myFunction()" class="BotonEnviar" value="Enviar" style="width: 300px;">
    <p id="demo"></p>

<script>
function myFunction() {
  var txt;
  if (confirm("Residente agregado")) {
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

    </div>
  </div>

    </div>
  </div>
</div> 



<?php
//echo $_SESSION['id'];
?>


</body>
</html>