<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_error",1);
include "config.php";


// create session
session_start();

// session variable
$_SESSION['message'] = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

//   $=""  
   $folio    = $_POST["folio"];
   $username = "admin";//$_POST["admin"]; //or $_SESSION[""]
   $notes    = $_POST["actualizar_status"];
   $expediente = 'wxw-097899';//$_POST["expediente"];
}

$sql = "INSERT INTO status (folio_status, atendido_status, notes_status,expediente_status )  
values ('".$folio."','".$username."','".$notes."','".$expediente."')";
//echo $sql;
$response=array();

            if ($conn->query($sql) === true) {
                $response["Message"]="New record created successfully";
                $response["Error"]=0;
                echo json_encode($response);
            } else {
                $reponse["Message"]="Error: " . $sql . "<br>" . $conn->error;
                $response["Error"]=$conn->error;
                echo json_encode($response);
            }

            $conn->close();
$_SESSION["message"]="DATOS SE INSERTARON EXITOSAMENTE";
//header("location:perfil.php?folio=".$_POST["folio"]);
?>