<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$database='nutriguide1';


// Crear conexión
$conexion= new mysqli($servername, $username, $password,$database);

// Verificar conexión
if ($conexion->connect_error) {
  echo("conexion fallida: " . $conexion->connect_error);
}
?>
