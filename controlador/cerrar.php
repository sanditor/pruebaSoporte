<?php
session_start();
	
	// dormir durante 125 segundo
	sleep(120);	
	session_unset(); 
	session_destroy();
	
	header("Location: ../index.php?cerrar='Exitocerrar'");
?>