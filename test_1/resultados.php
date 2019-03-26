<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_error",1);
include_once "config.php";

$sfolio = ($_GET["folio"]!=="" && isset($_GET["folio"])?" folio like  '%".$_GET["folio"]."%' OR ":"");
$snombre = ($_GET["nombre"]!==""  && isset($_GET["nombre"])?" nombre like  '%".$_GET["nombre"]."%' OR ":"");
$sapellidop = ($_GET["apellidop"]!==""  && isset($_GET["apellidop"])?" apellidop like  '%".$_GET["apellidop"]."%' OR ":"");
$stelefono = ($_GET["telefono"]!==""  && isset($_GET["telefono"])?" telefono like  '%".$_GET["telefono"]."%' OR ":"");
$semail = ($_GET["email"]!==""  && isset($_GET["email"])?" email like  '%".$_GET["email"]."%' OR ":"");
$sexpediente = ($_GET["expediente"]!==""  && isset($_GET["expediente"])?" expediente like  '%".$_GET["expediente"]."%'":"");
//echo $sfolio.$snombre.$sapellidop.$stelefono.$semail.$sexpediente;
if (substr($sfolio.$snombre.$sapellidop.$stelefono.$semail.$sexpediente,strlen($sfolio.$snombre.$sapellidop.$stelefono.$semail.$sexpediente)-3)=="OR "){
  $sqlString = substr($sfolio.$snombre.$sapellidop.$stelefono.$semail.$sexpediente,0,strlen($sfolio.$snombre.$sapellidop.$stelefono.$semail.$sexpediente)-4);
}
else{
  $sqlString=$sfolio.$snombre.$sapellidop.$stelefono.$semail.$sexpediente;
}

$result=$conn->query("Select * from solicitante where ".$sqlString);
//echo "Select * from solicitante where ".$sqlString;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- //////////////////////////////////////// BODY ////////////////////////////////////////////// -->
<body>
  

  

<!-- //////////////////////////////////////// NAVBAR ////////////////////////////////////////////// -->

  <!-- NAVBAR -->
  <nav class="z-depth-0 grey lighten-4">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">
          <img src="./images/topbg.png" style="width: 400px; margin-top: 10px;" />
        </a>
  
        <!-- navbar triggers -->
<a href="##" class="sidenav-trigger" data-target="mobile-links">
    <i class="material-icons black-text darken-4">menu</i>
</a>
  
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        <a href="##" class="brand-logo black-text darken-4"></a>

  
          <li class="logged-in" style="display: none;">
            <a href="index.html" class="grey-text modal-trigger" data-target="modal-home">Home</a>
          </li>
  
          <li class="logged-in">
                  <a href="index.html" class="grey-text" id="navbar" >Home</a>
                </li>

          <li class="logged-in">
                  <a href="speech.php" class="grey-text" id="navbar" >Speech</a>
                </li>
  
          <li class="logged-in " style="display: none;">
            <a href="#" class="grey-text" id="logout">Cerrar Sesión</a>
          </li>
  
          <li class="logged-out" style="display: none;">
            <a href="#" class="grey-text modal-trigger" data-target="modal-login">Iniciar Sesión</a>
          </li>
  
          <li class="logged-out" style="display: none;">
            <a href="#" class="grey-text modal-trigger" data-target="modal-signup">Registrarse</a>
          </li>
  
        </ul>
      </div>
    </nav>
  




  <!-- //////////////////////////////////////// Sidenav ////////////////////////////////////////////// -->

      <ul class="Sidenav" id="mobile-links">

          <li class="logged-in" style="display: none;">
              <a href="index.html" class="grey-text modal-trigger">Home</a>
            </li>

            <!-- <li class="logged-in">
                  <a href="index.html" class="grey-text" id="navbar" >Home</a>
                </li> -->
    
            <!-- <li class="logged-in">
                    <a href="speech.php" class="grey-text" id="navbar" >Speech</a>
                  </li> -->
    
            <li class="logged-in " style="display: none;">
              <a href="#" class="grey-text" id="logout">Cerrar Sesión</a>
            </li>
    
            <li class="logged-out" style="display: none;">
              <a href="#" class="grey-text modal-trigger" data-target="modal-login">Iniciar Sesión</a>
            </li>
    
            <li class="logged-out" style="display: none;">
              <a href="#" class="grey-text modal-trigger" data-target="modal-signup">Registrarse</a>
            </li>



      </ul>

  <!-- //////////////////////////////////////// ADMIN ACTIONS ////////////////////////////////////////////// -->

  <!-- ADMIN ACTIONS -->
  <form class="center-align admin-actions admin" style="margin: 40px auto; max-width: 300px; display: none;">
    <input type="email" placeholder="User email" id="admin-email" required />
    <button class="btn-small yellow darken-2 z-depth-0">Make admin</button>
  </form>



<?php if ($result->num_rows>0){ ?>
<div class="container">
        <h2>Resultado de busqueda </h2>
        <div class="well">
        
        <table class="table">
          <thead>
            <tr > 
              <th>Folio: </th>
              <th>Nombre: </th>
              <th>Appellido paterno: </th>
              <th>Telefono: </th>
              <th>Correo electronico: </th>
              <th>Numero de expediente: </th>
              
            </tr>
          </thead>

          <tbody><span style="color:blue;font-weight:bold">
            <?php while ($row = $result->fetch_assoc()){ ?>  
            <tr onclick="window.location.replace('perfil.php?folio=<?php echo $row["folio"] ?>')">
              <td><?php echo $row["folio"] ?></td>
              <td><?php echo $row["nombre"] ?></td>
              <td><?php echo $row["apellidop"] ?></td>
              <td><?php echo $row["telefono"] ?></td>
              <td><?php echo $row["email"] ?></td>
              <td><?php echo $row["expediente"] ?></td>
            </tr>
            <?php } ?>
            </span>
          </tbody>
        </table>
      </div>
        
        
        </div>
      </div>

            <?php } ?>
      <!-- ACCOUNT MODAL -->
  <div id="modal-account" class="modal">
        <div class="modal-content center-align">
          <h4>Account details</h4><br />
          <div class="account-details">
            <ul>
                
                <h5>folio: </h5>
                <h5>Numero de expediente: </h5>
    
                <!-- Info de contacto  -->
                <h5>Nombre: </h5>
                <h5>Appellido: </h5>
                <h5>Telefono: </h5>
                <h5>Correo: </h5>
                
                <!-- Dirrecion -->
                <h5>Dirrecion 1: </h5>
                <h5>Dirrecion 2: </h5>
                <h5>Ciudad: </h5>
                <h5>Estado: </h5>
                <h5>Codigo: </h5>
    
                <!-- Info del caso -->
                <h5>Materia: </h5>
                <h5>Asunto: </h5>
                <h5>Juzgado: </h5>
                <h5>Tipo de Assesoria: </h5>
                <h5>Atendido por:   </h5>
            </ul>
    
    
          </div>
        </div>
      </div>
      <script>
      $("#back").click(function(){
        window.location.replace('speech.php');
      })
      </script>