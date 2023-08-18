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
$noControl=$_POST["noCon"];
$enti=$_POST["enti"];
$calif=$_POST["calif"];
$calif2=$_POST["calif2"];
$calif3=$_POST["calif3"];
$calif4=$_POST["calif4"];
$calif5=$_POST["calif5"];
$calif6=$_POST["calif6"];
$calif7=$_POST["calif7"];
$calif8=$_POST["calif8"];
$calif9=$_POST["calif9"];
$calif10=$_POST["calif10"];

$query1 = "SELECT * FROM residentes where noCon='$noControl'";

$result = sqlsrv_query($conn,$query1);

    while(sqlsrv_has_rows($result)){
        //Query para la base de datos
$query2= "UPDATE residentes set enti='$enti', calif=(cast('$calif'as int)+cast('$calif2'as int)+cast('$calif3'as int)+cast('$calif4'as int)
+cast('$calif5'as int)+cast('$calif6'as int)+cast('$calif7'as int)+cast('$calif8'as int)+cast('$calif9'as int)+cast('$calif10'as int))/10 where noCon='$noControl'";

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



}
?>