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
   $expediente = $POST["expediente"];
}

$sql = "INSERT INTO status (folio_status, username_status, actualizar_status, expediente_status )
values ('".$folio."','".$username."','".$notes."','".$expediente."')";
}
$response=array();

            if ($conn->query($sql) === TRUE) {
                $response["message"]="New record created successfully";
                $response["Error"]=0;
                echo json_encode($reponse);
            } else {
                $reponse["message"]="Error: " . $sql . "<br>" . $conn->error;
                $response["Error"]=$conn->error;
                echo json_encode($response);
            }

            $conn->close();
$_SESSION["message"]="DATOS SE INSERTARON EXITOSAMENTE";
header("location:solapp.php");
?>