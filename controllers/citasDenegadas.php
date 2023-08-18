<?php

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

            $query3 = "DELETE FROM citas where idasesor = '".$_SESSION['idasesor']."'";
            $recurso2=sqlsrv_prepare($conn,$query3);

            if(sqlsrv_execute($recurso2)){
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
            
                $mail->Subject = "Cita nueva no aceptada";
                $mail->Body = "Consulte ACSARP para redactar reporte";
                
                
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message sent!';
                }
    
                header('Location: ../citas3as.php');
            }   
            else{
                echo "No agregado";
                die( print_r( sqlsrv_errors(), true));
            }   

    }
    else{
       
            $query3 = "DELETE FROM citas where idresidente = '".$_SESSION['idresidente']."'";
            $recurso2=sqlsrv_prepare($conn,$query3);

            if(sqlsrv_execute($recurso2)){
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
            
                $mail->Subject = "Cita nueva no aceptada";
                $mail->Body = "Consulte ACSARP para redactar reporte";
                
                
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message sent!';
                }
    
                header('Location: ../citas3as.php');
                die( print_r( sqlsrv_errors(), true));
            }   
            else{
                echo "No agregado";
                die( print_r( sqlsrv_errors(), true));
            }
        


        }
    
?>