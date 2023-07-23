<?php
require_once '../../modelos/Cliente.php';
require_once '../../modelos/Producto.php';
    try {
        $cliente = new Cliente();
        $producto = new Producto();
        $clientes = $cliente->buscar();
        $productos = $producto->buscar();
            // var_dump($clientes);
            // exit;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de ingreso de ventas</h1>
        <div class="row justify-content-center">
            <form action="/crudphp18may2023/controladores/ventas/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="venta_cliente">Cliente</label>
                        <select name="venta_cliente" id="venta_cliente" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($clientes as $key => $cliente) : ?>
                                <option value="<?= $cliente['CLIENTE_ID'] ?>"><?= $cliente['CLIENTE_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="venta_fecha">Fecha de la venta</label>
                        <input type="datetime-local" value="<?= date('Y-m-d H:i') ?>" name="venta_fecha" id="venta_fecha" class="form-control">
                    </div>
                </div>
                <hr>
                <h2>Detalle de productos</h2>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="producto1">Producto 1</label>
                        <select name="productos[]" id="producto1" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($productos as $key => $producto) : ?>
                                <option value="<?= $producto['PRODUCTO_ID'] ?>"><?= $producto['PRODUCTO_NOMBRE'] . " - " . $producto['PRODUCTO_PRECIO'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="cantidad1">Cantidad 1</label>
                        <input type="number" name="cantidades[]" id="cantidad1" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="producto2">Producto 2</label>
                        <select name="productos[]" id="producto2" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($productos as $key => $producto) : ?>
                                <option value="<?= $producto['PRODUCTO_ID'] ?>"><?= $producto['PRODUCTO_NOMBRE'] . " - " . $producto['PRODUCTO_PRECIO'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="cantidad2">Cantidad 2</label>
                        <input type="number" name="cantidades[]" id="cantidad2" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="producto3">Producto 3</label>
                        <select name="productos[]" id="producto3" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($productos as $key => $producto) : ?>
                                <option value="<?= $producto['PRODUCTO_ID'] ?>"><?= $producto['PRODUCTO_NOMBRE'] . " - " . $producto['PRODUCTO_PRECIO'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="cantidad3">Cantidad 3</label>
                        <input type="number" name="cantidades[]" id="cantidad3" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="producto4">Producto 4</label>
                        <select name="productos[]" id="producto4" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($productos as $key => $producto) : ?>
                                <option value="<?= $producto['PRODUCTO_ID'] ?>"><?= $producto['PRODUCTO_NOMBRE'] . " - " . $producto['PRODUCTO_PRECIO'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="cantidad4">Cantidad 4</label>
                        <input type="number" name="cantidades[]" id="cantidad4" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="producto5">Producto 5</label>
                        <select name="productos[]" id="producto5" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($productos as $key => $producto) : ?>
                                <option value="<?= $producto['PRODUCTO_ID'] ?>"><?= $producto['PRODUCTO_NOMBRE'] . " - " . $producto['PRODUCTO_PRECIO'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="cantidad5">Cantidad 5</label>
                        <input type="number" name="cantidades[]" id="cantidad5" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../../assets/js/ventas.js" ></script>
<?php include_once '../../includes/footer.php'?>