<?php

include_once "../Datos/Usuario.php";

if (isset($_GET["idUsuario"]) && isset($_SESSION['usuarioRegistrado']) && $_SESSION['usuarioRegistrado'] === true) {
    $usuario = new Usuario();
    echo json_encode($usuario->traerUsuario($_GET["idUsuario"]));
} else {
    session_destroy();
    echo "Error";
}

?>