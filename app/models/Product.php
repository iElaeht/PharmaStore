<?php
require_once 'Connection.php';

class Product extends Connection {
    private $pdo;

    public function __construct() {
        $this->pdo = parent::getConnection();
    }

    public function listar() {
        try {
            // Hacemos un JOIN para traer el nombre de la categoría si lo necesitas
            $sql = "SELECT p.*, c.nombreCategoria 
                    FROM Products p
                    INNER JOIN Categories c ON p.idCategoria = c.idCategoria
                    WHERE p.estado = '1' ORDER BY p.idProducto DESC";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en listar: " . $e->getMessage());
            return [];
        }
    }

    public function registrar($datos = []) {
        try {
            $sql = "INSERT INTO Products (
                        idCategoria, nombreProducto, descripcion, precio, 
                        stock, stockMinimo, fechaVencimiento, laboratorio
                    ) VALUES (
                        :idCategoria, :nombreProducto, :descripcion, :precio, 
                        :stock, :stockMinimo, :fechaVencimiento, :laboratorio
                    )";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log("Error en registrar: " . $e->getMessage());
            return false;
        }
    }

    public function actualizar($datos = []) {
        try {
            $sql = "UPDATE Products SET 
                        idCategoria = :idCategoria,
                        nombreProducto = :nombreProducto,
                        descripcion = :descripcion,
                        precio = :precio,
                        stock = :stock,
                        stockMinimo = :stockMinimo,
                        fechaVencimiento = :fechaVencimiento,
                        laboratorio = :laboratorio
                    WHERE idProducto = :idProducto";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log('Error en actualizar: ' . $e->getMessage());
            return false;
        }
    }

    public function eliminar($idProducto) {
        try {
            $sql = "UPDATE Products SET estado = '0' WHERE idProducto = ?";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute([$idProducto]);
        } catch (Exception $e) {
            return false;
        }
    }

    public function buscarId($idProducto) {
        try {
            $sql = "SELECT * FROM Products WHERE idProducto = ?";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute([$idProducto]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return null;
        }
    }
}