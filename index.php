<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/estudiante.controlador.php";
require_once "controladores/asistencia.controlador.php";
require_once "controladores/recuperarCuenta.controlador.php";

require_once "modelos/estudiante.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/asistencia.modelo.php";
$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();


?>
