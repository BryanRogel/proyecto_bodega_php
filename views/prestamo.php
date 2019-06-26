<?php 
require_once "../app/validacionAdmin.php";
$_SESSION['detalle'] = array();

require_once '../model/Conexion.php';
require_once '../model/Prestamo.php';

$objPrestamo = new Prestamo();
$objEmpleado = new Prestamo();
$resultado_prestamo = $objPrestamo->get();
$resultado_empleado = $objEmpleado->get();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php  require_once 'head.php'; ?>
 <title>Prestamos</title>

    <!-- Bootstrap -->
    <link href="../libs/css/bootstrap.css" rel="stylesheet">
    <script src="../libs/js/jquery-1.8.3.min.js"></script>
    
    <script type="text/javascript" src="../libs/js/ajaxPrestamo.js"></script>
    
     <!-- Alertity -->
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- TOP NAVBAR -->
    <nav role="navigation" class="navbar navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="entypo-menu"></span>
                </button>
                <div id="logo-mobile" class="visible-xs">
                    <h1>Menu
                    </h1>
                </div>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                <ul style="margin-right:0;" class="nav navbar-nav navbar-right">
                    <li>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Hola Administrador <b class="caret"></b>
                        </a>
                        <ul style="margin-top:14px;" role="menu" class="dropdown-setting dropdown-menu">
                            <li>
                                <a href="../controller/logout.php">
                                    <span class="entypo-logout"></span>&#160;&#160;Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- /END OF TOP NAVBAR -->

   <div id="skin-select">
        <div id="logo">
            <h1>Menu
            </h1>
        </div>

        <a id="toggle">
            <span class="entypo-menu"></span>
        </a>
   <div class="dark">
            <form action="#">
                <span>
                    <input type="text" name="search" value="" class="search rounded id_search" placeholder="Buscar en el menu..." autofocus />
                </span>
            </form>
        </div>

        <div class="search-hover">
            <form id="demo-2">
                <input type="search" placeholder="Buscar en el menu..." class="id_search">
            </form>
        </div>


        <div class="search-hover">
            <form id="demo-2">
                <input type="search" placeholder="Buscar en el menu..." class="id_search">
            </form>
        </div>




        <div class="skin-part">
            <div id="tree-wrap">
                <div class="side-bar">
                        <ul class="topnav menu-left-nest">
                        <li>
                            <a style="border-left:0px solid!important;" class="title-menu-left">
                                <span >Gestion</span>
                       </a>
                        </li>

                        <li>
                            <a class="tooltip-tip ajax-load" href="dashboard.php" title="Dashboard">
                                <i class="icon-window"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="herramientaAsignada.php" title="Asignar herramientas">
                                <i class="entypo-doc-text"></i>
                                <span>Asignar herramientas</span>
                            </a>
                        </li>
                       <li>
                            <a class="tooltip-tip2 ajax-load" href="devolucion.php" title="Devoluciones">
                                <i class="icon-document-edit"></i>
                                <span>Devoluciones</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="herramientaAsignadaCrud.php" title="Herramienta Asignada">
                                <i class="entypo-doc-text"></i>
                                <span>Herramienta Asignada</span>
                            </a>
                        </li>
                         <li>
                            <a class="tooltip-tip ajax-load" href="historial.php" title="Historial de prestamos">
                                <i class="entypo-newspaper"></i>
                                <span>Historial de prestamos</span>
                            </a>
                        </li>
                    </ul>

                                          <ul class="topnav menu-left-nest">
                        <li>
                            <a style="border-left:0px solid!important;" class="title-menu-left">
                                <span>Administracion</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="crudUsuarios.php" title="Usuarios">
                                <i class="icon-lock"></i>
                                <span>Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="crudPersonal.php" title="Personal">
                                <i class="icon-document-edit"></i>
                                <span>Personal</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="crudHerramientas.php" title="Herramientas">
                                <i class="icon-view-thumb"></i>
                                <span>Herramientas</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip " href="crudCategoria.php" title="Categorias">
                                <i class="icon-document"></i>
                                <span>Categorias</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip" href="#" title="Reportes">
                                <i class="icon-document-new"></i>
                                <span>Reportes</span>
                            </a>
                            <ul>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="reportes/empleadosActivos.php" target="_blank" title="Empleados activos"><i class="icon-media-record"></i><span>Empleados activos</span></a>
                                </li>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="reportes/herramientaAsignada.php" target="_blank" title="Herramientas Asignadas"><i class="icon-user"></i><span>Herramientas Asignadas</span></a>
                                </li>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="reportes/herramientasActivas.php" target="_blank" title="Herramientas activas"><i class="entypo-newspaper"></i><span>Herramientas activas</span></a>
                                </li>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="reportes/prestamosDevueltos.php" target="_blank" title="Prestamos devueltos"><i class="icon-document-edit"></i><span>Prestamos devueltos</span></a>
                                </li>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="reportes/prestamosRealizados.php" target="_blank" title="Prestamos Realizados"><i class="entypo-clock"></i><span>Prestamos Realizados</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
               
                </div>
            </div>
        </div>
    </div>
    <!-- END OF SIDE MENU -->

    <!--  PAPER WRAP -->
    <div class="wrap-fluid">
       <table width="97%" cellspacing="1" cellpadding="3" border="0" bgcolor="#1E679A"> 
            <tr> 
               <td><font color="#FFFFFF" face="arial, verdana, helvetica">
                    <div class="page-header">
                        <h1>Prestamos</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4">  
                            <div>Empleado:
                            <select name="cbo_empleado" id="cbo_empleado" class="col-md-2 form-control">
                                <option value="0">Seleccione el codigo de empleado</option>
                                <?php foreach($resultado_empleado as $empleado):?>
                                    <option value="<?php echo $empleado['id']?>"><?php echo $empleado['codigo']?></option>
                                <?php endforeach;?>
                            </select>
                            </div>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-md-4">  
                            <div>Herramienta:
                              <select id="herramienta" name="herramienta" class="form-control">
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>Cantidad:
                             <select id="cantidad" name="cantidad" class="form-control">
                             </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div style="margin-top: 19px;">
                            <button type="button" class="btn btn-success btn-agregar-herramienta">Agregar</button>
                            </div>
                        </div>
                    </div>

                     <script type="text/javascript" src="../libs/js/cargaSelect.js"></script>
                    
                    <br>          
                                    <font color="#080000" face="arial, verdana, helvetica"> 
                                        <div class="panel panel-info">
                         <div class="panel-heading">
                            <h3 class="panel-title">herramientas</h3>
                          </div>
                        <div class="panel-body detalle-herramienta">
                            <?php if(count($_SESSION['detalle'])>0){?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach($_SESSION['detalle'] as $k => $detalle){ 
                                        ?>
                                        <tr>
                                            <td><?php echo $detalle['herramienta'];?></td>
                                            <td><?php echo $detalle['cantidad'];?></td>
                                            <td><button type="button" class="btn btn-sm btn-danger eliminar-herramienta" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            <?php }else{?>
                            <div class="panel-body"> No hay herramientas agregadas</div>
                            <?php }?>
                        </div>
                    </div>
               </font>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-sm btn-default guardar-prestamo" id="<?php echo $detalle['id'];?>">Guardar prestamo</button>
                        </div>
                    </div>
                </font></td> 
            </tr> 
        </table>
    </div>
        <!--  END OF PAPER WRAP -->

</body>

</html>
