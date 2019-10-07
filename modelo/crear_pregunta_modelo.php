<?php
include_once("../modelo/conexion.php");
class crear_pregunta_modelo extends configuracion{
	private $conexion;		
	public function crear_preg($pregunta,$asig,$cc_est){	//Crea un reunion
	$this->conexion = parent::conectar();
	if(empty($pregunta)) {
	$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' Debes ingresar una Pregunta valida ';
	$errflag = true;
	}
	if(empty($asig)) {
	$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' Debes seleccionar una asignatura valida';
	$errflag = true;
	}
	if(empty($cc_est)) {
	$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' Error ID estudiante ';
	$errflag = true;
	}
	if($errflag) {
	$_SESSION['suceso'] = $errmsg_arr;
	$_SESSION["evento"] = "error";
	session_write_close();
	header("location: ../vista/registrar_pregunta.php");
	exit();
	}
	else{
	date_default_timezone_set('America/Bogota');
	$fecha_registro=date("Y-m-d");
	$estado="Sin Resolver";
  $ConsultaSQL = $this->conexion->prepare("INSERT INTO pregunta VALUES('',:a,'',:b,:c,:d,:e)");
  $ConsultaSQL ->bindParam(':a', $cc_est);
  $ConsultaSQL ->bindParam(':b', $asig);
  $ConsultaSQL ->bindParam(':c', $pregunta);
  $ConsultaSQL ->bindParam(':d', $estado);
  $ConsultaSQL ->bindParam(':e', $fecha_registro);
  $ConsultaSQL ->execute();
	$okmsg_arr[] = "<img src='../estilos/img/success.png'>".' Pregunta registrada con Éxito';
	$_SESSION["suceso"] = $okmsg_arr;
	$_SESSION["evento"] = "success"; 
	header("Location: ../vista/registrar_pregunta.php");				
	}
}
	
	
	
}
?>