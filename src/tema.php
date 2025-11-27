<?php
// Garantizamos que la sesión se inicia sin duplicados
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cambiar modo si se pulsa el enlace
if (isset($_GET["modo"])) {

    if (!isset($_SESSION["modo"])) {
        $_SESSION["modo"] = "oscuro";
    } elseif ($_SESSION["modo"] == "claro") {
        $_SESSION["modo"] = "oscuro";
    } else {
        $_SESSION["modo"] = "claro";
    }
}

// Valor por defecto
$modo = $_SESSION["modo"] ?? "claro";

// Asignación del CSS
$css = ($modo == "oscuro") ? "css/oscuro.css" : "css/claro.css";
?>


