<?php
include("../templates/header.php");
include("../templates/navbar.php");
include("../templates/menu.php");
// Validacion de la sesion
include_once("../settings/sesiones.php");
// Conexion a la base de datos
include("../settings/db.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar películas</h1>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Agregar datos</h3>
            </div>

            <div class="card-body">

                <?php
                try {
                    $conn = mysqli_connect($host, $user, $pw, $db);
                    $sql1 = "SELECT l.language_id, l.name FROM language l";
                    $resultado = $conn->query($sql1);
                    $array_languages = [];
                    while ($registro = $resultado->fetch_assoc()) {
                        array_push($array_languages, $registro);
                    }
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                }
                ?>

                <form role="form" name="editar-pelicula" id="editar-pelicula" method="POST" action="/settings/controller.php">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Ingresa la descripción" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="year">Año de lanzamiento</label>
                            <input type="number" class="form-control" id="year" name="year" placeholder="Ingresa el año" value="" min="1950" max="2022" required>
                        </div>
                        <div class="form-group">
                            <label for="language">Lenguaje</label>
                            <select class="form-control" id="language" name="language" required>
                                <option value="">Escoge el lenguaje</option>
                                <?php
                                for ($i = 0; $i < count($array_languages); $i++) {
                                ?>
                                    <option value="<?php echo $array_languages[$i]['language_id']; ?>"><?php echo $array_languages[$i]['name']; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duración</label>
                            <input type="number" class="form-control" id="duration" name="duration" placeholder="Ingresa la duración" value="" required required>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="hidden" name="agregar-film" value='2'>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<?php
include_once("../templates/footer.php");
?>