<?php
include("../templates/header.php");
?>

<div class="container-2 text-center">
    <div class="pt-4 vertical-center">
        <h1 class="text-light">¡ADIVINA EL MENSAJE OCULTO!</h1>
    </div>
</div>

<div class="container py-4">
    <div class="row justify-content-center align-items-center" style="height:10rem">
        <div class="col-10" style="text-align: center;">

            <table id="myTable" style="margin:0 auto; text-align: center">
                <tbody>
                    <tr style="height:50px">
                        <?php
                        $MSG = strtoupper($_GET['mensaje']);

                        for ($i = 0; $i < strlen($MSG); $i++) { ?>

                            <td style="color: white; 
                                <?php if ($MSG[$i] == ' ') {
                                    echo 'background-color: white;  width:20px; ';
                                } else {
                                    echo ' width:40px; ';
                                }
                                ?>border: white 2px solid;" <?php echo "id=td-{$i}" ?>>

                            </td>

                        <?php } ?>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="container pt-4">
    <div class="row justify-content-center align-items-center">
        <div class="col-7 text-center align-middle">

            <h3>Letras usadas:</h3>

            <div id="usedChars"></div>

        </div>
    </div>
</div>

<div class="container pt-4">

    <div class="row justify-content-center align-items-center">
        <div class="col-2 text-center align-middle">
            <input type="text" class="form-control" placeholder="Ingresa una letra" maxlength="1" id="caracter">
        </div>
        <div class="col-2">
            <button class="btn btn-danger btn-lg" onclick="caracterValidate()">INGRESAR</button>
        </div>
    </div>

</div>

<div class="container py-4">

    <div class="row justify-content-center align-items-center">
        <div class="col-5 text-center align-middle">
            <input type="text" class="form-control" placeholder="Ingresar la frase completa" id="frase">
        </div>
        <div class="col-2">
            <button class="btn btn-danger btn-lg" onclick="mensajeValidate()">VALIDAR</button>
        </div>
    </div>

</div>

<div class="container py-4">

    <div class="row justify-content-center align-items-center">        
        <div class="col-4 text-center">
            <button class="btn btn-danger btn-lg" onclick="location.href = '../index.php'">NUEVO JUEGO</button>
        </div>
    </div>

</div>

<Script>
    let usedChars = []
    const message = "<?php echo $MSG ?>"

    function caracterValidate() {

        let inputChar = document.getElementById('caracter').value.toUpperCase()
        var indices = []

        if (inputChar != '') {
            if (!usedChars.includes(inputChar)) {

                for (var i = 0; i < message.length; i++) {
                    if (message[i] === inputChar) indices.push(i)
                }

                if (indices.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La letra no está!',
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Super',
                        text: 'Letra encontrada',
                    })

                    for (let i = 0; i < indices.length; i++) {
                        let celda = document.getElementById("td-" + indices[i])
                        celda.innerHTML = "<h2>" + inputChar + "</h2>"
                    }

                }

                usedChars.push(inputChar);
                document.getElementById("usedChars").innerHTML = "<h2>" + usedChars + "</h2>"

            } else {
                Swal.fire({
                    icon: 'info',
                    title: 'Oops...',
                    text: 'Letra ya usada',
                })
            }
        }

    }

    function mensajeValidate() {

        let inputMsg = document.getElementById('frase').value.toUpperCase()

        if (inputMsg != '') {
            if (message === inputMsg) {

                Swal.fire({
                    icon: 'success',
                    title: 'Mensaje descubierto',
                    text: 'GANASTE',
                })

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No es el mensaje oculto',
                })
            }
        }
    }
</Script>

<?php
include_once("../templates/footer.php");
?>