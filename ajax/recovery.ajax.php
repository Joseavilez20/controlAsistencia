<?php

require_once "../controladores/recuperarCuenta.controlador.php";
require_once "../modelos/usuarios.modelo.php";


class AjaxRecovery{

	/*=============================================
	GENERATE KEY
	=============================================*/	

	public $email;

	public function ajaxGenerarKey(){

		$valor = $this->email;

		$respuesta = ControladorRecuperacion::ctrGenerarKey($valor);
		//var_dump($respuesta);

		echo $respuesta;

	}



}

/*=============================================
GENERATE KEY
=============================================*/
if(isset($_POST["generateKey"])){

	$data = new AjaxRecovery();
	$data -> email = $_POST["email"];
	$data -> ajaxGenerarKey();

}

