document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form-category");
    const idCategoriaInput = document.getElementById("idCategoria");
    const titleHeader = document.getElementById("form-title");
    const btnSubmit = document.getElementById("btn-submit");

    // 1. Verificar si estamos editando (ID en URL)
    const urlParams = new URLSearchParams(window.location.search);
    const idURL = urlParams.get('id');

    if (idURL) {
        titleHeader.innerText = "Editar Categoría";
        btnSubmit.innerHTML = '<i class="bi bi-pencil-square me-2"></i>Actualizar Cambios';
        cargarDatos(idURL);
    }

    // 2. Función para obtener datos de una categoría específica
    async function cargarDatos(id) {
        const p = new URLSearchParams();
        p.append("operation", "buscarId");
        p.append("idCategoria", id);

        try {
            const res = await fetch("../../app/controllers/CategoryController.php", {
                method: "POST",
                body: p
            });
            const data = await res.json();
            if (data) {
                idCategoriaInput.value = data.idCategoria;
                document.getElementById("nombreCategoria").value = data.nombreCategoria;
            }
        } catch (e) {
            console.error("Error al cargar categoría:", e);
        }
    }

    // 3. Evento Submit (Registrar o Actualizar)
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const operacion = idCategoriaInput.value ? "actualizar" : "registrar";
        
        Swal.fire({
            title: '¿Confirmar operación?',
            text: `Se va a ${operacion} la categoría en el sistema.`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar'
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData(form);
                formData.append("operation", operacion);

                fetch("../../app/controllers/CategoryController.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status) {
                        Swal.fire('¡Éxito!', 'Categoría guardada correctamente.', 'success')
                            .then(() => window.location.href = "./Category.php");
                    } else {
                        Swal.fire('Error', data.message || 'Error en el proceso', 'error');
                    }
                });
            }
        });
    });
});