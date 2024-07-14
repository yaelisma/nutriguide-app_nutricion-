<?php
include 'conexion.php';
//insertar datos 
$DNI = $_POST['DNI'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo_electronico = $_POST['correo_electronico'];
$contraseña = $_POST['contraseña'];
$fecha_registro = $_POST['fecha_registro'];
$telefono=$_POST['telefono'];
$altura= $_POST['altura'];
$peso = $_POST['peso'];
$genero = $_POST['genero'];
$fecha_nac = $_POST['fecha_nac'];
$consulta = $conexion ->prepare ("INSERT INTO usuario(DNI,nombre,apellido,correo_electronico,contraseña,fecha_registro,telefono)
 values (?,?,?,?,?,?,?)");
if ($consulta === false) {
  die("Error: " . $conexion->error);
} else {
  $consulta->bind_param("sssssss", $DNI, $nombre, $apellido, $correo_electronico, $contraseña,$fecha_registro, $telefono);
}

$consulta1 = $conexion->prepare ("INSERT INTO    informacion_personal  (altura, 
peso, fecha_nacimiento,genero) values ( ?,?,?,?)");
if($consulta1 === false){
  die("Error: ".$conexion ->error);}
else{
$consulta1->bind_param("ssss", $altura, $peso, $fecha_nac, $genero);
}
if ($consulta->execute()) {
    echo "Nuevo registro creado exitosamente.";
  } else {
    echo "Error: " . $consulta->error;
  }
  if ($consulta1->execute()) {
    echo "Nuevo registro creado exitosamente.";
  } else {
    echo "Error: " . $consulta1->error;
  }
  
  $consulta->close();
  $consulta1->close();
  $conexion->close();
?>
