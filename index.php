<?php include 'views/includes/header.php'; ?>

<div class="container-fluid" style="margin:50px;">
    
    <div class="row align-items-center mb-5">
        <div class="col-lg-7 mx-2">
            <h1 class="display-4 fw-bold text-dark mb-3">Tu Salud, Nuestra <span class="text-primary">Prioridad</span></h1>
            <p class="fs-5 text-secondary mb-4">
                Desde nuestra fundación en Sunampe, <strong>PharmaStore</strong> ha sido el pilar de confianza para cientos de familias. 
                Nos esforzamos por ofrecer no solo medicamentos, sino una asesoría humana y profesional.
            </p>
            <div class="d-flex gap-4">
                <a href="catalog.php" class="btn btn-primary btn-lg px-4 shadow-sm">Explorar Productos</a>
                <a href="#conocenos" class="btn btn-outline-secondary btn-lg px-4">Conócenos más</a>
            </div>
        </div>
        <div class="col-lg-5" style="max-width: 540px; margin:0px;">
            <img src="./assets/img/photoindex.jpg" class="img-fluid rounded-5 shadow m-5" alt="Farmacia">
        </div>
    </div>

    <section id="conocenos" class="py-5 bg-white rounded-4 shadow-sm mb-5 px-4">
        <div class="row g-4">
            <div class="col-md-6">
                <h3 class="fw-bold text-primary mb-3">Sobre PharmaStore</h3>
                <p class="text-muted">
                    Nacimos con la visión de descentralizar el acceso a la salud especializada. Creemos que cada habitante de nuestra región merece medicamentos de alta calidad a precios justos. 
                </p>
                <p class="text-muted">
                    Hoy, contamos con un sistema de inventario avanzado que garantiza que todos nuestros productos estén vigentes y almacenados bajo las normas de bioseguridad más estrictas.
                </p>
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold text-primary mb-3">Nuestros Valores</h3>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> <strong>Ética:</strong> Recomendamos lo que realmente necesitas.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> <strong>Puntualidad:</strong> Entregas a domicilio en tiempo récord.</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> <strong>Calidad:</strong> Solo trabajamos con laboratorios certificados.</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="row g-4 mb-5">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4 h-100 rounded-4">
                <h5 class="fw-bold text-primary mb-4 border-bottom pb-2">Servicios Disponibles</h5>
                <div class="row g-4 text-center">
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded-3 mb-2"><i class="bi bi-truck fs-2 text-primary"></i></div>
                        <p class="small fw-bold">Delivery Gratis*</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded-3 mb-2"><i class="bi bi-clipboard2-pulse fs-2 text-danger"></i></div>
                        <p class="small fw-bold">Control Presión</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded-3 mb-2"><i class="bi bi-shield-check fs-2 text-success"></i></div>
                        <p class="small fw-bold">Seguridad Farmacéutica</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded-3 mb-2"><i class="bi bi-whatsapp fs-2 text-success"></i></div>
                        <p class="small fw-bold">Atención Virtual</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100 rounded-4 bg-dark text-white">
                <h5 class="fw-bold text-info border-bottom border-secondary pb-2 mb-3">Atención al Público</h5>
                <p class="mb-1"><i class="bi bi-geo-alt me-2 text-danger"></i> Av. Principal 450, Sunampe.</p>
                <hr class="text-secondary">
                <div class="d-flex justify-content-between mb-2">
                    <span>Lunes a Sábado:</span>
                    <span class="text-info">8:00 AM - 10:00 PM</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Domingos:</span>
                    <span class="text-info">9:00 AM - 6:00 PM</span>
                </div>
                <div class="mt-4 pt-3 border-top border-secondary text-center">
                    <small class="text-white-50">¡Trabajamos en feriados seleccionados!</small>
                </div>
            </div>
        </div>
    </div>

    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0 text-dark">Promociones Destacadas</h3>
            <span class="badge bg-danger">Válido hoy</span>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="p-4 bg-white border rounded-4 shadow-sm d-flex align-items-center border-start border-4 border-primary">
                    <div class="bg-primary bg-opacity-10 p-4 rounded-circle me-4 text-primary">
                        <i class="bi bi-droplet-half fs-1"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Cuidado Dermatológico</h5>
                        <p class="text-muted mb-0">Hasta 30% de descuento en protectores solares y cremas hidratantes.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-white border rounded-4 shadow-sm d-flex align-items-center border-start border-4 border-success">
                    <div class="bg-success bg-opacity-10 p-4 rounded-circle me-4 text-success">
                        <i class="bi bi-plus-square-fill fs-1"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Salud Familiar</h5>
                        <p class="text-muted mb-0">Llévate el segundo producto al 50% en vitaminas seleccionadas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'views/includes/footer.php'; ?>