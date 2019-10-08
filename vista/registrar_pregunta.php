<?php
session_start();
	if($_SESSION["tipo_usuario"]=="2") 
	{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estudiante/Monitor | Preguntas</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../estilos/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../estilos/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../estilos/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- daterange picker -->
        <link href="../estilos/css/datepicker.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../estilos/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Choseen -->
        <link href='../estilos/css/chosen.css' rel='stylesheet'>
        <!-- NotifIt -->
        <link href='../estilos/css/notifIt.css' rel='stylesheet'>
        <!-- Theme style -->
        <link href="../estilos/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../vista/estudiante.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Estudiante/Monitor
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION["nombres_usuario"]; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-udc">
                                    <img src="../estilos/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION["nombres_usuario"]; ?>  - Estudiante/Monitor
                                        <small>Usuario(a) desde <?php echo $newDate = date("M-Y", strtotime($_SESSION["fecha_registro"])); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="../vista/editar_info_admin.php" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../controlador/cerrar.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../estilos/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?php echo $_SESSION["nombre"]; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="../vista/estudiante.php">
                                <i class="fa fa-dashboard"></i><span>Inicio</span>
                            </a>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-comment"></i> <span>Preguntas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 <li class="active">
                            <a href="../vista/registrar_pregunta.php">
                                <i class="fa fa-angle-double-right"></i> <span>Realizar Preguntas</span>
                            </a>
                        </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-comments"></i> <span>Respuestas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 <li>
                            <a href="../vista/registrar_respuesta.php">
                                <i class="fa fa-angle-double-right"></i> <span>Responder Preguntas</span>
                            </a>
                        </li>
                            </ul>
                        </li>                        <li>
                            <a href="../controlador/cerrar.php">
                                <i class="fa  fa-sign-out"></i> <span>Cerrar Sesión</span>
                            </a>
                        </li> 
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Preguntas
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="active">Panel Inicial</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                                                     <!-- Main row -->
      <!-- Modal -->
   <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Registrar Pregunta</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="../controlador/contro_crea_pregunta.php" method="post" data-validate="parsley">
							<input type="hidden" id="cc_est" name="cc_est" value="<?php echo $_SESSION["codigo"]; ?>"/>
                            <div class="box-body">
							  <div class="form-group">
                                        <div class="col-xs-3">
                                        	<label >Fecha</label>
                                            <input type="text" class="form-control" value="<?php echo date("Y-M-d"); ?>"  disabled>
                                        </div>
                                    </div>	
							  <div class="form-group">
                                        <div class="col-xs-12">
                                        	<label >Pregunta</label>
                                            <textarea class="form-control" id="pregunta" name="pregunta" placeholder="Ingrese Pregunta" rows="3" data-required="true"></textarea>
                                        </div>
                                    </div>	
							  <div class="form-group">
                                        <div class="col-xs-3">
                                        	<label >Asignatura</label>
                                            <?php
									include_once("../controlador/contro_clase_asignatura.php");
									$lis_as=new controla_clase_asignatura();
									$lis_as->val_clase_asignatura_select($_SESSION["codigo"]);
										?>                                        
                                        </div>
                                    </div>	                            
                                    </div>
                                      <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                        <button type="reset" class="btn btn-danger">Cancelar</button>
                                    </div>
					  </form>
                       
        </div><!-- End of Modal body -->
        </div><!-- End of Modal content -->
        </div><!-- End of Modal dialog -->
    </div><!-- End of Modal -->
	 <div id="ver_pregunta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Respuestas</h4>
        </div>
        <div class="modal-body">
        <div id="modalContent_pregunta" style="display:none;">

        </div>                        
        </div><!-- End of Modal body -->
        </div><!-- End of Modal content -->
        </div><!-- End of Modal dialog -->
    </div><!-- End of Modal -->
                      <section class="col-lg-12 connectedSortable"> 
                            <!-- Box (with bar chart) -->
                            <div class="box box-danger" id="loading-example">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-success btn-sm" href="#myModal" data-toggle="modal" data-rel="tooltip" title="Agregar"><i class="fa fa-plus-square"></i></button>
                                        <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-cloud"></i>

                                    <h3 class="box-title">Preguntas</h3>
                                </div><!-- /.box-header -->
                              <div class="box-body padding"> 
                                  <?php
							require_once("../controlador/contro_clase_pregunta.php");	  
							$pregunta_l=new controla_clase_pregunta();
							$pregunta_l->val_clase_pregunta_listado($_SESSION["codigo"]);
							?>
                            
                                </div><!-- /.box-body -->
                                <div class="box-footer"><!-- /.row -->
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->        
       

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


               <!-- jQuery 1.7.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../estilos/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../estilos/js/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../estilos/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="../estilos/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- File Input -->
        <script src="../estilos/js/bootstrap.file-input.js" type="text/javascript"></script>
        <!-- select or dropdown enhancer -->
		<script src="../estilos/js/jquery.chosen.min.js"></script>
        <!-- Parsley-->
		<script src="../estilos/js/parsley.js"></script>
        <!-- NotifIt -->
    	<script type="text/javascript" src="../estilos/js/notifIt.js"></script>
        <!-- Confirmacion -->
		<script src="../estilos/js/jquery.confirm.js"></script> 
        <!-- AdminLTE App -->
        <script src="../estilos/js/AdminLTE/app.js" type="text/javascript"></script>
                <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
            });
			//chosen - improves select
			$('[data-rel="chosen"],[rel="chosen"]').chosen();
			</script>
            <script type="text/javascript">
			notif({
  			msg: "<?php foreach($_SESSION[suceso] as $msg) { echo  $msg; } ?>",
 		 	type: "<?php echo "$_SESSION[evento]"; ?>",
 		 	width: "all"
			});
			</script>    
            <script>
$("a[data-toggle=modal]").click(function() 
{   
    var essay_id = $(this).attr('id');

    $.ajax({
        cache: false,
        type: 'POST',
        url: '../vista/ver_pregunta.php',
        data: 'id_pregunta='+essay_id,
        success: function(data) 
        {
            $('#ver_pregunta').show();
            $('#modalContent_pregunta').show().html(data);
        }
    });
});
</script>      
    </body>
</html>
<?
	 $Listado="";  
	 $_SESSION["suceso"] = $Listado;   
	 $_SESSION["evento"] = "success";
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
elseif($_SESSION["tipo_usuario"]!="1") {
		header("Location: ../index.php");
	} 
?>