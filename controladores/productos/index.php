<?php
    require '../../modelos/Producto.php';
    $metodo = $_SERVER['REQUEST_METHOD'];
    $tipo = $_POST['tipo'];

    
    try {

        switch ($metodo) {
            case 'POST':
                $producto = new Producto($_POST);
                if($tipo == 1){
                    $resultado = $producto->guardar();
                    $mensaje = "Se guardó correctamente";
                }
                if($tipo == 2){
                    $resultado = $producto->modificar();
                    $mensaje = "Se modificó correctamente";
                }
                if($tipo == 3){
                    $resultado = $producto->eliminar();
                    $mensaje = "Se eliminó correctamente";
                }

                if($resultado){
                    echo json_encode([
                        'mensaje' => $mensaje,
                        'codigo' => 1
                    ]);
                }else{
                    echo json_encode([
                        'mensaje' => 'Ocurrió un error',
                        'codigo' => 0
                    ]);
                }

                break;
            case 'GET':
                $producto = new Producto($_GET);
                $productos = $producto->buscar();

                echo json_encode($productos);
                break;
            
            default:
                // http_response_code(403);
                echo json_encode([
                    'mensaje' => 'Método no permitido',
                    'codigo' => 0
                ]);
                break;
        }
        
    } catch (Exception $e) {
        // http_response_code(500);
        echo json_encode([
            'detalle' => $e->getMessage(),
            'mensaje' => 'Ocurrió un error',
            'codigo' => 0
        ]);
    }