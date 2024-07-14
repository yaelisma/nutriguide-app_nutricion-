<?php

include 'conexion.php';

if(isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    $consul = $conexion->prepare("SELECT * FROM alimentos WHERE nombre = ?");
    $consul->bind_param("s", $nombre);
    $consul->execute();
    $resultado = $consul->get_result();

    while ($fila = $resultado->fetch_array()){
        $alimentos[] = array_map('utf8_encode', $fila);
    }

    echo json_encode($alimentos);
    $resultado->close();
} else {
    echo "El parámetro 'nombre' no está presente en la URL.";
}


?>
