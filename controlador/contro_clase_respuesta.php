<?php
session_start();
	if ($_SESSION["tipo_usuario"]=="2") 
	{	
include_once("../modelo/clase_respuesta.php");
	class controla_clase_respuesta{ 

		function val_clase_respuesta($id_resp){ 
			$respuesta_t=new clase_respuesta();
			$respuesta_t->valores_clase_respuesta($id_resp);											
		}
		
		function val_clase_respuesta_monitor($id_preg,$cc_moni){ 
			$respuesta_t=new clase_respuesta();
			$respuesta_t->valores_clase_respuesta_monitor($id_preg,$cc_moni);											
		}
		
	    function val_clase_respuesta_listado_preg($id_preg){ 
			$respuesta_t=new clase_respuesta();
			$respuesta_t->listado_valores_respuestas_preg($id_preg);											
		}
		
		function val_clase_respuesta_listado($cc_estudiante){ 
			$respuesta_t=new clase_respuesta();
			$respuesta_t->listado_valores_respuestas($cc_estudiante);											
		}
				
	}
$depa=new controla_clase_respuesta();
	}
	else{
		header("Location: ../index.php");
	}		
?>