<?php

session_start(); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

       

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


/*$query1 = "SELECT * FROM citas where id='$id'";

$result = sqlsrv_query($conn,$query1);

    while(sqlsrv_has_rows($result)){
        echo "A record already exists."; 
        $id += 1;
        $query1 = "SELECT * FROM citas where id='$id'";
        $result = sqlsrv_query($conn,$query1);
        if(sqlsrv_query($conn,$query1)==false)
            break;
    }*/
    if($_SESSION['idasesor']){

        $query2 = "SELECT * FROM citas WHERE idasesor = '".$_SESSION['idasesor']."'";
        $stmt = sqlsrv_query( $conn, $query2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));


        while($Row=sqlsrv_fetch_array($stmt)){
            //Query para la base de datos
            $id= $Row['id'];
            $idasesor=$Row['idasesor'];
            $idresidente=$Row['idresidente'];
        $Asunto=$Row['asunto'];
        $Descr=$Row['descr'];
        $Hora=$Row['hora']->format('H:i:s');
        $Fecha=$Row['fecha']->format('Y-m-d');
       
            $query= "INSERT into citaspendientes(id, idresidente, idasesor, fecha, hora, asunto, descr)values('$id','$idresidente','$idasesor',
            '$Fecha','$Hora','$Asunto','$Descr')";

            $recurso=sqlsrv_prepare($conn,$query);

            if(sqlsrv_execute($recurso)){ $mail = new PHPMailer();

                $mail->isSMTP();
            
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            
                $mail->Host = 'smtp.gmail.com';
            
                $mail->Port = "587";
            
                $mail->SMTPSecure = "tls";
            
                $mail->SMTPAuth = true;
            
                //Username to use for SMTP authentication - use full email address for gmail
                $mail->Username = 'd4rkm957@gmail.com';
            
                //Password to use for SMTP authentication
                $mail->Password = 'Metroidamt77.';
            
                $mail->setFrom('from@example.com', 'ACSARP');
            
                $mail->addAddress('lc17142164@queretaro.tecnm.mx');
            
                $mail->Subject = "Cita nueva";
                $mail->Body = "Consulte ACSARP para más información";
                
                
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message sent!';
                }
                echo "agregado";
            }   
            else{
                echo "No agregado";
                die( print_r( sqlsrv_errors(), true));
            }
        }
            $query3 = "DELETE FROM citas where idasesor = '".$_SESSION['idasesor']."'";
            $recurso2=sqlsrv_prepare($conn,$query3);

            if(sqlsrv_execute($recurso2)){
    
                header('Location: ../citas3as.php');
            }   
            else{
                echo "No agregado";
                die( print_r( sqlsrv_errors(), true));
            }
        

    }
    else{
        $query2 = "SELECT * FROM citas";
        $stmt = sqlsrv_query( $conn, $query2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

        while($Row=sqlsrv_fetch_array($stmt)){
                  //Query para la base de datos
                  $id=$Row['id'];
                  $Asunto=$Row['asunto'];
                  $Descr=$Row['descr'];
                  $Hora=$Row['hora'];
                  $Fecha=$Row['fecha'];
                  $idasesor=$Row['idasesor'];
                  $idresidente=$Row['idresidente'];
                      $query= "INSERT into citaspendientes(id, idasesor, idresidente, fecha, hora, asunto, descr)values('$id','$idasesor','$idresidente',
                      '$Fecha','$Hora','$Asunto','$Descr')";

            $recurso=sqlsrv_prepare($conn,$query);

            if(sqlsrv_execute($recurso)){
                $mail->isSMTP();
            
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            
                $mail->Host = 'smtp.gmail.com';
            
                $mail->Port = "587";
            
                $mail->SMTPSecure = "tls";
            
                $mail->SMTPAuth = true;
            
                //Username to use for SMTP authentication - use full email address for gmail
                $mail->Username = 'd4rkm957@gmail.com';
            
                //Password to use for SMTP authentication
                $mail->Password = 'Metroidamt77.';
            
                $mail->setFrom('from@example.com', 'ACSARP');
            
                $mail->addAddress('lc17142164@queretaro.tecnm.mx');
            
                $mail->Subject = "Cita nueva";
                $mail->Body = "Consulte ACSARP para más información";
                
                
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message sent!';
                }

                echo "Agregado";
                
            }   
            else{
                echo "No agregado";
                die( print_r( sqlsrv_errors(), true));
            }
        }
            $query3 = "DELETE FROM citas where idresidente = '".$_SESSION['idresidente']."'";
            $recurso2=sqlsrv_prepare($conn,$query3);

            if(sqlsrv_execute($recurso2)){
    
                header('Location: ../citas3as.php');
                die( print_r( sqlsrv_errors(), true));
            }   
            else{
                echo "No agregado";
                die( print_r( sqlsrv_errors(), true));
            }
        


        }
    

?>