<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/productos-data.php';

$pageTitle = 'Ideas Empaque e Impresión — Fabricantes de Bolsas de Empaque en México';
$pageDesc  = 'Fabricantes y distribuidores de bolsas de polipropileno, papel kraft, ziplock, cintas y materiales de empaque. +13 años de experiencia. Ciudad de México.';

$destacados = array_slice($PRODUCTOS, 0, 8, true);
?>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- ════════════════════════════════════════════════════════════
     HERO
════════════════════════════════════════════════════════════ -->
<section class="hero">
    <div class="hero-bg" style="background-image:url('<?= APP_URL ?>/assets/img/Banner-productos.jpg')"></div>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-label">
                    <i class="bi bi-patch-check-fill"></i>
                    Empresa 100% mexicana · +13 años en la industria
                </div>
                <h1>
                    Fabricantes de<br>
                    <span>bolsas de empaque</span><br>
                    y materiales industriales
                </h1>
                <p class="hero-lead">
                    Polipropileno, papel kraft, ziplock, Pouch y mucho más.
                    Producción propia, precios directos y atención personalizada.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= APP_URL ?>/cotizador" class="btn btn-primary btn-lg px-4">
                        <i class="bi bi-calculator me-2"></i>Cotizar ahora
                    </a>
                    <a href="<?= APP_URL ?>/productos" class="btn btn-outline-white btn-lg px-4">
                        Ver catálogo
                    </a>
                </div>
                <div class="hero-meta">
                    <div class="hero-meta-item">
                        <i class="bi bi-check-circle-fill"></i>
                        Pedido mínimo 1,000 piezas
                    </div>
                    <div class="hero-meta-item">
                        <i class="bi bi-truck"></i>
                        Entrega en CDMX y República
                    </div>
                    <div class="hero-meta-item">
                        <i class="bi bi-palette2"></i>
                        Impresión personalizada
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     STATS BAND
════════════════════════════════════════════════════════════ -->
<div class="stats-band">
    <div class="container">
        <div class="stats-row">
            <div class="stat-item">
                <span class="stat-num">+13</span>
                <span class="stat-label">Años en la industria</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">21</span>
                <span class="stat-label">Tipos de producto</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">25</span>
                <span class="stat-label">Fichas técnicas</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">1,000</span>
                <span class="stat-label">Piezas mínimo</span>
            </div>
        </div>
    </div>
</div>

<!-- ════════════════════════════════════════════════════════════
     CATEGORÍAS
════════════════════════════════════════════════════════════ -->
<section class="py-5 bg-taupe-xlight">
    <div class="container">
        <div class="mb-4">
            <span class="section-label">Nuestro catálogo</span>
            <h2 class="section-title">4 familias de productos</h2>
            <p class="section-lead">Desde bolsas de celofán transparente hasta materiales para embalaje industrial.</p>
        </div>
        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <a href="<?= APP_URL ?>/bolsas-de-sello-lateral" class="cat-card c-red">
                    <div class="cat-card-bg" style="background-image:url('<?= APP_URL ?>/assets/img/productos/grande-s-03-03.jpg')"></div>
                    <div class="cat-card-overlay"></div>
                    <div class="cat-card-body">
                        <div class="cat-icon"><i class="bi bi-bag"></i></div>
                        <div class="cat-title">Bolsas de Celofán</div>
                        <div class="cat-count">4 productos</div>
                    </div>
                    <i class="bi bi-arrow-right cat-arrow"></i>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="<?= APP_URL ?>/productos" class="cat-card c-cyan">
                    <div class="cat-card-bg" style="background-image:url('<?= APP_URL ?>/assets/img/productos/grande-b-04-03.jpg')"></div>
                    <div class="cat-card-overlay"></div>
                    <div class="cat-card-body">
                        <div class="cat-icon"><i class="bi bi-bag-fill"></i></div>
                        <div class="cat-title">Bolsas Especiales</div>
                        <div class="cat-count">8 productos</div>
                    </div>
                    <i class="bi bi-arrow-right cat-arrow"></i>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="<?= APP_URL ?>/sobre-con-adhesivo" class="cat-card c-green">
                    <div class="cat-card-bg" style="background-image:url('<?= APP_URL ?>/assets/img/productos/grande-s-01-03.jpg')"></div>
                    <div class="cat-card-overlay"></div>
                    <div class="cat-card-body">
                        <div class="cat-icon"><i class="bi bi-envelope"></i></div>
                        <div class="cat-title">Sobres</div>
                        <div class="cat-count">3 productos</div>
                    </div>
                    <i class="bi bi-arrow-right cat-arrow"></i>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="<?= APP_URL ?>/cintas-para-empaque" class="cat-card c-taupe">
                    <div class="cat-card-bg" style="background-image:url('<?= APP_URL ?>/assets/img/productos/grande-p-01-03.jpg')"></div>
                    <div class="cat-card-overlay"></div>
                    <div class="cat-card-body">
                        <div class="cat-icon"><i class="bi bi-box-seam"></i></div>
                        <div class="cat-title">Otros Materiales</div>
                        <div class="cat-count">6 productos</div>
                    </div>
                    <i class="bi bi-arrow-right cat-arrow"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     PRODUCTOS DESTACADOS
