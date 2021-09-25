<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Aerolinea proyecto CC6</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <!-- Sweet Alert2 personalizado para no usar mensajes javascript sin personalizar --->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
    
    <!-- Por medio de este archivo mostramos un mensaje de confirmacion para eliminar, actualizar datos.-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">


</head>
<body id="body-pd" style="margin-top:7%;">


    <main class="main" style="width:95%;margin-right:10%;">
        <!--div id="contents" style="background: red;width:90%;margin-right:10%;"-->
 
        <div class="tab-content" id="v-pills-tabContent" style="width:90%;margin-right:10%;margin-top:40px;">
        <div class="tab-pane fade show active" id="idiomas" role="tabpanel" aria-labelledby="idiomas-tab" style="width:100%">
        
            <div class="alert alert-primary" role="alert">
                <h3><span>Listado idiomas</span> </h3>
            </div>            
            <?php        
                include 'idiomas/listadoIdiomas.php';    
            ?>
        </div>
        <div class="tab-pane fade" id="empleados" role="tabpanel" aria-labelledby="empleados-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
                <h2><span style="color:blue">Empleados</span></h2>
            </div>
            <br>
            <?php           
                include 'empleados/listadoEmpleados.php';    
            ?>
        </div>
    
        <div class="tab-pane fade" id="empleadosIdiomas" role="tabpanel" aria-labelledby="empleadosIdiomas-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
                <h2><span style="color:blue">Empleados idiomas</span></h2>
            </div>
            <br>
            <?php
                include 'idiomasEmpleados/listadoEmpleadosIdiomas.php';    
            ?>
        </div>
    

        <div class="tab-pane fade" id="aeropuerto" role="tabpanel" aria-labelledby="aeropuerto-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
                <h2><span style="color:blue">Aeropuerto</span></h2>
            </div>
            <?php       
                include 'aeropuerto/listadoAeropuerto.php';    
            ?>
        </div>

        <div class="tab-pane fade" id="rutas" role="tabpanel" aria-labelledby="rutas-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
                <h2><span style="color:blue">Rutas</span></h2>
            </div>
            <?php            
                include 'rutas/listadoRutas.php';    
            ?>

        </div>

        <div class="tab-pane fade" id="viajes" role="tabpanel" aria-labelledby="viajes-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
                <h2><span style="color:blue">Viajes</span></h2>
            </div>
            <?php              
                include 'viajes/listadoViajes.php';    
            ?>
        </div>

        <div class="tab-pane fade" id="viajesEmpleados" role="tabpanel" aria-labelledby="viajes-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
                <h2><span style="color:blue">Viajes por Empleado</span></h2>
            </div>
            <?php              
                include 'viajesEmpleados/listadoEmpleadosViajes.php';    
            ?>
        </div>


        <div class="tab-pane fade" id="aeronave" role="tabpanel" aria-labelledby="aeronave-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
                <h2><span style="color:blue">Aerolineas</span></h2>
            </div>
            <?php         
                include 'aeronave/listadoAeronave.php';    
            ?>
        </div>


        <div class="tab-pane fade" id="boletosAereos" role="tabpanel" aria-labelledby="boletosAereos-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
              
                <h2><span style="color:blue">Boletos Aéreos</span></h2>
            </div>
            <?php                    
                include 'boletos/listadoBoletos.php';    
            ?>
            
        </div>

        <div class="tab-pane fade" id="webservices" role="tabpanel" aria-labelledby="webservices-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
              
                <h2><span style="color:blue">Webservices</span></h2>

                script_lista_vuelos: No implementado con argumentos todavía. <br>
                <a href="XML_listaVuelos/script_lista_vuelos.php">IR script_lista_vuelos</a><br>
                <a href="XML_listaVuelos/ver_xml.php">XML lista VUELOS</a><br>
            </div>
           
        </div>


        <div class="tab-pane fade" id="acerca" role="tabpanel" aria-labelledby="acerca-tab" style="width:100%">
            <div class="alert alert-primary" role="alert">
                <h2><span style="color:blue">Acerca</span></h2>
                Proyecto aerolínea, curso CC6 2021.

                <H3>Diseño</H3>
                <a href="https://www.youtube.com/watch?v=C6227evfBig" >autor</a><br>

                <h3>Iconos</h3>
                <a href="https://flaticon.com" >Iconos</a><br>
                <a href="https://boxicons.com/?query=bag" >Iconos menu</a><br>

            </div>
        </div>

    </div>
        <!--/div-->
    </main>
   
   
 
    <header class="header" id="header">
        <div>
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="header__img">
            <img src="img/airport.png" alt="Profile">
        </div>
    </header>

    <div class="l-navbar" id="nav-bar" >
        <nav class="nav">
            <div id="v-pills-tab">  
                <a href="#" class="nav__logo">
                    <i class='bx bxs-plane-take-off nav__logo-icon'></i>
                    <!--i class='bx bxs-plane-take-off nav__logo-icon'></i-->
                    <span class="nav__logo-name">
                        Aeropuerto
                    </span>
                </a>


                
                <div  class="nav nav-tabs nav__list" id="nav-tab" role="tablist">

                    <!-- AERONAVE -->
                    <a class="nav-link" id="aeronave-tab" data-toggle="pill" href="#aeronave"  role="tab" aria-controls="aeronave" aria-selected="false">
                        <i class='bx bxs-plane nav__icon'></i>
                        <!--i class='bx bxs-plane-take-off nav__logo-icon'></i-->
                        <span class="nav__name">
                            Aeronave
                        </span>
                    </a>
                    
                    <!-- AEROPUERTO -->
                    <a class="nav-link" id="aeropuerto-tab" data-toggle="pill" href="#aeropuerto"  role="tab" aria-controls="aeropuerto" aria-selected="false">
                        <i class='bx bxs-plane-take-off nav__logo-icon'></i>
                        <!--i class='bx bxs-plane-take-off nav__logo-icon'></i-->
                        <span class="nav__name">
                            Aeropuerto
                        </span>
                    </a>

                <!-- Idiomas -->

                <a class="nav-link" id="idiomas-tab" data-toggle="pill" href="#idiomas"  role="tab" aria-controls="idiomas" aria-selected="true" aria-label="Home">            
                    <i class='bx bxs-flag-alt nav__icon'></i>       
                    <span class="nav__name">
                        Idiomas
                    </span>
                </a>
  
                 <!-- Empleados -->
                    <!--a href="#v-pills-profile" class="nav-link nav__link" role="tab" aria-controls="v-pills-profile" aria-selected="false"--->
                    <a class="nav-link" id="empleados-tab" data-toggle="pill" href="#empleados"  role="tab" aria-controls="empleados" aria-selected="false">
                       
                    <i class='bx bxs-user-circle nav__icon'></i>
                        <span class="nav__name">
                            Empleados
                        </span>
                    </a>  

                    <!-- IDIOMAS QUE DOMINA EMPLEADO -->
                    <a class="nav-link" id="empleadosIdiomas-tab" data-toggle="pill" href="#empleadosIdiomas"  role="tab" aria-controls="empleadosIdiomas" aria-selected="false">
                       
                       <i class='bx bxs-user-circle nav__icon'></i>
                           <span class="nav__name">
                               Idiomas  empleado 
                           </span>
                       </a>  

                    
                    <!-- RUTAS-->
                    <a class="nav-link" id="rutas-tab" data-toggle="pill" href="#rutas"  role="tab" aria-controls="rutas" aria-selected="false">
                        <i class='bx bxs-map nav__icon'></i>
                        <!--i class='bx bxs-plane-take-off nav__logo-icon'></i-->
                        <span class="nav__name">
                            Rutas
                        </span>
                    </a>

                    <!-- VIAJES -->
                    <a class="nav-link" id="viajes-tab" data-toggle="pill" href="#viajes"  role="tab" aria-controls="viajes" aria-selected="false">
                        <i class='bx bxs-shopping-bags nav__icon'></i>
                        <!--i class='bx bxs-plane-take-off nav__logo-icon'></i-->
                        <span class="nav__name">
                            Viajes
                        </span>
                    </a>

                    <!-- VIAJES -->
                    <a class="nav-link" id="viajes-tab" data-toggle="pill" href="#viajesEmpleados"  role="tab" aria-controls="viajes" aria-selected="false">
                        <i class='bx bxs-shopping-bags nav__icon'></i>
                        <!--i class='bx bxs-plane-take-off nav__logo-icon'></i-->
                        <span class="nav__name">
                            Viajes por Empleados
                        </span>
                    </a>

                    <!-- BOLETOS AEREOS -->
                    <a class="nav-link" id="boletosAereos-tab" data-toggle="pill" href="#boletosAereos"  role="tab" aria-controls="boletosAereos" aria-selected="false">
                        <i class='bx bx-money nav__icon'></i>
                        <!--i class='bx bxs-plane-take-off nav__logo-icon'></i-->
                        <span class="nav__name">
                           Boletos aereos
                        </span>
                    </a>

                    <!-- BOLETOS AEREOS -->
                    <a class="nav-link" id="webservices-tab" data-toggle="pill" href="#webservices"  role="tab" aria-controls="webservices" aria-selected="false">
                        <i class='bx bx-money nav__icon'></i>
                        <!--i class='bx bxs-plane-take-off nav__logo-icon'></i-->
                        <span class="nav__name">
                           Webservices
                        </span>
                    </a>
 

                    
                     <!-- Acerca -->
                    <a class="nav-link" id="acerca-tab" data-toggle="pill"  href="#acerca"  role="tab" aria-controls="acerca" aria-selected="false">
                        <i class='bx bx-info-circle nav__icon'></i>
                            <span class="nav__name">
                                Acerca
                            </span>
                    </a>  
                </div>
            </div>

            <a href="#" class="nav__link">
                <i class='bx bx-info-circle nav__icon'></i>
                <span class="nav__name">
                    CC6 
                </span>
            </a>  

        </nav>
        <script src="js/main.js"></script>




 <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    

    
</body>
</html>