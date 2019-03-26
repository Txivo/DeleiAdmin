
<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_error",1);

/*
Aqui va la proteccion con session
si hay session y hay permisos adelante si no destroy_session
y regresamos a autenticarse 

*/

include_once "config.php";

//$idUsuario = $_SESSION["userID"];
$folio = $_REQUEST["folio"];
$result=$conn->query("Select * from solicitante where folio = '".$folio."'");

$resultstatus = $conn->query("Select * from status where folio_status = '".$folio."' order by fecha_status");

if ($result->num_rows>0){
?>

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
    <title>Perfil</title>


    <!-- Custom CSS -->
    <style>
        /* desktop image background size */
        /* header {

            background: url(images/brickoffice3.jpg);
            background-size: cover;
            background-position: center;
            min-height: 500px;
        } */

        /* notification badge */
        nav .badge {

            position: relative;
            right: 34px;

        }

        /* padding in the section section */
        .section {
            padding-top: 4vw;
            padding-bottom: 4vw;
        }

        /* Color of bottom tabs */
        .tabs .indicator{
            background-color: #1a237e;
        }

        /* transperancy on the tabs */
        .tabs .tabs a:focus, .tabs .tabs a:focus.active{
            background: transparent;
        } 

        /* mobile devices image background size */
        @media screen and (max-width:670px) {
            header {
                min-height: 500px;
            }
        }
    </style>



</head>

<body>

    <!-- //////////////////////////////////////////  navbar  //////////////////////////////////////////  -->

    <header>

        <img src="./images/topbg.png" style="width:100%; margin-top: 10px;" />
        <!-- normal grey navbar  -->
        <nav class="nav-wrapper grey darken-2">

            <!-- transperant navbar -->
            <!-- <nav class="nav-wrapper transparent"> -->

            <!-- container below if needed -->
            <div class="container">

                <a href="##" class="brand-logo black-text darken-4">DELEI A.C.</a>

                <!-- navbar triggers -->
                <a href="##" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons">menu</i>
                </a>

                <!-- desktop navbar version -->
                <ul id="nav-mobile" class="right hide-on-med-and-down">

                    <li class="logged-in" style="display: none;">
                        <a href="" class="modal-trigger "data-target="modal-home">Home</a>
                    </li>

                    <li class="logged-in">
                            <a href="index.html" id="navbar">Home</a>
                        </li>
                    
                        <li class="logged-in">
                            <a href="speech.php" id="navbar">Speech</a>
                        </li>

                        
                            <li class="logged-in">
                                <a href="solapp.php" id="solapp">Solicitud de apoyo</a>
                            </li>

                            
                                <!-- <li class="logged-out">
                                    <a href="####" id="navbar">Iniciar session</a>
                                </li> -->

                                
                                    <!-- <li class="logged-out">
                                        <a href="####" id="navbar">Registrarse</a>
                                    </li> -->

                                    
                                    <li class="logged-in " style="display: none;">
            <a href="#" class="white-text" id="logout">Cerrar Sesión</a>
          </li>



           
                                        <!-- ///////////////////////// notificaction button /////////////////////////// -->
                                        <!-- <li><a href="####" class="btn-floating indigo darken-4 z-depth-0 logged-in" id="navbar">
                                                <i class="material-icons">notifications</i>
                                            </a></li>

                                        <li><span class="badge white-text pulse pink new ">5</span></li> -->

                                        <!-- Social Media buttons -->
                                        <!-- <li><a href="####" class="tooltipped btn-floating btn-samll indigo darken-4 " id="navbar"
                                            data-tooltip="this is where you put the information about a button in this case Instagram ">
                                            <i class="fab fa-instagram"></i>
                                            </a></li> -->

                                    </ul>

                                    

        </nav>


        <!-- <div class="parallax-container">
                <div class="class parallax">
                    <img src="images/brickoffice3.png" class="responsive-img">
                </div>
            </div> -->


        <!-- Movil version navbar -->
        <ul class="sidenav" id="mobile-links">
            <li class="logged-in"><a href="####" id="navbar">Home</a></li>
            <li class="logged-in"><a href="speech.html" id="navbar">Speech</a></li>
            <li class="logged-in"><a href="solapp.html" id="navbar">Solicitud de apoyo</a></li>
            <li class="logged-out"><a href="####" id="navbar">Iniciar session</a></li>
            <li class="logged-out"><a href="####" id="navbar">Registrarse</a></li>
            <li class="logged-in"><a href="####" id="navbar">Cerrar session</a></li>

            <!-- <li><a href="####" class="white darken-4 z-depth-0 logged-in" id="navbar">
                    <i class="material-icons">notifications</i> -->
        </ul>

        <!-- container closing div -->
        </div>
        </nav>

    </header>

<!-- //////////////////////////////////////////  profile  //////////////////////////////////////////  -->
<?php
$row = $result->fetch_assoc()

?>

<div class="container">

            <h2>Status</h2>
            <ul class="Collection with-header">
                <li class="Collection-header"><h4>Perfil: </h4></li>

                <li class="Collection-item avatar">
                        <i class="material-icons circle blue">person</i>
                    
                        <span class="title"><?php echo $row["nombre"]." ".$row["apellidop"]." ".$row["apellidom"] ?></span>
                        <p class="grey-text">Folio: <?php echo $folio ?></p>
                        <p class="grey-text">Expediente: <?php echo $row["expediente"] ?></p>
                    

                        <a href="" class="secondary-content">
                        <p class="grey-text">Telefono: <?php echo $row["telefono"]?></p> 
                        <i class="material-icons blue-text">email </i><br><?php echo $row["email"] ?> 
                        </a>
                    
                </li>

                                      
<!-- //////////////////////////////////////////  Status colapsable //////////////////////////////////////////  -->


<ul class="collapsible">

<?php while ($rowstatus = $resultstatus->fetch_assoc()){ ?>
    <li>

    <!-- Top collapsible status part -->
       <div class="collapsible-header">

       
       
                <!-- <div class="collapsible-header"> -->
      <p class="grey-text">Atendido por: <?php echo $rowstatus["atendido_status"] ?></p></div>
      <!-- bottom collapsible status part -->
        

       
            
                <div class="collapsible-body"><span>
                <?php  echo $rowstatus["notes_status"]?>
                <i class="material-icons blue-text">edit</i>
                </span></div>
                    </li>
    
    <?php } ?>
  </ul>

</div>

<!-- //////////////////////////////////////////  Seccion de hacer notas y actualizar el status  //////////////////////////////////////////  -->

<div class="container">

<div class>
<ul class="Collection with-header">
<li class="Collection-header"><h4>Actualizar Status</h4></li>

   
<form class="col s12" method="post" id="form_status" action="grabarstatus.php?folio=<?php echo $folio ?>&expediente=<?php echo $row["expediente"] ?>">
      <div class="row Collection-header">
      
        <div class="input-field col s12">
          <textarea id="actualizar_status" class="materialize-textarea" name="actualizar_status"></textarea>
          <label for="actualizar_status">   </label>
        </div>
        <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" id="btnpublicar" class="btn btn-primary submit" name="submit_button" form="form-inline">Agregar   </button>
                    </div>
                </div>
      </div>
    </form>
  </div>
            
    </li>
    </ul>
    </div>

<!-- //////////////////////////////////////////  textarea  //////////////////////////////////////////  --> 
<!-- 
<div class="container">

<div class="row">

    <form class="col s12">
      <div class="row Collection-header">
      <h5> Actualizar status </h5>
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Escribir Actualizacion Aqui....</label>
        </div>
      </div>
    </form>
  </div>

  <br>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" id="btnpublicar" class="btn btn-primary submit" name="submit_button" form="form-inline">Agregar</button>
                    </div>
                </div>
</div>
     -->



  <!-- //////////////////////////////////////////  javascript  //////////////////////////////////////////  -->


<script>

/*
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });
*/
  // Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();

   $("#btnpublicar").click(function(){
       $.post("grabarstatus.php",$("#form_status").serialize()+'&folio=<?php echo $folio ?>',function(response){
          var jsonresp = jQuery.parseJSON(response);
               alert(jsonresp.Message);
               window.location.replace('perfil.php?folio=<?php echo $folio ?>');
           
       });
   })


  });



$('#textarea1').val('New Text');
  M.textareaAutoResize($('#textarea1'));

</script>

        </body>

        </html>
  
     
                            <?php } ?>

