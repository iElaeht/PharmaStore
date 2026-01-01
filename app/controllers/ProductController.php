<?php
require_once "../models/Product.php";
$product = new Product();

header("Content-Type: application/json; charset=utf-8");

if (isset($_POST['operation'])) {
    switch ($_POST['operation']) {
        
        case 'listar':
            echo json_encode($product->listar());
            break;

        case 'buscarId':
            echo json_encode($product->buscarId($_POST['idProducto']));
            break;

        case 'registrar':
            $datos = [
                ':idCategoria'      => $_POST['idCategoria'],
                ':nombreProducto'   => $_POST['nombreProducto'],
                ':descripcion'      => $_POST['descripcion'],
                ':precio'           => $_POST['precio'],
                ':stock'            => $_POST['stock'],
                ':stockMinimo'      => $_POST['stockMinimo'],
                ':fechaVencimiento' => $_POST['fechaVencimiento'],
                ':laboratorio'      => $_POST['laboratorio']
            ];
            $resultado = $product->registrar($datos);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Guardado" : "Error"
            ]);
            break;

        case 'actualizar':
            $datos = [
                ':idProducto'       => $_POST['idProducto'],
                ':idCategoria'      => $_POST['idCategoria'],
                ':nombreProducto'   => $_POST['nombreProducto'],
                ':descripcion'      => $_POST['descripcion'],
                ':precio'           => $_POST['precio'],
                ':stock'            => $_POST['stock'],
                ':stockMinimo'      => $_POST['stockMinimo'],
                ':fechaVencimiento' => $_POST['fechaVencimiento'],
                ':laboratorio'      => $_POST['laboratorio']
            ];
            $resultado = $product->actualizar($datos);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Actualizado" : "Error"
            ]);
            break;

        case 'eliminar':
            $resultado = $product->eliminar($_POST['idProducto']);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Eliminado" : "Error"
            ]);
            break;
    }
}