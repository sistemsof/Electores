<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "Electores";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Barrios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">VISTA DE DATOS PERSONALES</h1>
        <a href="http://localhost/Aitor%20proyecto/electores01+/view/home/home.php" class="btn btn-primary" data-toggle="modal">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Regresar
        </a>

        <a href="#addnew" class="btn btn-primary" data-toggle="modal">
            <span class="glyphicon glyphicon-plus"></span> Agregar Datos personales
        </a>

        <!-- Modal de Nuevo Registro -->
        <div id="addnew" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Contenido del modal de nuevo registro -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nuevo Datos personales</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario de nuevo registro -->
                        <form method="POST" action="guardar_barrio.php">
                            <div class="form-group">
                                <label for="id">ID:</label>
                                <input type="text" class="form-control" id="id" name="id">
                            </div>
                            <div class="form-group">
                                <label for="barrio">Barrio:</label>
                                <input type="text" class="form-control" id="barrio" name="barrio">
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listar -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Barrio</th>
                        <th scope="col">Celuar</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Ocupaciòn</th>
                        <th scope="col">Direcciòn</th>
                        <th scope="col">Zona</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Mesa</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM barrios";
                    $can_regis = 0;
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $can_regis++;
                            ?>
                            <tr>
                                <td><?php echo $row["ID"]; ?></td>
                                <td><?php echo $row["Barrio"]; ?></td>
                                <td>
                                    <a href="#edit_<?php echo $row["ID"]; ?>" class="btn btn-success btn-xs" data-toggle="modal">
                                        <span class="glyphicon glyphicon-edit"></span> Editar
                                    </a>
                                    <a href="#delete_<?php echo $row["ID"]; ?>" class="btn btn-danger btn-xs" data-toggle="modal">
                                        <span class="glyphicon glyphicon-trash"></span> Borrar
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        mysqli_free_result($result);
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <strong>Nº DE REGISTROS = <?php echo $can_regis; ?></strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Modales de editar y borrar -->
        <?php
        $result = mysqli_query($con, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <!-- Modal de Editar -->
                <div id="edit_<?php echo $row["ID"]; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Contenido del modal de editar -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Editar Barrio</h4>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario de edición -->
                                <form method="POST" action="editar_barrio.php">
                                    <input type="hidden" name="id" value="<?php echo $row["ID"]; ?>">
                                    <div class="form-group">
                                        <label for="barrio">Barrio:</label>
                                        <input type="text" class="form-control" id="barrio" name="barrio" value="<?php echo $row["Barrio"]; ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Borrar -->
                <div id="delete_<?php echo $row["ID"]; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Contenido del modal de borrar -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Borrar Barrio</h4>
                            </div>
                            <div class="modal-body">
                                <p>¿Estás seguro de que quieres borrar el barrio "<?php echo $row["Barrio"]; ?>"?</p>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="borrar_barrio.php">
                                    <input type="hidden" name="id" value="<?php echo $row["ID"]; ?>">
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            mysqli_free_result($result);
        }
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>