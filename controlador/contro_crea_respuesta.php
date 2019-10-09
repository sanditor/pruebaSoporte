<?php
session_start();
include("../modelo/crear_respuesta_modelo.php");
	if ($_SESSION["tipo_usuario"]=="2") 
	{
class crea_respuesta{
		function creando_respuesta(){	
			$respuesta=$_REQUEST[respuesta];
			$estre=$_REQUEST[estrellas];
			$id_preg=$_REQUEST[id_preg_res];
			$cc_mon=$_REQUEST[cc_moni];
			$reg=new crear_respuesta_modelo();
			$reg->crear_rep($respuesta,$estre,$id_preg,$cc_mon);
		
			
	}
}
$reg=new crea_respuesta();
$reg->creando_respuesta();
	}	
	else{
		header("Location: ../index.php");
	}
?>