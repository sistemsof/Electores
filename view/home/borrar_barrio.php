<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "Electores";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Realiza el borrado del barrio de la base de datos
    $sql = "DELETE FROM barrios WHERE ID='$id'";
    if (mysqli_query($con, $sql)) {
        // Redirige nuevamente a barrios.php después de borrar el barrio
        header("Location: barrios.php");
        exit(); // Asegura que se detenga la ejecución después de la redirección
    } else {
        echo "Error al borrar el barrio: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>