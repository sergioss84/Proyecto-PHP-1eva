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

<header class="header">
    <div class="header-left">
        <a href="inicio.php"><img src="img/logo1.png" class="logo"></a>
    </div>

    <nav class="header-center">
        <a href="inicio.php">Inicio</a>
        <a href="cuestionario.php">Cuestionario</a>
    </nav>

    <div class="header-right">
        <a href="?idioma=es"><img src="img/es.png" class="flag"></a>
        <a href="?idioma=en"><img src="img/en.png" class="flag"></a>
        <a href="?idioma=jp"><img src="img/jp.png" class="flag"></a>
        <a class="btn" href="?modo=cambiar">🌓</a>
        <a class="btn" href="logout.php">Logout</a>
    </div>
</header>

<main class="inicio-centrado">

<h1>
<?php
if ($idioma == "en") {
    echo "HOME";
} else {
    echo "INICIO";
}
?>
</h1>

<img src="img/andy.png" class="foto-inicio">

<h2><a href="?ver=info">Información</a></h2>
<?php if ($ver == "info") { ?>
<p>Somos Sergio y Samuel, hace poco hemos fundado una tienda de ropa llamada CØLDEN. Creamos esta pagina web para darnos a conocer al mundo. Esperemos que la apoyeis ya que le hemos puesto todo el cariño del mundo tanto a la ropa como a la tienda y su diseño.
    Sergio es el accionista y manager de la marca.
    Samuel es tanto diseñador como fundador principal de la marca</p>
<?php } ?>

<?php
if ($idioma == "jp") {
    echo "情報";
} else {
    echo "INICIO";
}
?>
</h1>

<h2><a href="?ver=info">情報</a></h2>
<?php if ($ver == "info") { ?>
<p>私たちはセルジオとサミュエルです。最近、CØLDENという衣料品店をオープンしました。このウェブサイトは、私たち自身を世界に紹介するために作成しました。私たちは服と店、そしてそのデザインに心血を注いでいるので、皆さんの応援をお待ちしています。

セルジオはブランドの株主兼マネージャーです。
サミュエルはブランドのデザイナーであり、創設者でもあります。</p>
<?php } ?>

<h2><a href="?ver=contacto">Contacto</a></h2>
<?php if ($ver == "contacto") { ?>
<p>contacto@colden.es</p>
<?php } ?>

</main>

</body>
</html>
