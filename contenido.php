<?php
$servidor="localhost";
$user="root";
$pass="";
$database="inv-med";

$conexion=mysqli_connect($servidor,$user,$pass,$database);


$query="SELECT * FROM `medicinas` INNER join categoria ON categoria.ID= medicinas.Id_cat INNER JOIN tipo_med ON tipo_med.ID= medicinas.Id_tipo";
$result=mysqli_query($conexion,$query);
?>
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

</head>
<body>
 <a href="ingresar.php" style="text-decoration: none;" class="btn btn-primary">Ingresar</a>
 <a href="ingTipo.php" style="text-decoration: none;" class="btn btn-primary" >Ingresar Tipo</a>
 <a href="ingCat.php" style="text-decoration: none;" class="btn btn-primary"> Ingresar Categoria</a>
 <br>
<br>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Categoria</th>
            <th>Boton
            </th>
        </tr>
    </thead>
    <tbody>
            <?php
            while ($fila=mysqli_fetch_array($result)){
                $id=$fila['identificacion'];
                $nombre= $fila['Nombre'];
                $tipo=$fila['Tipo'];
                $cat=$fila['Cat'];
            echo"<tr>
            <td>$id</td>
            <td>$nombre</td>
            <td>$tipo</td>
            <td>$cat</td>
             <td><a href='modal.php?ID=$id' class='btn btn-primary'>Ingresar</a></td>
            </tr>";
            }
            ?>
    </tbody>
</table>


    
</body>
<script>
    var lang = {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
        }
    }

    $(document).ready(function () {
        var table = $('#example').DataTable({
            language: lang,
        });

    });
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">Título de la ventana Modal</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" id="bodymodal">
                <p>Contenido de la ventana modal...</p>
            </div>
            <div id="modal-foot" class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="LoadDoc($id)" class="btn btn-primary" id="actualizar">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function loadDoc(ii) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("bodymodal").innerHTML = this.responseText;
    }
  xhttp.open("GET", "modal.php?ID="+ii, true);
  xhttp.send();
}
</script>
</html>