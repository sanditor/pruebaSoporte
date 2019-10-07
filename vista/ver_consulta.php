<?php
session_start();
	if($_SESSION["tipo"]=="1") 
	{
$fecha_in=$_REQUEST[valor1];	
$fecha_fin=$_REQUEST[valor2];		

require_once("../controlador/contro_clase_consulta.php");	  
$pregunta_l=new controla_clase_pregunta();
$pregunta_l->val_clase_pregunta_reporte($fecha_in,$fecha_fin);    
          

	 $fechaGuardada = $_SESSION["ultimoAcceso"]; 
     $ahora = date("Y-n-j H:i:s");
     $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));	
 if($tiempo_transcurrido >= 2200) {	
	    session_destroy();
        header("Location: ../controlador/cerrar.php"); 
	     }	
	    else { 
    $_SESSION["ultimoAcceso"] = $ahora; 
             } 
}
elseif($_SESSION["tipo"]!="1") {
		header("Location: ../index.php");
	} 
?>