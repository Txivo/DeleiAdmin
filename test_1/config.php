
<?php
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "solappdb";



// $usuario ="";
// $correo ="";
// $contrasena ="";


// connect to database
$conn =  new mysqli ($server,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}