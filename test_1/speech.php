
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- bootstrap cdn link -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>speech de llamada de telefono</title>


    <style>
        h1 {
                font-family: "Times New Roman", Times, serif;
                font-family: "Times New Roman", Times, serif;
    color:black;
    text-shadow: 1px;
    /* -webkit-text-stroke-width: 1.5px; */
    /* -webkit-text-stroke-color:black; */
    }
            }
            @import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

    .detailBox {
        width:100%;
        border:1px solid #bbb;
        margin:50px;
    }
    .titleBox {
        background-color:#fdfdfd;
        padding:10px;
    }
    .titleBox label{
    color:#444;
    margin:0;
    display:inline-block;
    }

    .commentBox {
        padding:10px;
        border-top:1px dotted #bbb;
    }
    .commentBox .form-group:first-child, .actionBox .form-group:first-child {
        width:80%;
    }
    .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
        width:18%;
    }
    .actionBox .form-group * {
        width:100%;
    }
    .taskDescription {
        margin-top:10px 0;
    }
    .commentList {
        padding:0;
        list-style:none;
        max-height:200px;
        overflow:auto;
    }
    .commentList li {
        margin:0;
        margin-top:10px;
    }
    .commentList li > div {
        display:table-cell;
    }
    .commenterImage {
        width:30px;
        margin-right:5px;
        height:100%;
        float:left;
    }
    .commenterImage img {
        width:100%;
        border-radius:50%;
    }
    .commentText p {
        margin:0;
    }
    .sub-text {
        color:#aaa;
        font-family:verdana;
        font-size:11px;
    }
    .actionBox {
        border-top:1px dotted #bbb;
        padding:10px;
    }

    h3 {
    color: black;
    
    text-shadow: 1px;
    }

    .logo {
    font-family: "Times New Roman", Times, serif;
    }

    #logo {


    }

    .logo {
    position: relative;
    width: 100%;
    max-width: 400px;
    }

    .logo img {
    width: 100%;
    height: auto;
    }

    .logo .btn {
    position: absolute;
    top: 15%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: white;
    font-size: 16px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
    }

    .logo .btn:hover {
    background-color: black;
    }

    .button {
    background-color: #4CAF50;
    /* Green */
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    }

    .button1 {
    border-radius: 2px;
    }

    .button2 {
    border-radius: 4px;
    }

    .button3 {
    border-radius: 8px;
    }

    .button4 {
    border-radius: 12px;
    }

    .button5 {
    border-radius: 50%;
    }

    
    
    body {
    font-family: "Lato", sans-serif;
    background-color: white;
    }

.sidenav {
  width: 630px;
  position: fixed;
  z-index: 1;
  top: 20px;
  left: 10px;
  background: #eee;
  overflow-x: hidden;
  padding: 8px 0;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #2196F3;
  display: block;
}

.sidenav a:hover {
  color: #064579;
}

.main {
  margin-left: 140px; /* Same width as the sidebar + left position in px */
  font-size: 15px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
   
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 500px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: grey;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 500px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 12px;}
}
</style>


</head>

