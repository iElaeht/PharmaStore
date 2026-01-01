document.addEventListener("DOMContentLoaded", () => {
    // 1. Obtener conteo de Productos y Alertas
    const fetchProductos = () => {
        const p = new URLSearchParams();
        p.append("operation", "listar");

        fetch("app/controllers/ProductController.php", { method: "POST", body: p })
            .then(res => res.json())
            .then(data => {
                document.getElementById("dash-total").innerText = data.length;
                
                // Contar stock crítico
                const criticos = data.filter(prod => parseInt(prod.stock) <= parseInt(prod.stockMinimo));
                document.getElementById("dash-critico").innerText = criticos.length;
            });
    };

    // 2. Obtener conteo de Categorías
    const fetchCategorias = () => {
        const p = new URLSearchParams();
        p.append("operation", "listar");

        fetch("app/controllers/CategoryController.php", { method: "POST", body: p })
            .then(res => res.json())
            .then(data => {
                document.getElementById("dash-cat").innerText = data.length;
            });
    };

    fetchProductos();
    fetchCategorias();
});