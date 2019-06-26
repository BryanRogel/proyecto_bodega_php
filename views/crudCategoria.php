<?php 
require_once "../app/validacionAdmin.php";
 
require_once '../controller/CategoriaController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php  require_once 'head.php'; ?>
<title>Categoria</title>
        <?php include_once '../src/head.php'; ?>
        <script type="text/javascript" src="../resources/js/categoria.js"></script>
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
                            <a class="tooltip-tip ajax-load" href="#" title="Gestionar Prestamos">
                                <i class="icon-document-edit"></i>
                                <span>Gestionar Prestamos</span>
                            </a>
                            <ul>
                                <li>
                                    <a class="tooltip-tip ajax-load" href="prestamo.php" title="Prestamos">
                                <i class="entypo-doc-text"></i>
                                <span>Prestamos</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="herramientaAsignada.php" title="Asignar herramientas">
                                <i class="entypo-doc-text"></i>
                                <span>Asignar herramientas</span>
                            </a>
                        </li>
                            </ul>
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
       <table width="100%" cellspacing="1" cellpadding="3" border="0" bgcolor="#1E679A"> 
         <tr> 
               <td><font color="#FFFFFF" face="arial, verdana, helvetica">
                <div class="col-md-9" style="margin-top: 30px;">
                    <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Categoria</p>
                    <p class="robo" style="font-weight: 300; font-size: 14px; height: 40px;">Gesti&oacute;n  de categorias</p>
                </div>
                <div class="col-md-3" style="margin-top: 30px;">
                    <div class="btn-group pull-right">
                       <a href="#" class="admin-menu-navi">
                          <button class="btn btn-primary  btn-sm " style="margin-left: 5px;" id="nuevaCategoria">Nuevo</button>
                       </a>
                    </div>
                </div>
                <div class="clearfix"></div>
         <font color="#080000" face="arial, verdana, helvetica"> 
             <div class="col-md-12" style="margin-top: 10px;">
                    <table id="listadoCategorias" class="mdl-data-table" cellspacing="1" width="100%">
                        <thead>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        <?php 
                            $objCategoria = new Categoria();
                            $data = $objCategoria->getAll();
                            if ($data!=false) {
                                foreach ($data as  $value) {
                                    
                                    echo "<tr>
                                            <td>".$value['nombre']."</td>
                                            <td>
                                                <input type='button' class='btn-success btn-sm editarCategoria' id='".$value['id']."' value='Editar'>
                                                <input type='button' class='btn-danger btn-sm eliminarCategoria' id='".$value['id']."' value='Eliminar'>
                                            </td>
                                          </tr>";
                                }
                            }

                         ?>
                            
                        </tbody>
                    </table>
                </div>
                                        
                </font></td> 
            </tr> 
        </table>
    </div>
        <!--  END OF PAPER WRAP -->

         <!-- MAIN EFFECT -->
        <script type="text/javascript" src="assets/js/preloader.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>


</body>

</html>

<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade modal" id="modalIngresoCategoria" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Agregar Categoria</span>
                </div>
                <div class="modal-body" >
                    
                      <div class="row" id="infoCategoria">
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                                 <div class="form-group required">
                                     <label for="nombreCiclo" class="control-label">Nombre:</label>
                                     <input type="Nombre" class="form-control requerido"  
                                            placeholder="Nombre" name="nombre" id="nombre">
                                 </div>
                          </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="agregarCategoria" >Guardar</button>
                  </div>

              </div>         

            </div>
            </div> 
        </div> 
</div> 
</font>

<!-- Modal de unsercion de categoria -->
<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade modal" id="modalModificacionCategoria" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Modificar Categoria</span>
                </div>
                <div class="modal-body" >
                    
                      <div class="row" id="infoCategoriaEdit">
                          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                                 <div class="form-group required">
                                     <label for="nombreCiclo" class="control-label">Nombre</label>
                                     <input type="hidden" name="idCategoria" id="idCate">
                                     <input type="categoria" class="form-control requerido"  
                                            placeholder="Nombre" name="nombre" id="nombreEdit">
                                 </div>
                          </div>
                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="ModificarCategoria" >Guardar Cambios</button>
                  </div>

              </div>         

            </div>
        </div> 
</div> 
</font>    

<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade modal" id="modalEliminarCategoria" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Eliminar categoria</span>
                </div>
                <div class="modal-body" >
                    
               Seguro?
               <form id="eliminarcategoriaFrm">
                    <input type="hidden" name="idCategoria" id="idEliminarCategoria">                   
               </form>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="btnEliminarCategoria" >Eliminar</button>
                  </div>

              </div>         
 
            </div>
        </div> 
    </font>


