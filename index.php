<?php
session_start();

$host = "localhost"; 
$user = "root";     
$password = "";     
$dbname = "Electores"; 

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {    
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["user"];
    $password = $_POST["pass"];

    // Verificar las credenciales en la base de datos
    $sql = "SELECT * FROM user WHERE usuario = '$usuario' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Credenciales válidas, iniciar sesión y redirigir al sistema
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $user;
        header("Location: view/home/home.php");
        exit;
    } else {
        // Credenciales inválidas, mostrar un mensaje de error
        $error_message = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>

<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sis_Electores | Edtsof.sas</title>

    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="shortcut icon" href="public/img/elector.jfif">
    <link rel="stylesheet" href="public/css/colombia.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style>
        .user-box {
            position: relative;
            display: flex;
            align-items: center;
        }

        .user-box input {
            padding-right: 40px;
        }

        .user-box .material-icons {
            position: relative;
            top: 50%;
            right: 10px;
            transform: translateY(-100%);
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="avatar">
            <img src="public/img/Mapa-de-Colombia-vector.webp" alt="">
        </div>
        <h2>Ingreso al Sistema Electores</h2>
        <form id="loginForm" method="POST">
            <div class="user-box">
                <input type="text" name="user" required>
                <label>Username</label>
                <i class="material-icons">account_circle</i>
            </div>
            <div class="user-box">
                <input type="password" name="pass" required>
                <label>Password</label>
                <i class="material-icons">https</i>
            </div>
            
            <button type="submit" style="background-color: #2196F3;" onclick="event.preventDefault(); document.getElementById('loginForm').submit();">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Iniciar sesión
            </button>
            <?php
            // Mostrar el mensaje de error si existe
            if (isset($error_message)) {
                echo "<p>$error_message</p>";
            }
            ?>
        </form>
    </div>

    <script src="public/js/lib/jquery/jquery.min.js"></script>
    <script src="public/js/lib/tether/tether.min.js"></script>
    <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function() {
                setTimeout(function() {
                    $('.page-center').matchHeight({
                        remove: true
                    });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                }, 100);
            });
        });
    </script>
    <script src="public/js/app.js"></script>
    <script src="js/login.js"></script>
</body>

</html>