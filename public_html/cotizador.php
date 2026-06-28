<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/mailer.php';

$pageTitle = 'Cotizador de bolsas — Ideas Empaque e Impresión';
$pageDesc  = 'Calcula el precio de tus bolsas de polipropileno al instante. Cotizador en línea de Ideas Empaque.';

session_start();
if (empty($_SESSION['csrf_cot'])) {
    $_SESSION['csrf_cot'] = bin2hex(random_bytes(16));
}
$csrfToken = $_SESSION['csrf_cot'];

$errors  = [];
$result  = null;
$vals    = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CSRF
    if (!isset($_POST['_token']) || $_POST['_token'] !== ($_SESSION['csrf_cot'] ?? '')) {
        $errors[] = 'Sesión inválida. Recarga la página e intenta de nuevo.';
    } else {

        // Recoger y sanitizar
        $vals = [
            'nombre'   => trim($_POST['nombre']   ?? ''),
            'telefono' => trim($_POST['telefono'] ?? ''),
            'email'    => trim($_POST['email']    ?? ''),
            'cantidad' => (int)($_POST['cantidad'] ?? 0),
            'ancho'    => (float)($_POST['ancho']  ?? 0),
            'alto'     => (float)($_POST['alto']   ?? 0),
            'solapa'   => (float)($_POST['solapa'] ?? 0),
            'adhesivo' => in_array($_POST['adhesivo'] ?? '', ['si', 'no']) ? $_POST['adhesivo'] : 'no',
            'micras'   => (float)($_POST['micras'] ?? 0),
            'guardar'  => in_array($_POST['guardar'] ?? '', ['si', 'no']) ? $_POST['guardar'] : 'no',
            'comentarios' => trim($_POST['comentarios'] ?? ''),
        ];

        // Validaciones
        if (strlen($vals['nombre']) < 2)    $errors[] = 'El nombre es requerido.';
        if (!filter_var($vals['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'El correo no es válido.';
        if ($vals['cantidad'] < 1000)       $errors[] = 'La cantidad mínima es 1,000 piezas.';
        if ($vals['ancho'] < 3 || $vals['ancho'] > 80)    $errors[] = 'El ancho debe ser entre 3 y 80 cm.';
        if ($vals['alto'] < 4 || $vals['alto'] > 70)      $errors[] = 'El alto debe ser entre 4 y 70 cm.';
        if ($vals['solapa'] < 0 || $vals['solapa'] > 5)   $errors[] = 'La solapa máxima es 5 cm.';
        if ($vals['solapa'] > $vals['alto'])               $errors[] = 'La solapa no puede ser mayor que el alto.';
        if ($vals['micras'] <= 0)           $errors[] = 'Las micras deben ser mayores a 0.';

        if (empty($errors)) {

            // ── Algoritmo de cotización (exacto del sitio viejo) ──────────────
            $Cantidad = $vals['cantidad'];
            $Ancho    = $vals['ancho'];
            $Alto     = $vals['alto'];
            $Solapa   = $vals['solapa'];
            $Micras   = $vals['micras'];
            $Adhesivo = $vals['adhesivo'];

            $pesoPorMillar   = $Ancho * (($Alto * 2) + $Solapa) * ($Micras / 10000);
            $bolseoPorMillar = max($pesoPorMillar * 12, 35);
            $costoBase       = $pesoPorMillar * 50 + $bolseoPorMillar;

            if      ($Cantidad > 100000) $factor = 1.09;
            elseif  ($Cantidad > 59999)  $factor = 1.10;
            elseif  ($Cantidad > 29999)  $factor = 1.11;
            elseif  ($Cantidad > 9000)   $factor = 1.25;
            else                          $factor = 1.50;

            $costoPorMillar = $costoBase * $factor;

            if ($Adhesivo === 'si') {
                $costoPorMillar += ((($Ancho / 100 * $Cantidad) * 0.07 * 1.17) / ($Cantidad / 1000));
            }

            $costoTotal = $costoPorMillar * ($Cantidad / 1000);

            $result = [
                'costo_millar' => round($costoPorMillar, 2),
                'costo_total'  => round($costoTotal, 2),
            ];
            // ─────────────────────────────────────────────────────────────────

            // Guardar en BD
            try {
                $dbFile = __DIR__ . '/admin/includes/db.php';
                if (file_exists($dbFile)) {
                    require_once $dbFile;
                    $stmt = $pdo->prepare(
                        'INSERT INTO cosmos_cotizaciones
                         (nombre, telefono, email, cantidad, ancho, alto, solapa, medida_solapa,
                          adhesivo, micras, guardar, comentarios, costo_millar, costo_total)
                         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)'
                    );
                    $stmt->execute([
                        $vals['nombre'], $vals['telefono'], $vals['email'],
                        $vals['cantidad'], $vals['ancho'], $vals['alto'],
                        $vals['solapa'] > 0 ? 'si' : 'no', $vals['solapa'],
                        $vals['adhesivo'], $vals['micras'], $vals['guardar'],
                        $vals['comentarios'],
                        $result['costo_millar'], $result['costo_total'],
                    ]);
                }
            } catch (Throwable $e) {
                // No bloquear si BD no está lista
            }

            // Enviar correo a ventas
            $destino = $_ENV['MAIL_TO_COTIZADOR'] ?? 'ventas@ideasenempaque.com';
            $toArr   = explode(',', $destino);
            $to      = trim($toArr[0]);
            $cc      = array_map('trim', array_slice($toArr, 1));

            sendMail(
                $to,
                'Nueva cotización — ' . $vals['nombre'],
                mailTemplate('Nueva cotización de bolsas', [
                    'Nombre'           => $vals['nombre'],
                    'Teléfono'         => $vals['telefono'] ?: '—',
                    'Email'            => $vals['email'],
                    'Cantidad'         => number_format($vals['cantidad']) . ' piezas',
                    'Ancho'            => $vals['ancho'] . ' cm',
                    'Alto'             => $vals['alto'] . ' cm',
                    'Solapa'           => $vals['solapa'] > 0 ? $vals['solapa'] . ' cm' : 'Sin solapa',
                    'Adhesivo'         => $vals['adhesivo'] === 'si' ? 'Sí' : 'No',
                    'Micras'           => $vals['micras'],
                    'Guardar medida'   => $vals['guardar'] === 'si' ? 'Sí' : 'No',
                    'Comentarios'      => $vals['comentarios'] ?: '—',
                    'Costo por millar' => '$' . number_format($result['costo_millar'], 2),
                    'Costo total'      => '$' . number_format($result['costo_total'], 2),
                    'Fecha'            => date('Y-m-d H:i'),
                ]),
                $cc
            );

            // Confirmación al cliente
            sendMail(
                $vals['email'],
                'Cotización recibida — Ideas Empaque',
                mailTemplate('Recibimos tu cotización', [
                    'Estimado/a'       => $vals['nombre'],
                    'Mensaje'          => 'Recibimos tu solicitud de cotización. Un asesor se pondrá en contacto contigo a la brevedad para confirmar los detalles.',
                    'Cantidad'         => number_format($vals['cantidad']) . ' piezas',
                    'Medida'           => $vals['ancho'] . ' × ' . $vals['alto'] . ' cm',
                    'Precio estimado por millar' => '$' . number_format($result['costo_millar'], 2),
                    'Total estimado'   => '$' . number_format($result['costo_total'], 2),
                    'Nota'             => 'Este precio es orientativo. El precio final puede variar según disponibilidad de material y condiciones de producción.',
                ])
            );

            // Regenerar token
            $_SESSION['csrf_cot'] = bin2hex(random_bytes(16));
            $csrfToken = $_SESSION['csrf_cot'];
        }
    }
}
?>
<?php require_once __DIR__ . '/includes/header.php'; ?>

<!-- Page header -->
<div class="page-header">
    <div class="container">
        <h1>Cotizador de bolsas de polipropileno</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= APP_URL ?>/">Inicio</a></li>
                <li class="breadcrumb-item active">Cotizador</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- Formulario -->
            <div class="col-lg-7">
                <h2 class="section-title">Ingresa las medidas de tu bolsa</h2>
                <p class="text-muted mb-4">Calcula el costo de tus bolsas al instante. Completa el formulario y recibe el precio por millar.</p>

                <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <form method="POST" action="<?= APP_URL ?>/cotizador" novalidate>
                    <input type="hidden" name="_token" value="<?= e($csrfToken) ?>">

                    <!-- Datos de contacto -->
                    <h6 class="fw-bold text-uppercase small mb-3" style="color:var(--ie-primary); letter-spacing:1px">Datos de contacto</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label" for="nombre">Nombre *</label>
                            <input type="text" id="nombre" name="nombre" class="form-control"
                                   value="<?= e($vals['nombre'] ?? '') ?>" required maxlength="100">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="telefono">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control"
                                   value="<?= e($vals['telefono'] ?? '') ?>" maxlength="20">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="email">Correo electrónico *</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="<?= e($vals['email'] ?? '') ?>" required maxlength="150">
                        </div>
                    </div>

                    <!-- Especificaciones -->
                    <h6 class="fw-bold text-uppercase small mb-3" style="color:var(--ie-primary); letter-spacing:1px">Especificaciones de la bolsa</h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label" for="cantidad">Cantidad de piezas * <small class="text-muted">(mín. 1,000)</small></label>
                            <input type="number" id="cantidad" name="cantidad" class="form-control"
                                   value="<?= e($vals['cantidad'] ?? '') ?>"
                                   min="1000" step="1000" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="micras">Micras *</label>
                            <select id="micras" name="micras" class="form-select" required>
                                <option value="">Seleccionar...</option>
                                <?php foreach ([15,20,25,30,35,40,45,50,60,70,80,90,100] as $m): ?>
                                <option value="<?= $m ?>" <?= (isset($vals['micras']) && $vals['micras'] == $m) ? 'selected' : '' ?>><?= $m ?> micras</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="ancho">Ancho (cm) * <small class="text-muted">3–80</small></label>
                            <input type="number" id="ancho" name="ancho" class="form-control"
                                   value="<?= e($vals['ancho'] ?? '') ?>"
                                   min="3" max="80" step="0.1" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="alto">Alto (cm) * <small class="text-muted">4–70</small></label>
                            <input type="number" id="alto" name="alto" class="form-control"
                                   value="<?= e($vals['alto'] ?? '') ?>"
                                   min="4" max="70" step="0.1" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="solapa">Solapa (cm) <small class="text-muted">0–5</small></label>
                            <input type="number" id="solapa" name="solapa" class="form-control"
                                   value="<?= e($vals['solapa'] ?? '0') ?>"
                                   min="0" max="5" step="0.5">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">¿Lleva adhesivo?</label>
                            <div class="d-flex gap-3 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="adhesivo" id="adh-si" value="si"
                                           <?= (isset($vals['adhesivo']) && $vals['adhesivo'] === 'si') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="adh-si">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="adhesivo" id="adh-no" value="no"
                                           <?= (!isset($vals['adhesivo']) || $vals['adhesivo'] === 'no') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="adh-no">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">¿Guardar medida para pedidos futuros?</label>
                            <div class="d-flex gap-3 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="guardar" id="gd-si" value="si"
                                           <?= (isset($vals['guardar']) && $vals['guardar'] === 'si') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="gd-si">Sí</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="guardar" id="gd-no" value="no"
                                           <?= (!isset($vals['guardar']) || $vals['guardar'] === 'no') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="gd-no">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="comentarios">Comentarios adicionales</label>
                            <textarea id="comentarios" name="comentarios" class="form-control" rows="3"
                                      maxlength="1000"><?= e($vals['comentarios'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        <i class="bi bi-calculator me-2"></i>Calcular cotización
                    </button>
                </form>
            </div>

            <!-- Resultado + info lateral -->
            <div class="col-lg-5">

                <?php if ($result): ?>
                <div class="cotizador-result mb-4">
                    <h4 class="mb-3">Resultado de tu cotización</h4>
                    <div class="mb-3">
                        <small class="text-muted d-block">Precio por millar</small>
                        <div class="precio-millar"><?php
                            echo '$' . number_format($result['costo_millar'], 2) . ' MXN';
                        ?></div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Total (<?= number_format($vals['cantidad']) ?> piezas)</small>
                        <div class="precio-total fw-bold"><?php
                            echo '$' . number_format($result['costo_total'], 2) . ' MXN';
                        ?></div>
                    </div>
                    <hr>
                    <p class="small text-muted mb-0">
                        <i class="bi bi-info-circle me-1"></i>
                        Precio estimado. El precio final puede variar según disponibilidad y condiciones de producción.
                        Te contactaremos para confirmar.
                    </p>
                </div>
                <?php endif; ?>

                <div class="p-4 rounded" style="background:var(--ie-light)">
                    <h6 class="fw-bold mb-3">¿Cómo funciona el cotizador?</h6>
                    <ol class="small text-muted ps-3">
                        <li class="mb-2">Ingresa las medidas de tu bolsa (ancho, alto, solapa, micras).</li>
                        <li class="mb-2">Selecciona la cantidad que necesitas (mínimo 1,000 piezas).</li>
                        <li class="mb-2">Indica si lleva adhesivo en la solapa.</li>
                        <li class="mb-2">Presiona "Calcular" — obtendrás el precio por millar al instante.</li>
                        <li>Un asesor te contactará para confirmar los detalles y coordinar el pedido.</li>
                    </ol>

                    <hr>

                    <h6 class="fw-bold mb-2">¿Prefieres llamarnos?</h6>
                    <a href="tel:+525526303020" class="text-decoration-none d-block mb-1">
                        <i class="bi bi-telephone me-2" style="color:var(--ie-primary)"></i><?= e(PHONE) ?>
                    </a>
                    <a href="mailto:<?= e(EMAIL_VENTAS) ?>" class="text-decoration-none">
                        <i class="bi bi-envelope me-2" style="color:var(--ie-primary)"></i><?= e(EMAIL_VENTAS) ?>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
