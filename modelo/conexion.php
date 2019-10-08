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
/* class configuracion {

	private $host = "localhost";
	private $dbname = "dbtest1";
	private $user = "usdbtest1";
	private $password = "LsCMH2Hw";
	private $conexion = null;

	public function conectar(){
		try{
			$this->conexion = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->password);
			$this->conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//reporte de errores y excepciones
			$this->conexion->exec("SET CHARACTER SET utf8");
			return $this->conexion;
			
		}catch(Exception $e){
			echo "Error ".$e->getMessage();
		}finally{
			//vaciar memoria
			$this->conexion = null;
		}
	}	
} */

?>