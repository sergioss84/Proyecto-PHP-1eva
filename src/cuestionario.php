<?php
include "tema.php";

$puntos = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i=1; $i<=10; $i++) {
        if (isset($_POST["p$i"]) && $_POST["p$i"] == "a") {
            $puntos++;
        }
    }
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

<main>

<h1>Cuestionario ASIR</h1>

<div class="cuestionario">

<form method="post">

<?php for ($i=1; $i<=10; $i++) { ?>
<p><strong>Pregunta <?= $i ?></strong></p>
<label><input type="radio" name="p<?= $i ?>" value="a"> A</label>
<label><input type="radio" name="p<?= $i ?>" value="b"> B</label>
<label><input type="radio" name="p<?= $i ?>" value="c"> C</label>
<hr>
<?php } ?>

<button type="submit">Enviar</button>

</form>

</div>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
<h2>Puntuación: <?= $puntos ?>/10</h2>
<?php } ?>

<br>

<a href="inicio.php">
    <button>Salir del cuestionario</button>
</a>

</main>

</body>
</html>

