<?php session_start();
$_SESSION["message"]="";
include "config.php";

$result=$conn->query("select folio from solicitante where folio='".date("dmY")."' or folio like '".date("dmY")."%' ORDER BY folio DESC");
if ($result->num_rows>=1){
  $row = $result->fetch_assoc();
  $posicion = strpos($row["folio"],"-");
  if ($posicion ===FALSE){
    $num=1;
  }
  else{
    $num = substr($row["folio"],$posicion+1);
  }
  $folio = date("dmY")."-".($num==null?1:$num+1);
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

  <title>Solicitud de apoyo</title>
<!-- <style>
  {
    height: 100%;
    overflow: hidden;
    margin: 0;
}
#content {
    height: 100%;
}
#left {
    float: left;
    width: 50%;
    background:white;
    height: 100%;
    overflow: auto;
    box-sizing: border-box;
    padding: 0.4em;
}
#right {
    float: left;
    width: 50%;
    background: rgb(231, 231, 238);
    height: 100%;
    overflow: auto;
    box-sizing: border-box;
    padding: 0.4em;
}
</style> -->
</head>


<!-- //////////////////////////////////////// BODY ////////////////////////////////////////////// -->
<body class="grey " >
  

  

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

            <li class="logged-in">
                  <a href="index.html" class="grey-text" id="navbar" >Home</a>
                </li>
    
            <li class="logged-in">
                    <a href="speech.php" class="grey-text" id="navbar" >Speech</a>
                  </li>
    
                  <!-- <li class="logged-in">
                        <a href="solapp.php" class="grey-text" id="solapp">Solicitud de apoyo</a>
                      </li>
    
                      <li class="logged-in">
                            <a href="registro.php" class="grey-text" id="navbar">Registro</a>
                          </li> -->
    
                          
    
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
                      <input id="indeterminate-checkbox" type="checkbox" value="Instituto Estatal de la Mujer" name="fuente"/>
                      <span> Instituto Estatal de la Mujer</span>   
                    </label>
              </div>
            </div>

            <div class="col s4">
              <div class>
                  <label>
                      <input id="indeterminate-checkbox" type="checkbox" value="Anuncio Panoramico" name="fuente"/>
                      <span>Anuncio Panorámico</span>
                  </label>
              </div>
            </div>

            <div class="col s4">
              <div class>
                  <label>
                      <input id="indeterminate-checkbox" type="checkbox" value="recomendacion" name="fuente"/>
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
                        <input id="indeterminate-checkbox" type="checkbox"  value="municipio" name="fuente" />
                        <span>Municipio</span>
                      </label>
                </div>
              </div>
  
              <div class="col s4">
                <div class>
                    <label>
                        <input id="indeterminate-checkbox" type="checkbox" value="facebook" name="fuente"/>
                        <span>Facebook</span>
                    </label>
                </div>
              </div>
  
              <div class="col s4">
                <div class>
                    <label>
                        <input id="indeterminate-checkbox" type="checkbox" value="periodico" name="fuente"/>
                        <span>Periódico</span>
                    </label>
                </div>
              </div>
  
            </div>
            </div>

        <!-- Folio -->
        <div class="input-field">
          <input type="text" id="solapp-folio" name="folio" required  value="<?php echo $folio ?>"/>
          <label for="solapp-folio">Folio: </label>
        </div>

        <!-- Fecha -->
        

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
          <input type="date" class="datepicker" id="solapp-dob" name="dob" required />
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
          <input type="text" id="solapp-expediente" name="expedinete" required />
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
                              <input id="indeterminate-checkbox" type="checkbox" value="asesoria unica" name="asesoria" />
                              <span>Asesoría única</span>   
                            </label>
                      </div>
                    </div>


                    <div class="col s4">
                      <div class>
                          <label>
                              <input id="indeterminate-checkbox" type="checkbox" value="representacion" name="asesoria" />
                              <span>Representación</span>
                          </label>
                      </div>
                    </div>


                    <div class="col s4">
                      <div class>
                          <label>
                              <input id="indeterminate-checkbox" type="checkbox" value="canalizacion" name="asesoria" />
                              <span>Canalización</span>
                            </label>
                      </div>
                    </div>



          </div>
        </div>
          <br>


        <!-- Dependecia de asesoria -->
        <div class="input-field">
          <input type="text" id="solapp-dependecia" name="dependecia" required />
          <label for="solapp-dependecia">Dependencia de asesoría: </label>
        </div>

        <!-- Atendido por -->
        <div class="input-field">
          <input type="text" id="solapp-atendido" name="atendido" required />
          <label for="solapp-atendido">Atendido por: </label>
        </div>

        <!-- Comentarios con area de notas -->
        <div class="input-field">
          <input type="text" id="solapp-comentarios" name="comentarios" required />
          <label for="solapp-comentarios">comentarios: </label>
        </div>

        <button class="btn yellow darken-2 z-depth-2 " id="submit1">submit</button>
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


  })
  
  
  </script>

  <!-- //////////////////////////////////////// Firebase ////////////////////////////////////////////// -->
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