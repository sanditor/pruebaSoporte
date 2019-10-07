<?php
include_once("../modelo/conexion.php");
class crear_respuesta_modelo extends configuracion{
	private $conexion;		
	public function crear_rep($respuesta,$estre,$id_preg,$cc_mon){	//Crea un reunion
	$this->conexion = parent::conectar();
	if(empty($respuesta)) {
	$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' Debes ingresar una Respuesta valida ';
	$errflag = true;
	}
	if(empty($estre)) {
	$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' Debes seleccionar una valoracion valida';
	$errflag = true;
	}
	if(empty($id_preg)) {
	$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' Error ID respuesta ';
	$errflag = true;
	}
	if(empty($cc_mon)) {
	$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' Error ID Monitor ';
	$errflag = true;
	}
	if($errflag) {
	$_SESSION['suceso'] = $errmsg_arr;
	$_SESSION["evento"] = "error";
	session_write_close();
	header("location: ../vista/registrar_respuesta.php");
	exit();
	}
	else{
	date_default_timezone_set('America/Bogota');
	$fecha_registro=date("Y-m-d");
  $ConsultaSQL = $this->conexion->prepare("INSERT INTO respuesta (id_pregunta,cc_monitor,respuesta,fecha_respuesta) VALUES (:a,:b,:c,:d) ON DUPLICATE KEY UPDATE respuesta = :c,fecha_respuesta=:d");
  $ConsultaSQL ->bindParam(':a', $id_preg);
  $ConsultaSQL ->bindParam(':b', $cc_mon);
  $ConsultaSQL ->bindParam(':c', $respuesta);
  $ConsultaSQL ->bindParam(':d', $fecha_registro);
  $ConsultaSQL ->execute();
  $ConsultaSQL_E = $this->conexion->prepare("INSERT INTO pregunta_estrellas (cc_monitor,id_pregunta,n_estrellas) VALUES(:a,:b,:c) ON DUPLICATE KEY UPDATE n_estrellas = :c");
  $ConsultaSQL_E ->bindParam(':a', $cc_mon);
  $ConsultaSQL_E ->bindParam(':b', $id_preg);
  $ConsultaSQL_E ->bindParam(':c', $estre);
  $ConsultaSQL_E ->execute();
	$okmsg_arr[] = "<img src='../estilos/img/success.png'>".' Respuesta registrada con Éxito';
	$_SESSION["suceso"] = $okmsg_arr;
	$_SESSION["evento"] = "success"; 
	header("Location: ../vista/registrar_respuesta.php");				
	}
}
	
public function act_rep($id_rep_ele,$id_preg){	//Actualizar 
	$this->conexion = parent::conectar();
	if(empty($id_preg)) {
	$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' ID Pregunta Invalido ';
	$errflag = true;
	}
	if(empty($id_rep_ele)) {
	$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' ID Respuesta Invalido ';
	$errflag = true;
	}
	else{
		date_default_timezone_set('America/Bogota');
		$fecha_registro=date("Y-m-d");
		$estado_c="Resuelta";
	$ConsultaSQL = $this->conexion->prepare("
	UPDATE pregunta SET 
	id_respuesta_selec = :b,
	estado_pregunta = :c WHERE id_pregunta = :a");
	$ConsultaSQL ->bindParam(':a', $id_preg, PDO::PARAM_INT);
	$ConsultaSQL ->bindParam(':b', $id_rep_ele);
	$ConsultaSQL ->bindParam(':c', $estado_c);
	$ConsultaSQL ->execute();
	$okmsg_arr[] = "<img src='../estilos/img/success.png'>".' Respuesta Elejida con Éxito';
	$_SESSION["suceso"] = $okmsg_arr;
	$_SESSION["evento"] = 'success';
	header("Location: ../vista/registrar_pregunta.php");				
		}
		  }	
	
}
?>