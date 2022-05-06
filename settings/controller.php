<?php
// Conexion a la base de datos
include_once("../settings/db.php");
$connection = mysqli_connect($host, $user, $pw, $db);
mysqli_set_charset($connection, "utf8");

// Controlador para agregar mensaje
if (isset($_POST['agregar-mensaje'])){

    header("Location: ../views/game.php?mensaje={$_POST['hiddenMsg']}");

}

?>