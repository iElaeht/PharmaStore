<?php
// Importamos el modelo para poder usar sus funciones
require_once '../models/Product.php';

// Verificamos si se ha enviado una acción por POST
if (isset($_POST['action'])) {
    $controller = new ProductController();

    // Dependiendo de la acción, ejecutamos un método
    if ($_POST['action'] === 'register') {
        $controller->register();
    }
    
    // Aquí puedes agregar más acciones como 'update' o 'delete' después
}

class ProductController {
    private $model;

    public function __construct() {
        // Inicializamos el modelo de Producto
        $this->model = new Products();
    }

    /**
     * Procesa el registro de un producto
     */
    public function register() {
        // 1. Recolectamos los datos del formulario (POST)
        $name        = $_POST['name'];
        $category    = $_POST['category'];
        $price       = $_POST['price'];
        $stock       = $_POST['stock'];
        $expiry_date = $_POST['expiry_date'];

        // 2. Llamamos al método del modelo
        // Nota: Asegúrate de que los nombres coincidan con tu archivo Product.php
        $result = $this->model->register($name, $category, $price, $stock, $expiry_date);

        // 3. Redireccionamos según el resultado
        if ($result) {
            // Éxito: volvemos al inventario con un mensaje
            header("Location: ../inventory.php?status=success");
        } else {
            // Error: volvemos al registro con un aviso
            header("Location: ../register.php?status=error");
        }
        exit();
    }
}