<?php include "tema.php"; ?>
<?php
include "tema.php";

if (isset($_GET["idioma"])) {
    $_SESSION["idioma"] = $_GET["idioma"];
}
$idioma = $_SESSION["idioma"] ?? "es";

$ver = $_GET["ver"] ?? "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CØLDEN</title>
    <link rel="stylesheet" href="<?= $css ?>">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header>
    <a href="inicio.php"><img src="img/logo.png" class="logo"></a>

    <nav>
        <a href="inicio.php">Inicio</a>
        <a href="cuestionario.php">Cuestionario</a>
    </nav>

    <div>
        <a href="?idioma=es"><img src="img/es.png" class="flag"></a>
        <a href="?idioma=en"><img src="img/en.png" class="flag"></a>
        <a href="?modo=cambiar">🌓</a>
        <a href="logout.php">Logout</a>
    </div>
</header>

<main>

<h1>
<?php
if ($idioma == "en") {
    echo "HOME";
} else {
    echo "INICIO";
}
?>
</h1>

<h2><a href="?ver=info">Información</a></h2>
<?php if ($ver == "info") { ?>
<p>CØLDEN es una tienda de ropa creada por Sergio y Samuel.</p>
<?php } ?>

<h2><a href="?ver=aficiones">Aficiones</a></h2>
<?php if ($ver == "aficiones") { ?>
<p>Moda urbana, diseño web y emprendimiento.</p>
<?php } ?>

<h2><a href="?ver=contacto">Contacto</a></h2>
<?php if ($ver == "contacto") { ?>
<p>contacto@colden.es</p>
<?php } ?>

</main>

</body>
</html>
