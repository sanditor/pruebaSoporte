<?php
class configuracion {
	
	public $datahost;
	public function conectar(){
		
		$controlador = "mysql"; //controlador (MySQL la mayoría de las veces)
		$servidor = "localhost"; //servidor como localhost o 127.0.0.1 usar este ultimo cuando el puerto sea diferente
		$puerto = "3306";
		$basedatos = "dbtest1"; 
		$usuario = "root";
		$pass = "";//nombre de la base de datos

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
/* class configuracion {

	public $host = "localhost";
	public $dbname = "dbtest1";
	public $user = "root";
	public $password = "";
	public $conexion = null;

	public function conectar(){
		try{
			$conexion = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->password);
			$conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//reporte de errores y excepciones
			$conexion->exec("SET CHARACTER SET utf8");
			return $conexion;
			
		}catch(Exception $e){
			echo "Error ".$e->getMessage();
		}finally{
			//vaciar memoria
			$this->conexion = null;
		}
	}
} */

?>