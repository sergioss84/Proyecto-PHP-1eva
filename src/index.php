<?php
session_start();
include "tema.php";

$usuario_correcto = "admin";
$clave_correcta = "1234";

if (!isset($_SESSION["intentos"])) {
    $_SESSION["intentos"] = 3;
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    if ($usuario == $usuario_correcto && $password == $clave_correcta) {
        $_SESSION["intentos"] = 3;
        header("Location: inicio.php");
        exit;
    } else {
        $_SESSION["intentos"]--;
        $mensaje = "Usuario o contraseña incorrectos";

        if ($_SESSION["intentos"] <= 0) {
            header("Location: error.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login CØLDEN</title>
    <link rel="stylesheet" href="<?= $css ?>">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="login-container">

    <h1>Login CØLDEN</h1>

    <form method="post">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="select" name="sexo" placeholder="options" required>
        <select>
            <option value="M">masculino</option>
            <option value="F">Femenino</option>
            <option value="X">Otro</option>
        </select>
        
        <button type="submit">Entrar</button>
    </form>

    <p class="intentos">Intentos restantes: <?= $_SESSION["intentos"] ?></p>

    <?php if ($mensaje != "") { ?>
        <p class="error"><?= $mensaje ?></p>
    <?php } ?>


</div>

</body>
</html>
