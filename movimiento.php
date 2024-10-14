<?php
$id=$_GET['ID'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="movimiento2.php" method="get">
    Cantidad de medicinas a ingresar  <input name="Cantidad" type="number">
    <input type="hidden" name="Exist" value="E">
    <?php
    echo"<input type='hidden' name='ID' value='$id'>";
    ?>
    <input type="submit">
    </form>
</body>
</html>
