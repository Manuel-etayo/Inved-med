<?php
$servidor="localhost";
$user="root";
$pass="";
$database="inv-med";

$nombre=$_GET['nombre'];
$tipo=$_GET['tipo'];
$categoria=$_GET['categoria'];

$conexion=mysqli_connect($servidor,$user,$pass,$database);

$query="INSERT INTO `medicinas`(`identificacion`, `Nombre`, `Id_tipo`, `Id_cat`) VALUES ('null','$nombre','$tipo','$categoria')";
$resultado=mysqli_query($conexion,$query);

if ($resultado) {
    echo"Se ha insertado correctamente";
}
else {
    echo"Hubo un error al insertar la medicina";
}
echo"<br>";
echo"<a href='Contenido.php' style='text-decoration: none;'>volver</a>";
?>