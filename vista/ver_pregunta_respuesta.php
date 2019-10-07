<?php
session_start();
	if($_SESSION["tipo"]=="2") 
	{
$id_preg=$_REQUEST[id_pregunta];		
include_once("../controlador/contro_clase_pregunta.php");
$pregunta=new clase_pregunta();
$pregunta->valores_clase_pregunta($id_preg);	
include_once("../controlador/contro_clase_respuesta.php");
$respuesta=new clase_respuesta();
$respuesta->valores_clase_respuesta_monitor($id_preg,$_SESSION["codigo"]);	
?>
<div class="box-body padding"> 
<form class="form-horizontal" action="../controlador/contro_crea_respuesta.php" method="post" data-validate="parsley">
							<input type="hidden" id="id_preg_res" name="id_preg_res" value="<?php echo $id_preg; ?>"/>
							<input type="hidden" id="cc_moni" name="cc_moni" value="<?php echo $_SESSION["codigo"]; ?>"/>
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
                                        	<label>Estudiante:</label> <?php echo $pregunta->estudiante; ?>
                                    </div>
                                    <?php if($pregunta->estado=="Sin Resolver"){?>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                        	<label >Respuesta</label>
                                            <textarea class="form-control" id="respuesta" name="respuesta" placeholder="Ingrese Respuesta" rows="3" data-required="true"><?php echo $respuesta->respuesta ?></textarea>
                                        </div>
                                    </div>
                                    <?php} 
									else{ ?>
									     <div class="form-group">
                                        <div class="col-xs-12">
                                        	<label >Respuesta</label>
                                            <textarea class="form-control" id="respuesta" name="respuesta" placeholder="Ingrese Respuesta" rows="3" data-required="true" readonly><?php echo $respuesta->respuesta ?></textarea>
                                        </div>
                                    </div>	
									<?	}?>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                        	<label >Valoracion</label> - <?php echo $respuesta->estrellas; ?> Estrellas
										<select id="estrellas" name="estrellas" style="width:15em;" required>
                                          <option value=""></option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                        </select>
                                        </div>
                                        <?php
										 if($respuesta->id_resp==$pregunta->resp_ele){ ?>
                                        <div class="col-xs-6">
                                        <br>
                                        <small class="label label-success"><i class="fa fa-check"></i> Respuesta Elejida como la Mejor</small>
                                        </div>
                                        <?php} ?>
                                    </div>
                                      <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                        <button type="reset" class="btn btn-danger">Cancelar</button>
                                    </div>
					  </form>
                            <br>        
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
elseif($_SESSION["tipo"]!="5") {
		header("Location: ../index.php");
	} 
?>