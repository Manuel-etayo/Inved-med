<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.4/js/responsive.bootstrap4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- JS de Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
<?php
$servidor="localhost";
$user="root";
$pass="";
$database="inv-med";

$conexion=mysqli_connect($servidor,$user,$pass,$database);

$Id=$_GET['ID'];
$query="SELECT * FROM `medicinas` INNER JOIN tipo_med on medicinas.Id_tipo=tipo_med.ID INNER JOIN categoria on medicinas.Id_cat=categoria.ID where medicinas.identificacion='$Id'";
$result=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_array($result)){
    $iD=$fila['identificacion'];
    $nombre= $fila['Nombre'];
    $tipo=$fila['Tipo'];
    $categoria=$fila['Cat'];

   echo"<table>
   <tr>
   <td>
   <form action='actualizar.php' method='get'>
   <input type='hidden' value='$iD' name='Identificacion'>
   <br>
    Nombre<input type='text' value='$nombre' name='Nombre'>
    <br>
    Tipo<input type='text' value='$tipo' name='Tipo'>
    <br>
    Categoria<input type='text' value='$categoria' name='categoria'>
    <br>
    Existencia: 
    <br>
   <button type='button'onclick='CargaDoc($iD);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>+</button>
   <button type='button'onclick='Document($iD);' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exModal'>-</button>
    <br>
    
  </form>
  </td>
  </tr>
  </table>";

}
$query4="SELECT SUM(`Cantidad`) as can FROM `movimientos` where Tipo='E' and id_med='$Id'";

$result=mysqli_query($conexion,$query4);

while ($fila=mysqli_fetch_array($result)){
    $SumEn=$fila['can'];
}

$query5="SELECT SUM(`Cantidad`) FROM `movimientos` where Tipo='S' and id_med='$Id'";

$result=mysqli_query($conexion,$query5);

while ($fila=mysqli_fetch_array($result)){
    $SumSa=$fila['SUM(`Cantidad`)'];
}

$existencia=$SumEn-$SumSa;
echo"la cantidad de medicina es:".$existencia;
?>
<script>
    function CargaDoc(ii) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("bodymodal2").innerHTML = this.responseText;
    }
  xhttp.open("GET", "movimiento.php?ID="+ii, true);
  xhttp.send();
}
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Entrada</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" id="bodymodal2">
                <p>Contenido de la ventana modal...</p>
            </div>
            <div id="modal-foot" class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="LoadDoc($id)" class="btn btn-primary" id="actualizar">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Salida</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" id="bodymodal">
            </div>
            <div id="modal-foot" class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="Doc($id)" class="btn btn-primary" id="actualizar">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function Document(ii) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("bodymodal").innerHTML = this.responseText;
    }
  xhttp.open("GET", "menos1.php?ID="+ii, true);
  xhttp.send();
}
</script>
</body>

</html>