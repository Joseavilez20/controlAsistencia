<?php


class ControladorRecuperacion{

	
		static public function ctrCambiarCredenciales(){

			if(isset($_GET["key"]) && isset($_GET["id"]) ){

					$tabla = "usuarios";
					$item = "key_recovery";
					$valor = $_GET["key"]; 
					$encriptar = crypt($valor, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					
					$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $encriptar);
					
					if($respuesta != null)
					{
						if(isset($_POST["inputNewPassword"]) && $_POST["inputNewPassword"] != ""){

							$item1 = "password";
							$valor1 =crypt($_POST["inputNewPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
							$item2 = "id";
							$valor2 = $_GET["id"];
							$respuesta2 = ModeloUsuarios:: mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
							if($respuesta2 == "ok")
							{
								$valorkey = "";

								$respuesta3 = ModeloUsuarios:: mdlActualizarUsuario($tabla, $item, $valorKey, $item2, $valor2);

								echo'<script>

								swal({
									  type: "success",
									  title: "La contraseña ha sido cambiada correctamente",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
												if (result.value) {

												window.location = "login";

												}
											})

								</script>';
							}
						}
					}
					


			}
		}


		static public function ctrGenerarKey($usuario){
			
			$tabla = "usuarios";
			$item = "usuario";
			$valor = $usuario;
			$link = "putito";
			
			$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

			if($respuesta != null){

				$key = rand()."".date("mdyHis");
				$encriptar = crypt($key, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
				$item1 = "key_recovery";
				$valor1 = $encriptar;
				$item2 = "id";
				$valor2 = $respuesta["id"];


				$respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

				if($respuesta2 == "ok")
				{

					$link = "index.php?ruta=cambiarCredenciales&key=".$key."&id=".$valor2;

					ini_set('display_errors', 1 );
				    error_reporting( E_ALL );
				    $from = "admin@gamaxift.com";
				    $to = $respuesta["email"];
				    $subject = "Recuperación de la contraseña";
				    $message = "Hola  para poder recuperar su cuenta \r\n presione click en el siguiente enlace gamaxift.com/".$link;
				    $headers = "From:" . $from;
				    mail($to,$subject,$message, $headers);

			        

				}

				

			}

			return $link;
			 

		}

}