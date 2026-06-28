<?php
session_start();
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/mailer.php';

$pageTitle = 'Contacto — Ideas Empaque e Impresión';
$pageDesc  = 'Contáctanos para solicitar información sobre nuestros productos o una cotización personalizada.';

// Generar token CSRF
if (empty($_SESSION['csrf_contacto'])) {
    $_SESSION['csrf_contacto'] = bin2hex(random_bytes(16));
}
$csrfToken = $_SESSION['csrf_contacto'];

$errors  = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CSRF
    if (!isset($_POST['_token']) || $_POST['_token'] !== ($_SESSION['csrf_contacto'] ?? '')) {
        $errors[] = 'Sesión inválida. Recarga la página e intenta de nuevo.';
    } else {

        $nombre   = trim($_POST['nombre']   ?? '');
        $email    = trim($_POST['email']    ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $mensaje  = trim($_POST['mensaje']  ?? '');

        if (strlen($nombre) < 2)          $errors[] = 'El nombre es requerido.';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'El correo no es válido.';
        if (strlen($mensaje) < 10)        $errors[] = 'El mensaje debe tener al menos 10 caracteres.';

        if (empty($errors)) {
            // Guardar en BD si está disponible
            try {
                $dbFile = __DIR__ . '/admin/includes/db.php';
                if (file_exists($dbFile)) {
                    require_once $dbFile;
                    $stmt = $pdo->prepare(
                        'INSERT INTO cosmos_mensajes (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)'
                    );
                    $stmt->execute([$nombre, $email, $telefono, $mensaje]);
                }
            } catch (Throwable $e) {
                // No bloquear si BD no está lista
            }

            // Enviar correo
            $destino = $_ENV['MAIL_TO_COTIZADOR'] ?? 'ventas@ideasenempaque.com';
            $to      = explode(',', $destino)[0] ?? $destino;
            $cc      = array_slice(explode(',', $destino), 1);

            sendMail(
                trim($to),
                'Nuevo mensaje de contacto — ' . $nombre,
                mailTemplate('Nuevo mensaje de contacto', [
                    'Nombre'    => $nombre,
                    'Email'     => $email,
                    'Teléfono'  => $telefono ?: '—',
                    'Mensaje'   => $mensaje,
                    'Fecha'     => date('Y-m-d H:i'),
                ]),
                array_map('trim', $cc)
            );

            // Confirmación al usuario
            sendMail(
                $email,
                'Recibimos tu mensaje — Ideas Empaque',
                mailTemplate('Gracias por contactarnos', [
                    'Estimado/a' => $nombre,
                    'Mensaje'    => 'Recibimos tu mensaje correctamente. En breve un asesor se pondrá en contacto contigo.',
                    'Teléfono'   => PHONE,
                    'Email'      => EMAIL_VENTAS,
                ])
            );

            // Regenerar token y redirigir
            $_SESSION['csrf_contacto'] = bin2hex(random_bytes(16));
            header('Location: ' . APP_URL . '/gracias?tipo=contacto', true, 303);
            exit;
        }
    }
}

?>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- Page header -->
<div class="page-header">
    <div class="container">
        <h1>Contacto</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= APP_URL ?>/">Inicio</a></li>
                <li class="breadcrumb-item active">Contacto</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Formulario -->
            <div class="col-lg-7">
                <h2 class="section-title">Envíanos un mensaje</h2>

                <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $e): ?>
                        <li><?= htmlspecialchars($e, ENT_QUOTES, 'UTF-8') ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <form method="POST" action="<?= APP_URL ?>/contacto" novalidate>
                    <input type="hidden" name="_token" value="<?= e($csrfToken) ?>">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="nombre">Nombre *</label>
                            <input type="text" id="nombre" name="nombre" class="form-control"
                                   value="<?= e($_POST['nombre'] ?? '') ?>" required maxlength="100">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="email">Correo electrónico *</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="<?= e($_POST['email'] ?? '') ?>" required maxlength="150">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="telefono">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control"
                                   value="<?= e($_POST['telefono'] ?? '') ?>" maxlength="20">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="mensaje">Mensaje *</label>
                            <textarea id="mensaje" name="mensaje" class="form-control" rows="5"
                                      required maxlength="2000"><?= e($_POST['mensaje'] ?? '') ?></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="bi bi-send me-2"></i>Enviar mensaje
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Datos de contacto -->
            <div class="col-lg-5">
                <h2 class="section-title">Información de contacto</h2>

                <div class="mb-4">
                    <div class="d-flex gap-3 align-items-start mb-3">
                        <i class="bi bi-telephone-fill fs-4 flex-shrink-0" style="color:var(--ie-primary)"></i>
                        <div>
                            <strong class="d-block">Teléfono</strong>
                            <a href="tel:+525526303020" class="text-muted"><?= e(PHONE) ?></a>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-start mb-3">
                        <i class="bi bi-envelope-fill fs-4 flex-shrink-0" style="color:var(--ie-primary)"></i>
                        <div>
                            <strong class="d-block">Ventas</strong>
                            <a href="mailto:<?= e(EMAIL_VENTAS) ?>" class="text-muted"><?= e(EMAIL_VENTAS) ?></a>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-start">
                        <i class="bi bi-clock-fill fs-4 flex-shrink-0" style="color:var(--ie-primary)"></i>
                        <div>
                            <strong class="d-block">Horario</strong>
                            <span class="text-muted">Lunes a Viernes: 9:00 – 18:00 hrs</span>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded mt-4" style="background:var(--ie-light)">
                    <h6 class="fw-bold mb-3">¿Prefieres cotizar en línea?</h6>
                    <p class="small text-muted mb-3">
                        Usa nuestro cotizador y obtén el precio de tus bolsas al instante.
                    </p>
                    <a href="<?= APP_URL ?>/cotizador" class="btn btn-primary w-100">
                        <i class="bi bi-calculator me-2"></i>Ir al cotizador
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
