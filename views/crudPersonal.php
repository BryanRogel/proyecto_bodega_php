<?php
require_once "../app/validacionAdmin.php";
 require_once '../controller/personalController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php  require_once 'head.php'; ?>
<title>Personal</title>

  <?php include_once '../src/head.php'; ?>

  <script type="text/javascript" src="../resources/js/Personal.js"></script>
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

    <!-- SIDE MENU -->
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
                    <input type="text" name="search" value="" class="search rounded id_search" placeholder="Buscar en el Menu..." autofocus />
                </span>
            </form>
        </div>

        <div class="search-hover">
            <form id="demo-2">
                <input type="search" placeholder="Buscar en el Menu..." class="id_search">
            </form>
        </div>


        <div class="search-hover">
            <form id="demo-2">
                <input type="search" placeholder="Buscar en el Menu..." class="id_search">
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
       <table width="100%" cellspacing="1" cellpadding="3" border="0" bgcolor="#1E679A"> 
            <tr> 
               <td><font color="#FFFFFF" face="arial, verdana, helvetica">
                    <div class="col-md-9" style="margin-top: 30px;">
                    <p class="robo" style="font-weight: 300; margin-bottom: 0px; font-size: 30px;">Personal</p>
                    <p class="robo" style="font-weight: 300; font-size: 14px; height: 40px;">Gestion de Personal</p>
                  </div>
                  <div class="col-md-3" style="margin-top: 30px;">
                   <div class="btn-group pull-right">
                    <a href="#" class="admin-menu-navi">
                     <button class="btn btn-primary  btn-sm " style="margin-left: 5px;" id="nuevaPersonal">Nuevo</button>
                   </a>
                 </div>
               </div>
              <br>          
                <font color="#080000" face="arial, verdana, helvetica">
                   <div class="clearfix"></div>
                     <div class="col-md-12" style="margin-top: 10px;">
                       <table id="listadoPersonal" class="mdl-data-table" cellspacing="1" width="100%">
                         <thead>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Genero</th>
                          <th>Fecha Registro</th>
                          <th>Fecha de Ingreso</th>
                          <th>Acciones</th>
                        </thead>
                        <tbody>
                         <?php 
                         $objPersonal = new Personal();
                         $data = $objPersonal->getAll();
                         if ($data!=false) {
                           foreach ($data as  $value) {

                            echo "<tr>
                            <td>".$value['codigo']."</td>
                            <td>".$value['nombre']."</td>
                            <td>".$value['apellido']."</td>
                            <td>".$value['genero']."</td>
                            <td>".$value['fecha_registro']."</td>
                            <td>".$value['ingreso']."</td>
                            <td>
                            <input type='button' class='btn-success btn-sm editarPersonal' id='".$value['id']."' value='Editar'>
                            <input type='button' class='btn-danger btn-sm eliminarPersonal' id='".$value['id']."' value='Eliminar'>
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
<div class="modal fade modal" id="modalNuevaPersonal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header " Style="height:45px;">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
        <span class="robo" style="font-size: 20px;">Agregar Persona</span>
      </div>
      <div class="modal-body" >
<form>
        <div class="row" id="infoPersonal">
          <div class="form-column col-md-4 col-sm-4 col-xs-4">
          <div class="form-group required" id="fcodigo">
            <label for="codigo" class="control-label">Codigo</label>            
            <input type="codigo"  name="codigo" class="form-control" id="codigo" required>
          </div>
        </div>
          <div class="form-column col-md-4 col-sm-4 col-xs-4">
            <div class="form-group required">
             <label for="nombre" class="control-label">Nombre</label>
             <input type="Nombre" class="form-control requerido"  
             placeholder="Nombre" name="nombre" id="nombre" required>
           </div>
         </div>
         <div class="form-column col-md-4 col-sm-4 col-xs-4">
            <div class="form-group required">
             <label for="nombre" class="control-label">Apellido</label>
             <input type="Apellido" class="form-control requerido"  
             placeholder="Apellido" name="Apellido" id="apellido" required>
           </div>
         </div>
         <div class="form-column col-md-4 col-sm-4 col-xs-4 ">
          <label for="genero" class="control-label ">Genero</label>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" value="Masculino">
                <label class="custom-control-label" for="customRadioInline1">M</label>
              <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" value="Femenino">
                <label class="custom-control-label" for="customRadioInline2">F</label>
              <div class="custom-control custom-radio custom-control-inline">
              </div>
            </div>
          </div>


         
         <div class="form-column col-md-4 col-sm-4 col-xs-4">
            <div class="form-group required">
             <label for="nombre" class="control-label">e-Mail</label>
             <input type="email" class="form-control"  
             placeholder="e-mail" name="email" id="email" required>
           </div>
         </div>

         <div class="form-column col-md-4 col-sm-4 col-xs-4">
            <div class="form-group required">
             <label for="nombre" class="control-label">Direccion</label>
             <input type="Direccion" class="form-control required"  
             placeholder="Direccion" name="direccion" id="direccion" required>
           </div>
         </div>
         
        <div class="form-column col-md-4 col-sm-4 col-xs-4">
          <div class="form-group required">
            <label for="telefono" class="control-label">Telefono</label>            
            <input name="text" class="form-control" id="telefono" required>
          </div>
        </div>
       
        <div class="form-column col-md-4 col-sm-4 col-xs-4">
          <div class="form-group required">
            <label for="categoria" class="control-label">Nacimiento</label>
            <input type="date" name="nacimiento" class="form-control" id="nacimiento" required>             
            
        </div>
      </div>
       <div class="form-column col-md-4 col-sm-4 col-xs-4">
          <div class="form-group required">
            <label for="cantidad" class="control-label">Fecha de Inicio</label>            
            <input type="date" name="ingreso" class="form-control" id="fechaInicio" required>
          </div>
        </div>

      <div class="clearfix"></div>

    </div>
    <div>
     <button class="btn btn-primary btn-sm " id="agregarPersonal" >Guardar</button>
   </div>
</form>
 </div>         
 <div class="modal-footer" id="modalFooter" >

 </div>
</div>
</div> 
</div>3
</font> 

<!-- Modal de Modificacion -->
<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade modal" id="modalModificacionPersonal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header " Style="height:45px;">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
        <span class="robo" style="font-size: 20px;">Editar Personal</span>
      </div>
      <div class="modal-body" >

        <div class="row" id="infoPersonalEdit">
          <div class="form-column col-md-4 col-sm-4 col-xs-4">
                <div class="form-group required">
                  <label for="codigo" class="control-label">Codigo</label>            
                  <input type="codigo"  name="codigo" class="form-control" id="codigoEdit" required >
                </div>
         </div>
         <div class="form-column col-md-4 col-sm-4 col-xs-4">
            <div class="form-group required">
             <label for="nombreEdit" class="control-label">Nombre</label>
             <input type="Nombre" class="form-control requerido"  
             placeholder="Nombre" name="nombreEdit" id="nombreEdit">
           </div>
         </div>
        <div class="form-column col-md-4 col-sm-4 col-xs-4">
            <div class="form-group required">
             <label for="apellido" class="control-label">Apellido</label>
             <input type="Apellido" class="form-control required"  
             placeholder="Apellido" name="ApellidoEdit" id="apellidoEdit">
           </div>
         </div>

         <div class="form-column col-md-4 col-sm-4 col-xs-4 ">
          <label for="genero" class="control-label ">Genero</label>
            <div class="custom-control custom-radio custom-control-inline" id="generoEdit">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" value="Masculino">
                <label class="custom-control-label" for="customRadioInline1">M</label>
              <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" value="Femenino">
                <label class="custom-control-label" for="customRadioInline2">F</label>
              <div class="custom-control custom-radio custom-control-inline">
              </div>
            </div>
          </div>
       
        <div class="form-column col-md-4 col-sm-4 col-xs-4">
            <div class="form-group required">
             <label for="nombre" class="control-label">e-Mail</label>
             <input type="email" class="form-control required"  
             placeholder="e-mail" name="email" id="emailEdit">
           </div>
         </div>
        <div class="form-column col-md-4 col-sm-4 col-xs-4">
            <div class="form-group required">
             <label for="Direccion" class="control-label">Direccion</label>
             <input type="Direccion" class="form-control required"  
             placeholder="Direccion" name="direccionEdit" id="direccionEdit">
           </div>
         </div>

        <div class="form-column col-md-4 col-sm-4 col-xs-4">
            <div class="form-group required">
             <label for="Telefono" class="control-label">Telefono</label>
             <input type="Telefono" class="form-control required"  
             placeholder="Telefono" name="TelefonoEdit" id="telefonoEdit">
           </div>
         </div>

        <div class="form-column col-md-4 col-sm-4 col-xs-4">
          <div class="form-group required">
            <label for="categoria" class="control-label">Nacimiento</label>
            <input type="date" name="nacimientoEdit" class="form-control" id="nacimientoEdit" required>
        </div>
      </div>

      <div class="form-column col-md-4 col-sm-4 col-xs-4">
          <div class="form-group required">
            <label for="cantidad" class="control-label">Fecha de Ingreso</label>            
            <input type="date" name="ingresoEdit" class="form-control" id="ingresoEdit" required>
          </div>
        </div>


      <div class="clearfix"></div>
        <input type="hidden" name="idPersonal" id="idPersonalEdit">
    </div>
    <div>
     <button class="btn btn-primary  btn-sm " id="editarPersonal" >Guardar</button>
   </div>

 </div>         
 <div class="modal-footer" id="modalFooter" >

 </div>
</div>
</div> 
</div>  
</font>    

<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade modal" id="modalEliminarPersonal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header " Style="height:45px;">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
        <span class="robo" style="font-size: 20px;">Eliminar Usuario</span>
      </div>
      <div class="modal-body" >

       Seguro?
       <form id="eliminarUsuarioFrm">
         <input type="hidden" name="idUsuario" id="idEliminarUsuario">                
       </form>

     </div>
     <div>
       <button class="btn btn-primary  btn-sm " id="btnEliminarUsuario" >Eliminar</button>
     </div>

   </div>         
   <div class="modal-footer" id="modalFooter" >

   </div>
 </div>
</div> 

</font>

