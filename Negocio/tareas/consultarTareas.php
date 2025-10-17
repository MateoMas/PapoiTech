<?php

include_once "../Datos/Tarea.php";

if (isset($_GET["idUsuario"]) && isset($_SESSION['usuarioRegistrado']) && $_SESSION['usuarioRegistrado'] === true) {
    $tarea = new Tarea();
    echo json_encode($tarea->consultarTareas($_GET["idUsuario"]));
} else {
    session_destroy();
    echo "Error";
}

?>
