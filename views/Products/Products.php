<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventario | PharmaStore</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"
    />
    <script
      src="https://kit.fontawesome.com/814fc0ff07.js"
      crossorigin="anonymous"
    ></script>
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
          <a href="Products.php" class="nav-item-custom active">
            <i class="bi bi-box-seam"></i><span>Productos</span>
          </a>
          <a href="../Category/Category.php" class="nav-item-custom">
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
            <div>
              <h4 class="m-0 fw-bold text-secondary">Gestión de Inventario</h4>
            </div>
            <div class="d-flex gap-2">
              <a href="./FormProducts.php" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-lg me-2"></i>Nuevo Producto
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
                <input
                  type="text"
                  id="txtBuscar"
                  class="form-control border-start-0 py-2"
                  placeholder="Buscar por nombre o laboratorio..."
                />
                <button
                  class="btn btn-white border-start-0 text-muted"
                  type="button"
                  id="btnLimpiar"
                >
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
                      <th>Producto / Laboratorio</th>
                      <th>Categoría</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Vencimiento</th>
                      <th class="text-center pe-4">Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="lista-productos"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const contenedor = document.querySelector("#lista-productos");
        const txtBuscar = document.querySelector("#txtBuscar");
        const btnLimpiar = document.querySelector("#btnLimpiar");
        let datosLocal = [];

        function cargarDatos() {
          const p = new URLSearchParams();
          p.append("operation", "listar");

          fetch("../../app/controllers/ProductController.php", {
            method: "POST",
            body: p,
          })
            .then((res) => res.json())
            .then((datos) => {
              datosLocal = datos;
              renderizar(datosLocal);
            })
            .catch((e) => console.error("Error cargando lista:", e));
        }

        function renderizar(lista) {
          contenedor.innerHTML = "";
          if (lista.length === 0) {
            contenedor.innerHTML = `<tr><td colspan="7" class="text-center py-4">No hay productos.</td></tr>`;
            return;
          }

          lista.forEach((prod) => {
            const stockBajo =
              parseInt(prod.stock) <= parseInt(prod.stockMinimo);
            const badgeClass = stockBajo ? "badge-critico" : "badge-suficiente";
            const badgeText = stockBajo ? "Bajo" : "OK";

            contenedor.innerHTML += `
                <tr>
                    <td class="fw-bold">#${prod.idProducto}</td>
                    <td>
                        <div class="fw-bold">${prod.nombreProducto}</div>
                        <small class="text-muted">${prod.laboratorio}</small>
                    </td>
                    <td><span class="badge bg-light text-dark border">${
                      prod.nombreCategoria
                    }</span></td>
                    <td class="fw-bold">S/ ${parseFloat(prod.precio).toFixed(
                      2
                    )}</td>
                    <td>
                        <span class="fw-bold">${prod.stock}</span>
                        <span class="badge ${badgeClass} ms-1" style="font-size:0.7rem">${badgeText}</span>
                    </td>
                    <td><i class="fa-regular fa-calendar-xmark me-1 text-danger"></i>${
                      prod.fechaVencimiento
                    }</td>
                    <td class="text-center">
                        <a href="./FormProducts.php?id=${
                          prod.idProducto
                        }" class="btn btn-sm btn-outline-primary border-0">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <button onclick="eliminar(${
                          prod.idProducto
                        })" class="btn btn-sm btn-outline-danger border-0">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
            `;
          });
        }

        // Filtro en tiempo real (Como en tu ejemplo Rescue)
        txtBuscar.addEventListener("input", (e) => {
          const busqueda = e.target.value.toLowerCase();
          const filtrados = datosLocal.filter(
            (p) =>
              p.nombreProducto.toLowerCase().includes(busqueda) ||
              p.laboratorio.toLowerCase().includes(busqueda)
          );
          renderizar(filtrados);
        });

        btnLimpiar.addEventListener("click", () => {
          txtBuscar.value = "";
          renderizar(datosLocal);
        });

        cargarDatos();
      });

      // Función global eliminar
      function eliminar(id) {
        if (confirm("¿Seguro de eliminar este producto?")) {
          const p = new URLSearchParams();
          p.append("operation", "eliminar");
          p.append("idProducto", id);
          fetch("../../app/controllers/ProductController.php", {
            method: "POST",
            body: p,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.status) location.reload();
            });
        }
      }
    </script>
  </body>
</html>
