<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/productos-data.php';

$pageTitle = 'Productos — Ideas Empaque e Impresión';
$pageDesc  = 'Catálogo completo de bolsas de polipropileno, bolsas de papel kraft, ziplock, cintas para empaque y más. Solicita tu cotización.';

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

<section class="py-5">
    <div class="container">

        <?php foreach ($porCategoria as $categoria => $items): ?>
        <div class="mb-5">
            <h2 class="section-title mb-4"><?= e($categoria) ?></h2>
            <div class="row g-3">
                <?php foreach ($items as $slug => $p): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="<?= APP_URL ?>/<?= e($slug) ?>" class="text-decoration-none">
                        <div class="product-card bg-white">
                            <?php if (!empty($p['imagenes'][0])): ?>
                            <img src="<?= APP_URL ?>/assets/img/productos/<?= e($p['imagenes'][0]) ?>"
                                 alt="<?= e($p['nombre']) ?>"
                                 class="product-card-img"
                                 loading="lazy">
                            <?php else: ?>
                            <div class="product-card-img-placeholder">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h6 class="card-title"><?= e($p['nombre']) ?></h6>
                                <p class="card-text"><?= e($p['desc_corta']) ?></p>
                                <span class="btn btn-sm btn-outline-primary mt-1">Ver más</span>
                            </div>
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
    <div class="container">
        <h2 class="mb-2">¿No encuentras lo que buscas?</h2>
        <p class="mb-4">Contáctanos — fabricamos a medida para tu empresa.</p>
        <a href="<?= APP_URL ?>/contacto" class="btn btn-dark btn-lg px-5">Contactar a ventas</a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
