<?php 
require_once 'conexion.php';

function getCantidad(){
  $mysqli = getConn();
  $id = $_POST['id'];
  $query = "SELECT `cantidad` FROM `herramienta` WHERE id = $id";
  $result = $mysqli->query($query);
  $cantidad = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $cantidad = "$row[cantidad]";
  }
  for ($i=1; $i <= $cantidad; $i++) { 
  	 $cantidad .= "<option value='$i'>$i</option>";
  }
  return $cantidad;
}

echo getCantidad();




