<?php

include 'conexion.php';

if(isset($_GET['DNI'])) {
    $nombre = $_GET['DNI'];
    $consul = $conexion->prepare("SELECT * FROM usuario WHERE DNI = ?");
    $consul->bind_param("i", $nombre);
    $consul->execute();
    $resultado = $consul->get_result();

    while ($fila = $resultado->fetch_array()){
        $usuario[] = array_map('utf8_encode', $fila);
    }

    echo json_encode($usuario);
    $resultado->close();
} else {
    echo "El parámetro 'DNI' no está presente en la URL.";
}


?>
