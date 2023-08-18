<?php

if(!empty($_POST)){

//Nombre del server
//$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";
$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";

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
//Parametros a introducir
$id=1;
$noControl=$_POST["noCon"];
$nombreAlumno=$_POST["nombre"];
$carrera=$_POST["carrera"];
$semestre=$_POST["semestre"];
$feDictamen=$_POST["fechadi"];
$feEntrega=$_POST["fechaen"];
$correo=$_POST["correo"];

$query1 = "SELECT * FROM residentes where id='$id'";

$result = sqlsrv_query($conn,$query1);

    while(sqlsrv_has_rows($result)){
        echo "A record already exists."; 
        $id += 1;
        $query1 = "SELECT * FROM residentes where id='$id'";
        $result = sqlsrv_query($conn,$query1);
        if(sqlsrv_query($conn,$query1)==false)
            break;
    }

//Query para la base de datos
$query2= "INSERT into residentes(id, noCon, nombre, carrera, semestre, correo, fechdi, fechen)values('$id', '$noControl', 
      '$nombreAlumno', '$carrera', '$semestre','$correo','$feDictamen','$feEntrega')";
       $query4="INSERT into usuarios(id, nombre, correo, password, usertype)values('$id', '$nombreAlumno','$correo', '$noControl', '1')";
       $recurso3=sqlsrv_prepare($conn,$query4);
       if(sqlsrv_execute($recurso3)){
         echo "Agregado correctamente";
       }
       else{
         echo "No agregado";
         die( print_r( sqlsrv_errors(), true));
       }

$recurso=sqlsrv_prepare($conn,$query2);

if(sqlsrv_execute($recurso)){

    header('Location: ../residentesadmin.php');
        
    die();
}
else{
    echo "No agregado";
    die( print_r( sqlsrv_errors(), true));
}

}
?>