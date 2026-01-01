<?php
require_once 'ConnectionDB.php';

class Category extends Connection {
    private $pdo;

    public function __construct() {
        $this->pdo = parent::getConnection();
    }

    public function listar() {
        try {
            // Listamos categorías activas (estado = '1')
            $sql = "SELECT * FROM Categories WHERE estado = '1' ORDER BY nombreCategoria ASC";
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
            $sql = "INSERT INTO Categories (nombreCategoria) VALUES (:nombreCategoria)";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log("Error en registrar categoría: " . $e->getMessage());
            return false;
        }
    }

    public function actualizar($datos = []) {
        try {
            $sql = "UPDATE Categories SET 
                        nombreCategoria = :nombreCategoria
                    WHERE idCategoria = :idCategoria";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log('Error en actualizar categoría: ' . $e->getMessage());
            return false;
        }
    }

    public function eliminar($idCategoria) {
        try {
            // Borrado lógico para no afectar productos ya registrados
            $sql = "UPDATE Categories SET estado = '0' WHERE idCategoria = ?";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute([$idCategoria]);
        } catch (Exception $e) {
            error_log('Error en eliminar categoría: ' . $e->getMessage());
            return false;
        }
    }

    public function buscarId($idCategoria) {
        try {
            $sql = "SELECT * FROM Categories WHERE idCategoria = ?";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute([$idCategoria]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return null;
        }
    }
}