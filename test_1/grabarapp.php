<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_error",1);
include "config.php";


// create session
session_start();

// session variable
$_SESSION['message'] = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//////////////////////////////////////////////////////////////////////////////////

// print_r($post);

// $folio  = $mysqli->real_escape_string($_POST['folio']);
// $fuente  = $mysqli->real_escape_string($_POST['fuente']);
// $nombre  = $mysqli->real_escape_string($_POST['nombre']);
// $Apellidop  = $mysqli->real_escape_string($_POST['Apellidop']);
// $Apellidom  = $mysqli->real_escape_string($_POST['Apellidom']);
// $lugar  = $mysqli->real_escape_string($_POST['lugar']);
// $dob = $mysqli->real_escape_string($_POST['dob']);
// $telefono  = $mysqli->real_escape_string($_POST['telefono']);
// $email  = $mysqli->real_escape_string($_POST['email']);
// $domicilio  = $mysqli->real_escape_string($_POST['domicilio']);
// $domicilio2  = $mysqli->real_escape_string($_POST['domicilio2']);
// $materia  = $mysqli->real_escape_string($_POST['materia']);
// $asunto  = $mysqli->real_escape_string($_POST['asunto']);
// $juzgado  = $mysqli->real_escape_string($_POST['juzgado']);
// $expediente  = $mysqli->real_escape_string($_POST['expediente']);
// $hechos  = $mysqli->real_escape_string($_POST['hechos']);
// $asesoria  = $mysqli->real_escape_string($_POST['asesoria']);
// $dependencia  = $mysqli->real_escape_string($_POST['dependencia']);
// $atendido  = $mysqli->real_escape_string($_POST['atendido']);

// Array de checkbox de fuente
$fuente="";

if(isset($_POST['instituto_mujer'])){
    $fuente = "instituto mujer,";
  }
  if(isset($_POST['anuncio_Panoramico'])){
    $fuente .= "anuncio Panoramico,";
  }
  if(isset($_POST['recomendacion'])){
    $fuente .= "recomendacion,";
  }
  if(isset($_POST['municipio']) ){
    $fuente .= "municipio,";
  }
  if(isset($_POST['facebook']) ){
    $fuente .= "facebook,";
  }
  if(isset($_POST['periodico']) ){
    $fuente .= "periodico,";
  }

// Array de checkbox de asesoria
$asesoria="";

if(isset($_POST['asesoria_unica'])){
    $asesoria = "asesoria unica,";
  }
  if(isset($_POST['representacion'])){
    $asesoria .= "representacion,";
  }
  if(isset($_POST['canalizacion'])){
    $asesoria .= "canalizacion";
  }

$sql = "INSERT INTO solicitante (folio, fecha, fuente, nombre, apellidop, apellidom, lugar, dob, 
telefono, email, domicilio, domicilio2, materia, asunto, 
juzgado, expediente, hechos, asesoria, dependencia, atendido, comentarios)
VALUES (
        '".$_POST["folio"]."',
        '".$_POST["fecha"]."',
        '".$fuente."',
        '".$_POST["nombre"]."',
        '".$_POST["apellidop"]."',
        '".$_POST["apellidom"]."',
        '".$_POST["lugar"]."',
        '".$_POST["dob"]."',
        '".$_POST["telefono"]."',
        '".$_POST["email"]."',
        '".$_POST["domicilio"]."',
        '".$_POST["domicilio2"]."',
        '".$_POST["materia"]."',
        '".$_POST["asunto"]."',
        '".$_POST["juzgado"]."',
        '".$_POST["expediente"]."',
        '".$_POST["hechos"]."',
        '".$asesoria."',
        '".$_POST["dependencia"]."',
        '".$_POST["atendido"]."',
        '".$_POST["comentarios"]."')";

  

        // echo "INSERT INTO solicitante (folio, fuente, fecha, nombre, apellidop, appellidom, lugar, dob 
        // telefono, email, domicilio, domicilio2, materia, asunto, 
        // juzgado, expediente, hechos,  dependencia, atendido, comentarios)
        // VALUES (
        //         '".$_POST["folio"]."',
        //         '".$fuente."',
        //         '".$_POST["nombre"]."',
        //         '".$_POST["apellidop"]."',
        //         '".$_POST["appellidom"]."',
        //         '".$_POST["lugar"]."',
        //         '".$_POST["dob"]."',
        //         '".$_POST["telefono"]."',
        //         '".$_POST["email"]."',
        //         '".$_POST["domicilio"]."',
        //         '".$_POST["domicilio2"]."',
        //         '".$_POST["materia"]."',
        //         '".$_POST["asunto"]."',
        //         '".$_POST["juzgado"]."',
        //         '".$_POST["expediente"]."',
        //         '".$_POST["hechos"]."',
        //         '".$asesoria."',
        //         '".$_POST["dependencia"]."',
        //         '".$_POST["atendido"]."',
        //         '".$_POST["comentarios"]."')";

  // only use below code to view whats being registered but when done comment or else it will print twice
    // echo $sql;
    //$result = mysqli_query($conn,$sql);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////





///////////////////////////////////////////////////////////////////////////////////////////////////////////////
     $response=array();
      
            if ($conn->query($sql)===TRUE) {
                $response["message"]="New record created successfully";
                $response["Error"]=0;
                echo json_encode($response);
            } else {
                $reponse["message"]="Error: " . $sql . "<br>" . $conn->error;
                $response["Error"]=$conn->error;
                echo json_encode($response);
            }

//                 // The POST data is now in a session and users can refresh however much they want.
//                 //  It will no longer have effect on your code.
$conn->close();
//$_SESSION["message"]="DATOS SE INSERTARON EXITOSAMENTE";
header("location:solapp.php");
?>