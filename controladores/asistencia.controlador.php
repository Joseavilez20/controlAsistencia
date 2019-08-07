<?php

class ControladorAsistencia{

	

	/*=============================================
	REGISTRO DE ASISTENCIA
	=============================================*/

	static public function ctrCrearAsistencia(){

		if(isset($_POST["codigoEstudiante"])){

			

			   	/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";


				if(isset($_FILES["fotoEstudiante"]["tmp_name"])){


					list($ancho, $alto) = getimagesize($_FILES["fotoEstudiante"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/asistencias/".$_POST["codigoEstudiante"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["fotoEstudiante"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/asistencias/".$_POST["codigoEstudiante"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoEstudiante"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["fotoEstudiante"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/asistencias/".$_POST["codigoEstudiante"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["fotoEstudiante"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				

				$tabla = "asistencias";


				$datos = array("codigoEstudiante" => $_POST["codigoEstudiante"],
				
					           "foto"=>$ruta);

				$respuesta = ModeloAsistencia::mdlIngresarAsistencia($tabla, $datos);
			
				if($respuesta == "ok"){
					var_dump("ok good!");

					/*echo '<script>

					swal({

						type: "success",
						title: "¡El  ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';
*/

				}	


			


		}


	}

	/*=============================================
	MOSTRAR ASISTENCIAS
	=============================================*/

	static public function ctrMostrarAsistencias($item, $valor){

		$tabla = "asistencias";

		$respuesta = ModeloAsistencia::MdlMostrarAsistencias($tabla, $item, $valor);

		return $respuesta;
	}

	
	/*=============================================
	BORRAR ASISTENCIA
	=============================================*/

	static public function ctrBorrarAsistencia(){

		if(isset($_GET["idAsistencia"])){

			$tabla ="asistencias";
			$datos = $_GET["idAsistencia"];

			if($_GET["fotoEstudiante"] != ""){

				unlink($_GET["fotoEstudiante"]);
				rmdir('vistas/img/asistencias/'.$_GET["codigo"]);

			}

			$respuesta = ModeloAsistencia::mdlBorrarAsistencia($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La asistencia ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "asistencias";

								}
							})

				</script>';

			}		

		}

	}



/*=================================
	RANGO DE FECHAS
====================================*/
static public function ctrRangoFechasAsistencias($fechaInicial, $fechaFinal){

 $tabla = "asistencias";

 $respuesta = ModeloAsistencia::mdlRangoFechasAsistencias($tabla, $fechaInicial, $fechaFinal);

 return $respuesta;



}
	


}
	


