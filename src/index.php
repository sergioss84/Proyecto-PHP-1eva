
<?php
include "tema.php";  // PRIMERO SIEMPRE

$usuario_correcto = "admin";
$clave_correcta   = "1234";

if (!isset($_SESSION["intentos"])) {
    $_SESSION["intentos"] = 3;
}

$mensaje = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST["usuario"];
    $pass = $_POST["password"];

    if ($user == $usuario_correcto && $pass == $clave_correcta) {

        $_SESSION["user"] = $user;
        $_SESSION["intentos"] = 3;
        header("Location: inicio.php");
        exit;

    } else {
        $_SESSION["intentos"]--;
        $mensaje = "Usuario o contraseña incorrectos.";

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

<body class="centro">

<div class="login-box">

    <h1>Iniciar Sesión</h1>

    <form method="post">

        <input type="text" name="usuario" placeholder="Usuario" required>

        <input type="password" name="password" placeholder="Contraseña" required>

        <button type="submit">Entrar</button>

    </form>

    <?php if ($mensaje != "") { ?>
        <p class="error"><?= $mensaje ?></p>
    <?php } ?>

    <p>Intentos restantes: <strong><?= $_SESSION["intentos"] ?></strong></p>

    <a href="?modo=cambiar">Cambiar tema</a>

</div>

</body>
</html>

