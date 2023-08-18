<?php
session_start();
$data = array();
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
}else{
    echo "Conexión no establecida. <br />";
    die( print_r( sqlsrv_errors(), true));
}


$query1 = "SELECT * FROM citaspendientes WHERE idasesor = '".$_SESSION['idasesor']."'";

$result = sqlsrv_query( $conn, $query1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));


while($row=sqlsrv_fetch_array($result)){
    $data[] = array(
    'id'   => $row["id"],
    'title'   => $row["asunto"],
    'start'   => $row["fecha"]->format('Y-m-d').'T'.$row["hora"]->format('H:i:s')
    );
}  

echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>
