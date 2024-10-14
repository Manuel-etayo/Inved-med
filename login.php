<?php
$servidor="localhost";
$user="root";
$pass="";
$database="inv-med";

$conexion=mysqli_connect($servidor,$user,$pass,$database);

$ConfUsu=$_GET['usuario'];
$confPass=$_GET['Clave'];

$sql="select * from usuario where usu='$ConfUsu' and Clave='$confPass'";
$query=mysqli_query($conexion,$sql);


if ($fila=mysqli_num_rows($query)!=0) {
           echo"<script>
           location.href='contenido.php'
            </script>";
    
}    
else
echo"<script>
location.href='index.php' 
 </script>";         
?>