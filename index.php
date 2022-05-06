<?php
include("templates/header.php");
?>

<div class="container-2 text-center">
    <div class="py-4 vertical-center">
        <h1 class="text-light">
            ¡ADIVINA EL MENSAJE OCULTO!</h1>
    </div>
</div>

<div class="container">
    <form role="form" name="agregar-mensaje" id="agregar-mensaje" method="POST" action="/settings/controller.php">
        <div class="row justify-content-center align-items-center" style="height:20rem">
            <div class="col-7 text-center align-middle">

                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Ingresa el mensaje oculto" id="hiddenMsg" name="hiddenMsg" required>
                </div>

                <input type="hidden" name="agregar-mensaje" value='2'>
                <button class="btn btn-danger btn-lg" type="submit">JUGAR</button>

            </div>
        </div>
    </form>
</div>

<?php

include_once("templates/footer.php");

?>