<body>

    <div class="sidenav">
        <div class="container">
        <form action="resultados.php" id="form_Search" method="GET">
            <!-- Folio -->
            <div class="form-group col-4">
                <label for="folio-input">Folio</label>
                <input type="text" class="form-control" id="folio-input" placeholder="Folio" name="folio" required="">
            </div>


            <!-- might have issues on id="reserve_name" -->

            <div class="form-row">
                <div class="form-group col-6">
                    <label for="input-nombre">Nombre</label>
                    <input type="text" class="form-control" id="input-nombre" placeholder="Nombre" name="nombre">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input-apellido">Apellido</label>
                    <input type="text" class="form-control" id="input-apellido" placeholder="Apellido" name="apellidop">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="telefono-input">Teléfono</label>
                    <input type="phone" class="form-control" id="telefono-input" placeholder="Teléfono" name="telefono">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Correo-input">Correo</label>
                    <input type="email" class="form-control" id="Correo-input" placeholder="nombre@ejemplo.com" name="email"
                        required="">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="expediente-input">Número de expediente</label>
                    <input type="expediente" class="form-control" id="expediente-input" placeholder="Número de expediente"
                        name="expediente" required="">
                </div>
            </div>

                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" id="btnBuscar" class="btn btn-primary submit" name="submit_button" form="form-inline">Buscar</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
    

    <!-- Columna Izquierda con navegador -->
        <div class="main">

                <img src="./images/topbg.png" alt="Responsive image" style="width: 100%;">

            <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e5e4e3 ;">
                        <h1 class="navbar-brand font-weight-bold;">DELEI</h1>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                            <!-- Position of Navbar ml-auto or mr-auto -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                </li>


                                <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="solapp.php">Solicitud de apoyo <span class="sr-only"></span></a>
                                </li>

                                </li>
                            </ul>
                        </div>
                    </nav>

            <br>
  
            <h5>Delei buenos días (tardes).
                Soy el licenciado (a) __________
                A sus órdenes en que le podemos ayudar.</h5>

            <ul>
                <li> Quiero saber el procedimiento de mi demanda</li>
                <li> Quiero saber cómo va mi caso.</li>
                <li> Me comunica con el Lic. Gonzalo</li>
                <li> Me comunica con el Lic. Tal</li>
            </ul>

            <p>
                <h5>¿Cuál es su nombre? ¿Con quién tengo el gusto?,</h5>
                <p>(si me podria verificar su numero telefonico o correo electronico)</p>
                <ul>

                <li>(el Lic. Tal no se encuentra por el momento,
                    esto en caso pregunte por el Lic. Gonzalo y otro Lic. Que sea mencionado).
                </li>


                <li>si no aparece por nombre y apellido, pregunte por un numero telefonico, correo, numero de 
                    expediente o folio.
                </li>
                
                </ul>
            </p>

            <h5>Permítame un momento, enseguida le informo sobre el proceso de su asunto (demanda).</h5>

            <p> Me dirijo al abogado le comento sobre el cliente, busco el expediente según sea la materia
                en
                el lugar correcto,
                contacto por teléfono, por WhatsApp al grupo e individual, con el fin de tener la
                información
                precisa al cual se debe proporcionar.</p>

            <p>
                <h5>Informo directamente a nuestro cliente o transfiero la llamada. </h5>
                Y preferentemente sea la persona que tome la llamada inicial la que proporcione
                información a
                nuestro cliente.
            </p>

            <h5>NOTA:</h5>

            <p>Para lo anterior se requiere a todo el personal DELEI que tenga a bien contestar el
                teléfono
                siga estrictamente
                por lo menos el 90% este guion, con los 3 aspectos fundamentales que enseguida se
                mencionan.
            </p>

            <p>
                <h5>1.- ACTITUD POSITIVA:</h5> hablar en presente y afirmativo, contestar en pleno
                positivismo,
                entusiasta, feliz,
                dinámico, fluido, con cortesía y amabilidad.
            </p>

            <p>
                <h5>2.- SEGURIDAD:</h5> debo confiar en lo que estoy diciendo y aceptarme.
            </p>

            <p>
                <h5>3.- MEMORIZACION:</h5>
                Aprender el guion correctamente para la recepción de cualquier llamada y dar
                oportunamente,
                amablemente y profesional al requerimiento de nuestro cliente.
            </p>

            <p>
                <h5>4.- ACTUACION:</h5>
                Con base a nuestro modelo comercial de venta por asesoría y nuestro aliado vende como
                Hollywood,
                todo el personal debe memorizar y actuar lo que el guion dice con el conocimiento de que
                todos
                los que trabajamos en DELEI somos actores protagonistas tal y como lo vemos en la pantalla
                grande
                por las grandes empresas cinematográficas.
            </p>

            <p>
                <h5>5.- INICIATIVA Y DISPONIBILIDAD:</h5> tal vez no sea el experto ni haya logrado un alto
                nivel
                académico en mi preparación, pero deseo superación personal y una mejora continua en mi
                vida.
                Con solo estar disponible para todo caso que se requiera o tipo de trabajo a realizar,
                teniendo iniciativa estaré contribuyendo un alto nivel a mi persona y a la empresa para
                bien
                de manera
                profesional, sin que sea una persona altamente preparada académicamente.
                QUE SE ESPERA DE MI?? Memorizar el guion, vivirlo y actuarlo.
            </p>





        </div>
    </div>

</body>
</html>
<script>
  $(document).ready(function(){

   $("#btnBuscar").click(function(){
       window.location.replace('resultados.php?'+$("#form_Search").serialize());
   })



  })
</script>