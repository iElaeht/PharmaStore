<?php
require_once "../models/Product.php";
$product = new Product();

header("Content-Type: application/json; charset=utf-8");

if (isset($_POST['operation'])) {
    switch ($_POST['operation']) {
        
        case 'listar':
            // Obtenemos todos los productos con status '1'
            echo json_encode($product->listar());
            break;

        case 'buscarId':
            // Buscamos un producto específico para editarlo
            echo json_encode($product->buscarId($_POST['id']));
            break;

        case 'registrar':
            $datos = [
                ':name'        => $_POST['name'],
                ':category'    => $_POST['category'],
                ':price'       => $_POST['price'],
                ':stock'       => $_POST['stock'],
                ':expiry_date' => $_POST['expiry_date']
            ];
            $resultado = $product->registrar($datos);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Producto registrado con éxito" : "Error al registrar"
            ]);
            break;

        case 'actualizar':
            $datos = [
                ':id'          => $_POST['id'],
                ':name'        => $_POST['name'],
                ':category'    => $_POST['category'],
                ':price'       => $_POST['price'],
                ':stock'       => $_POST['stock'],
                ':expiry_date' => $_POST['expiry_date']
            ];
            $resultado = $product->actualizar($datos);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Producto actualizado correctamente" : "No se pudo actualizar"
            ]);
            break;

        case 'eliminar':
            $resultado = $product->eliminar($_POST['id']);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Producto eliminado (desactivado)" : "Error al eliminar"
            ]);
            break;
    }
}