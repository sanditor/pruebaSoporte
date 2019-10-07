<?php
session_start();
	if ($_SESSION["tipo"]=="2") 
	{	
include_once("../modelo/clase_pregunta.php");
	class controla_clase_pregunta{ 
		
		function val_clase_pregunta($id_preg){ 
			$pregunta_t=new clase_pregunta();
			$pregunta_t->valores_clase_pregunta($id_preg);											
		}
		
		function val_clase_pregunta_listado($cc_estudiante){ 
			$pregunta_t=new clase_pregunta();
			$pregunta_t->listado_valores_preguntas($cc_estudiante);											
		}
		
				
	}
$depa=new controla_clase_pregunta();
	}
	else{
		header("Location: ../index.php");
	}		
?>