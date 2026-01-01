<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo | PharmaStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/listProduct.css">
    <script src="https://kit.fontawesome.com/814fc0ff07.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="d-flex">
        <aside class="sidebar shadow">
        <div class="brand-section">
          <i class="bi bi-capsule-pill"></i>
          <span>PharmaStore</span>
        </div>

        <div class="nav-menu w-100">
          <a href="../index.php" class="nav-item-custom">
            <i class="bi bi-house"></i><span>Inicio</span>
          </a>
          <a href="catalog.php" class="nav-item-custom active">
            <i class="bi bi-grid"></i><span>Catálogo</span>
          </a>
          <a href="Products/Products.php" class="nav-item-custom">
            <i class="bi bi-box-seam"></i><span>Productos</span>
          </a>
          <a href="Category/Category.php" class="nav-item-custom">
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
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="m-0 fw-bold text-secondary">Catálogo de Medicamentos</h4>
                    <select id="filtroCategoria" class="form-select w-25 shadow-sm border-0">
                        <option value="">Todas las Categorías</option>
                    </select>
                </div>
            </header>

            <div class="container-fluid px-5">
                <div class="row mb-4">
                    <div class="col-md-5">
                        <div class="input-group shadow-sm bg-white rounded-3">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" id="txtBuscar" class="form-control border-start-0 py-2" placeholder="Buscar por nombre o laboratorio...">
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 pb-5" id="contenedor-catalogo">
                    </div>
            </div>
        </main>
    </div>

    <script src="../assets/js/catalog-logic.js"></script>
</body>
</html>