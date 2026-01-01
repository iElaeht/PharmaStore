<?php
require_once 'Connection.php';

class Product extends Connection {
    private $pdo;

    public function __construct() {
        $this->pdo = parent::getConnection();
    }

    public function listar() {
        try {
            // Solo productos activos
            $sql = "SELECT * FROM products WHERE status = '1' ORDER BY id DESC";
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
            $sql = "INSERT INTO products (name, category, price, stock, expiry_date, status) 
                    VALUES (:name, :category, :price, :stock, :expiry_date, '1')";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log("Error en registrar: " . $e->getMessage());
            return false;
        }
    }
    public function actualizar($datos = []) {
        try {
            $sql = "UPDATE products SET 
                        name = :name,
                        category = :category,
                        price = :price,
                        stock = :stock,
                        expiry_date = :expiry_date
                    WHERE id = :id";
            
            $consulta = $this->pdo->prepare($sql);
            
            // Retorna true si se actualizó, false si hubo error
            return $consulta->execute($datos);
            
        } catch (Exception $e) {
            error_log('Error en actualizar producto: ' . $e->getMessage());
            return false;
        }
    }

    public function eliminar($id) {
        try {
            // Borrado lógico (status 0)
            $sql = "UPDATE products SET status = '0' WHERE id = ?";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute([$id]);
        } catch (Exception $e) {
            error_log('Error en eliminar: ' . $e->getMessage());
            return false;
        }
    }
    public function buscarId($id) {
        try {
            // Buscamos en la tabla de productos
            $sql = "SELECT * FROM products WHERE id = ?";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute([$id]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log('Error en buscarId producto: ' . $e->getMessage());
            return null;
        }
    }
}