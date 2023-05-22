
<?php include 'app/config.php';?>
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
</head>

<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" method="post" id="login" action="">
                    <div class="sign-avatar">
                        <img src="public/img/descarga.jfif" alt="">
                    </div>
                    <header class="sign-title">Ingreso al Sistema <br>Electores </header>
                    <div class="form-group" id="error">
                        
                    </div>
                    <div class="form-group">
                        <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" />
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        
                        <!-- <div class="float-right reset">
                            <a href="reset-password.html">Reset Password</a> 

                        </div> --> <button type="submit" name="entrarboton"class="btn btn-rounded" >Iniciar Sesion</button>
                     <br>
                        <div class="float-letf reset">
                         <a href="http://edtsof.com">productos Edtsof.sas </a><br> Cel: 3008511251 -3012948439 
                        
                        </div>
                    
                </form>
                <?php
        //include "config.php";//SIRVE PARA UTILIZAR LAS FUNCIONES DEL ARCHIVO CONFIG.PHP
        
        if(isset($_POST['entrarboton'])){//PRESIONASTE EL BOTON DEL FORMULARIO
            $user = $_POST['user'];//LEER EL CONTENIDO DE LA CAJA USER
            $pass = $_POST['pass'];//LEER EL CONTENIDO DE LA CAJA PASS
            if ($user != "" && $pass != ""){
                //PREGUNTAR SI EL USER Y EL PASS SON DIFERENTES HA ESPACIO EN BLANCO
                $sql_query = "select count(*) as cntUser from user where usuario='".$user."' and password='".$pass."'";
                //CONSULTA PARA CONTAR LOS REGISTROS Y PASARLO A LA VARIABLE CNTUSER EN LA TABLA LOGIN,
                //FILTRANDO LOS REGITROS CON EL USUARIO Y PASSWORD INGRESADO POR EL FORMULARIO
                $result = mysqli_query($con,$sql_query);
                //EJECUTAR LA CONSULTA EN LA BASE DE DATOS Y RETORNAR LA RESPUESTA
                $row = mysqli_fetch_array($result);
                //RECORRE EL RESULTADO OBTENIDO Y PASARLO A UNA VARIABLE
                $count = $row['cntUser'];//PASAR EL CONTENIDO A UNA VARIABLE SIMPLE
                if($count == 1){//SOLO UN USUARIO CORRECTO DEBE EXISTIR 
                    $_SESSION['user'] = $user;//LA SESION  SE INICIA Y TOMA COMO VALOR EL USER INGRESADO
                    header('Location: view/home/home.php');//ABRIRLA LA PAGINA HOME.PHP
                }else{
                    echo '<span class="error">'."Invalido user and password";
                    //ERROR SI EL USUARIO O PASSWORD SON INCORRECTOS
                }
            }else{
                echo '<span class="error">'."Ingresar user and password";
                //ERROR SI SE INGRESA ESPACIO EN BLANCO EN USUARIO O PASSWORD
            }
        }
    ?>

            </div>
        </div>
    </div>
    <!--.page-center-->


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