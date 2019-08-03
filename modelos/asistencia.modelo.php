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

	


}