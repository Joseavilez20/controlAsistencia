<?php

require_once "conexion.php";

class ModeloAsistencia{

	/*=============================================
	MOSTRAR ESTUDIANTES
	=============================================*/

	static public function mdlMostrarAsistencias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

				$stmt -> execute();

				return $stmt -> fetchAll();
			


		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE ASISTENCIA
	=============================================*/

	static public function mdlIngresarAsistencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_estudiante, foto) VALUES (:codigo, :foto)");

		$stmt->bindParam(":codigo", $datos["codigoEstudiante"], PDO::PARAM_STR);
	
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


	

	/*=============================================
	BORRAR ASISTENCIAS DEL ESTUDIANTE
	=============================================*/

	static public function mdlBorrarAsistenciaEstudiante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE codigo_estudiante = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	BORRAR ASISTENCIA
	=============================================*/

	static public function mdlBorrarAsistencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}


	/*=================================
	RANGO DE FECHAS
	====================================*/
static public function mdlRangoFechasAsistencias($tabla, $fechaInicial, $fechaFinal){

	if($fechaInicial ==null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
			
	    $stmt -> execute();

		return $stmt -> fetchAll();

	}else if($fechaInicial  == $fechaFinal ){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");
			

		$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
	}else{
		//SELECT * FROM asistencias WHERE fecha BETWEEN '2019-07-01 00:00:00' AND '2019-07-31 23.59:59'

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal 23.59:59'");
			

		$stmt -> execute();

		return $stmt -> fetchAll();
	}

}
	


}