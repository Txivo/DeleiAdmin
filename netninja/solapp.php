<?php session_start();
$_SESSION["message"]="";
include "config.php";

$result=$conn->query("select folio from solicitante where folio='".date("dmY")."' or folio like '".date("dmY")."%'");
if ($result->num_rows>=1){
  $folio = date("dmY")."-".($result->num_rows+1);
}
else{
  $folio = date("dmY");
}

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
                <title>Solicitud De Apoyo</title>


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



<!-- //////////////////////////////////////// BODY ////////////////////////////////////////////// -->
<body class="grey " >
  

  
<!-- //////////////////////////////////////// NAVBAR ////////////////////////////////////////////// -->

  <!-- NAVBAR -->
  <nav class="nav-wrapper z-depth-5 grey darken-3">
        <a class="brand-logo ">
            <img src="./images/topbg.png" style="width: 400px; margin-top: 10px;" />
            <a href="#" class="sidenav-trigger" data-target="mobile-links"></a>
          <i class="material-icons">menu</i>
          
        </a>
  
  
        <ul id="nav-mobile" class="right hide-on-med-and-down">
  
          <li class="logged-in" style="display: none;">
            <a href="index.html" class="grey-text modal-trigger">Home</a>
          </li>
  
          <li class="logged-in">
                  <a href="speech.php" class="grey-text" id="navbar" >Speech</a>
                </li>
  
                <li class="logged-in">
                      <a href="solapp.php" class="grey-text" id="solapp">Solicitud de apoyo</a>
                    </li>
  
                    <li class="logged-in">
                          <a href="registro.php" class="grey-text" id="navbar">Registro</a>
                        </li>
  
                        
  
          <!-- <li class="logged-in" style="display: none;">
            <a href="#" class="grey-text modal-trigger" data-target="modal-account">Detalles de usuario</a>
          </li>
  
          <li class="logged-in" style="display: none;">
              <a href="#" class="grey-text modal-trigger" data-target="modal-signup">Ingresar caso</a>
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
    </nav>

  <!-- //////////////////////////////////////// Sidenav ////////////////////////////////////////////// -->

      <ul class="Sidenav" id="mobile-links">

          <li class="logged-in" style="display: none;">
              <a href="index.html" class="grey-text modal-trigger">Home</a>
            </li>
    
            <li class="logged-in">
                    <a href="speech.html" class="grey-text" id="navbar" >Speech</a>
                  </li>
    
                  <li class="logged-in">
                        <a href="solapp.html" class="grey-text" id="solapp">Solicitud de apoyo</a>
                      </li>
    
                      <li class="logged-in">
                            <a href="registro.php" class="grey-text" id="navbar">Registro</a>
                          </li>
    
                          
    
            <!-- <li class="logged-in" style="display: none;">
              <a href="#" class="grey-text modal-trigger" data-target="modal-account">Detalles de usuario</a>
            </li>
    
            <li class="logged-in" style="display: none;">
                <a href="#" class="grey-text modal-trigger" data-target="modal-signup">Ingresar caso</a>
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



<!-- //////////////////////////////////////// Solicitud de Apoyo ////////////////////////////////////////////// -->

  <!-- Solicitud de Apoyo MODAL -->
  <div id="modal-solapp" >
        <!-- data-target="modal-solapp" -->
    <div class="container border-box grey lighten-3 content">
      <?php  echo "<script>M.toast({html: '".$_SESSION["message"]."', completeCallback: function(){}})</script>"; ?>
      <h4>Solicitud de Apoyo</h4><br />
<form id="solapp-form" action="grabarapp.php" method="post" urldecode="text">


        <!-- Como se entero de nosotros  -->
