<?php

//$controlador = new controladorpaquete();
$paquete = new Paquetes();
if (isset($_POST)) {
    $buscar = @$_POST['buscar'];
    $resultado = $paquete->filtrar($buscar);
} else {
    $resultado = $paquete->listar();

}
?>
<form method="POST" action="">
    <label for="">Nombre del paquete</label>
    <input class="form-control" type="search" name="buscar" value="<?php echo isset($buscar) ? $buscar : '' ?>">
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .table thead {
            background-color: #007bff;
            color: #fff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .download-btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        .download-btn:hover {
            background-color: #218838;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
        .download-btn:active {
            background-color: #1e7e34;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Datos de los Paquetes</h2>
        <table class="table table-bordered table-striped">
        <thead>
    <th class="success">Id</th>
    <th class="success"><center>Tipo</center></th>
    <th class="success">Características</th>
    <th class="success">Costo</th>
    <th class="success">Editar</th>
    <th class="success">Eliminar</th>

    </thead>

    <tbody>
        <?php while($row = mysqli_fetch_assoc($resultado)):?>
            <tr>
                <td><?php echo $row['id_paquete'];?></td>
                <td><?php echo $row['tipo_paquete'];?></td>
                <td><?php echo $row['caracteristicas'];?></td>
                <td><?php echo $row['costo'];?></td>
                <td><a href=?cargar=editarPaquete&id_paquete=<?php echo $row['id_paquete'] ?>><center> <i class="fa fa-file"></i></center></a></td>
                <td><a onClick='confirmar(<?php echo $row['id_paquete']; ?> )'style="cursor: pointer;"><center> <i class="fa fa-eraser"></i></center></a></td>

            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script src="js/jquery.js"></script>
<script src="js/sweetalert.min.js"></script>

<script language = "javascript">
    function confirmar(id_paquete) {
  var MyId = id_paquete;
  swal({
    title: "¿Estas seguro de eliminar el registro?",
    text: "Ya no podrás recuperarlo",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sí, borrar",
    closeOnConfirm: false
  },
  function(){
    window.location.href='?cargar=eliminarPaquete&id_paquete='+MyId;
  });
}
</script>