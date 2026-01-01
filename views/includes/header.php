<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaStore - Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --main-blue: #0056b3;
        }

        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Contenedor Flex para alinear Sidebar y Contenido */
        .app-container {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR: Ancho fijo y posición fija */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--main-blue);
            color: white;
            position: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 1.5rem;
            z-index: 1000;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 0.8rem 1rem;
            border-radius: 10px;
            margin-bottom: 0.5rem;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }

        /* CONTENIDO PRINCIPAL: Empujado a la derecha por el ancho del sidebar */
        .main-content {
            margin-left: var(--sidebar-width);
            flex-grow: 1;
            padding: 3rem;
        }

        /* Ajuste para móviles: Si la pantalla es pequeña, el sidebar se oculta o ajusta */
        @media (max-width: 768px) {
            .sidebar { width: 80px; padding: 1rem; }
            .sidebar span { display: none; } /* Oculta texto, deja iconos */
            .main-content { margin-left: 80px; }
        }
    </style>
</head>
<body>

<div class="app-container">
    <aside class="sidebar shadow">
        <div class="mb-4 text-center">
            <h4 class="fw-bold"><i class="bi bi-capsule-pill me-2"></i><span>PharmaStore</span></h4>
        </div>
        
        <nav class="nav flex-column h-100">
            <a href="/PharmaStore/index.php" class="nav-link active">
                <i class="bi bi-house-door fs-5 me-2"></i> <span>Inicio</span>
            </a>
            <a href="/PharmaStore/views/catalog.php" class="nav-link">
                <i class="bi bi-grid fs-5 me-2"></i> <span>Catálogo</span>
            </a>
            <a href="/PharmaStore/views/register.php" class="nav-link">
                <i class="bi bi-plus-circle fs-5 me-2"></i> <span>Registro</span>
            </a>
            <a href="/PharmaStore/views/inventory.php" class="nav-link">
                <i class="bi bi-box-seam fs-5 me-2"></i> <span>Inventario</span>
            </a>
            
            <div class="mt-auto border-top pt-3 text-center">
                <small class="d-block mb-2 text-white-50">Contáctanos</small>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white fs-4"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </nav>
    </aside>

    <main class="main-content"></main>