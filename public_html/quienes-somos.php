<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Nosotros — Ideas Empaque e Impresión, S.A. de C.V.';
$pageDesc  = 'Conoce nuestra empresa: más de 13 años fabricando bolsas de polipropileno, celofán y materiales de empaque. Empresa 100% mexicana.';
?>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- Page header -->
<div class="page-header">
    <div class="container">
        <h1>Quiénes somos</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= APP_URL ?>/">Inicio</a></li>
                <li class="breadcrumb-item active">Nosotros</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Quiénes somos -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="section-title">Empresa 100% mexicana</h2>
                <p>
                    <strong>Ideas Empaque e Impresión, S.A. de C.V.</strong> es una empresa mexicana dedicada a la fabricación
                    y distribución de bolsas de polipropileno (celofán), y otros materiales de empaque. Contamos con más
                    de <strong>13 años en la industria</strong>, trabajando con equipos europeos y asiáticos de última generación.
                </p>
                <p>
                    Nos especializamos en atender a empresas de todos los tamaños que requieren empaques de calidad
                    para sus productos: desde pequeños negocios hasta grandes industrias.
                </p>
                <p>
                    Nuestra experiencia y capacidad productiva nos permite ofrecer precios competitivos, entregas puntuales
                    y la flexibilidad de fabricar empaques a la medida de cada cliente.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="<?= APP_URL ?>/assets/img/Banner-productos.jpg" alt="Ideas Empaque" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Qué fabricamos -->
<section class="py-5" style="background: var(--ie-light)">
    <div class="container">
        <h2 class="section-title text-center">¿Qué fabricamos?</h2>
        <p class="text-center text-muted mb-5">
            Contamos con una amplia gama de productos para cubrir las necesidades de empaque de tu empresa.
        </p>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <i class="bi bi-bag display-4 mb-3" style="color:var(--ie-primary)"></i>
                    <h5>Bolsas de polipropileno</h5>
                    <p class="text-muted small">Con adhesivo, sin adhesivo, con cenefa, sello lateral, sello fondo, sello simplex.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <i class="bi bi-archive display-4 mb-3" style="color:var(--ie-primary)"></i>
                    <h5>Bolsas especiales</h5>
                    <p class="text-muted small">Ziplock, tipo Pouch, papel kraft, polipapel, tipo canguro, suaje riñón.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <i class="bi bi-palette display-4 mb-3" style="color:var(--ie-primary)"></i>
                    <h5>Bolsas impresas</h5>
                    <p class="text-muted small">Serigrafía para pequeñas cantidades y flexografía a 4, 6 y 8 colores para grandes tirajes.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <i class="bi bi-box-seam display-4 mb-3" style="color:var(--ie-primary)"></i>
                    <h5>Otros materiales</h5>
                    <p class="text-muted small">Cintas para empaque, poliolefina, polystrech, perchas adhesivas, tiras exhibidoras.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Por qué elegirnos -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <img src="<?= APP_URL ?>/assets/img/285x286.jpg" alt="Calidad" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-7">
                <h2 class="section-title">¿Por qué elegirnos?</h2>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--ie-primary); font-size:1.2rem"></i>
                            <div>
                                <strong>Fabricación propia</strong>
                                <p class="text-muted small mb-0">Controlamos todo el proceso, garantizando calidad constante y entregas puntuales sin intermediarios.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--ie-primary); font-size:1.2rem"></i>
                            <div>
                                <strong>Equipos de última generación</strong>
                                <p class="text-muted small mb-0">Maquinaria europea y asiática que nos permite fabricar con precisión y consistencia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--ie-primary); font-size:1.2rem"></i>
                            <div>
                                <strong>Pedidos mínimos accesibles</strong>
                                <p class="text-muted small mb-0">Atendemos desde pequeñas empresas hasta grandes corporaciones con precios competitivos por millar.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--ie-primary); font-size:1.2rem"></i>
                            <div>
                                <strong>Atención personalizada</strong>
                                <p class="text-muted small mb-0">Asesoramos a cada cliente para encontrar el empaque ideal para su producto y presupuesto.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <i class="bi bi-check-circle-fill flex-shrink-0 mt-1" style="color:var(--ie-primary); font-size:1.2rem"></i>
                            <div>
                                <strong>+13 años en la industria</strong>
                                <p class="text-muted small mb-0">Experiencia y reputación ganada trabajando con cientos de clientes satisfechos en toda la República Mexicana.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <a href="<?= APP_URL ?>/cotizador" class="btn btn-primary px-4">Cotizar ahora</a>
                    <a href="<?= APP_URL ?>/contacto" class="btn btn-outline-primary px-4">Contáctanos</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
