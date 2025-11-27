<?php
include "tema.php";

$puntos = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["p1"] == "b") $puntos++;
    if ($_POST["p2"] == "a") $puntos++;
    if ($_POST["p3"] == "c") $puntos++;
    if ($_POST["p4"] == "a") $puntos++;
    if ($_POST["p5"] == "b") $puntos++;
    if ($_POST["p6"] == "a") $puntos++;
    if ($_POST["p7"] == "c") $puntos++;
    if ($_POST["p8"] == "a") $puntos++;
    if ($_POST["p9"] == "b") $puntos++;
    if ($_POST["p10"] == "a") $puntos++;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cuestionario</title>
    <link rel="stylesheet" href="<?= $css ?>">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h1>Cuestionario ASIR</h1>

<form method="post">

<?php for ($i=1; $i<=10; $i++) { ?>
<p>Pregunta <?= $i ?></p>
<input type="radio" name="p<?= $i ?>" value="a"> A
<input type="radio" name="p<?= $i ?>" value="b"> B
<input type="radio" name="p<?= $i ?>" value="c"> C
<?php } ?>

<br><br>
<button>Enviar</button>
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
<h2>Puntuación: <?= $puntos ?>/10</h2>
<?php } ?>

<br>
<a class="btn" href="inicio.php">⬅ Volver al inicio</a>
<a class="btn" href="?modo=cambiar">🌓 Cambiar tema</a>

</body>
</html>