════════════════════════════════════════════════════════════ -->
<section class="py-5">
    <div class="container">
        <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
            <div>
                <span class="section-label">Más solicitados</span>
                <h2 class="section-title mb-0">Productos destacados</h2>
            </div>
            <a href="<?= APP_URL ?>/productos" class="btn btn-outline-dark-ie btn-sm px-4">
                Ver todos <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
        <div class="row g-3">
            <?php foreach ($destacados as $slug => $p): ?>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="<?= APP_URL ?>/<?= e($slug) ?>" class="product-card">
                    <div class="product-card-img">
                        <?php if (!empty($p['imagenes'][0])): ?>
                        <img src="<?= APP_URL ?>/assets/img/productos/<?= e($p['imagenes'][0]) ?>"
                             alt="<?= e($p['nombre']) ?>" loading="lazy">
                        <?php else: ?>
                        <div class="product-card-no-img"><i class="bi bi-box-seam"></i></div>
                        <?php endif; ?>
                        <div class="product-card-hover">
                            <span class="btn btn-primary btn-sm px-3">Ver producto</span>
                        </div>
                    </div>
                    <div class="product-card-body">
                        <div class="product-cat-badge"><?= e($p['categoria']) ?></div>
                        <div class="product-card-title"><?= e($p['nombre']) ?></div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CÓMO FUNCIONA
════════════════════════════════════════════════════════════ -->
<section class="py-5 bg-light-ie">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <span class="section-label">Proceso de compra</span>
                <h2 class="section-title">De la medida al producto terminado en 3 pasos</h2>
                <p class="section-lead mb-4">
                    Sin complicaciones. Cotiza en línea, confirmamos detalles y producimos tu pedido con la precisión que tu producto merece.
                </p>
                <a href="<?= APP_URL ?>/cotizador" class="btn btn-primary px-4">
                    <i class="bi bi-calculator me-2"></i>Empezar cotización
                </a>
            </div>
            <div class="col-lg-7">
                <div class="d-flex flex-column gap-0">

                    <div class="process-step">
                        <div class="process-num pn-1">1</div>
                        <div>
                            <h5>Cotiza en línea</h5>
                            <p>Ingresa las medidas (ancho, alto, solapa, micras) y la cantidad. Recibes el precio al instante.</p>
                        </div>
                    </div>
                    <div class="d-flex ms-5 ps-3"><div class="process-line"></div></div>

                    <div class="process-step">
                        <div class="process-num pn-2">2</div>
                        <div>
                            <h5>Confirmamos tu pedido</h5>
                            <p>Un asesor te contacta para confirmar especificaciones, arte de impresión (si aplica) y condiciones de entrega.</p>
                        </div>
                    </div>
                    <div class="d-flex ms-5 ps-3"><div class="process-line"></div></div>

                    <div class="process-step">
                        <div class="process-num pn-3">3</div>
                        <div>
                            <h5>Producción y entrega</h5>
                            <p>Fabricamos tu pedido con maquinaria de última generación y lo entregamos en CDMX o enviamos a toda la República.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CTA STRIP
════════════════════════════════════════════════════════════ -->
<section class="cta-strip text-center">
    <div class="container">
        <span class="section-label">¿Listo para cotizar?</span>
        <h2 class="section-title on-dark mb-3">Obtén el precio de tus bolsas<br>en menos de 2 minutos</h2>
        <p class="mb-4">Usa nuestro cotizador y recibe el costo por millar al instante.<br>Sin registro, sin compromiso.</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="<?= APP_URL ?>/cotizador" class="btn btn-primary btn-lg px-5">
                <i class="bi bi-calculator me-2"></i>Cotizar bolsas
            </a>
            <a href="<?= APP_URL ?>/contacto" class="btn btn-outline-white btn-lg px-5">
                Hablar con ventas
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
