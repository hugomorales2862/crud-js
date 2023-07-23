<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Venta.php';
require '../../modelos/Detalle.php';
    try {
        $id = $_GET['venta_id'];
        $venta = new Venta($_GET);
        $detalle = new Detalle([
            'detalle_venta' => $id
        ]);

        $ventas = $venta->buscar();
        $productos = $detalle->buscar();
        // echo "<pre>";
        // var_dump($ventas);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($productos);
        // echo "</pre>";
        // echo strlen($ventas[0]['CLIENTE_NIT']) - 2;
        $subtotal = 0;
        $cantidades = 0;
        // exit;
        // $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center table-dark">
                            <th colspan="5">DETALLE DE LA FACTURA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>FECHA:</td>
                            <td colspan="4"><?= date('d/m/Y H:i' , strtotime( $ventas[0]['VENTA_FECHA'])) ?></td>
                        </tr>
                        <tr>
                            <td>NOMBRE:</td>
                            <td colspan="4"><?= $ventas[0]['CLIENTE_NOMBRE'] ?></td>
                        </tr>
                        <tr>
                            <td>NIT:</td>
                            <td colspan="4"><?= substr_replace($ventas[0]['CLIENTE_NIT'], '-', strlen($ventas[0]['CLIENTE_NIT']) - 1, 0 )?></td>
                        </tr>
                        <tr class="text-center table-dark" >
                            <th colspan="5">PRODUCTOS</th>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>PRODUCTO</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>SUBTOTAL</th>
                        </tr>
                        <?php if(count($productos) > 0):?>

                        <?php foreach($productos as $key => $producto) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $producto['PRODUCTO_NOMBRE'] ?></td>
                            <td><?= $producto['PRODUCTO_PRECIO'] ?></td>
                            <td><?= $producto['CANTIDAD'] ?></td>
                            <td>Q. <?= $producto['TOTAL'] ?></td>
                            <?php $subtotal += $producto['TOTAL'] ?>
                            <?php $cantidades += $producto['CANTIDAD'] ?>
                        </tr>
                        <?php endforeach ?>
                        <tr class="fw-bold bg-light">
                            <td colspan="3">TOTAL</td>
                            <td ><?= $cantidades ?></td>
                            <td >Q. <?= $subtotal ?></td>
                        </tr>
                        <?php else :?>
                            <tr>
                                <td colspan="5">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>