<?php 

   require_once "../app/validacionUser.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php  require_once 'head.php'; ?>
 <title>Dashboard</title>
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
                            <a class="tooltip-tip ajax-load" href="#" title="Gestionar Prestamos">
                                <i class="icon-document-edit"></i>
                                <span>Gestionar Prestamos</span>
                            </a>
                            <ul>
                                <li>
                                    <a class="tooltip-tip ajax-load" href="prestamoUser.php" title="Prestamos">
                                <i class="entypo-doc-text"></i>
                                <span>Prestamos</span>
                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="herramientaAsignadaUser.php" title="Herramienta Asignada">
                                <i class="entypo-doc-text"></i>
                                <span>Herramienta Asignada</span>
                            </a>
                        </li>
                            </ul>
                        </li>
                        <li>
                            <a class="tooltip-tip2 ajax-load" href="devolucionUser.php" title="Devoluciones">
                                <i class="icon-document-edit"></i>
                                <span>Devoluciones</span>
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

                    
                    <br>          
                <font color="#080000" face="arial, verdana, helvetica"> 

                </font>
                </font></td> 
            </tr> 
        </table>
    </div>
        <!--  END OF PAPER WRAP -->

</body>

</html>
