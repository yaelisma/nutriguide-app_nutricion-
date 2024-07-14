<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "nutriguide1";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

$nombre=$_POST['nombre'];
$apellido =$_POST ['apellido'];
$contraseña =$_POST ['contraseña'];
//$nom="Emir";
//$apellido="gutierrez";
//$contraseña="45362045";
$consulta = $conexion->prepare("SELECT * FROM usuario WHERE nombre=? AND apellido=? AND contraseña=?");
$consulta->bind_param("sss", $nombre, $apellido, $contraseña);
$consulta -> execute ();
$resultado=$consulta->get_result();

if($fila =$resultado->fetch_assoc()){
    echo json_encode ($fila,"error");
}$consulta->close();
$conexion->close();
?>
