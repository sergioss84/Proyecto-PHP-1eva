<?php
session_start();
include "tema.php";

if (!isset($_SESSION["intentos"])) header("Location: index.php");

$preguntas = [
    1 => [
        "texto" => "¿Qué significa PHP?",
        "tipo" => "radio",
        "opciones" => ["a" => "Personal Home Page", "b" => "Private Hypertext Processor", "c" => "PHP: Hypertext Preprocessor"],
        "correcta" => "c"
    ],
    2 => [
        "texto" => "Selecciona las versiones de PHP actualmente soportadas:",
        "tipo" => "checkbox",
        "opciones" => ["a" => "PHP 7.4", "b" => "PHP 8.0", "c" => "PHP 5.6", "d" => "PHP 8.2"],
        "correcta" => ["a","b","d"]
    ],
    3 => [
        "texto" => "¿Qué comando se usa para ejecutar un contenedor Docker?",
        "tipo" => "radio",
        "opciones" => ["a" => "docker start <nombre>", "b" => "docker run <imagen>", "c" => "docker init <imagen>"],
        "correcta" => "b"
    ],
    4 => [
        "texto" => "Selecciona las imágenes oficiales de PHP en Docker Hub:",
        "tipo" => "checkbox",
        "opciones" => ["a" => "php:8.1-apache", "b" => "php:7.4-fpm", "c" => "node:14", "d" => "mysql:8"],
        "correcta" => ["a","b"]
    ],
    5 => [
        "texto" => "¿Cuál es la forma correcta de incrustar PHP en HTML?",
        "tipo" => "select",
        "opciones" => ["a" => "<?php ... ?>", "b" => "<script> ... </script>", "c" => "{{ ... }}"],
        "correcta" => "a"
    ],
    6 => [
        "texto" => "¿Qué comando se usa para ver los contenedores activos en Docker?",
        "tipo" => "radio",
        "opciones" => ["a" => "docker ps", "b" => "docker ls", "c" => "docker active"],
        "correcta" => "a"
    ],
    7 => [
        "texto" => "Selecciona las funciones de PHP para trabajar con arrays:",
        "tipo" => "checkbox",
        "opciones" => ["a" => "array_merge()", "b" => "explode()", "c" => "array_push()", "d" => "implode()"],
        "correcta" => ["a","c","d"]
    ],
    8 => [
        "texto" => "¿Qué archivo se utiliza para construir imágenes Docker?",
        "tipo" => "select",
        "opciones" => ["a" => "dockerfile", "b" => "Dockerfile", "c" => "docker-compose.yml"],
        "correcta" => "b"
    ],
    9 => [
        "texto" => "¿Cuál es el puerto por defecto de un contenedor PHP con Apache en Docker?",
        "tipo" => "radio",
        "opciones" => ["a" => "80", "b" => "443", "c" => "8080"],
        "correcta" => "a"
    ],
    10 => [
        "texto" => "Selecciona los beneficios de usar Docker con PHP:",
        "tipo" => "checkbox",
        "opciones" => [
            "a" => "Portabilidad de aplicaciones",
            "b" => "Aislamiento de entornos",
            "c" => "Mayor rendimiento que código nativo",
            "d" => "Fácil despliegue en producción"
        ],
        "correcta" => ["a","b","d"]
    ]
]; 

$puntos = 0;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($preguntas as $num => $p){
        $resp = $_POST["p$num"] ?? [];
        if($p["tipo"]=="checkbox"){
            sort($resp); $c = $p["correcta"]; sort($c);
            if($resp==$c) $puntos++;
        } else {
            if($resp==$p["correcta"]) $puntos++;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cuestionario PHP y Docker</title>
<link rel="stylesheet" href="<?= $css ?>">
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h1>Cuestionario PHP y Docker</h1>
<form method="post">

<?php foreach($preguntas as $num => $p): ?>
<p><b><?= $num ?>. <?= $p["texto"] ?></b></p>

<?php if($p["tipo"]=="radio"): ?>
    <?php foreach($p["opciones"] as $k=>$o): ?>
        <label><input type="radio" name="p<?= $num ?>" value="<?= $k ?>" required> <?= strtoupper($k) ?>) <?= $o ?></label><br>
    <?php endforeach; ?>

<?php elseif($p["tipo"]=="checkbox"): ?>
    <?php foreach($p["opciones"] as $k=>$o): ?>
        <label><input type="checkbox" name="p<?= $num ?>[]" value="<?= $k ?>"> <?= strtoupper($k) ?>) <?= $o ?></label><br>
    <?php endforeach; ?>

<?php elseif($p["tipo"]=="select"): ?>
    <select name="p<?= $num ?>" required>
        <option value="">--Selecciona--</option>
        <?php foreach($p["opciones"] as $k=>$o): ?>
            <option value="<?= $k ?>"><?= $o ?></option>
        <?php endforeach; ?>
    </select>
<?php endif; ?>

<br>
<?php endforeach; ?>

<button>Enviar respuestas</button>
</form>

<?php if($_SERVER["REQUEST_METHOD"]=="POST"): ?>
<h2>Puntuación: <?= $puntos ?>/<?= count($preguntas) ?></h2>
<?php endif; ?>

<br>
<a class="btn" href="inicio.php">⬅ Volver al inicio</a>
<a class="btn" href="?modo=cambiar">🌓 Cambiar tema</a>

</body>
</html>
