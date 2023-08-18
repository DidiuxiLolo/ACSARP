<?php

if(!empty($_POST)){

    session_start();    

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
$Asunto=$_POST["asunto"];
$Usuario=$_POST["nombre"];
$Descr=$_POST["descripcion"];
$Hora=$_POST["hora"];
$Fecha=$_POST["fecha"];


$query1 = "SELECT * FROM citas where id='$id'";

$result = sqlsrv_query($conn,$query1);

    while(sqlsrv_has_rows($result)){
        echo "A record already exists."; 
        $id += 1;
        $query1 = "SELECT * FROM citas where id='$id'";
        $result = sqlsrv_query($conn,$query1);
        if(sqlsrv_query($conn,$query1)==false)
            break;
    }
    if($_SESSION['idasesor']){
//Query para la base de datos
$query= "INSERT into citas(id, idresidente, idasesor, 
fecha, hora, asunto, descr)values('$id','$Usuario','".$_SESSION['idasesor']."','$Fecha','$Hora','$Asunto','$Descr')";

$recurso=sqlsrv_prepare($conn,$query);

if(sqlsrv_execute($recurso)){
    
    header('Location: ../citas1as.php');
    die( print_r( sqlsrv_errors(), true));
}
else{
    echo "No agregado";
    die( print_r( sqlsrv_errors(), true));
}
    }
    else{
        //Query para la base de datos
$query= "INSERT into citas(id, idasesor, idresidente, fecha, hora, asunto, descr)values('$id','$Usuario','".$_SESSION['idresidente']."','$Fecha','$Hora','$Asunto','$Descr')";

$recurso=sqlsrv_prepare($conn,$query);

if(sqlsrv_execute($recurso)){
    header('Location: ../citas1r.php');
    die( print_r( sqlsrv_errors(), true));
}
else{
    echo "No agregado";
    die( print_r( sqlsrv_errors(), true));
}
    }



}
?>