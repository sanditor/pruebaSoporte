<?php
session_start();
	if($_SESSION["tipo_usuario"]=="2") 
	{
$id_preg=$_REQUEST[id_pregunta];		
include_once("../controlador/contro_clase_pregunta.php");
$pregunta=new clase_pregunta();
$pregunta->valores_clase_pregunta($id_preg);	
include_once("../controlador/contro_clase_respuesta.php");
$respuesta=new clase_respuesta();
$respuesta->valores_clase_respuesta_monitor($id_preg,$_SESSION["codigo"]);	
$respuesta_sele=new clase_respuesta();
$respuesta_sele->valores_clase_respuesta($pregunta->resp_ele);	
?>
<div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Pregunta</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Respuestas</a></li>
                                </ul>
                                <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
<div class="box-body padding"> 
<form class="form-horizontal">
                            <div class="box-body">
							  <div class="form-group">
                                        <div class="col-xs-6">
                                        	<label>Fecha</label>&nbsp;&nbsp;&nbsp;<?php echo $pregunta->fecha; ?>
                                        </div>
                                        <div class="col-xs-6">
                                        	<label>Asignatura</label>&nbsp;&nbsp;&nbsp;<?php echo $pregunta->asignatura; ?>
                                        </div>                                    
                                        </div>	
							  <div class="form-group">
                                        <div class="col-xs-12">
                                        	<label>Pregunta<br></label>
                                            <p align="justify"><?php  echo $pregunta->pregunta; ?></p>
                                        </div>
                                    </div>	
                                    <div class="form-group">
                                    <div class="col-xs-12">
                                        	<label>Estudiante:</label> <?php echo $pregunta->estudiante; ?>
                                    </div></div>
                                    <?php if($pregunta->resp_ele!=0) {?>
                                    <br><br>
                                    <center>
                                    <small class="label label-success"><i class="fa fa-check"></i> Respuesta Elejida</small>
                                    </center><br>
                                <div class="form-group">
                                        <div class="col-xs-12">
                                        	<label>Respuesta<br></label>
                                            <p align="justify"><?php  echo $respuesta_sele->respuesta; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="col-xs-12">
                                        	<label>Monitor:</label> <?php echo $respuesta_sele->monitor; ?>
                                    </div>
                                    </div>                               
                                    <?php} ?>
                                     </div>
					  </form>
                            <br>        
                            </div>  
                                                 
                                        </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <form action="../controlador/contro_elejir_respuesta.php" method="post">
                                        <input type="hidden" name="id_preg" id="id_preg" value="<?php echo $id_preg ?>"/>
										<?php				
										require_once("../controlador/contro_clase_respuesta.php");	  
										$interaccion_la=new controla_clase_respuesta();
										$interaccion_la->val_clase_respuesta_listado_preg($id_preg);
										?>  
                                         <div class="box-footer">
                                         <center>
                                        <button type="submit" class="btn btn-success">Elejir</button>
                                        <button type="reset" class="btn btn-danger">Cancelar</button>
                                   		 </center>
                                         </div>  
                                        </form>                              
                                    </div><!-- /.tab-pane -->
                                     </div><!-- nav-tabs-custom -->
<div class="box-body padding">    
                            </div>  
                            <script>
							$('#estrellas').chosen();
							</script>                  
<?
	 $fechaGuardada = $_SESSION["ultimoAcceso"]; 
     $ahora = date("Y-n-j H:i:s");
     $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));	
 if($tiempo_transcurrido >= 2200) {	
	    session_destroy();
        header("Location: ../controlador/cerrar.php"); 
	     }	
	    else { 
    $_SESSION["ultimoAcceso"] = $ahora; 
             } 
}
elseif($_SESSION["tipo_usuario"]!="5") {
		header("Location: ../index.php");
	} 
?>