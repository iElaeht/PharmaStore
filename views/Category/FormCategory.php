<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaStore | Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/Forms.css">
</head>
<body>

<div class="d-flex">
    <aside class="sidebar shadow">
        <div class="brand-section">
            <i class="bi bi-capsule-pill"></i>
            <span>PharmaStore</span>
        </div>

        <div class="nav-menu">
            <a href="../../index.php" class="nav-item-custom">
                <i class="bi bi-house"></i><span>Inicio</span>
            </a>
            <a href="../catalog.php" class="nav-item-custom">
                <i class="bi bi-grid"></i><span>Catálogo</span>
            </a>
            <a href="../Products/Products.php" class="nav-item-custom">
                <i class="bi bi-box-seam"></i><span>Productos</span>
            </a>
            <a href="Category.php" class="nav-item-custom active">
                <i class="bi bi-tags"></i><span>Categorías</span>
            </a>
        </div>

        <div class="logout-section">
            <a href="#" class="nav-item-custom">
                <i class="bi bi-box-arrow-right"></i><span>Salir</span>
            </a>
        </div>
    </aside>

    <main class="main-content w-100">
        <header class="content-header shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0 fw-bold text-secondary">Gestión de Categorías</h4>
            </div>
        </header>

        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8"> <div class="card card-custom shadow-sm border-0">
                        <div class="card-body p-5">
                            <div class="mb-4">
                                <h2 class="fw-bold mb-1" id="form-title">Nueva Categoría</h2>
                                <p class="text-muted">Defina las categorías para organizar sus medicamentos.</p>
                            </div>
                            
                            <form id="form-category">
                                <input type="hidden" id="idCategoria" name="idCategoria">

                                <div class="row g-4">
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Nombre de la Categoría</label>
                                        <input type="text" class="form-control form-control-lg shadow-sm" 
                                               name="nombreCategoria" id="nombreCategoria" 
                                               placeholder="Ej: Antibióticos, Analgésicos, Cuidado Personal..." required>
                                    </div>
                                </div>

                                <div class="mt-5 d-flex justify-content-between align-items-center pt-3 border-top">
                                    <a href="Category.php" class="btn btn-outline-secondary px-4">Volver al Listado</a>
                                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow" id="btn-submit">
                                        <i class="bi bi-check-circle me-2"></i>Guardar Categoría
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-auto py-4 bg-white border-top text-center text-muted">
            <div class="container">
                <small>&copy; 2026 PharmaStore - Gestión de Categorías.</small>
            </div>
        </footer>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/Category-CRU.js"></script>
</body>
</html>