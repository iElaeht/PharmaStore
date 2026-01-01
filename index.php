<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PharmaStore | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/listProduct.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="d-flex">
        <aside class="sidebar shadow">
        <div class="brand-section">
          <i class="bi bi-capsule-pill"></i>
          <span>PharmaStore</span>
        </div>

        <div class="nav-menu w-100">
          <a href="index.php" class="nav-item-custom active">
            <i class="bi bi-house"></i><span>Inicio</span>
          </a>
          <a href="views/catalog.php" class="nav-item-custom">
            <i class="bi bi-grid"></i><span>Catálogo</span>
          </a>
          <a href="views/Products/Products.php" class="nav-item-custom">
            <i class="bi bi-box-seam"></i><span>Productos</span>
          </a>
          <a href="views/Category/Category.php" class="nav-item-custom">
                    <i class="bi bi-tags"></i><span>Categorías</span>
          </a>
        </div>

        <div
          class="logout-section w-100 border-top border-white border-opacity-10 pt-3"
        >
          <a href="#" class="nav-item-custom">
            <i class="bi bi-box-arrow-right"></i><span>Salir</span>
          </a>
        </div>
      </aside>

        <main class="main-content w-100">
            <header class="content-header shadow-sm">
                <h4 class="m-0 fw-bold text-secondary">Panel de Control</h4>
            </header>

            <div class="container-fluid px-5">
                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card card-custom stat-card h-100 shadow-sm p-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-shape bg-soft-blue me-3">
                                    <i class="bi bi-box-seam fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-0">Total Productos</h6>
                                    <h2 class="fw-bold mb-0" id="dash-total">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-custom stat-card h-100 shadow-sm p-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-shape bg-soft-danger me-3">
                                    <i class="bi bi-exclamation-triangle fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-0">Stock Crítico</h6>
                                    <h2 class="fw-bold mb-0 text-danger" id="dash-critico">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-custom stat-card h-100 shadow-sm p-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-shape bg-soft-success me-3">
                                    <i class="bi bi-tags fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-0">Categorías</h6>
                                    <h2 class="fw-bold mb-0" id="dash-cat">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="fw-bold text-secondary mb-4">Accesos Rápidos</h5>
                <div class="row g-4">
                    <div class="col-md-6">
                        <a href="views/Products/FormProducts.php" class="text-decoration-none text-dark">
                            <div class="card card-custom p-4 border-0 shadow-sm text-center">
                                <i class="bi bi-plus-circle text-primary fs-1 mb-2"></i>
                                <h6>Registrar Nuevo Medicamento</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="views/catalog.php" class="text-decoration-none text-dark">
                            <div class="card card-custom p-4 border-0 shadow-sm text-center">
                                <i class="bi bi-search text-primary fs-1 mb-2"></i>
                                <h6>Consultar Catálogo</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="assets/js/index.js"></script>
</body>
</html>