<?php

require_once "../controladores/data.controlador.php";


class AjaxData{

	/*=============================================
	TRAER DATO DE TXT
	=============================================*/	


	public function ajaxTraerDato(){

		$respuesta = ControladorData::ctrMostrarData();
		

		echo $respuesta;

	}



}

/*=============================================
TRAER DATA
=============================================*/
if(isset($_POST["readData"])){

	$data = new AjaxData();
	$data -> ajaxTraerDato();

}

