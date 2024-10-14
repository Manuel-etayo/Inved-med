<?php
$servidor="localhost";
$user="root";
$pass="";
$database="inv-med";

$tipo=$_GET['tipo'];
$cantidad=$_GET['Cantidad'];
$idMed=$_GET['id_med'];

$conexion=mysqli_connect($servidor,$user,$pass,$database);

$query="INSERT INTO `movimientos`(`ID`, `Tipo`, `Cantidad`, `Id_med`) VALUES ('null','$tipo','$cantidad','$idMed')";
$resultado=mysqli_query($conexion,$query);

if ($resultado) {
    echo"Se ha insertado correctamente";
}
else {
    echo"Hubo un error al insertar la el tipo de medicina";
}
echo"<br>";
echo"<a href='Contenido.php' style='text-decoration: none;'>volver</a>";
?>
