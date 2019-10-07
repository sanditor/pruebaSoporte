<?php
abstract class configuracion {
	
	protected $datahost;
	protected function conectar(){
		
		$controlador = "mysql"; //controlador (MySQL la mayoría de las veces)
		$servidor = "localhost"; //servidor como localhost o 127.0.0.1 usar este ultimo cuando el puerto sea diferente
		$puerto = "3306";
		$basedatos = "dbtest1"; 
		$usuario = "usdbtest1";
		$pass = "LsCMH2Hw";//nombre de la base de datos

		try{
			return $this->datahost = new PDO (
										"mysql:host=$servidor;port=$puerto;dbname=$basedatos",
										$usuario, //usuario
										$pass, //constrasena
										array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
										);
			}
		catch(PDOException $e){
				echo "Error en la conexión: ".$e->getMessage();
			}
	}
}
?>