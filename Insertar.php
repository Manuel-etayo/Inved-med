<?php
$servidor="localhost";
$user="root";
$pass="";
$database="peliculas";

$conexion=mysqli_connect($servidor,$user,$pass,$database);

$id=$_GET['ID'];
$query="select * from Pelis where ID='$id'";
$result=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_array($result)){
    $nombre= $fila['Nombre'];
    $tipo=$fila['Tipo'];
    $edad=$fila['Mayor de'];
    $actores=$fila['Actores'];
    $id=$fila['ID'];

   echo" <form action='actualizar.php' method='get'>
   <input type='hidden' value='$id' name='ID'>
   <br>
    Nombre<input type='text' value='$nombre' name='Nombre'>
    <br>
    Tipo<input type='text' value='$tipo' name='Tipo'>
    <br>
    Mayor de<input type='text' value='$edad' name='Edad'>
    <br>
    Actores<input type='text' value='$actores' name='Actores'>
    <br>
    <input type='submit' value='Modificar' class='btn btn-primary'>
  </form>";

}

?>s