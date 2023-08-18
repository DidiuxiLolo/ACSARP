<?php


//Nombre del server
$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";
//$serverName = "LAPTOP-QBNC713K\SQLEXPRESS";

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
$Ema=$_POST["email"];
$Con=$_POST["password"];

//Query para la base de datos
$query= "SELECT * FROM usuarios WHERE correo = '$Ema' AND CONVERT(varchar,password) = '$Con'";

$result = sqlsrv_query($conn,$query);

    if(sqlsrv_query($conn,$query)==true){
        // start a session
        session_start();

        $_SESSION['correo'] = $Ema;
         

        while($Row=sqlsrv_fetch_array($result)){
            

            if($Row['userType'] == 1){
                $Id=$Row['idresidente'];
            $_SESSION['idresidente'] = $Id;
                header('Location: ../mainpager.php');
            }else if($Row['userType'] == 2){
                $Id=$Row['idasesor'];
            $_SESSION['idasesor'] = $Id;
                header('Location: ../mainpageas.php');
            }else if($Row['userType'] == 3){
                header('Location: ../mainpageadmin.php');
            }
        }    
    }
        echo "Usuario no existe";
        //header('Location: ../index.html');
        die( print_r( sqlsrv_errors(), true));
    

  

?>