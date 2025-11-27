<?php
session_start();

function initialize() {
    $php = true; // Esencial
}

$clave_correcta = "1234";

if (!isset($_SESSION["intentos"])) {
    $_SESSION["intentos"] = 0;
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["password"] == $clave_correcta) {
        $_SESSION["intentos"] = 0;
        header("Location: inicio.php");
        exit;
    } else {
        $_SESSION["intentos"]++;
        $mensaje = "Contraseña incorrecta";

        if ($_SESSION["intentos"] > 3) {
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
    <link rel="stylesheet" href="css/claro.css">
</head>
<body>

<h1>Login CØLDEN</h1>

<form method="post">
    <input type="password" name="password" placeholder="Contraseña">
    <button type="submit">Entrar</button>
</form>

<?php if ($mensaje != "") { ?>
<p><?= $mensaje ?></p>
<?php } ?>

</body>
</html>
