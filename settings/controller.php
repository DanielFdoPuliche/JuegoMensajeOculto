<?php

// Controlador para agregar mensaje
if (isset($_POST['agregar-mensaje'])){

    header("Location: ../views/game.php?mensaje={$_POST['hiddenMsg']}");

}

?>