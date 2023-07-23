<?php
require '../../modelos/Producto.php';
try {
    $producto = new Producto($_GET);
    
    $productos = $producto->buscar();
    // echo "<pre>";
    // var_dump($productos);
    // echo "</pre>";
    // exit;
    // $error = "NO se guardó correctamente";
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRE</th>
                            <th>PRECIO</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($productos) > 0):?>
                        <?php foreach($productos as $key => $producto) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $producto['PRODUCTO_NOMBRE'] ?></td>
                            <td><?= $producto['PRODUCTO_PRECIO'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/crudphp18may2023/vistas/productos/modificar.php?producto_id=<?= $producto['PRODUCTO_ID']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/crudphp18may2023/controladores/productos/eliminar.php?producto_id=<?= $producto['PRODUCTO_ID']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/crudphp18may2023/vistas/productos/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>