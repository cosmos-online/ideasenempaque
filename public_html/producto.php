<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/productos-data.php';

$slug = preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['slug'] ?? ''));

// Redirigir si no existe el producto
if (!isset($PRODUCTOS[$slug])) {
    header('Location: ' . APP_URL . '/productos', true, 302);
    exit;
}

$p = $PRODUCTOS[$slug];

$pageTitle = e($p['nombre']) . ' — Ideas Empaque e Impresión';
$pageDesc  = e($p['desc_corta']);

// Productos relacionados: misma categoría, excluyendo el actual
$relacionados = [];
foreach ($PRODUCTOS as $s => $r) {
    if ($s !== $slug && $r['categoria'] === $p['categoria']) {
        $relacionados[$s] = $r;
        if (count($relacionados) >= 4) break;
    }
}
?>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- Page header -->
<div class="page-header">
    <div class="container">
        <h1><?= e($p['nombre']) ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= APP_URL ?>/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="<?= APP_URL ?>/productos">Productos</a></li>
                <li class="breadcrumb-item active"><?= e($p['nombre']) ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Producto -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-5">

            <!-- Galería -->
            <div class="col-lg-5">
                <?php if (!empty($p['imagenes'])): ?>
                <div class="mb-3">
                    <img id="product-main-img"
                         src="<?= APP_URL ?>/assets/img/productos/<?= e($p['imagenes'][0]) ?>"
                         alt="<?= e($p['nombre']) ?>"
                         class="product-gallery-main">
                </div>
                <?php if (count($p['imagenes']) > 1): ?>
                <div class="row g-2">
                    <?php foreach ($p['imagenes'] as $i => $img): ?>
                    <div class="col-3">
                        <img src="<?= APP_URL ?>/assets/img/productos/<?= e($img) ?>"
                             alt="<?= e($p['nombre']) ?> <?= $i+1 ?>"
                             class="product-thumb <?= $i === 0 ? 'active' : '' ?>"
                             data-full="<?= APP_URL ?>/assets/img/productos/<?= e($img) ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <div class="product-gallery-placeholder">
                    <i class="bi bi-box-seam"></i>
                </div>
                <?php endif; ?>
            </div>

            <!-- Info -->
            <div class="col-lg-7">
                <span class="badge-cat mb-2"><?= e($p['categoria']) ?></span>
                <h1 class="h2 mb-3 mt-2"><?= e($p['nombre']) ?></h1>
                <p class="text-muted" style="font-size:1rem"><?= e($p['descripcion']) ?></p>

                <hr>

                <!-- Acciones -->
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <?php if ($p['cotizador']): ?>
                    <a href="<?= APP_URL ?>/cotizador" class="btn btn-primary btn-lg px-4">
                        <i class="bi bi-calculator me-2"></i>Cotizar este producto
                    </a>
                    <?php else: ?>
                    <a href="<?= APP_URL ?>/contacto" class="btn btn-primary btn-lg px-4">
                        <i class="bi bi-envelope me-2"></i>Solicitar información
                    </a>
                    <?php endif; ?>

                    <?php if (!empty($p['pdf'])): ?>
                    <a href="<?= APP_URL ?>/assets/pdf/<?= e($p['pdf']) ?>"
                       target="_blank"
                       class="btn btn-outline-navy btn-lg px-4">
                        <i class="bi bi-file-pdf me-2"></i>Ficha técnica
                    </a>
                    <?php endif; ?>
                </div>

                <!-- Contacto rápido -->
                <div class="p-4 rounded bg-light-ie">
                    <p class="small mb-2 fw-bold text-navy">¿Tienes preguntas sobre este producto?</p>
                    <a href="tel:+525526303020" class="me-3 text-decoration-none">
                        <i class="bi bi-telephone me-1 text-amber"></i><?= e(PHONE) ?>
                    </a>
                    <a href="mailto:<?= e(EMAIL_VENTAS) ?>" class="text-decoration-none">
                        <i class="bi bi-envelope me-1 text-amber"></i><?= e(EMAIL_VENTAS) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Productos relacionados -->
<?php if (!empty($relacionados)): ?>
<section class="py-5" style="background:var(--ie-light)">
    <div class="container">
        <h2 class="section-title">Productos relacionados</h2>
        <div class="row g-3">
            <?php foreach ($relacionados as $rs => $rp): ?>
            <div class="col-6 col-md-3">
                <a href="<?= APP_URL ?>/<?= e($rs) ?>" class="text-decoration-none">
                    <div class="product-card bg-white">
                        <?php if (!empty($rp['imagenes'][0])): ?>
                        <img src="<?= APP_URL ?>/assets/img/productos/<?= e($rp['imagenes'][0]) ?>"
                             alt="<?= e($rp['nombre']) ?>"
                             class="product-card-img">
                        <?php else: ?>
                        <div class="product-card-img-placeholder">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h6 class="card-title"><?= e($rp['nombre']) ?></h6>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
