<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <form action="Ingresar2.php" method="get">
    Nombre de la medicina<input type="text" name="nombre">
</body>
</html>
<select name="tipo">
<?php
$servidor="localhost";
$user="root";
$pass="";
$database="inv-med";

$conexion=mysqli_connect($servidor,$user,$pass,$database);

$query="Select * from tipo_med";
$result=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_array($result)){
    echo"<option value=$fila[ID]>
            $fila[Tipo]
            </option>";
}

?>
</select>
<Select name="categoria">
<?php
$query2="Select * from categoria";
$result2=mysqli_query($conexion,$query2);

while ($fila=mysqli_fetch_array($result2)){
    echo"<option value=$fila[ID]>
            $fila[Cat]
            </option>";
}

?>
</Select>
<input type="submit">
</form>