<div class="box yellow darken-1 z-depth-3">
        <!-- First Row -->
        <div class="row ">

            <div class="col s4">
              <div class>
                  <label> 
                      <input id="instituto_mujer" type="checkbox" value="Instituto Estatal de la Mujer"  name="instituto_mujer"/>
                      <span> Instituto Estatal de la Mujer</span>   
                    </label>
              </div>
            </div>

            <div class="col s4">
              <div class>
                  <label>
                      <input id="anuncio_panoramico" type="checkbox" value="Anuncio Panoramico" name="anuncio_Panoramico"/>
                      <span>Anuncio Panorámico</span>
                  </label>
              </div>
            </div>
            
            <div class="col s4">
              <div class>
                  <label>
                      <input id="recomendacion" type="checkbox" value="recomendacion" name="recomendacion"/>
                      <span>Recomendación</span>
                    </label>
              </div>
            </div>

          </div>
          <br>


          <!-- Second row -->
          <div class="row">

              <div class="col s4">
                <div class>
                    <label>
                        <input id="municipio" type="checkbox" value="municipio" name="municipio" />
                        <span>Municipio</span>
                      </label>
                </div>
              </div>
  
              <div class="col s4">
                <div class>
                    <label>
                        <input id="facebook" type="checkbox" value="facebook" name="facebook"/>
                        <span>Facebook</span>
                    </label>
                </div>
              </div>
              
              <div class="col s4">
                <div class>
                    <label>
                        <input id="periodico" type="checkbox" value="periodico" name="periodico"/>
                        <span>Periódico</span>
                    </label>
                </div>
              </div>
  
            </div>
            </div>

        <!-- Folio -->
        <div class="input-field">
          <input type="text" id="solapp-folio" name="folio" required />
          <label for="solapp-folio">Folio: </label>
        </div>

        <div class="input-field">
          <input type="date" class="datepicker" id="solapp-fecha" name="fecha" value="<?php echo date("Y-m-d") ?>" required />
          <label for="solapp-dob">Fecha de hoy </label>
        </div>

        <!-- Nombre -->
        <div class="input-field">
          <input type="text" id="solapp-nombre" name="nombre" required />
          <label for="solapp-nombre">Nombre: </label>
        </div>


        <!-- Apellido Paterno -->
        <div class="input-field">
          <input type="text" id="solapp-apellidop" name="apellidop" required />
          <label for="solapp-apellidop">Apellido Paterno: </label>
        </div>


        <!-- Apellido Materno -->
        <div class="input-field">
          <input type="text" id="solapp-apellidom" name="apellidom" required />
          <label for="solapp-apellidom">Apellido Materno: </label>
        </div>


        <!-- Lugar de Nacimiento -->
        <div class="input-field">
          <input type="text" id="solapp-lugar" name="lugar" required />
          <label for="solapp-lugar">Lugar de Nacimiento: </label>
        </div>


        <!-- Fecha de Nacimiento -->
        <div class="input-field">
          <input type="date" class="datepicker" id="solapp-dob" name="dob" value="dob" required />
          <label for="solapp-dob">Fecha de Nacimiento </label>
        </div>


        <!-- Telefono -->
        <div class="input-field">
          <input type="text" id="solapp-telefono" name="telefono" required />
          <label for="solapp-telefono">Teléfono: </label>
        </div>


        <!-- Correo Electronico -->
        <div class="input-field">
          <input type="email" id="solapp-email" name="email" required />
          <label for="solapp-email">Correo Electrónico: </label>
        </div>


        <!-- Domicilio 1 -->
        <div class="input-field">
          <input type="text" id="solapp-domicilio"  name="domicilio" required />
          <label for="solapp-domicilio">Domicilio 1: </label>
        </div>


        <!-- Domicilio 2 -->
        <div class="input-field">
          <input type="text" id="solapp-domicilio2" name="domicilio2" />
          <label for="solapp-domicilio2">Domicilio 2: </label>
        </div>

        <!-- Materia -->
        <div class="input-field">
          <input type="text" id="solapp-materia" name="materia" required />
          <label for="solapp-materia">Materia: </label>
        </div>


        <!-- Asunto -->
        <div class="input-field">
          <input type="text" id="solapp-asunto" name="asunto" required />
          <label for="solapp-asunto">Asunto: </label>
        </div>


        <!-- Juzgado del Proceso -->
        <div class="input-field">
          <input type="text" id="solapp-juzgado" name="juzgado" required />
          <label for="solapp-juzgado">Juzgado del Proceso: </label>
        </div>


        <!-- Numero de Expediente -->
        <div class="input-field">
          <input type="text" id="solapp-expediente" name="expediente" required />
          <label for="solapp-expediente">Número de Expediente: </label>
        </div>


        <!-- Breve extracto de los hechos area con notas -->
        <div class="input-field">
          <input type="text" id="solapp-hechos" name="hechos" required />
          <label for="solapp-hechos">Breve extractos de los hechos: </label>
        </div>


        <!-- Tipo de asesoria bubbles -->


        <div class="box white ">
          <label>
            
            <h5><span>Tipo de Asesoría...</span></h5>
          </label>
          <br>


            <!-- First Row -->
        <div class="row">

                    <div class="col s4">
                      <div class>
                          <label> 
                              <input id="asesoria_unica" type="checkbox" value="asesoria unica" name="asesoria_unica" />
                              <span>Asesoría única</span>   
                            </label>
                      </div>
                    </div>

                    
                    <div class="col s4">
                      <div class>
                          <label>
                              <input id="representacion" type="checkbox" value="representacion" name="representacion" />
                              <span>Representación</span>
                          </label>
                      </div>
                    </div>


                    <div class="col s4">
                      <div class>
                          <label>
                              <input id="canalizacion" type="checkbox" value="canalizacion" name="canalizacion" />
                              <span>Canalización</span>
                            </label>
                      </div>
                    </div>



          </div>
        </div>
          <br>


        <!-- Dependecia de asesoria -->
        <div class="input-field">
          <input type="text" id="solapp-dependecia" name="dependencia" required />
          <label for="solapp-dependecia">Dependencia de asesoría: </label>
        </div>

        <!-- Atendido por -->
        <div class="input-field">
          <input type="text" id="solapp-atendido" name="atendido" required />
          <label for="solapp-atendido">Atendido por: </label>
        </div>


         <!-- Comentarios area con notas -->
         <div class="input-field">
          <input type="text" id="solapp-comentarios" name="comentarios" required />
          <label for="solapp-comentarios">comentarios: </label>
        </div>

        <!-- Comentarios con area de notas -->

        <button class="btn yellow darken-2 z-depth-2 " id="submit">submit</button>
        <p class="error pink-text center-align"></p>

      </form>
    </div>
  </div>
