<?php
require_once 'Connection.php'; // Asegúrate de que la ruta sea correcta

class Products {
    private $db;
    private $table = "products"; // Nombre de tu tabla en la BD

    public function __construct() {
        $connection = new ConnectionDB();
        $this->db = $connection->getConnection();
    }

    /**
     * CREATE: Registrar un nuevo producto
     */
    public function register($nombre, $categoria, $precio, $stock, $vencimiento) {
        try {
            $sql = "INSERT INTO {$this->table} (nombre, categoria, precio, stock, fecha_vencimiento) 
                    VALUES (:nombre, :categoria, :precio, :stock, :vencimiento)";
            
            $stmt = $this->db->prepare($sql);
            
            // Vinculamos los parámetros para evitar Inyección SQL
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':vencimiento', $vencimiento);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error en crear producto: " . $e->getMessage());
            return false;
        }
    }

    /**
     * READ: Obtener todos los productos
     */
    public function listarTodos() {
        try {
            $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * UPDATE: Actualizar stock o datos (útil para inventario)
     */
    public function actualizar($id, $nombre, $categoria, $precio, $stock, $vencimiento) {
        try {
            $sql = "UPDATE {$this->table} SET 
                    nombre = :nombre, 
                    categoria = :categoria, 
                    precio = :precio, 
                    stock = :stock, 
                    fecha_vencimiento = :vencimiento 
                    WHERE id = :id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':vencimiento', $vencimiento);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * DELETE: Eliminar un producto
     */
    public function eliminar($id) {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}