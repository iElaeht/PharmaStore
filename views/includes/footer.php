</main> </div> <footer class="footer mt-auto py-3 bg-white border-top">
    <div class="container-fluid text-center">
        <span class="text-muted small">
            &copy; <?php echo date('Y'); ?> <strong>PharmaStore</strong>. Todos los derechos reservados. | Sunampe, Ica.
        </span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtenemos el nombre del archivo actual (ej: index.php)
        const currentPath = window.location.pathname.split("/").pop();
        
        // Buscamos todos los enlaces del sidebar
        const navLinks = document.querySelectorAll(".nav-link");
        
        navLinks.forEach(link => {
            // Si el href coincide con la página actual, le ponemos la clase 'active'
            if (link.getAttribute("href") === currentPath) {
                // Primero quitamos 'active' de todos por si acaso
                navLinks.forEach(l => l.classList.remove("active"));
                // Lo añadimos al actual
                link.classList.add("active");
            }
        });
    });
</script>

</body>
</html>