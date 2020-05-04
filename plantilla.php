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
	/*=============================================
	MOSTRAR DOMICILIOS PENDIENTES
	=============================================*/
	static public function mdlMostrarMisDomicilios($dato)
	{
		$consulta="SELECT * FROM domicilios WHERE dom_idConductor=$dato";
		$respuesta=Modelo::mdlMostrar($consulta,0);
		return ($respuesta); 		
	}
		/*=============================================
	MOSTRAR ESCOGER DOMICILIO
	=============================================*/
	static public function mdlMostrarEscogerDomicilio($array)
	{	
		$id=$array[0]["idDomicilio"];
		$conductor=$array[0]["idConductor"];
		$consulta="UPDATE domicilios SET dom_estado=2, dom_idConductor=$conductor WHERE dom_id=$id";
		$respuesta=Modelo::mdlGestion($consulta);
		return ($respuesta); 		
	}
}
