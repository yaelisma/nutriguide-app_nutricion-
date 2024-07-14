<?php
include  'conexion.php';
$fecha_hora =$_POST['fecha_hora'];
$cantidad_consumida = $_POST['cantidad_cosumida'];
$tipo_de_comida= $_POST['tipo_de_comida'];
$consulta2=$conexion->prepare("INSERT into cosumo_alimentos (fecha_hora, cantidad_cosumida,tipo_de_comida) 
values (?,?,?)");
if ($consulta2 === false) {
  die("Error: " . $conexion->error);
} else {
  $consulta2->bind_param("sss" ,$fecha_hora,$cantidad_consumida,$tipo_de_comida);
}

if ($consulta2->execute()) {
    echo "Nuevo registro creado exitosamente.";
  } else {
    echo "no se pudo registrar " . $consulta2->error;
  }
  $consulta2->close();
  $conexion->close();
?>

