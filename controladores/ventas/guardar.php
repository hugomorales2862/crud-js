<?php
require_once '../../modelos/Venta.php';
require_once '../../modelos/Detalle.php';

$productos = array_filter($_POST['productos']);
$cantidades = array_filter($_POST['cantidades']);
$_POST['venta_fecha'] = str_replace('T',' ', $_POST['venta_fecha']);
if($_POST['venta_cliente'] != '' && $_POST['venta_fecha'] != '' && count($productos)>0 && count($cantidades)>0){

    


    try {
        $venta = new Venta($_POST);
        $resultado = $venta->guardar();
        $idInsertado = $resultado['id'];
        $i = 0;
        foreach ($productos as $key => $producto) {
            $detalle = new Detalle([
                'detalle_venta' => $idInsertado,
                'detalle_producto' => $producto,
                'detalle_cantidad' => $cantidades[$i]
            ]);
            $detalle->guardar();
            $i++;

        }

        
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Debe llenar todos los datos y seleccionar al menos un producto";
}


// if($resultado){
//     echo "Guardado exitosamente";
// }else{
//     echo "Ocurrió un error: $error";
// }

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
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Guardado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/crudphp18may2023/vistas/ventas/index.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>


