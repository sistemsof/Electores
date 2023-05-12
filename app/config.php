<?php
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','parqueo.com');

$servidor="mysql:dbname=".BD."; host=".SERVIDOR;
try {
  $pdo=new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
// echo"la conexion a la base de datos exitosa";

} catch (PDOException $e) {
    // echo"Error en la conexion a la base de datos ";
    echo "<script> alert('Error en la conexion a la base de datos');</script><br>";
  
}


$URL="http://localhost/parqueo.com";
?>