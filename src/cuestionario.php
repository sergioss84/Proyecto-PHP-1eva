<?php
session_start();
include "tema.php";

// Protección: solo usuarios logueados
if (!isset($_SESSION["intentos"])) {
    header("Location: index.php");
    exit;
}

// Definimos preguntas
$preguntas = [
    1 => [
        "texto" => "¿Qué protocolo se utiliza para asignar automáticamente direcciones IP?",
        "tipo" => "radio",
        "opciones" => ["a" => "DNS", "b" => "DHCP", "c" => "FTP"],
        "correcta" => "b"
    ],
    2 => [
        "texto" => "¿Cuál es la herramienta principal para administrar discos en Windows?",
        "tipo" => "radio",
        "opciones" => ["a" => "diskpart", "b" => "ipconfig", "c" => "eventvwr"],
        "correcta" => "a"
    ],
    3 => [
        "texto" => "Selecciona los tipos de copia de seguridad que existen:",
        "tipo" => "checkbox",
        "opciones" => ["a" => "Completa", "b" => "Diferencial", "c" => "Incremental", "d" => "Diaria"],
        "correcta" => ["a","b","c"] // checkbox puede tener varias correctas
    ],
    4 => [
        "texto" => "¿Qué comando permite ver la tabla de enrutamiento en Windows?",
        "tipo" => "radio",
        "opciones" => ["a" => "route print", "b" => "ping", "c" => "netstat -r"],
        "correcta" => "a"
    ],
    5 => [
        "texto" => "Selecciona el sistema operativo de Microsoft Server:",
        "tipo" => "select",
        "opciones" => ["a" => "Windows 10", "b" => "Windows Server 2019", "c" => "Ubuntu"],
        "correcta" => "b"
    ],
    6 => [
        "texto" => "¿Qué dirección IPv6 es equivalente al loopback 127.0.0.1?",
        "tipo" => "radio",
        "opciones" => ["a" => "::", "b" => "::1", "c" => "fe80::1"],
        "correcta" => "b"
    ],
    7 => [
        "texto" => "Selecciona los comandos de red en Windows:",
        "tipo" => "checkbox",
        "opciones" => ["a" => "ipconfig", "b" => "netstat", "c" => "ls", "d" => "ping"],
        "correcta" => ["a","b","d"]
    ],
    8 => [
        "texto" => "¿Qué es DHCP?",
        "tipo" => "select",
        "opciones" => ["a" => "Protocolo de correo", "b" => "Protocolo de asignación de IP", "c" => "Servidor web"],
        "correcta" => "b"
    ],
    9 => [
        "texto" => "¿Qué tipo de backup guarda solo los archivos modificados desde la última completa?",
        "tipo" => "radio",
        "opciones" => ["a" => "Completa", "b" => "Diferencial", "c" => "Incremental"],
        "correcta" => "b"
    ],
    10 => [
        "texto" => "Selecciona los servicios de red principales:",
        "tipo" => "checkbox",
        "opciones" => ["a" => "DNS", "b" => "FTP", "c" => "HTTP", "d" => "Photoshop"],
        "correcta" => ["a","b","c"]
    ],
];

$puntos = 0;

// Evaluación del cuestionario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($preguntas as $num => $data) {
        $tipo = $data["tipo"];
        if ($tipo == "radio" || $tipo == "select") {
            if (isset($_POST["p$num"]) && $_POST["p$num"] === $data["correcta"]) {
                $puntos++;
            }
        } elseif ($tipo == "checkbox") {
            $respuesta = $_POST["p$num"] ?? [];
            sort($respuesta);
            $correcta = $data["correcta"];
            sort($correcta);
            if ($respuesta == $correcta) {
                $puntos++;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cuestionario ASIR - 10 preguntas</title>
    <link rel="stylesheet" href="<?= $css ?>">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h1>Cuestionario ASIR - 10 preguntas</h1>

<form method="post">

<?php foreach ($preguntas as $num => $data): ?>
    <p><b><?= $num ?>. <?= $data["texto"] ?></b></p>

    <?php if($data["tipo"] == "radio"): ?>
        <?php foreach($data["opciones"] as $clave => $opcion): ?>
            <label>
                <input type="radio" name="p<?= $num ?>" value="<?= $clave ?>" required>
                <?= strtoupper($clave) ?>) <?= $opcion ?>
            </label><br>
        <?php endforeach; ?>

    <?php elseif($data["tipo"] == "checkbox"): ?>
        <?php foreach($data["opciones"] as $clave => $opcion): ?>
            <label>
                <input type="checkbox" name="p<?= $num ?>[]" value="<?= $clave ?>">
                <?= strtoupper($clave) ?>) <?= $opcion ?>
            </label><br>
        <?php endforeach; ?>

    <?php elseif($data["tipo"] == "select"): ?>
        <select name="p<?= $num ?>" required>
            <option value="">--Selecciona--</option>
            <?php foreach($data["opciones"] as $clave => $opcion): ?>
                <option value="<?= $clave ?>"><?= $opcion ?></option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>

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

