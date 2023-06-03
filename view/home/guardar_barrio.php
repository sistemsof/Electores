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

    // Realiza la inserción del nuevo barrio en la base de datos
    $sql = "INSERT INTO barrios (ID, Barrio) VALUES ('$ID', '$Barrio')";
    
    if (mysqli_query($con, $sql)) {
        // Redirige nuevamente a barrios.php después de guardar el barrio
        header("Location: barrios.php");
        exit(); // Asegura que se detenga la ejecución después de la redirección
    } else {
        echo "Error al guardar el barrio: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>