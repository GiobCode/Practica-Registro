<?php

    $user = "root";
    $pass = "";
    $server = "localhost";
    $base = "bs_system_hotel";

    $con = "mysql:host=$server;dbname=$base;";

    if(!$con)
    {
        echo "Error al realizar la conexion".mysql_connect_error();
    }

    echo "se realizo correctamente la conexion<br>";

    $miPDO = new PDO($con,$user,$pass);


   $id = $_POST["id"];
   $tipo = $_POST["tipo"];
   $cantidad = $_POST["cantidad"];
   /*$servicio = $_POST["servicio"];*/
   $descripcion = $_POST["descripcion"];
   $precio = $_POST["precio"];



   $consulta = $miPDO->prepare("INSERT INTO habitaciones(`id_habitacion`,`tipo`,`precio`,`cantidad`,`descripcion`) values ('$id','$tipo','$precio','$cantidad','$descripcion');");
   
   $consulta ->execute();
   
   //header("Location:habitaciones.php");
?>

<html>
  <h1>SU REGISTRO SE REALIZO CON EXITO</h1>
  <a href ="habitaciones.php"><button>Regresar</button></a>
</html>