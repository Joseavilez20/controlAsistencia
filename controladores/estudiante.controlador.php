<?php

class ControladorEstudiante{

	

	/*=============================================
	REGISTRO DE ESTUDIANTE
	=============================================*/

	static public function ctrCrearEstudiante(){

		if(isset($_POST["newCode"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nameStudent"]) &&
			   //preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
			  preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nameAttendant"])){

			   	/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";


				if(isset($_FILES["nuevaFoto"]["tmp_name"])){


					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/estudiantes/".$_POST["newCode"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/estudiantes/".$_POST["newCode"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/estudiantes/".$_POST["newCode"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "estudiantes";


				$datos = array("codigo" => $_POST["newCode"],
							   "estudiante" => $_POST["nameStudent"],
					           "acudiente" => $_POST["nameAttendant"],
					           "email" => $_POST["email"],
					           "foto"=>$ruta);

				$respuesta = ModeloEstudiantes::mdlIngresarEstudiante($tabla, $datos);
			
				if($respuesta == "ok"){
					

					echo '<script>

					swal({

						type: "success",
						title: "¡El estudiante ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "estudiantes";

						}

					});
				

					</script>';


				}	


			}else{

				/*echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';*/
				var_dump("error! bad");

			}


		}


	}

	/*=============================================
	MOSTRAR ESTUDIANTES
	=============================================*/

	static public function ctrMostrarEstudiantes($item, $valor){

		$tabla = "estudiantes";

		$respuesta = ModeloEstudiantes::MdlMostrarEstudiantes($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarEstudiante(){

		if(isset($_POST["editarCodigo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

					/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];
				
            
				if(empty($_FILES["editarFoto"]["tmp_name"])){
					$directorio1 = "vistas/img/estudiantes/".$_POST["editarCodigo"];
					if (!file_exists($directorio1)){
						mkdir($directorio1, 0755);
					}
					
					$cadena = explode("/", $_POST["fotoActual"]);
					rename($_POST["fotoActual"], $directorio1."/".$cadena[4]);
					if (file_exists($cadena[0]."/".$cadena[1]."/".$cadena[2]."/".$cadena[3])){
						rmdir($cadena[0]."/".$cadena[1]."/".$cadena[2]."/".$cadena[3]);
					}
					
					$ruta = $directorio1."/".$cadena[4];
					

					
				}

			

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL ESTUDIANTE
					=============================================*/

					$directorio = "vistas/img/estudiantes/".$_POST["editarCodigo"];
					

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/
                    $cadena = explode("/", $_POST["fotoActual"]);
					if(!empty($_POST["fotoActual"])){
						unlink($_POST["fotoActual"]);
						if($cadena[3] != $_POST["editarCodigo"]){
							rmdir($cadena[0]."/".$cadena[1]."/".$cadena[2]."/".$cadena[3]);

							mkdir($directorio, 0755);
						}
						

					}else{

						mkdir($directorio, 0755);
						

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/estudiantes/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
						

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/estudiantes/".$_POST["editarCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "estudiantes";

				

				$datos = array("nombre_estudiante" => $_POST["editarNombre"],
							   "codigo" => $_POST["editarCodigo"],
							   "acudiente" => $_POST["editarAcudiente"],
							   "correo" => $_POST["editarCorreo"],
							   "id" => $_POST["idEstudiante"],
							   "foto" => $ruta);

				$respuesta = ModeloEstudiantes::mdlEditarEstudiante($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El estudiante ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "estudiantes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "estudiantes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ESTUDIANTE
	=============================================*/

	static public function ctrBorrarEstudiante(){

		if(isset($_GET["idEstudiante"])){

			$tabla ="estudiantes";
			$datos = $_GET["idEstudiante"];

			if($_GET["fotoEstudiante"] != ""){

				unlink($_GET["fotoEstudiante"]);
				rmdir('vistas/img/estudiantes/'.$_GET["codigo"]);

			}

			$respuesta = ModeloEstudiantes::mdlBorrarEstudiante($tabla, $datos);
			
		   

			if($respuesta == "ok"){

				$tabla = "asistencias";
			    $datos = $_GET["codigo"];

			    $respuesta2 = ModeloAsistencia::mdlBorrarAsistenciaEstudiante($tabla, $datos);

			    if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Estudiante ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "estudiantes";

								}
							})

				</script>';
			}

			}		

		}

	}


}
	


