<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/productos-data.php';

$pageTitle = 'Ideas Empaque e Impresión — Fabricantes de Bolsas de Empaque en México';
$pageDesc  = 'Fabricantes y distribuidores de bolsas de polipropileno, papel kraft, ziplock, cintas y materiales de empaque. +13 años de experiencia. Ciudad de México.';

$destacados = array_slice($PRODUCTOS, 0, 8, true);
?>
<?php require_once __DIR__ . '/includes/header.php'; ?>


<!-- ════════════════════════════════════════════
     HERO — Split diagonal
═════════════════════════════════════════════ -->
<section class="hero">

    <!-- Texto -->
    <div class="hero-left">
        <div class="hero-inner">

            <div class="hero-eyebrow">Fabricantes mexicanos desde 2011</div>

            <h1 class="hero-heading">
                Bolsas y materiales<br>
                de empaque<br>
                <em>a tu medida</em>
            </h1>

            <div class="hero-chips">
                <span class="hero-chip"><i class="bi bi-check2-circle"></i> +13 años en el mercado</span>
                <span class="hero-chip"><i class="bi bi-check2-circle"></i> 21 productos disponibles</span>
                <span class="hero-chip"><i class="bi bi-check2-circle"></i> Desde 1,000 piezas</span>
                <span class="hero-chip"><i class="bi bi-check2-circle"></i> Cotización instantánea</span>
            </div>

            <div class="hero-actions">
                <a href="<?= APP_URL ?>/cotizador" class="btn-hero">
                    <i class="bi bi-calculator"></i> Cotizar ahora
                </a>
                <a href="<?= APP_URL ?>/productos" class="hero-link">
                    Ver catálogo completo <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>

    <!-- Imagen con diagonal -->
    <div class="hero-right">
        <div class="hero-right-clip">
            <img src="<?= APP_URL ?>/assets/img/Banner-productos.jpg"
                 alt="Bolsas y materiales de empaque Ideas Empaque"
                 loading="eager">
        </div>
    </div>

</section>


<!-- ════════════════════════════════════════════
     STATS BAR
═════════════════════════════════════════════ -->
<div class="stats-bar">
    <div class="container">
        <div class="stats-inner">
            <div class="stat-block">
                <span class="stat-num">+13</span>
                <span class="stat-desc">Años en la industria</span>
            </div>
            <div class="stat-block">
                <span class="stat-num">21</span>
                <span class="stat-desc">Tipos de producto</span>
            </div>
            <div class="stat-block">
                <span class="stat-num">25</span>
                <span class="stat-desc">Fichas técnicas</span>
            </div>
            <div class="stat-block">
                <span class="stat-num">1,000</span>
                <span class="stat-desc">Piezas mínimo</span>
            </div>
        </div>
    </div>
</div>


<!-- ════════════════════════════════════════════
     CATEGORÍAS
═════════════════════════════════════════════ -->
<section class="py-5 bg-taupe-xlt">
    <div class="container">

        <div class="row align-items-end mb-4">
            <div class="col-lg-7">
                <span class="section-tag">Nuestro catálogo</span>
                <h2 class="section-heading mt-1">4 familias de productos</h2>
                <p class="section-lead">Desde bolsas de celofán transparente hasta materiales para embalaje industrial.</p>
            </div>
            <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                <a href="<?= APP_URL ?>/productos" class="btn btn-outline-dark-ie btn-sm px-4">
                    Ver todos los productos <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <a href="<?= APP_URL ?>/bolsas-de-sello-lateral" class="cat-card">
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
                <a href="<?= APP_URL ?>/productos" class="cat-card">
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
                <a href="<?= APP_URL ?>/sobre-con-adhesivo" class="cat-card">
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
                <a href="<?= APP_URL ?>/cintas-para-empaque" class="cat-card">
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


<!-- ════════════════════════════════════════════
     PRODUCTOS DESTACADOS
═════════════════════════════════════════════ -->
<section class="py-5">
    <div class="container">

        <div class="row align-items-end mb-4">
            <div class="col">
                <span class="section-tag">Productos más solicitados</span>
                <h2 class="section-heading mt-1">Lo que nuestros clientes más piden</h2>
            </div>
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


<!-- ════════════════════════════════════════════
     POR QUÉ ELEGIRNOS
═════════════════════════════════════════════ -->
<section class="py-5 bg-taupe-xlt">
    <div class="container">

        <div class="text-center mb-5">
            <span class="section-tag">Nuestras ventajas</span>
            <h2 class="section-heading mt-1">¿Por qué elegir Ideas Empaque?</h2>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-4">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-rulers"></i></div>
                    <h5 class="why-title">Producción a medida</h5>
                    <p class="why-text">Fabricamos con las especificaciones exactas que tu producto necesita: ancho, alto, solapa, micras y materiales a elegir.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-graph-down-arrow"></i></div>
                    <h5 class="why-title">Precios directos de fábrica</h5>
                    <p class="why-text">Sin intermediarios. Compramos y producimos directamente, lo que nos permite ofrecerte los mejores precios del mercado.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-clock-history"></i></div>
                    <h5 class="why-title">+13 años de experiencia</h5>
                    <p class="why-text">Empresa 100% mexicana con más de 13 años sirviendo a negocios de todos los sectores en CDMX y todo el país.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-calculator"></i></div>
                    <h5 class="why-title">Cotización instantánea</h5>
                    <p class="why-text">Ingresa las medidas de tu bolsa y obtén el precio al instante, sin esperar. Cotizador en línea disponible 24/7.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-box-seam"></i></div>
                    <h5 class="why-title">Mínimo accesible</h5>
                    <p class="why-text">Pedidos desde 1,000 piezas para que puedas empezar sin comprometer todo tu capital en inventario.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="why-card">
                    <div class="why-icon"><i class="bi bi-file-earmark-pdf"></i></div>
                    <h5 class="why-title">25 fichas técnicas</h5>
                    <p class="why-text">Cada producto tiene su ficha técnica descargable en PDF con todas las especificaciones, tolerancias y aplicaciones.</p>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ════════════════════════════════════════════
     CTA STRIP
═════════════════════════════════════════════ -->
<section class="cta-strip text-center">
    <div class="container position-relative" style="z-index:2">
        <h2 class="section-heading mb-3">¿Listo para cotizar tu pedido?</h2>
        <p class="mb-4" style="font-size:1rem;max-width:480px;margin-left:auto;margin-right:auto">
            Ingresa las medidas y cantidad. El precio lo obtienes al instante, sin registrarte.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="<?= APP_URL ?>/cotizador" class="btn-hero">
                <i class="bi bi-calculator"></i> Iniciar cotización
            </a>
            <a href="<?= APP_URL ?>/contacto" class="btn btn-outline-white btn-lg px-4">
                Hablar con un asesor
            </a>
        </div>
    </div>
</section>


<?php require_once __DIR__ . '/includes/footer.php'; ?>
