<?php
include "tema.php";

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

if (isset($_GET["idioma"])) {
    $_SESSION["idioma"] = $_GET["idioma"];
}

$idioma = $_SESSION["idioma"] ?? "es";
$ver = $_GET["ver"] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CØLDEN</title>
<link rel="stylesheet" href="<?= $css ?>">
<link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header>
    <h1>CØLDEN</h1>

    <a href="?idioma=es"><img src="img/es.png" width="30"></a>
    <a href="?idioma=en"><img src="img/en.png" width="30"></a>

    <a href="?modo=cambiar">🌓</a>

    <a href="logout.php">Logout</a>
</header>

<main>

<img src="img/logo.png" class="foto">

<h2><a href="?ver=info">Información</a></h2>
<?php if ($ver == "info") { ?>
<div class="caja">
<p>CØLDEN es una tienda de ropa creada por Sergio y Samuel.</p>
</div>
<?php } ?>

<h2><a href="?ver=contacto">Contacto</a></h2>
<?php if ($ver == "contacto") { ?>
<div class="caja">
<p>Email: contacto@colden.es</p>
<p>Teléfono: 666 555 444</p>
</div>
<?php } ?>

<h2><a href="cuestionario.php">Ir al cuestionario</a></h2>

</main>

</body>
</html>

