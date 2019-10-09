<?php
include_once("../modelo/conexion.php");
	class clase_pregunta extends configuracion{
	private $conexion;
public function valores_clase_pregunta($id_preg){	//Clase Departamento
  $this->conexion = parent::conectar(); 
  $ConsultaSQL = $this->conexion->prepare("SELECT id_respuesta_selec,nombre_asignatura,CONCAT(nombres_usuario,' ',apellidos_usuario) AS estudiante,fecha_pregunta,estado_pregunta, pregunta FROM pregunta
LEFT JOIN asignatura
ON pregunta.id_asignatura = asignatura.id_asignatura
LEFT JOIN usuario
ON pregunta.cc_estudiante = usuario.codigo_usuario
WHERE pregunta.id_pregunta =  :id");
  $ConsultaSQL ->bindParam(':id', $id_preg, PDO::PARAM_INT);
  $ConsultaSQL ->execute();
  while ($row = $ConsultaSQL ->fetch(PDO::FETCH_ASSOC)) {
	$this->estado=$row["estado_pregunta"];
	$this->pregunta=$row["pregunta"];
	$this->asignatura=$row["nombre_asignatura"];
	$this->estudiante=$row["estudiante"];
	$this->fecha=$row["fecha_pregunta"];
	$this->resp_ele=$row["id_respuesta_selec"];
	}
		}
function listado_valores_preguntas($cc_estudiante){	//Listado Departamentos
$this->conexion = parent::conectar();
	$ConsultaSQL_lista=$this->conexion->prepare("SELECT pregunta.id_pregunta,pregunta, nombre_asignatura,estado_pregunta, fecha_pregunta, COUNT(id_respuesta) AS respuestas FROM pregunta
	LEFT JOIN asignatura
	ON asignatura.id_asignatura=pregunta.id_asignatura
  LEFT JOIN respuesta
  ON respuesta.id_pregunta = pregunta.id_pregunta
  WHERE cc_estudiante = :id
GROUP BY pregunta.id_pregunta");
	$ConsultaSQL_lista ->bindParam(':id', $cc_estudiante);
	$ConsultaSQL_lista ->execute();
	$numero_filas = $ConsultaSQL_lista->rowCount();
	if(empty($numero_filas)){
		echo "No realizado ninguna pregunta.";
		}
	else{
    $a=0;
  echo '<table id="example1" class="table table-bordered table-striped">
							  <thead>
								  <tr>
									  <th></th>
									  <th>Pregunta</th>
									  <th>Asignatura</th>
									  <th>Estado</th>
									  <th>Fecha</th>
									  <th>N° Respuestas</th>
									  <th></th>
								  </tr>
							  </thead>   
							  <tbody>';
while ($row = $ConsultaSQL_lista ->fetch(PDO::FETCH_ASSOC)) {
	$a++;
	if($row["estado_pregunta"]=='Sin Resolver'){$est="warning";}
	else{$est='success';}
printf("<tr>
<td><center><strong>%s</strong></center></td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
</tr>",
$a,
$row["pregunta"],
$row["nombre_asignatura"],
"<span class='label label-$est'>
".$row["estado_pregunta"]."                                       
</span>",
$row["fecha_pregunta"],
$row["respuestas"],
"<a class='btn btn-primary' data-toggle='modal' href='#ver_pregunta' data-rel='tooltip' title='Ver' id='".$row["id_pregunta"]."'><i class='fa fa-search'> </i></a>"); 
	 }                                                                       
	echo '</tbody></table>';
	}	
  }	
function listado_reporte($fecha_ini,$fecha_fin){	//Listado Reporte
$this->conexion = parent::conectar();
	$ConsultaSQL_lista=$this->conexion->prepare("SELECT
	CONCAT(nombres_usuario,' ',apellidos_usuario) AS estudiante, IFNULL(SUM(pregunta_estrellas.n_estrellas),0) AS total_estrellas
FROM
	pregunta
LEFT JOIN pregunta_estrellas
ON pregunta_estrellas.id_pregunta =  pregunta.id_pregunta
LEFT JOIN usuario
ON pregunta.cc_estudiante = usuario.codigo_usuario
WHERE
	fecha_pregunta BETWEEN :a
AND :b
GROUP BY codigo_usuario
ORDER BY total_estrellas DESC");
	$ConsultaSQL_lista ->bindParam(':a', $fecha_ini);
	$ConsultaSQL_lista ->bindParam(':b', $fecha_fin);

	$ConsultaSQL_lista ->execute();
	$numero_filas = $ConsultaSQL_lista->rowCount();
	if(empty($numero_filas)){
		echo "No existen datos entre las fechas.";
		}
	else{
    $a=0;
  echo '<table id="example1" class="table table-bordered table-striped">
							  <thead>
								  <tr>
									  <th></th>
									  <th>Estudiante</th>
									  <th>Total de Estrellas</th>
								  </tr>
							  </thead>   
							  <tbody>';
while ($row = $ConsultaSQL_lista ->fetch(PDO::FETCH_ASSOC)) {
	$a++;
printf("<tr>
<td><center><strong>%s</strong></center></td>
<td>%s</td>
<td>%s</td>
</tr>",
$a,
$row["estudiante"],
$row["total_estrellas"]); 
	 }                                                                       
	echo '</tbody></table>';
	}	
  }	  
}
?>