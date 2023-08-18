<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if(!empty($_POST)){

//Nombre del server
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
$Nom=$_POST["motivo"];
$Apep=$_POST["namerep"];
$Apem=$_POST["descripcion"];

$query1 = "SELECT * FROM reportes where id='$id'";

$result = sqlsrv_query($conn,$query1);

    while(sqlsrv_has_rows($result)){
        echo "A record already exists."; 
        $id += 1;
        $query1 = "SELECT * FROM reportes where id='$id'";
        $result = sqlsrv_query($conn,$query1);
        if(sqlsrv_query($conn,$query1)==false)
            break;
    }

//Query para la base de datos
$query= "INSERT into reportes(id, motivo, asunto, descr)values('$id','$Nom','$Apep','$Apem')";

$recurso=sqlsrv_prepare($conn,$query);

if(sqlsrv_execute($recurso)){
    $query= "SELECT * FROM reportes WHERE id = '$id'";

    $stmt = sqlsrv_query( $conn, $query, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

    $mail = new PHPMailer();

    $mail->isSMTP();

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->Host = 'smtp.gmail.com';

    $mail->Port = "587";

    $mail->SMTPSecure = "tls";

    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'lolojuaslel@gmail.com';

    //Password to use for SMTP authentication
    $mail->Password = 'G6#!ha9Un';

    $mail->setFrom('from@example.com', 'ACSARP');

    $mail->addAddress('l17142017@queretaro.tecnm.mx');

    while($Row=sqlsrv_fetch_array($stmt)){
        $mail->Subject = ' ' . ' [' . $Row['id']. '] ' . $Row['asunto'];
        $mail->Body = 'Motivo: ' . $Row['motivo']. " \n"  .
        $Row['descr']. ' ';
    }
    
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }

    header('Location: ../citas4r.php');
        
    die();
}
else{
    echo "No agregado";
    die( print_r( sqlsrv_errors(), true));
}

}else{
    echo "Todos lo campos deben estar llenos.";
}
?>