<?php
require_once 'Connection.php';

class Category extends Connection {
    private $pdo;

    public function __construct() {
        $this->pdo = parent::getConnection();
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM categories WHERE status = '1' ORDER BY name ASC";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en listar categorías: " . $e->getMessage());
            return [];
        }
    }

    public function registrar($datos = []) {
        try {
            $sql = "INSERT INTO categories (name, description, status) 
                    VALUES (:name, :description, '1')";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log("Error en registrar categoría: " . $e->getMessage());
            return false;
        }
    }
    // ... (listar y registrar ya los tienes)

    public function actualizar($datos = []) {
        try {
            $sql = "UPDATE categories SET 
                        name = :name, 
                        description = :description 
                    WHERE id = :id";
            
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log('Error en actualizar categoría: ' . $e->getMessage());
            return false;
        }
    }

    public function eliminar($id) {
        try {
            // Aplicamos borrado lógico (estado = '0')
            $sql = "UPDATE categories SET status = '0' WHERE id = ?";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute([$id]);
            return $consulta->rowCount() > 0;
        } catch (Exception $e) {
            error_log('Error en eliminar categoría: ' . $e->getMessage());
            return false;
        }
    }

    public function buscarId($id) {
        try {
            $sql = "SELECT * FROM categories WHERE id = ?";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute([$id]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log('Error en buscarId categoría: ' . $e->getMessage());
            return null;
        }
    }
}