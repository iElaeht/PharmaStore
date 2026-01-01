-- 1. Crear la base de datos

DROP DATABASE IF EXISTS PharmaStore;
CREATE DATABASE PharmaStore;
USE PharmaStore;

-- 2. Tabla de Categorías (Analgésicos, Antibióticos, etc.)
CREATE TABLE Categories (
    idCategoria INT AUTO_INCREMENT PRIMARY KEY,
    nombreCategoria VARCHAR(50) NOT NULL,
    estado CHAR(1) DEFAULT '1'
) ENGINE=INNODB;

-- 3. Tabla de Productos (Medicinas y artículos)
CREATE TABLE Products (
    idProducto INT AUTO_INCREMENT PRIMARY KEY,
    idCategoria INT NOT NULL,
    nombreProducto VARCHAR(120) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    stockMinimo INT DEFAULT 5, -- Para alertas de reabastecimiento
    fechaVencimiento DATE NOT NULL,
    laboratorio VARCHAR(100),
    imagen VARCHAR(255) DEFAULT 'default_product.png',
    estado CHAR(1) DEFAULT '1',
    fechaRegistro DATETIME DEFAULT NOW(),
    FOREIGN KEY (idCategoria) REFERENCES Categories(idCategoria)
) ENGINE=INNODB;

-- 4. Inserción de datos de prueba para categorías
INSERT INTO Categories (nombreCategoria) VALUES 
('Analgésicos'), 
('Antibióticos'), 
('Cuidado Personal'), 
('Vitaminas');

-- Asegúrate de que las categorías (Analgésicos, Antibióticos, etc.) existan antes
-- 1: Analgésicos, 2: Antibióticos, 3: Cuidado Personal, 4: Vitaminas
INSERT INTO Products (idCategoria, nombreProducto, descripcion, precio, stock, fechaVencimiento, laboratorio, imagen) VALUES 
(1, 'Paracetamol 500mg', 'Alivio eficaz contra el dolor de cabeza y fiebre.', 0.50, 150, '2026-10-15', 'Genfar', 'paracetamol.png'),
(1, 'Ibuprofeno 400mg', 'Caja de 20 tabletas. Antiinflamatorio potente.', 12.00, 45, '2025-12-20', 'Bayer', 'ibuprofeno.png'),
(1, 'Naproxeno 550mg', 'Ideal para dolores musculares y articulares.', 1.50, 80, '2026-05-30', 'Apronax', 'naproxeno.png'),
(2, 'Amoxicilina 500mg', 'Antibiótico para infecciones bacterianas.', 1.20, 30, '2025-08-10', 'Portugal', 'amoxicilina.png'),
(2, 'Azitromicina 500mg', 'Tratamiento de 3 días para infecciones respiratorias.', 15.90, 12, '2026-01-05', 'Sanofi', 'azitromicina.png'),
(3, 'Alcohol en Gel 500ml', 'Desinfectante de manos con aloe vera.', 8.50, 25, '2027-03-12', 'Aval', 'alcohol_gel.png'),
(3, 'Bloqueador Solar FPS 90', 'Protección extrema contra rayos UV.', 55.00, 10, '2026-11-20', 'Bahia', 'bloqueador.png'),
(3, 'Crema Dental Triple Acción', 'Pack familiar para limpieza profunda.', 7.90, 40, '2026-06-15', 'Colgate', 'colgate.png'),
(4, 'Vitamina C efervescente', 'Tubo de 10 tabletas para reforzar defensas.', 18.50, 60, '2025-09-30', 'Redoxon', 'vitamina_c.png'),
(4, 'Magnesol Efervescente', 'Suplemento de magnesio para el estrés y energía.', 2.00, 100, '2027-01-10', 'Magnesol', 'magnesol.png');

SELECT * FROM Categories;

SELECT * FROM Products;