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
    $ID = $_POST["id"];
    $Barrio = $_POST["barrio"];

    // Realiza la actualización del barrio en la base de datos
    $sql = "UPDATE barrios SET Barrio='$Barrio' WHERE ID='$ID'";
    if (mysqli_query($con, $sql)) {
        // Redirecciona a la página principal después de editar el barrio
        header("Location: barrios.php");
        exit();
    } else {
        echo "Error al editar el barrio: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>