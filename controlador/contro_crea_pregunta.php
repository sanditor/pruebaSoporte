<?php
session_start();
include("../modelo/crear_pregunta_modelo.php");
	if ($_SESSION["tipo_usuario"]=="2") 
	{
class crea_pregunta{
		function creando_pregunta(){	
			$pregunta=$_REQUEST['pregunta'];
			$asig=$_REQUEST[id_asig];
			$cc_est=$_REQUEST[cc_est];
			$reg=new crear_pregunta_modelo();
			$reg->crear_preg($pregunta,$asig,$cc_est);
		
			
	}
}
$reg=new crea_pregunta();
$reg->creando_pregunta();
	}	
	else{
		header("Location: ../index.php");
	}
?>