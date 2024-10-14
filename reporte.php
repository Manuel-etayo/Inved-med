<?php
$servidor="localhost";
$user="root";
$pass="";
$database="inv-med";

$id_med=$_GET['ID'];
$cantidad=$_GET['Cantidad'];
$existencia=$_GET['Exist'];

$conexion=mysqli_connect($servidor,$user,$pass,$database);

$query3="INSERT INTO `movimientos`(`identificacion`, `Tipo`, `Cantidad`, `Id_med`) VALUES ('null','$existencia','$cantidad','$id_med')";

$result=mysqli_query($conexion,$query3);


if ($result=mysqli_query($conexion,$query3)) {
    echo"todo pelfe";
}
else
echo"no pelfe";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">volver</a>
</body>
</html>

