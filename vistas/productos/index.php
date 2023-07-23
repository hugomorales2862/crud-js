<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>
<div class="container">
    <h1 class="text-center">Formulario de productos</h1>
    <div class="row justify-content-center mb-5">
        <form class="col-lg-8 border bg-light p-3">
            <input type="text" name="producto_id" id="producto_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="producto_nombre">Nombre del producto</label>
                    <input type="text" name="producto_nombre" id="producto_nombre" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="producto_precio">Precio del producto</label>
                    <input type="number" step="0.01" min="0" name="producto_precio" id="producto_precio" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row justify-content-center" id="divTabla"  style="display: none;">
        <div class="col-lg-8">
            <h2>Listado de productos</h2>
            <table class="table table-bordered table-hover" id="tablaProductos">
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
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../../src/js/funciones.js"></script>
<script src="../../src/js/productos/index.js"></script>
<?php include_once '../../includes/footer.php' ?>