</div>

<!-- //////////////////////////////////////// Scripts ////////////////////////////////////////////// -->

 


  <!-- Firebase App -->
  <!-- <script src="https://www.gstatic.com/firebasejs/5.7.3/firebase-app.js"></script> -->
  <!-- Firebase Auth -->
  <!-- <script src="https://www.gstatic.com/firebasejs/5.7.3/firebase-auth.js"></script> -->
  <!-- Firebase firestore -->
  <!-- <script src="https://www.gstatic.com/firebasejs/5.7.3/firebase-firestore.js"></script> -->
  <!-- Firebase functions -->
  <!-- <script src="https://www.gstatic.com/firebasejs/5.7.3/firebase-functions.js"></script> -->



  <script>
  
  // Side navbar javascript code
  
  
  $(document).ready(function(){


    $('.sidenav').sidenav();
    //$('.actualizar_status').actualizar_status();
    $("#submit1").click(function(){
      $.post("grabarapp.php",$("#form-solapp").serialize(),function(resp){
       var rsp = jQuery.parseJSON(resp);
       if (rsp.Error!==0){
         alert(resp.message);
       }
      else{
         if (confirm("Los datos se guardaron existosamente, quieres dar de alta otro")){
           window.location.replace('solapp.php');
         }
        else{
          window.location.replace('index.html');
        } 
      } 
      })
    })

    // $('.sidenav').sidenav();
  })
  
  </script>

  <!-- //////////////////////////////////////// NAVBAR ////////////////////////////////////////////// -->
  // <script>
  //   // Initialize Firebase
  //   var config = {
  //     apiKey: "AIzaSyCJCXcrNZ7tqIt_CUu1pp8tMwBIJtrW1o8",
  //     authDomain: "deleiphone-b0f98.firebaseapp.com",
  //     databaseURL: "https://deleiphone-b0f98.firebaseio.com",
  //     projectId: "deleiphone-b0f98"
  //   };

  //   firebase.initializeApp(config);


  //   // make auth and firestore references
  //   const auth = firebase.auth();
  //   const db = firebase.firestore();
  //   const functions = firebase.functions();

  //   // update firestore settings
  //   db.settings({ timestampsInSnapshots: true });
  // </script>

  
    

  
  

</body>

</html> 