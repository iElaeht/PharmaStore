<?php
require_once "../models/Category.php";
$category = new Category();

header("Content-Type: application/json; charset=utf-8");

if (isset($_POST['operation'])) {
    switch ($_POST['operation']) {
        
        case 'listar':
            echo json_encode($category->listar());
            break;

        case 'buscarId':
            echo json_encode($category->buscarId($_POST['idCategoria']));
            break;

        case 'registrar':
            $datos = [
                ':nombreCategoria' => $_POST['nombreCategoria']
            ];
            $resultado = $category->registrar($datos);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Categoría guardada con éxito" : "Error al guardar categoría"
            ]);
            break;

        case 'actualizar':
            $datos = [
                ':idCategoria'     => $_POST['idCategoria'],
                ':nombreCategoria' => $_POST['nombreCategoria']
            ];
            $resultado = $category->actualizar($datos);
            echo json_encode([
                "status"  => $resultado, 
                "message" => $resultado ? "Categoría actualizada" : "Error al actualizar"
            ]);
            break;

        case 'eliminar':
            $resultado = $category->eliminar($_POST['idCategoria']);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Categoría desactivada" : "Error al eliminar"
            ]);
            break;
    }
}