document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form-product");
    const idProductoInput = document.getElementById("idProducto");
    const titleHeader = document.getElementById("form-title");
    const btnSubmit = document.getElementById("btn-submit");

    // 1. Obtener ID de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const idProductoURL = urlParams.get('id');

    /**
     * CARGA DE CATEGORÍAS
     */
    async function cargarCategorias() {
        const p = new URLSearchParams();
        p.append("operation", "listar");

        try {
            const res = await fetch("../../app/controllers/CategoryController.php", {
                method: "POST",
                body: p
            });
            const data = await res.json();
            const select = document.getElementById("idCategoria");
            
            select.innerHTML = '<option value="">Seleccione...</option>';
            data.forEach(cat => {
                const option = document.createElement("option");
                option.value = cat.idCategoria;
                option.textContent = cat.nombreCategoria;
                select.appendChild(option);
            });
            return true; 
        } catch (e) {
            console.error("Error al cargar categorías:", e);
            return false;
        }
    }

    /**
     * CARGAR DATOS PARA EDICIÓN
     */
    async function cargarDatosProducto() {
        if (!idProductoURL) return;

        // Cambios visuales de la interfaz
        titleHeader.innerText = "Editar Medicamento";
        btnSubmit.innerHTML = '<i class="bi bi-pencil-square me-2"></i>Actualizar Cambios';

        const p = new URLSearchParams();
        p.append("operation", "buscarId");
        p.append("idProducto", idProductoURL);

        try {
            const res = await fetch("../../app/controllers/ProductController.php", {
                method: "POST",
                body: p
            });
            
            const text = await res.text();
            const data = JSON.parse(text);

            if (data) {
                // Rellenar los campos usando los IDs de tu HTML
                idProductoInput.value = data.idProducto;
                document.getElementById("nombreProducto").value = data.nombreProducto;
                document.getElementById("idCategoria").value = data.idCategoria;
                document.getElementById("descripcion").value = data.descripcion;
                document.getElementById("precio").value = data.precio;
                document.getElementById("stock").value = data.stock;
                document.getElementById("stockMinimo").value = data.stockMinimo;
                document.getElementById("fechaVencimiento").value = data.fechaVencimiento;
                document.getElementById("laboratorio").value = data.laboratorio;
            }
        } catch (e) {
            console.error("Error al cargar datos del producto:", e);
            Swal.fire('Error', 'No se pudieron recuperar los datos del producto.', 'error');
        }
    }

    /**
     * EVENTO SUBMIT
     */
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const operacion = idProductoInput.value ? "actualizar" : "registrar";
        
        Swal.fire({
            title: '¿Confirmar operación?',
            text: `Se va a ${operacion} el producto en el sistema.`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar'
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData(form);
                formData.append("operation", operacion);

                fetch("../../app/controllers/ProductController.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status) {
                        Swal.fire('¡Éxito!', 'Operación completada.', 'success')
                            .then(() => window.location.href = "./Products.php");
                    } else {
                        Swal.fire('Error', data.message || 'Error en la solicitud', 'error');
                    }
                });
            }
        });
    });

    // INICIO: Cargar categorías y LUEGO el producto
    cargarCategorias().then((listo) => {
        if (listo) cargarDatosProducto();
    });
});