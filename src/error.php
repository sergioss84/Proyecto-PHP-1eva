<?php include "tema.php"; ?>
<?php
session_start();
session_destroy();
?>

<h1>Error</h1>
<p>Has superado el número máximo de intentos.</p>
<a href="index.php">Volver al login</a>
