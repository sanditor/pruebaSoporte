<?php
include_once("../modelo/conexion.php");
	class clase_asignatura extends configuracion{
	private $conexion;	
	function valores_clase_asignatura_est_lista($cc_estudiante){	//Lista id Departamento
	$this->conexion = parent::conectar();
	$ConsultaSQL_l=$this->conexion->prepare("SELECT
  asignatura.id_asignatura,asignatura.nombre_asignatura 
FROM
	asignatura
LEFT JOIN
asignatura_estudiante
ON asignatura_estudiante.id_asignatura = asignatura.id_asignatura
LEFT JOIN
estudiante
ON estudiante.cc_estudiante = asignatura_estudiante.cc_estudiante
WHERE estudiante.cc_estudiante = :id");
	$ConsultaSQL_l ->bindParam(':id', $cc_estudiante);
	$ConsultaSQL_l->execute();
echo "<select name='id_asig' id='id_asig' data-rel='chosen' data-required='true' style='width:20em;'>";
echo "<option value=''></option>";
while ($row = $ConsultaSQL_l ->fetch(PDO::FETCH_ASSOC)) {
echo "<option value='".$row['id_asignatura']."'>".$row['nombre_asignatura']."</option>";
}
echo "</select>";	
		}
}
?>