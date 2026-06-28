<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/productos-data.php';

$pageTitle = 'Ideas Empaque e Impresión, S.A. de C.V. — Fabricantes de Bolsas de Celofán';
$pageDesc  = 'Fabricantes y distribuidores de bolsas de polipropileno, polietileno, papel kraft, cintas para empaque y más. +13 años en la industria. Empresa 100% mexicana.';

// Productos destacados para el home (primeros 8)
$destacados = array_slice($PRODUCTOS, 0, 8, true);
?>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- ── HERO CAROUSEL ── -->
<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image:url('<?= APP_URL ?>/assets/img/01.jpg')">
            <div class="carousel-caption">
                <h2>Fabricantes de bolsas de celofán</h2>
                <p>Calidad, precisión y entrega puntual para tu negocio.</p>
                <a href="<?= APP_URL ?>/productos" class="btn btn-primary mt-2">Ver productos</a>
            </div>
        </div>
        <div class="carousel-item" style="background-image:url('<?= APP_URL ?>/assets/img/02.jpg')">
            <div class="carousel-caption">
                <h2>Personalizamos tus empaques</h2>
                <p>Serigrafía y flexografía a 4, 6 y 8 colores.</p>
                <a href="<?= APP_URL ?>/bolsas-impresas" class="btn btn-primary mt-2">Bolsas impresas</a>
            </div>
        </div>
        <div class="carousel-item" style="background-image:url('<?= APP_URL ?>/assets/img/03.jpg')">
            <div class="carousel-caption">
                <h2>Calidad y atención personalizada</h2>
                <p>Más de 13 años sirviendo a la industria del empaque.</p>
                <a href="<?= APP_URL ?>/cotizador" class="btn btn-primary mt-2">Cotiza aquí</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- ── INTRO ── -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <h2 class="section-title">Ideas Empaque e Impresión, S.A. de C.V.</h2>
                <p>Fabricamos bolsas de polipropileno (celofán), conocido también como celofán, un material utilizado en la vida diaria por sus grandes propiedades para proteger cualquier producto a bajo costo.</p>
                <p>Contamos con más de <strong>13 años en la industria del empaque</strong>. Somos una empresa <strong>100% mexicana</strong> con equipos europeos y asiáticos de última generación que pone a su disposición bolsas de empaque de celofán, así como diversos tipos de materiales.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="<?= APP_URL ?>/productos" class="btn btn-primary px-4">Ver catálogo</a>
                    <a href="<?= APP_URL ?>/cotizador" class="btn btn-outline-primary px-4">
                        <i class="bi bi-calculator me-1"></i>Cotizar
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="<?= APP_URL ?>/assets/img/285x286.jpg" alt="Bolsas de celofán" class="img-fluid rounded shadow-sm">
            </div>
        </div>
    </div>
</section>

<!-- ── CARACTERÍSTICAS ── -->
<section class="py-5" style="background: var(--ie-light)">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4">
                    <i class="bi bi-award display-5 mb-3" style="color:var(--ie-primary)"></i>
                    <h5>+13 años de experiencia</h5>
                    <p class="text-muted small">Líderes en la industria del empaque flexible con equipos de última generación.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4">
                    <i class="bi bi-palette display-5 mb-3" style="color:var(--ie-primary)"></i>
                    <h5>Impresión personalizada</h5>
                    <p class="text-muted small">Serigrafía para pocas piezas y flexografía a 4, 6 y 8 colores para tu marca.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4">
                    <i class="bi bi-geo-alt display-5 mb-3" style="color:var(--ie-primary)"></i>
                    <h5>Empresa 100% mexicana</h5>
                    <p class="text-muted small">Producción local, entregas rápidas y atención personalizada a tu proyecto.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ── PRODUCTOS DESTACADOS ── -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="section-title text-center">Nuestros productos</h2>
        <p class="text-center text-muted mb-4">Fabricamos y distribuimos una amplia variedad de empaques para todo tipo de industria.</p>
        <div class="row g-3">
            <?php foreach ($destacados as $slug => $p): ?>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="<?= APP_URL ?>/<?= e($slug) ?>" class="text-decoration-none">
                    <div class="product-card bg-white">
                        <?php if (!empty($p['imagenes'][0])): ?>
                        <img src="<?= APP_URL ?>/assets/img/productos/<?= e($p['imagenes'][0]) ?>"
                             alt="<?= e($p['nombre']) ?>"
                             class="product-card-img">
                        <?php else: ?>
                        <div class="product-card-img-placeholder">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h6 class="card-title"><?= e($p['nombre']) ?></h6>
                            <p class="card-text"><?= e($p['desc_corta']) ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?= APP_URL ?>/productos" class="btn btn-primary px-5">Ver todos los productos</a>
        </div>
    </div>
</section>

<!-- ── CTA COTIZADOR ── -->
<section class="cta-strip text-center">
    <div class="container">
        <h2 class="mb-2">¿Necesitas una cotización?</h2>
        <p class="mb-4">Usa nuestro cotizador en línea y recibe el precio de tus bolsas al instante.</p>
        <a href="<?= APP_URL ?>/cotizador" class="btn btn-dark btn-lg px-5 me-2">
            <i class="bi bi-calculator me-2"></i>Cotizar bolsas
        </a>
        <a href="<?= APP_URL ?>/contacto" class="btn btn-outline-dark btn-lg px-5">
            Contacto directo
        </a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
