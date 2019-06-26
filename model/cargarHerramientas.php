<?php 
require_once 'conexion.php';

function getHerramientas(){
  $mysqli = getConn();
  $query = 'SELECT * FROM herramienta WHERE cantidad > 0';
  $result = $mysqli->query($query);
  $herramientas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $herramientas .= "<option value='$row[id]'>$row[nombre]</option>";
  }
  return $herramientas;
}

echo getHerramientas();