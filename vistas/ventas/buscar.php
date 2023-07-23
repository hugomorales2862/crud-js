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
        <h1 class="text-center">Formulario de búsqueda de ventas</h1>
        <div class="row justify-content-center">
            <form action="/crudphp18may2023/controladores/ventas/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
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
               
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>