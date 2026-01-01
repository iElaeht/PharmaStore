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
            echo json_encode($category->buscarId($_POST['id']));
            break;

        case 'registrar':
            $datos = [
                ':name'        => $_POST['name'],
                ':description' => $_POST['description']
            ];
            $resultado = $category->registrar($datos);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Categoría creada correctamente" : "Error al crear categoría"
            ]);
            break;

        case 'actualizar':
            $datos = [
                ':id'          => $_POST['id'],
                ':name'        => $_POST['name'],
                ':description' => $_POST['description']
            ];
            $resultado = $category->actualizar($datos);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Categoría actualizada" : "Error al actualizar"
            ]);
            break;

        case 'eliminar':
            $resultado = $category->eliminar($_POST['id']);
            echo json_encode([
                "status"  => $resultado,
                "message" => $resultado ? "Categoría eliminada" : "Error al eliminar"
            ]);
            break;
    }
}