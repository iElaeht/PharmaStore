document.addEventListener("DOMContentLoaded", () => {
    const contenedor = document.querySelector("#contenedor-catalogo");
    const txtBuscar = document.querySelector("#txtBuscar");
    const filtroCategoria = document.querySelector("#filtroCategoria");
    let datosLocal = [];

    // 1. Cargar Categorías para el Select
    async function cargarCategorias() {
        const p = new URLSearchParams();
        p.append("operation", "listar");
        const res = await fetch("../app/controllers/CategoryController.php", { method: "POST", body: p });
        const data = await res.json();
        data.forEach(cat => {
            const option = document.createElement("option");
            option.value = cat.nombreCategoria;
            option.textContent = cat.nombreCategoria;
            filtroCategoria.appendChild(option);
        });
    }

    // 2. Cargar Productos
    function cargarProductos() {
        const p = new URLSearchParams();
        p.append("operation", "listar");

        fetch("../app/controllers/ProductController.php", { method: "POST", body: p })
            .then(res => res.json())
            .then(datos => {
                datosLocal = datos;
                renderizar(datosLocal);
            });
    }

    // 3. Renderizar Tarjetas usando .card-custom
    function renderizar(lista) {
        contenedor.innerHTML = "";
        lista.forEach(prod => {
            const stockBajo = parseInt(prod.stock) <= parseInt(prod.stockMinimo);
            const badgeClass = stockBajo ? "badge-critico" : "badge-suficiente";

            contenedor.innerHTML += `
                <div class="col">
                    <div class="card card-custom h-100 border-0 p-3">
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge bg-light text-dark border small">${prod.nombreCategoria}</span>
                            </div>
                            <h5 class="fw-bold mb-1">${prod.nombreProducto}</h5>
                            <p class="text-muted small mb-3">${prod.laboratorio}</p>
                            
                            <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-5">S/ ${parseFloat(prod.precio).toFixed(2)}</span>
                                <span class="badge ${badgeClass}">${prod.stock} uds</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    }

    // Filtros combinados
    function aplicarFiltros() {
        const busqueda = txtBuscar.value.toLowerCase();
        const categoria = filtroCategoria.value;

        const filtrados = datosLocal.filter(p => {
            const matchTexto = p.nombreProducto.toLowerCase().includes(busqueda) || 
                              p.laboratorio.toLowerCase().includes(busqueda);
            const matchCat = categoria === "" || p.nombreCategoria === categoria;
            return matchTexto && matchCat;
        });
        renderizar(filtrados);
    }

    txtBuscar.addEventListener("input", aplicarFiltros);
    filtroCategoria.addEventListener("change", aplicarFiltros);

    cargarCategorias();
    cargarProductos();
});