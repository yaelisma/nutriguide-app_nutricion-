<?php

include 'conexion.php';

if(isset($_GET['fecha_hora'])) {

    $fecha=$_GET['fecha_hora'];
    $consul = $conexion->prepare("SELECT * FROM cosumo_alimentos WHERE fecha_hora=?");
    $consul->bind_param("s" , $fecha);
    $consul->execute();
    $resultado = $consul->get_result();
    $cosumo_alimentos = array();
    while ($fila = $resultado->fetch_array()){
        $cosumo_alimentos[] = array_map('utf8_encode', $fila);
    }
    echo json_encode($cosumo_alimentos);
    $resultado->close();
} else {
    echo "El parámetro 'fecha_hora' no está presente en la URL.";
}


?>
