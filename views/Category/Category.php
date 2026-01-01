<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Categorías | PharmaStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/814fc0ff07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/listProduct.css" />
</head>
<body>
    <div class="d-flex">
        <aside class="sidebar shadow">
            <div class="brand-section">
                <i class="bi bi-capsule-pill"></i>
                <span>PharmaStore</span>
            </div>
            <div class="nav-menu w-100">
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
            <div class="logout-section w-100 border-top border-white border-opacity-10 pt-3">
                <a href="#" class="nav-item-custom">
                    <i class="bi bi-box-arrow-right"></i><span>Salir</span>
                </a>
            </div>
        </aside>

        <main class="main-content w-100">
            <header class="content-header shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="m-0 fw-bold text-secondary">Gestión de Categorías</h4>
                    </div>
                    <div>
                        <a href="./FormCategory.php" class="btn btn-primary shadow-sm">
                            <i class="bi bi-plus-lg me-2"></i>Nueva Categoría
                        </a>
                    </div>
                </div>
            </header>

            <div class="container-fluid px-5">
                <div class="row mb-4">
                    <div class="col-md-5">
                        <div class="input-group shadow-sm bg-white rounded-3">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" id="txtBuscar" class="form-control border-start-0 py-2" placeholder="Buscar categoría..." />
                            <button class="btn btn-white border-start-0 text-muted" type="button" id="btnLimpiar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card card-custom">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4 py-3">ID</th>
                                        <th>Nombre de la Categoría</th>
                                        <th class="text-center pe-4">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="lista-categorias"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const contenedor = document.querySelector("#lista-categorias");
            const txtBuscar = document.querySelector("#txtBuscar");
            const btnLimpiar = document.querySelector("#btnLimpiar");
            let datosLocal = [];

            function cargarDatos() {
                const p = new URLSearchParams();
                p.append("operation", "listar");

                fetch("../../app/controllers/CategoryController.php", {
                    method: "POST",
                    body: p,
                })
                .then((res) => res.json())
                .then((datos) => {
                    datosLocal = datos;
                    renderizar(datosLocal);
                })
                .catch((e) => console.error("Error cargando categorías:", e));
            }

            function renderizar(lista) {
                contenedor.innerHTML = "";
                if (lista.length === 0) {
                    contenedor.innerHTML = `<tr><td colspan="3" class="text-center py-4">No hay categorías registradas.</td></tr>`;
                    return;
                }

                lista.forEach((cat) => {
                    contenedor.innerHTML += `
                        <tr>
                            <td class="ps-4 fw-bold">#${cat.idCategoria}</td>
                            <td>
                                <div class="fw-bold text-dark">${cat.nombreCategoria}</div>
                            </td>
                            <td class="text-center">
                                <a href="./FormCategory.php?id=${cat.idCategoria}" class="btn btn-sm btn-outline-primary border-0">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button onclick="eliminar(${cat.idCategoria})" class="btn btn-sm btn-outline-danger border-0">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                });
            }

            txtBuscar.addEventListener("input", (e) => {
                const busqueda = e.target.value.toLowerCase();
                const filtrados = datosLocal.filter((c) =>
                    c.nombreCategoria.toLowerCase().includes(busqueda)
                );
                renderizar(filtrados);
            });

            btnLimpiar.addEventListener("click", () => {
                txtBuscar.value = "";
                renderizar(datosLocal);
            });

            cargarDatos();
        });

        function eliminar(id) {
            if (confirm("¿Seguro de eliminar esta categoría? Esto podría afectar a los productos asociados.")) {
                const p = new URLSearchParams();
                p.append("operation", "eliminar");
                p.append("idCategoria", id);
                
                fetch("../../app/controllers/CategoryController.php", {
                    method: "POST",
                    body: p,
                })
                .then((res) => res.json())
                .then((res) => {
                    if (res.status) location.reload();
                    else alert(res.message || "No se pudo eliminar");
                });
            }
        }
    </script>
</body>
</html>