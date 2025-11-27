<?php
include "tema.php";

$preguntas = [
    1 => [
        "texto" => "¿Qué protocolo se utiliza para asignar automáticamente direcciones IP?",
        "opciones" => [
            "a" => "DNS",
            "b" => "DHCP",
            "c" => "FTP"
        ],
        "correcta" => "b"
    ],
    2 => [
        "texto" => "¿Cuál es la herramienta principal para administrar discos en Windows?",
        "opciones" => [
            "a" => "diskpart",
            "b" => "ipconfig",
            "c" => "eventvwr"
        ],
        "correcta" => "a"
    ],
    3 => [
        "texto" => "¿Qué dirección IPv6 es equivalente al loopback 127.0.0.1 en IPv4?",
        "opciones" => [
            "a" => "::",
            "b" => "::1",
            "c" => "fe80::1"
        ],
        "correcta" => "b"
    ],
    4 => [
        "texto" => "¿Qué comando permite ver la tabla de enrutamiento en Windows?",
        "opciones" => [
            "a" => "route print",
            "b" => "ping",
            "c" => "netstat -r"
        ],
        "correcta" => "a"
    ],
    5 => [
        "texto" => "¿Qué tipo de copia de seguridad guarda solo los archivos modificados desde la última copia completa?",
        "opciones" => [
            "a" => "Completa",
            "b" => "Diferencial",
            "c" => "Incremental"
        ],
        "correcta" => "b"
    ],
];

$puntos = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($preguntas as $num => $data) {
        if (isset($_POST["p$num"]) && $_POST["p$num"] === $data["correcta"]) {
            $puntos++;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cuestionario ASIR</title>
    <link rel="stylesheet" href="<?= $css ?>">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h1>Cuestionario ASIR - Tipo Test</h1>

<form method="post">

<?php foreach ($preguntas as $num => $data): ?>
    <p><b><?= $num ?>. <?= $data["texto"] ?></b></p>

    <?php foreach ($data["opciones"] as $clave => $opcion): ?>
        <label>
            <input type="radio" name="p<?= $num ?>" value="<?= $clave ?>">
            <?= strtoupper($clave) ?>) <?= $opcion ?>
        </label><br>
    <?php endforeach; ?>

    <br>
<?php endforeach; ?>

<button>Enviar respuestas</button>
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <h2>Puntuación obtenida: <?= $puntos ?>/<?= count($preguntas) ?></h2>
<?php endif; ?>

<br>
<a class="btn" href="inicio.php">⬅ Volver al inicio</a>
<a class="btn" href="?modo=cambiar">🌓 Cambiar tema</a>

</body>
</html>
