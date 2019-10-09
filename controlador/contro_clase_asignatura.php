<?php
session_start();
	if ($_SESSION["tipo_usuario"]=="2") 
	{	
include_once("../modelo/clase_asignatura.php");
	class controla_clase_asignatura{ 
		
		function val_clase_asignatura_select($cc_estudiante){ 
			$asignatura_t=new clase_asignatura();
			$asignatura_t->valores_clase_asignatura_est_lista($cc_estudiante);											
		}
				
	}
$depa=new controla_clase_asignatura();
	}
	else{
		header("Location: ../index.php");
	}		
?>