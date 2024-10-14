<?php
$servidor="localhost";
$user="root";
$pass="";
$database="inv-med";

$categoria=$_GET['Cat'];

$conexion=mysqli_connect($servidor,$user,$pass,$database);

$query="INSERT INTO `categoria`(`ID`, `Cat`) VALUES ('null','$categoria')";
$resultado=mysqli_query($conexion,$query);

if ($resultado) {
    echo"Se ha insertado correctamente";
}
else {
    echo"Hubo un error al insertar la  categoria de la medicina";
}
echo"<br>";
echo"<a href='Contenido.php' style='text-decoration: none;'>volver</a>";
?>
