<?php
session_start();
include("../modelo/crear_respuesta_modelo.php");
	if ($_SESSION["tipo"]=="2") 
	{
class crea_respuesta{
		function creando_respuesta(){	
			$id_rep_ele=$_REQUEST[id_rep_ele];
			$id_preg=$_REQUEST[id_preg];
			$reg=new crear_respuesta_modelo();
			$reg->act_rep($id_rep_ele,$id_preg);
		
			
	}
}
$reg=new crea_respuesta();
$reg->creando_respuesta();
	}	
	else{
		header("Location: ../index.php");
	}
?>