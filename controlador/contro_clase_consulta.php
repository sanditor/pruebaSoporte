<?php
/* session_start(); */
	if ($_SESSION["tipo_usuario"]=="1") 
	{	
include_once("../modelo/clase_pregunta.php");
	class controla_clase_pregunta{ 
		

		function val_clase_pregunta_reporte($fecha_ini,$fecha_fin){ 
			$pregunta_t=new clase_pregunta();
			$pregunta_t->listado_reporte($fecha_ini,$fecha_fin);											
		}
				
	}
$depa=new controla_clase_pregunta();
	}
	else{
		header("Location: ../index.php");
	}		
?>