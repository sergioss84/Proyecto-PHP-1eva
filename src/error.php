<?php
session_start();
include "tema.php";
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="<?= $css ?>">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h1>Error</h1>
<p>Has superado el número máximo de intentos.</p>

<a class="btn" href="index.php">Volver al login</a>
<a class="btn" href="?modo=cambiar">🌓 Cambiar tema</a>

</body>
</html>
