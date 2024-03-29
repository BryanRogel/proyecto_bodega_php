<?php
  require_once "../app/validacionUser.php";
  require_once '../controller/HerramientaAsignadaController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php  require_once 'head.php'; ?>
<title>Gestion de Herramientas Asignadas</title>
        <?php include_once '../src/head.php'; ?>
        <script type="text/javascript" src="../resources/js/herramientaAsignada.js"></script>
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
                            Hola Usuario <b class="caret"></b>
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
                            <a class="tooltip-tip " href="dashboardUser.php" title="Dashboard">
                                <i class="icon-document"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
             
                                <li>
                                    <a class="tooltip-tip ajax-load" href="prestamoUser.php" title="Prestamos">
                                <i class="entypo-doc-text"></i>
                                <span>Prestamos</span>
                            </a>
                        </li>
                         <li>
                            <a class="tooltip-tip2 ajax-load" href="devolucionUser.php" title="Devoluciones">
                                <i class="icon-document-edit"></i>
                                <span>Devolucion asignado</span>
                            </a>
                        </li>

                         <li>
                            <a class="tooltip-tip ajax-load" href="historialUser.php" title="Historial de prestamos">
                                <i class="entypo-newspaper"></i>
                                <span>Historial de prestamos</span>
                            </a>
                        </li>
                    </ul>

                     <ul class="topnav menu-left-nest">
                        <li>
                            <a style="border-left:0px solid!important;" class="title-menu-left">
                                <span>Reportes</span>
                            </a>
                        </li>
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

                <div class="col-md-9" style="margin-top: 30px;">
                    <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Gesti&oacute;n  de herramientas asignadas</p>
                    <p class="robo" style="font-weight: 300; font-size: 14px; height: 40px;"> </p>
                </div>
                <div class="col-md-3" style="margin-top: 30px;">
                    <div class="btn-group pull-right">
                       <a href="#" class="admin-menu-navi">
                       </a>
                    </div>
                </div>


                    
                    <br>          
                    <font color="#080000" face="arial, verdana, helvetica"> 
                        <div class="clearfix"></div>
                 <div class="col-md-12" style="margin-top: 10px;">
                    <table id="listado" class="mdl-data-table" cellspacing="1" width="100%">
                        <thead>
              <th>ID Prestamo</th>
                            <th>Codigo</th>
                            <th>Prestado</th>
              <th>Devuelto</th>
              <th>Herramienta</th>
              <th>Cantidad</th>
              <th>Estado</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        <?php 
                            $objHerramientaAsignada = new HerramientaAsignada();
                            $data = $objHerramientaAsignada->getAll();
                            if ($data!=false) {
                                foreach ($data as  $value) {
                                    
                                    echo "<tr>
                      <td>".$value['idPrestamo']."</td>
                                            <td>".$value['codigo']."</td>
                                            <td>".$value['prestamo']."</td>
                      <td>".$value['devolucion']."</td>
                      <td>".$value['nombre']."</td>
                      <td>".$value['cantidad']."</td>
                      <td>".$value['estadoPrestamo']."</td>
                                            <td>
                                                <input type='button' class='btn-info btn-sm prestamo' id='".$value['idPrestamo']."' value='Prestar'>
                        <input type='button' class='btn-success btn-sm devolverPrestamo' id='".$value['idPrestamo']."' value='Devolver'>
 
                                            </td>
                                          </tr>";
                                }
                            }

                         ?>
                            
                        </tbody>
                    </table>
                </div>
               </font>

                </font></td> 
            </tr> 
        </table>
    </div>
        <!--  END OF PAPER WRAP -->

</body>

</html>

<font color="#080000" face="arial, verdana, helvetica"> 
 <div class="modal fade modal" id="modalPrestamo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Prestar</span>
                </div>
                <div class="modal-body" >
                  
               Seguro?
               <form id="PrestarFrm">
          <input type="hidden" name="idUsuario" id="idPrestar">                 
               </form>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="btnPrestar" >Devolver</button>
                  </div>

              </div>         
            </div>
        </div> 
      
             <div class="modal fade modal" id="modalDevolverPrestamo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Devolver prestamo</span>
                </div>
                <div class="modal-body" >
                  
               Seguro?
               <form id="DevolverPrestamoFrm">
          <input type="hidden" name="idUsuario" id="idDevolver">                 
               </form>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="btnDevolver" >Devolver</button>
                  </div>

              </div>         
            </div>
        </div> 

        <div class="modal fade modal" id="modalEliminarPrestamo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header " Style="height:45px;">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <span class="robo" style="font-size: 20px;">Eliminar herramienta asignada</span>
                </div>
                <div class="modal-body" >
                  
               Seguro?
               <form id="DevolverPrestamoFrm">

              <input type="hidden" name="idPrestamo" id="idEliminar">                 
               </form>

                    </div>
                    <div>
                    <button class="btn btn-primary  btn-sm " id="btnEliminar" >Eliminar</button>
                  </div>

              </div>         

            </div>
        </div> 
<div class="infoPrestamo">
  <input type="hidden" name="idUser" id="idUserDev">
  <input type="hidden" name="idPrestamo" id="idPrestamoDev">
  <input type="hidden" name="cantidadDev" id="idCantidadDev">
  <input type="hidden" name="idHerramientaDev" id="idHerramientaDev">
</div>

</font>



