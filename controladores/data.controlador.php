<?php

class ControladorData{

static public function ctrMostrarData(){

	$fp = fopen("../datos.txt", "r");
	//var_dump($fp);
	$linea = fgets($fp);
	file_put_contents("../datos.txt","");
	return $linea;

	fclose($fp);
}


}