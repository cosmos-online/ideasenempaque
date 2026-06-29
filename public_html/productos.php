<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/productos-data.php';

$pageTitle = 'Productos — Ideas Empaque e Impresión';
$pageDesc  = 'Catálogo completo de bolsas de polipropileno, papel kraft, ziplock, cintas para empaque y más. Solicita tu cotización.';

// Agrupar por categoría
$porCategoria = [];
foreach ($PRODUCTOS as $slug => $p) {
    $cat = $p['categoria'];
    if (!isset($porCategoria[$cat])) $porCategoria[$cat] = [];
    $porCategoria[$cat][$slug] = $p;
}
?>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- Page header -->
<div class="page-header">
    <div class="container">
        <h1>Catálogo de productos</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= APP_URL ?>/">Inicio</a></li>
                <li class="breadcrumb-item active">Productos</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Catálogo -->
<section class="py-5">
    <div class="container">

        <?php foreach ($porCategoria as $categoria => $items): ?>
        <div class="mb-5 pb-2">

            <!-- Separador de categoría -->
            <div class="d-flex align-items-center gap-3 mb-4">
                <h2 class="section-heading mb-0"><?= e($categoria) ?></h2>
                <span class="badge-cat"><?= count($items) ?> productos</span>
            </div>

            <div class="row g-3">
                <?php foreach ($items as $slug => $p): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="<?= APP_URL ?>/<?= e($slug) ?>" class="product-card">
                        <div class="product-card-img">
                            <?php if (!empty($p['imagenes'][0])): ?>
                            <img src="<?= APP_URL ?>/assets/img/productos/<?= e($p['imagenes'][0]) ?>"
                                 alt="<?= e($p['nombre']) ?>"
                                 loading="lazy">
                            <?php else: ?>
                            <div class="product-card-no-img"><i class="bi bi-box-seam"></i></div>
                            <?php endif; ?>
                            <div class="product-card-hover">
                                <span class="btn btn-primary btn-sm px-3">Ver producto</span>
                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-card-title"><?= e($p['nombre']) ?></div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</section>

<!-- CTA -->
<section class="cta-strip text-center">
    <div class="container position-relative" style="z-index:2">
        <h2 class="section-heading mb-3">¿No encuentras lo que buscas?</h2>
        <p class="mb-4">Fabricamos a medida para tu empresa. Contáctanos y platicamos.</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="<?= APP_URL ?>/cotizador" class="btn-hero">
                <i class="bi bi-calculator"></i> Cotizar ahora
            </a>
            <a href="<?= APP_URL ?>/contacto" class="btn btn-outline-white btn-lg px-4">
                Hablar con ventas
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
