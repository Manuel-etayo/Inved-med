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
    <form action="reporte.php" method="get">
    Cantidad de medicinas que saldran:  <input name="Cantidad" type="number">
    <input type="hidden" name="Exist" value="S">
    <?php
    echo"<input type='hidden' name='ID' value='$id'>";
    ?>
    <input type="submit">
    </form>
</body>
</html>