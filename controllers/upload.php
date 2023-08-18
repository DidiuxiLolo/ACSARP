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


  //##############################################################################################

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


$hojadeResidente = $spreadsheet->getSheet(0);


  # Calcular el máximo valor de la fila como entero, es decir, el límite de nuestro ciclo
  $numeroMayorDeFila = $hojadeResidente->getHighestRow(); // Numérico
  $letraMayorDeColumna = $hojadeResidente->getHighestColumn(); // Letra
  # Convertir la letra al número de columna correspondiente
  $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);

  // Recorrer filas; comenzar en la fila 2 porque omitimos el encabezado
  for ($indiceFila = 7; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
    
    # Aquí obtener el valor con:
    $id = $hojadeResidente->getCellByColumnAndRow(1, $indiceFila);
    $noControl = $hojadeResidente->getCellByColumnAndRow(2, $indiceFila);
    $nombreAlumno = $hojadeResidente->getCellByColumnAndRow(3, $indiceFila);
    $correoResidente = $hojadeResidente->getCellByColumnAndRow(4, $indiceFila);
    $carrera = $hojadeResidente->getCellByColumnAndRow(5, $indiceFila);
    $semestre = $hojadeResidente->getCellByColumnAndRow(6, $indiceFila);
    $dptoAsesor = $hojadeResidente->getCellByColumnAndRow(7, $indiceFila);
    $asesor = $hojadeResidente->getCellByColumnAndRow(8, $indiceFila);
    $correoAsesor = $hojadeResidente->getCellByColumnAndRow(9, $indiceFila);
    $feDictamen = $hojadeResidente->getCellByColumnAndRow(10, $indiceFila);
    $feEntrega = $hojadeResidente->getCellByColumnAndRow(13, $indiceFila);///Query para la base de datos

    $query1 = "SELECT * FROM asesores WHERE nombre = '$asesor'";

      $result = sqlsrv_query($conn,$query1);
    
      if(sqlsrv_has_rows($result)){
          echo "A record already exists."; 
          while($row=sqlsrv_fetch_array($result)){
            $idasesor= $row["id"];
          }
      }else{

        $query4="INSERT into usuarios(nombre, password, correo, usertype)values('$asesor', '$dptoAsesor' + '2022', '$correoAsesor', '2')";
        $recurso3=sqlsrv_prepare($conn,$query4);
        if(sqlsrv_execute($recurso3)){
          echo "Agregado correctamente";
            $query5 = "SELECT @@identity AS id";
            $result5 = sqlsrv_query($conn,$query5);
            while($row=sqlsrv_fetch_array($result5)){
              $idasesor= $row["id"];
            }
        }
        else{
          echo "No agregado";
          die( print_r( sqlsrv_errors(), true));
        }

        $query= "INSERT into asesores(nombre,correo,deptasig)values('$asesor','$correoAsesor','$dptoAsesor')"; 

        $recurso=sqlsrv_prepare($conn,$query);
        if(sqlsrv_execute($recurso)){
          echo "Agregado correctamente";
          $query3 = "SELECT @@identity AS id";//recupera id de ultimo registro
          $result4 = sqlsrv_query($conn,$query3);
          while($row=sqlsrv_fetch_array($result4)){
            $idasesor= $row["id"];
          }
        }
        else{
          echo "No agregado";
          die( print_r( sqlsrv_errors(), true));
        }
      }

    


      //residente
      $query2 = "SELECT * FROM residentes WHERE nombre = '$nombreAlumno'";
      $result = sqlsrv_query($conn,$query2);
    
      if(sqlsrv_has_rows($result)){
          echo "A record already exists."; 
          while($row=sqlsrv_fetch_array($result)){
            $idResidente= $row["id"];
          }
      }else{

      $query4="INSERT into usuarios(nombre, password, correo, usertype)values('$nombreAlumno', '$noControl','$correoResidente', '1')";
      $recurso3=sqlsrv_prepare($conn,$query4);
      if(sqlsrv_execute($recurso3)){
        echo "Agregado correctamente";
          $query5 = "SELECT @@identity AS id";
          $result5 = sqlsrv_query($conn,$query5);
          while($row=sqlsrv_fetch_array($result5)){
            $idResidente= $row["id"];
          }
      }
      else{
        echo "No agregado";
        die( print_r( sqlsrv_errors(), true));
      }
        $query2= "INSERT into residentes(noCon, nombre, carrera, semestre, correo, fedi, fecen)values('$noControl', '$nombreAlumno', '$carrera',
         '$semestre','$correoResidente','$feDictamen','$feEntrega')";
        $recurso=sqlsrv_prepare($conn,$query2);
        if(sqlsrv_execute($recurso)){
          echo "Agregado correctamente";
          $query3 = "SELECT @@identity AS id";
          $result4 = sqlsrv_query($conn,$query3);
          while($row=sqlsrv_fetch_array($result4)){
            $idResidente= $row["id"];
          }
        }
        else{
          echo "No agregado";
          die( print_r( sqlsrv_errors(), true));
        }
      }





      $query4= "INSERT into asres(idasesor, idresidente)values('$idasesor', '$idResidente')";
        $recurso=sqlsrv_prepare($conn,$query4);
        if(sqlsrv_execute($recurso)){
          echo "Agregado correctamente";
          
        }
        else{
          echo "No agregado";
          die( print_r( sqlsrv_errors(), true));
        }



      /*
      $recurso2=sqlsrv_prepare($conn,$query2);
        if(sqlsrv_execute($recurso2)){
          echo "Agregado correctamente";
        }
        else{
          echo "No agregado";
          die( print_r( sqlsrv_errors(), true));
        }*/
      
  }
  
//#############################################################################

 }
 else
 {
  $message = '<div class="alert alert-danger">Lo sentimos, solo se pueden subir archivos de tipo xlsx & xls</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Por favor seleccione un archivo.</div>';
}

?>
