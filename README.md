# PharmaStore - Sistema de Gestión Farmacéutica 🏥

PharmaStore es una plataforma web integral diseñada para la administración eficiente de productos farmacéuticos. Permite centralizar el control de stock, gestionar categorías de medicamentos y monitorear fechas de vencimiento, facilitando la toma de decisiones mediante un dashboard analítico y un catálogo dinámico.

## Tabla de Contenidos

* [Tecnologías](#tecnologías)
* [Instalación](#instalación)
* [Características Principales](#características)

---

## Tecnologías

* **Frontend:** HTML5, CSS3 (Custom Properties), JavaScript (ES6+), Bootstrap 5.
* **Backend:** PHP 8.x (Arquitectura MVC - Modelo Vista Controlador).
* **Base de Datos:** MySQL (Motor InnoDB para relaciones de integridad).
* **Otros:** Fetch API para peticiones asíncronas, FontAwesome y Bootstrap Icons para iconografía, SweetAlert2.

---

## Instalación

Sigue estos pasos para instalar y ejecutar el proyecto en tu máquina local:

### 1. Clona el repositorio

* git clone https://github.com/tu-usuario/pharma-store.git

### 2. Configura la Base de Datos

* Abre tu gestor de base de datos (phpMyAdmin o MySQL Workbench).

* Crea una base de datos llamada PharmaStore.

* Importa el archivo SQL ubicado en la carpeta del proyecto: app/database/PharmaStore.sql

### 3. Ajusta la conexión en PHP

* Edita el archivo app/models/Conexion.php con las credenciales de tu servidor local:

* private $user = "root";
* private $pass = "root"; // Contraseña configurada

### 4. Servidor Local

* Copia la carpeta del proyecto en tu directorio de servidor (htdocs o www) y accede desde: http://localhost/pharmastore/

---

## Características

* **Panel de Control (Dashboard):** Visualización en tiempo real de indicadores clave como el total de productos registrados, categorías activas y alertas de stock crítico.

* **Gestión de Inventario (CRUD):** Registro completo de medicamentos incluyendo nombre, laboratorio, precio, stock actual, stock mínimo y fecha de vencimiento.

* **Catálogo Visual:** Interfaz dinámica basada en tarjetas (Cards) que permite consultar el catálogo de productos con filtros rápidos por nombre, laboratorio y categoría.

* **Control de Stock Crítico:** Sistema de alertas visuales mediante badges de colores que identifican automáticamente los productos con bajo stock.

* **Módulo de Categorías:** Gestión independiente de familias de productos para mantener el inventario organizado y facilitar las búsquedas.

* **Comunicación Asíncrona:** Implementación de Fetch API para listar, registrar y editar datos sin recargar la página, mejorando la experiencia de usuario.

* **Diseño Responsivo:** Interfaz adaptada para una navegación fluida en dispositivos móviles y computadoras gracias a Bootstrap 5.