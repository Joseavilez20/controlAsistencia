<?php
require_once "modelos/asistencia.modelo.php";
require_once "modelos/estudiante.modelo.php";

if(isset($_REQUEST["DATA1"])){

	if($_REQUEST["DATA1"]){
		echo "data is: ".$_REQUEST["DATA1"];
		file_put_contents("datos.txt",$_REQUEST["DATA1"]);
	}


	
}





if(isset($_GET["codigoEstudiante"])){

	echo "CODIGO: ".$_GET["codigoEstudiante"];

				$ruta = "";
				$tabla = "estudiantes";
				$item = "codigo";
				$valor = $_GET["codigoEstudiante"];


				$estudiante = ModeloEstudiantes::mdlMostrarEstudiantes($tabla, $item, $valor);
				//var_dump($estudiante);

				if($estudiante != null){
					
					if($_GET["fotoEstudiante"]!=null){
						$ruta = $_GET["fotoEstudiante"];
					}

					$datos = array("codigoEstudiante" => $_GET["codigoEstudiante"],
					
						           "foto"=>$ruta);
					$tabla = "asistencias";

					$respuesta = ModeloAsistencia::mdlIngresarAsistencia($tabla, $datos);
				
					if($respuesta == "ok"){
						var_dump("ok good!");

				

					}	
				}else{
					var_dump("not found!") ;
				}




}
   
 



 ?>