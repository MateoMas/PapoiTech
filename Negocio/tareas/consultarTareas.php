<?php

include_once "../Datos/Tarea.php";

if (isset($_SESSION["idUsuario"]) && isset($_SESSION['usuarioRegistrado']) && $_SESSION['usuarioRegistrado'] === true) {
    $tarea = new Tarea();
    echo json_encode($tarea->consultarTareas($_SESSION["idUsuario"]));
} else {
    session_destroy();
    echo json_encode(["error" => "Sesión inválida o expirada"]);
}

?>
