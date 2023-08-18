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
	<h1>. </h1>
    <h2>Residentes </h2>
</div>


 <div id="accordion">
  <div class="card">
    <div class="card-header">
      <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
        Lista de Alumnos
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
$query= "SELECT * FROM residentes";

$stmt = sqlsrv_query( $conn, $query, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

echo "<table class='TablaAlumnos'";

echo "<tr><th>id</th><th>No. Control</th><th>Nombre</th><th>Carrera</th><th>Semestre</th><th>Correo</th>
<th>Fecha de Dictamen</th><th>Entrego informe</th><th>Calificación final</th><th>Fecha de Entrega</th></tr>";

while($Row=sqlsrv_fetch_array($stmt)){

    echo "<tr><td>" . $Row['id'] . "</td><td>" . $Row['noCon'] . "<td>" . $Row['nombre']
     . "</td><td>" . $Row['carrera'] . "<td>" . $Row['semestre'] . "</td><td>" . $Row['correo'] . "</td><td>" . $Row['fedi'] . "</td><td>" . 
    $Row['enti']. "</td><td>" . $Row['calif'] . "</td><td>" . $Row['fecen']. "</td></tr>";
}   

echo "</table>";

?>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
        Agregar residentes
      </a>
    </div>
    <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
      <div class="card-body">
      <form action="controllers/agrmr.php" method="POST">
  Añadir usuario manualmente:
  <div class="row">
    <div class="col-25">
      <label for="fechalabel">Numero de Control</label>
    </div>
    <div class="col-75">
	<input type="text" class="inputt" id="noCon" name="noCon" placeholder="Ingrese el No. Control">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="asuntolabel">Nombre</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="nombre" name="nombre" placeholder="Ingrese nombre de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="Carrera">Carrera</label>
    </div>
    <div class="col-75">
      <input id="carrera" class="textarea1" name="carrera" placeholder="Ingrese la carrera">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="semestre">Semestre</label>
    </div>
    <div class="col-75">
      <input id="semestre" class="textarea1" name="semestre" placeholder="Ingrese el semestre">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="Correo">Correo</label>
    </div>
    <div class="col-75">
      <input id="correo" class="textarea1" name="correo" placeholder="Ingrese el Correo">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="Fecha de dictamen">Fecha de dictamen</label>
    </div>
    <div class="col-75">
      <input id="fechadi" class="textarea1" name="fechadi" placeholder="Ingrese la Fecha de dictamen">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="Fecha de entrega">Fecha de entrega</label>
    </div>
    <div class="col-75">
      <input id="fechaen" class="textarea1" name="fechaen" placeholder="Ingrese la Fecha de entrega">
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

  <div class="card">
    <div class="card-header">
      <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
        Calificaciones
      </a>
    </div>
    <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
      <div class="card-body">
        <div class="tablacalif">
        <div class="Calificaciones"><form action="controllers/calificaciones.php" method="POST" class="calif">
  Calificar residente:
  <div class="row">
    <div class="col-25">
      <label for="noCon">No. Control</label>
    </div>
    <div class="col-75">
	<input type="text" class="inputt" id="noCOn" name="noCon" placeholder="Ingrese Número de control">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="enti">Entrega de informe</label>
    </div>
    <div class="col-75">
	<input type="text" class="inputt" id="enti" name="enti" placeholder="Ingrese si o no">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 1</label>
    </div>
    <div class="col-75">
      <input type="number" class="inputt" id="calif" name="calif" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 2</label>
    </div>
    <div class="col-75">
      <input type="number" class="inputt" id="calif2" name="calif2" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 3</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="calif3" name="calif3" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 4</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="calif4" name="calif4" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 5</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="calif5" name="calif5" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 6</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="calif6" name="calif6" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 7</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="calif7" name="calif7" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 8</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="calif8" name="calif8" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 9</label>
    </div>
    <div class="col-75">
      <input type="text" class="inputt" id="calif9" name="calif9" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="calif">Calificación 10</label>
    </div>
    <div class="col-75">
      <input type="number" class="inputt" id="calif10" name="calif10" placeholder="Ingrese calificación de residente">
    </div>
  </div>
  <br>
  <div class="boton">
    <input type="submit" onclick="myFunction()" class="BotonEnviar" value="Enviar" style="width: 300px;">
    <p id="demo"></p>

<script>
function myFunction() {
  var txt;
  if (confirm("Residente calificado")) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>
  </div>
  </form> </div>
          
          <?php

//Nombre del server
$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";
//$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";

//Nombre de la base de datos
$connectionInfo = array( "Database"=>"prueba");

//Verifica la conexión con la base de datos
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//Query para la base de datos
$query= "SELECT * FROM residentes";

//Verifica que haya una conexión con la base de datos y que se inserta el elemento en la bd y tabla solicitada
$stmt = sqlsrv_query( $conn, $query, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

echo "<table>";

echo "<tr><th>No. Control</th><th>Nombre</th></tr>";

while($Row=sqlsrv_fetch_array($stmt)){

    
    echo "<tr><td>" . $Row['noCon'] . "</td><td>" . $Row['nombre']
     . "</td></tr>";
}   

echo "</table>";

?>
      </div>
      
      
      </div>
    </div>
  </div>

</div> 



</body>
</html>