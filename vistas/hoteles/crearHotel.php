<?php
$controlador = new controladorHotel();
if(isset($_POST['registrar'])){
    $r=$controlador->crear($_POST['nombre'],$_POST['no_estrellas'],$_POST['telefono'],
    $_POST['correo'],$_POST['sitio_web'],$_POST['direccion'],$_POST['ciudad']);
if($r){
echo "
<script>
    if(confirm(\"¿Desea realizar un nuevo registro?\")){
        window.location.href='?cargar=crearHotel';
    }else{
        window.location.href='?cargar=inicioHotel';
    }    
</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Hoteles</title>
    <style>  
        .container1 {
            margin: center;
            padding: 20px;
            background-color: #212529;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .form-group label {
            color: #61dafb;
        }
        .btn-primary {
            background-color: #61dafb;
            border-color: #61dafb;
        }
    </style>
</head>
<body>
    <div class="container-fluid ">
        <h1><b>Registro de Hoteles</b></h1>
        <div class="container1 container-fluid">
            <form method="post" action="">
                <div class="form-group mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre" 
                    pattern="[a-zA-ZÀ-ÿ\u00f1\u00d1\s]+" 
                    oninvalid="this.setCustomValidity('Solo se aceptan letras y espacios.')" 
                    oninput="this.setCustomValidity('')" autofocus required>
                </div>
                <div class="form-group mb-3">
                    <label for="no_estrellas">Número de estrellas:</label>
                    <input type="number" min="1" max="5" class="form-control" id="no_estrellas" name="no_estrellas" placeholder="Ingresa las estrellas" autofocus required>
                </div>
                <div class="form-group mb-3">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa el teléfono" autofocus required
                    pattern="[0-9]{10}" 
                    oninvalid="this.setCustomValidity('Ingresa un número de teléfono válido')"
                    oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group mb-3">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa el correo" autofocus required>
                </div>
                <div class="form-group mb-3">
                    <label for="sutio_web">Sitio web:</label>
                    <input type="url" class="form-control" id="sitio_web" name="sitio_web" placeholder="Ingresa el sitio web" autofocus required>
                </div>
                <div class="form-group mb-3">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa la dirección" autofocus required>
                </div>
                <div class="form-group mb-3">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingresa la ciudad" 
                    pattern="[a-zA-ZÀ-ÿ\u00f1\u00d1\s]+" 
                    oninvalid="this.setCustomValidity('Solo se aceptan letras y espacios.')" 
                    oninput="this.setCustomValidity('')" autofocus required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="registrar">Registrar</button>
            </form>
        </div>
    </div>
</body>
</html>