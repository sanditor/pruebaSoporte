<?php
include_once("../modelo/conexion.php");
	class clase_respuesta extends configuracion{
	private $conexion;
public function valores_clase_respuesta($id_resp){	//Clase Departamento
  $this->conexion = parent::conectar(); 
  $ConsultaSQL = $this->conexion->prepare("SELECT id_respuesta,respuesta, CONCAT(nombres_usuario,' ',apellidos_usuario) as monitor FROM respuesta
  LEFT JOIN usuario
  ON respuesta.cc_monitor=usuario.codigo_usuario
 WHERE id_respuesta = :id");
  $ConsultaSQL ->bindParam(':id', $id_resp, PDO::PARAM_INT);
  $ConsultaSQL ->execute();
  while ($row = $ConsultaSQL ->fetch(PDO::FETCH_ASSOC)) {
	$this->id_resp=$row["id_respuesta"];
	$this->respuesta=$row["respuesta"];
	$this->monitor=$row["monitor"];
	}
		}		
public function valores_clase_respuesta_monitor($id_preg,$cc_moni){	//Clase Departamento
  $this->conexion = parent::conectar(); 
  $ConsultaSQL = $this->conexion->prepare("SELECT
respuesta,n_estrellas,id_respuesta
FROM
	respuesta,pregunta_estrellas
WHERE
pregunta_estrellas.id_pregunta = respuesta.id_pregunta
AND
pregunta_estrellas.cc_monitor = respuesta.cc_monitor
AND
respuesta.cc_monitor = :id AND respuesta.id_pregunta = :id_preg");
  $ConsultaSQL ->bindParam(':id', $cc_moni, PDO::PARAM_INT);
  $ConsultaSQL ->bindParam(':id_preg', $id_preg, PDO::PARAM_INT);
  $ConsultaSQL ->execute();
  while ($row = $ConsultaSQL ->fetch(PDO::FETCH_ASSOC)) {
	$this->respuesta=$row["respuesta"];
	$this->estrellas=$row["n_estrellas"];
	$this->id_resp=$row["id_respuesta"];
	}
		}	
function listado_valores_respuestas($cc_estudiante){	//Listado Departamentos
$this->conexion = parent::conectar();
	$ConsultaSQL_lista=$this->conexion->prepare("SELECT pregunta.id_pregunta,CONCAT(nombres_usuario,' ',apellidos_usuario) AS estudiante,pregunta,estado_pregunta,nombre_asignatura,fecha_pregunta FROM pregunta
LEFT JOIN asignatura
ON pregunta.id_asignatura = asignatura.id_asignatura
LEFT JOIN asignatura_monitor
ON asignatura.id_asignatura = asignatura_monitor.id_asignatura
LEFT JOIN usuario
ON usuario.codigo_usuario = pregunta.cc_estudiante
WHERE
asignatura_monitor.cc_monitor = :id");
	$ConsultaSQL_lista ->bindParam(':id', $cc_estudiante);
	$ConsultaSQL_lista ->execute();
	$numero_filas = $ConsultaSQL_lista->rowCount();
	if(empty($numero_filas)){
		echo "No tienes preguntas disponibles por responder.";
		}
	else{
    $a=0;
  echo '<table id="example1" class="table table-bordered table-striped">
							  <thead>
								  <tr>
									  <th></th>
									  <th>Pregunta</th>
									  <th>Estudiante</th>
									  <th>Asignatura</th>
									  <th>Estado</th>
									  <th>Fecha</th>
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
$row["estudiante"],
$row["nombre_asignatura"],
"<span class='label label-$est'>
".$row["estado_pregunta"]."                                       
</span>",
$row["fecha_pregunta"],
"<button class='btn btn-primary' data-toggle='modal' href='#ver_pregunta_rep' data-rel='tooltip' title='Ver' id='".$row["id_pregunta"]."'><i class='fa fa-search'> </i></button>"); 
	 }                                                                       
	echo '</tbody></table>';
	}	
  }
function listado_valores_respuestas_preg($id_preg){	
$this->conexion = parent::conectar();
	$ConsultaSQL_lista=$this->conexion->prepare("SELECT respuesta.id_respuesta,respuesta,CONCAT(nombres_usuario,' ',apellidos_usuario) as monitor, n_estrellas, fecha_respuesta FROM respuesta
JOIN usuario
ON usuario.codigo_usuario = respuesta.cc_monitor
JOIN pregunta_estrellas
ON pregunta_estrellas.id_pregunta = respuesta.id_pregunta AND pregunta_estrellas.cc_monitor=respuesta.cc_monitor
WHERE respuesta.id_pregunta = :id");
	$ConsultaSQL_lista ->bindParam(':id', $id_preg);
	$ConsultaSQL_lista ->execute();
	$numero_filas = $ConsultaSQL_lista->rowCount();
	if(empty($numero_filas)){
				echo "<br><br>";
		echo "No tienes respuesta disponibles para elejir.";
		echo "<br><br>";
		}
	else{
    $a=0;
  echo '<table id="example1" class="table table-bordered table-striped">
							  <thead>
								  <tr>
									  <th>Mejor Respuesta</th>
									  <th>Respuesta</th>
									  <th>Monitor</th>
									  <th>Estrellas</th>
									  <th>Fecha</th>
								  </tr>
							  </thead>   
							  <tbody>';
while ($row = $ConsultaSQL_lista ->fetch(PDO::FETCH_ASSOC)) {
	$a++;
printf("<tr>
<td><center><strong>%s</strong></center></td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
</tr>",
"<input type='radio' value='".$row['id_respuesta']."' id='id_rep_ele' name='id_rep_ele' required/>",
$row["respuesta"],
$row["monitor"],
$row["n_estrellas"],
$row["fecha_respuesta"]); 
	 }                                                                       
	echo '</tbody></table>';
	}	
  }  	
}
?>