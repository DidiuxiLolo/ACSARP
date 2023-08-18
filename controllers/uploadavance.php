<?php

//upload.php

include '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if($_FILES["select_excel"]["name"] != '')
{
  $allowed_extension = array('xls', 'xlsx');
  $file_array = explode(".", $_FILES['select_excel']['name']);
  $file_extension = end($file_array);
  if(in_array($file_extension, $allowed_extension))
  {
    $reader = IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load($_FILES['select_excel']['tmp_name']);
    //$documento = IOFactory::load($_FILES['select_excel']['name']);


    //###################################################################################

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
  }
  
//#############################################################################

} ifelse {
  $message = '<div class="alert alert-danger">Lo sentimos, solo se pueden subir archivos de tipo xlsx & xls</div>';
} else {
 $message = '<div class="alert alert-danger">Por favor seleccione un archivo.</div>';
}

?>
