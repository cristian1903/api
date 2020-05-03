<?php
require_once "modelo.php";
class plantilla
{
	/*=============================================
	MOSTRAR DOMICILIOS PENDIENTES
	=============================================*/
	static public function mdlMostrarDomiciliosPendiente()
	{
		$consulta="SELECT * FROM domicilios WHERE dom_estado=1";
		$respuesta=Modelo::mdlMostrar($consulta,0);
		return ($respuesta); 		
	}
	/*=============================================
	MOSTRAR DOMICILIOS PENDIENTES
	=============================================*/
	static public function mdlMostrarDomiciliosPendienteById($dato)
	{
		$consulta="SELECT * FROM domicilios WHERE dom_estado=1 AND dom_id=$dato";
		$respuesta=Modelo::mdlMostrar($consulta,1);
		return ($respuesta); 		
	}
}
