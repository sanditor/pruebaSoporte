<?php
session_start();
if ($_SESSION['tipo_usuario'] == "1") {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Administrador | Consultar</title>
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
            <a href="../vista/admin.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Administrador
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
                                <span><?php echo $_SESSION['nombres_usuario']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-udc">
                                    <img src="../estilos/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION["nombres_usuario"]; ?> - Administrador
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
                            <p>Hola, <?php echo $_SESSION['nombres_usuario']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="busqueda.php" method="POST" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="buscar" class="form-control" placeholder="Escriba nombre Art'iculo" />
                            <span class="input-group-btn">
                                <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="../vista/admin.php">
                                <i class="fa fa-dashboard"></i><span>Inicio</span>
                            </a>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-search"></i> <span>Reportes</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a href="consultar.php">
                                        <i class="fa fa-angle-double-right"></i> <span>Consulta</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
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
                        Inicio
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="active">Panel Inicial</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <section class="col-lg-12 connectedSortable">
                        <!-- Box (with bar chart) -->
                        <div class="box box-primary" id="loading-example">
                            <div class="box-header">
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
                                </div><!-- /. tools -->
                                <i class="fa fa-cloud"></i>

                                <h3 class="box-title">Busqueda Articulos</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body padding">

                                <div class="modal-body">
                                    <div class="box-body">
                                        <?php
                                            if ($_POST) {
                                                require_once('../modelo/conexion.php');
                                                $conexion = conectar();
                                                $buscar = $_POST['buscar'];
                                                $consulta = "SELECT id, descripcion_articulo, Fecha_articulo FROM articulos WHERE articulo_titulo LIKE CONCAT('%', :art, '%')";
                                                $stm = $conexion->prepare($consulta);
                                                $resultado = $stm->execute(array(':art' => $buscar));
                                                $filas = $stm->fetchAll(\PDO::FETCH_OBJ);
                                                if (count($filas)) {

                                                    foreach ($filas as $fila) {
                                        ?>
                                                        <div class="card" style="width: 30rem;">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $buscar ?></h5>
                                                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $fila->Fecha_articulo ?></h6>
                                                                <p class="card-text"><?php echo $fila->descripcion_articulo ?></p>
                                                            </div>
                                                        </div>
                                        <?php
                                                    }
                                                } else {
                                                    echo "El articulo no existe en la base de datos";
                                                }
                                            }
                                        ?>

                                    </div><!-- /.box-body -->
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

        </script>
    </body>

    </html>
<?php
    $Listado = "";
    $_SESSION["suceso"] = $Listado;
    $_SESSION["evento"] = "success";
    $fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
    if ($tiempo_transcurrido >= 2200) {
        session_destroy();
        header("Location: ../controlador/cerrar.php");
    } else {
        $_SESSION["ultimoAcceso"] = $ahora;
    }
} elseif ($_SESSION['tipo_usuario'] != "1") {
    header("Location: ../index.php");
}
?>