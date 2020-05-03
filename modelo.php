<?php
require_once "conexion.php";
class Modelo
{
	/*=============================================
	MOSTRAR SEGUN LA consulyta y si es uno o todos
	=============================================*/
	static public function mdlMostrar($consulta,$item)
	{
		if ($item == 1) {
			$db = new db();
			$stmt = $db->pdo->prepare($consulta);
			$stmt->execute();
			return $stmt->fetch();
		} else {
			$db = new db();
			$stmt = $db->pdo->prepare($consulta);
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}
	/*=============================================
	GESTIONAR C U D
	=============================================*/
	static public function mdlGestion($consulta)
	{
		$db = new db();
		$stmt = $db->pdo->prepare($consulta);
		if ($stmt->execute()) {
			return "ok";
		} else {
			return $stmt->errorInfo();
		}
	}
}
