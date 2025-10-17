<?php

include_once "../Datos/Usuario.php";

if (isset($_SESSION["idUsuario"]) && isset($_SESSION['usuarioRegistrado']) && $_SESSION['usuarioRegistrado'] === true) {
    $usuario = new Usuario();
    echo json_encode($usuario->traerUsuario($_SESSION["idUsuario"]));
} else {
    session_destroy();
    echo json_encode(["error" => "Sesión inválida o expirada"]);
}

?>