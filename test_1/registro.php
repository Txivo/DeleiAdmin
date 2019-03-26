<?php

session_start();

$_SESSION['message'] == '';

$server = "localhost";
$username = "root";
$password = "root";
$dbname = "delei_registrarsedb";

// $mysqli =  new mysqli ('localhost','root','root','delei_registrarsedb')
$conn =  new mysqli ($server,$username,$password,$dbname);


// $conn->close();


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Two passwords are equal to eachother this is the first validation.
    // password and confirmpassword are going to appear below as a "name" example:
    // name="password" and name="confirmpassword"

    if ($_POST['password'] == $_POST['confirmpassword']){

        // the code below is like print consolelog
        // print_r($_FILES); die;

        // here is where the variables or the field/data you want to store are going to be set
        // before you set the variables be sure to use thier "real_escape_string" and this just escapes 
        // all the special characters to to be able o insert them inside mysql
        $username = $mysqli->real_escape_string($_POST['username']);

        $email = $mysqli->real_escape_string($_POST['email']);

        //on password we are gong to use a function called md5 to Hash the password for security purposes
        $password = md5($_POST['password']); //md5 Hash password security 

        // this is going to be the path to the image, we are also going to use mysql "real_escape_string"
        // we are going to put "images" inside the "images folder" and the file are gong to be accessed through
        // the "$_FILES" global variable
        $avatar_path = $mysqli->real_escape_string('./images'.$_FILES['avatar']['name']);

        
        

        // make sure file type is image
        if (preg_match("!images!"['avatar']['type'])) {




            // copy images to images folder
            if (copy($_FILES['avatar']['temp'], $avatar_path)){

                // now we are going to set the session variables 
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $avatar_path;
                
            // at this point we are ready to insert he values to sql
            $sql= "INSERT INTO users (username, email, password, avatar)"
            // $mysqli = "INSERT INTO users (username, email, password, avatar)"
            ."VALUES ('$username', '$email', '$password','$avatar_path')";


            // If query is successful, redirect to welcome.php page done!
            if ($msqli->query($sql) === true){
                $_SESSION['message'] = "Registration successful, Added $username to the database! ";
                header("location: Welcome.php");
                } 

                // incase user could not be added it will give this error
                else{
                    $_SESSION['message'] = "User could not be added to the database!  ";
                }
            } // fourth closing tag line 64 ///////////////////////////////////////////////////////




                // incase we are not able to copy the file it will give this error
                    else {
                        $_SESSION['message'] = "File upload failed!";
                    }
                } // third 58///////////////////////////////////////////////////////

                // incase the file format isnt an image it will give this error
                        else {
                            $_SESSION['message'] = "Please only upload gif, jpg or png images!";
                        }   
                    } //second bracket 34///////////////////////////////////////////////////////

    // incase the passwords dont match it will give this error
    // else {

    //     $_SESSION['message'] = "Passwords dont match!"
    // }

    
} //top first bracket 28///////////////////////////////////

?>




<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" 
rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Crear cuenta</h1>

    <!-- action="form.php" is going to be calling itslef. method="post" goes with line 22 -->
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">


      <div class="alert alert-error"><? = $_SESSION ['message'] ?></div>
      <input type="text" placeholder="Nombre" name="username" required />
      <input type="email" placeholder="Correo" name="email" required />
      <input type="password" placeholder="Contraseña" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirmar contraseña" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Seleccionar imagen: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Registrar" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>