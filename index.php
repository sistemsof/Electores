
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
                <form class="sign-box" id="login" action="view/home/home.php">
                    <div class="sign-avatar">
                        <img src="public/img/descarga.jfif" alt="">
                    </div>
                    <header class="sign-title">Ingreso al Sistema <br>Electores </header>
                    <div class="form-group" id="error">
                        
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail or Phone" />
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        
                        <!-- <div class="float-right reset">
                            <a href="reset-password.html">Reset Password</a> 

                        </div> --> <button type="submit" class="btn btn-rounded" >Iniciar Sesion</button>
                     <br>
                        <div class="float-letf reset">
                         <a href="http://edtsof.com">productos Edtsof.sas </a><br> Cel: 3008511251 -3012948439 
                        
                        </div>
                    
                </form>
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