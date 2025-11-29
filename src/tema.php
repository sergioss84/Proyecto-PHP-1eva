<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET["modo"])) {
    if (!isset($_SESSION["modo"])) {
        $_SESSION["modo"] = "oscuro";
    } else if ($_SESSION["modo"] == "claro") {
        $_SESSION["modo"] = "oscuro";
    } else {
        $_SESSION["modo"] = "claro";
    }
}

$modo = $_SESSION["modo"] ?? "claro";

if ($modo == "oscuro") {
    $css = "css/oscuro.css";
} else {
    $css = "css/claro.css";
}
