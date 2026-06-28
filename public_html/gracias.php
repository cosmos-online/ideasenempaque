<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Gracias por tu mensaje — Ideas Empaque';
$pageDesc  = 'Recibimos tu mensaje. Te responderemos a la brevedad.';

$tipo = $_GET['tipo'] ?? 'contacto'; // 'contacto' | 'cotizacion'
?>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<section class="py-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <i class="bi bi-check-circle-fill mb-4" style="font-size:4rem; color:var(--ie-primary)"></i>
                <?php if ($tipo === 'cotizacion'): ?>
                <h1 class="h2 mb-3">¡Tu cotización fue enviada!</h1>
                <p class="lead text-muted mb-2">
                    Recibimos todos tus datos y en breve un asesor de <strong>Ideas Empaque</strong> se pondrá en contacto contigo.
                </p>
                <p class="text-muted">
                    También recibirás un correo con el resumen de tu solicitud.
                </p>
                <?php else: ?>
                <h1 class="h2 mb-3">¡Mensaje recibido!</h1>
                <p class="lead text-muted mb-2">
                    Gracias por contactar a <strong>Ideas Empaque e Impresión</strong>.
                    Un asesor te responderá a la brevedad.
                </p>
                <?php endif; ?>

                <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
                    <a href="<?= APP_URL ?>/" class="btn btn-primary px-4">Ir al inicio</a>
                    <a href="<?= APP_URL ?>/productos" class="btn btn-outline-primary px-4">Ver productos</a>
                </div>

                <!-- Datos de contacto alternativo -->
                <div class="mt-5 p-4 rounded" style="background:var(--ie-light)">
                    <p class="mb-1 small text-muted">¿Prefieres contactarnos directamente?</p>
                    <a href="tel:+525526303020" class="d-block mb-1">
                        <i class="bi bi-telephone me-2" style="color:var(--ie-primary)"></i><?= e(PHONE) ?>
                    </a>
                    <a href="mailto:<?= e(EMAIL_VENTAS) ?>">
                        <i class="bi bi-envelope me-2" style="color:var(--ie-primary)"></i><?= e(EMAIL_VENTAS) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
