<?php

session_start();

header("Expires: Tue, 01 Jan 2000 06:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d MYH:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="Expires" content="0">
 
    <meta http-equiv="Last-Modified" content="0">
     
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
     
    <meta http-equiv="Pragma" content="no-cache">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vistas/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/style.css">
    <link rel="stylesheet" href="vistas/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/jquery.dataTables.min.css">
  


    

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vistas/js/jquery-3.4.1.min.js"></script>
    <script src="vistas/js/popper.min.js"></script>
    <script src="vistas/bootstrap-4.3.1-dist/js/bootstrap.min.js" ></script>
    <script src="vistas/sweetalert2/sweetalert2.all.js"></script>
    <script type="text/javascript" charset="utf8" src="vistas/js/jquery.dataTables.min.js"></script>
    

    <title>Control asistencia</title>
  </head>
  <body>
   
<?php

if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/header.php";


    echo '<div class="container-fluid" id="menulateral">
      <div class="row  vh-100">';
    /*=============================================
    MENU
    =============================================*/

    include "modulos/menuLateral.php";


     if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" ||
          $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "estudiantes" ||
         $_GET["ruta"] == "crear-estudiante"||
          $_GET["ruta"] == "editar-estudiante"||
         $_GET["ruta"] == "asistencias"||
         $_GET["ruta"] == "crear-asistencia"||

         $_GET["ruta"] == "api"||
        
       $_GET["ruta"] == "salir")
         {

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }
    }else{

      include "modulos/inicio.php";

    }

   

        

   echo '</div>
    </div>';
  }else if(isset($_GET["ruta"]) && $_GET["ruta"] == "recuperarCuenta"){
    include "modulos/recuperarCuenta.php";

  }else if(isset($_GET["ruta"]) && $_GET["ruta"] == "cambiarCredenciales"){
    include "modulos/cambiarCredenciales.php";

  }  else{

    include "modulos/login.php";

  }

 ?>
      

  <!--script src="vistas/js/especiales.js?v=<?php //echo(rand()); ?>"></script-->
  <script src="vistas/js/leerdata.js"></script>
  <script src="vistas/js/recovery.js"></script>
   <script src="vistas/js/estudiante.js"></script>
    <script src="vistas/js/usuarios.js"></script>
    <script src="vistas/js/asistencias.js"></script>
  
  
  </body>
</html>