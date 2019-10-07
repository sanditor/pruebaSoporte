<?php

include("../modelo/conexion.php");
class ValidarEntrada extends configuracion{
	private $conexion;	
	
public function validar($cod, $cla){
  $this->conexion = parent::conectar();
  $esta="Habilitado";
  $ConsultaSQL = $this->conexion->prepare("SELECT * FROM usuario WHERE clave_usuario = md5(:pass) AND codigo_usuario = :id AND estado_usuario=:estado");
  $ConsultaSQL ->bindParam(':id', $cod);
  $ConsultaSQL ->bindParam(':pass', $cla);
  $ConsultaSQL ->bindParam(':estado', $esta);
  $ConsultaSQL ->execute();
  while ($row = $ConsultaSQL ->fetch(PDO::FETCH_ASSOC)) {
                  $id=$row['id_usuario'];
				  $codigo=$row['codigo_usuario'];
                  $nombres=$row['nombres_usuario'];
                  $apellidos=$row['apellidos_usuario'];
		 		  $tipo=$row['tipo_usuario'];
				  $estado=$row['estado_usuario'];
				  $fecha=$row['fecha_registro_usuario'];
                }

		$_SESSION['num']=$id;
		$_SESSION['codigo']=$codigo;
		$_SESSION['nombre']=$nombres;
		$_SESSION['apellido']=$apellidos;
		$_SESSION['tipo']=$tipo;
		$_SESSION['fecha_registro']=$fecha;
		$_SESSION['estado']=$estado;
		$_SESSION['ultimoAcceso']=date("Y-n-j H:i:s"); 
	
		if($tipo=="1"){
			header("Location: ../vista/admin.php");
		}	
		elseif($tipo=="2"){
			header("Location: ../vista/estudiante.php");
		}			
		else{
			$errmsg_arr[] = "<img src='../estilos/img/error.png'>".' Usuario y Contraseña no encontrados';
			$errflag = true;
		}
		if($errflag) {
			$_SESSION['suceso_r'] = $errmsg_arr;
			$_SESSION["evento_r"] = "error"; 
			header("location: ../vista/index_reg.php");
			exit();
			}
    }
}
?>