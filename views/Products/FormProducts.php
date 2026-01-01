<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaStore | Registro</title>
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
            <a href="catalog.php" class="nav-item-custom">
                <i class="bi bi-grid"></i><span>Catálogo</span>
            </a>
            <a href="inventory.php" class="nav-item-custom active">
                <i class="bi bi-box-seam"></i><span>Productos</span>
            </a>
            <a href="../Category/Category.php" class="nav-item-custom ">
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
                <h4 class="m-0 fw-bold text-secondary">Formulario de Registro de Productos</h4>
            </div>
        </header>

        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card card-custom">
                        <div class="card-body p-5">
                            <div class="mb-4">
                                <h2 class="fw-bold mb-1" id="form-title">Información del Medicamento</h2>
                                <p class="text-muted">Ingrese los datos para actualizar el stock global.</p>
                            </div>
                            
                            <form id="form-product">
                                <input type="hidden" id="idProducto" name="idProducto">

                                <div class="row g-4">
                                    <div class="col-md-8">
                                        <label class="form-label fw-bold">Nombre del Producto</label>
                                        <input type="text" class="form-control form-control-lg" name="nombreProducto" id="nombreProducto" placeholder="Nombre comercial o genérico" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Categoría</label>
                                        <select class="form-select form-select-lg" name="idCategoria" id="idCategoria" required>
                                            </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Descripción / Notas</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Uso, dosis o contraindicaciones..."></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Precio Unitario (S/)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">S/</span>
                                            <input type="number" step="0.01" min="0" placeholder="0" class="form-control" name="precio" id="precio" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Stock Actual</label>
                                        <input type="number" class="form-control" min="0" placeholder="0" name="stock" id="stock" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Stock Mínima</label>
                                        <input type="number" class="form-control" min="0" name="stockMinimo" id="stockMinimo" value="5">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Fecha de Vencimiento</label>
                                        <input type="date" class="form-control" name="fechaVencimiento" id="fechaVencimiento" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Laboratorio Fabricante</label>
                                        <input type="text" class="form-control" name="laboratorio" id="laboratorio" placeholder="Ej: Pfizer, Roche, Bayer">
                                    </div>
                                </div>

                                <div class="mt-5 d-flex justify-content-between align-items-center pt-3 border-top">
                                    <button type="reset" class="btn btn-outline-secondary px-4">Limpiar Campos</button>
                                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow" id="btn-submit">
                                        <i class="bi bi-cloud-arrow-up me-2"></i>Guardar Producto
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
                <small>&copy; 2026 PharmaStore - Sistema de Gestión de Inventario. Todos los derechos reservados.</small>
            </div>
        </footer>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/Inventory-CRU.js"></script>
</body>
</html>