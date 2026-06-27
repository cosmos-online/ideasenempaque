<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';

// Conteos para el dashboard
$cotizaciones = $pdo->query("SELECT COUNT(*) FROM cosmos_cotizaciones")->fetchColumn();
$mensajes     = $pdo->query("SELECT COUNT(*) FROM cosmos_mensajes")->fetchColumn();
$productos    = $pdo->query("SELECT COUNT(*) FROM cosmos_productos")->fetchColumn();
$usuarios     = $pdo->query("SELECT COUNT(*) FROM cosmos_usuarios WHERE activo = 1")->fetchColumn();

$flash = getFlash();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Admin Ideas Empaque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">Ideas Empaque — Admin</span>
    <div class="d-flex align-items-center gap-3">
        <span class="text-white-50 small"><?= e($_SESSION['admin_nombre']) ?></span>
        <a href="logout.php" class="btn btn-sm btn-outline-light">Salir</a>
    </div>
</nav>

<div class="container-fluid py-4">
    <?php if ($flash): ?>
        <div class="alert alert-<?= e($flash['type']) ?> alert-dismissible fade show">
            <?= e($flash['msg']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <h5 class="mb-4">Dashboard</h5>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <a href="modules/cotizaciones/list.php" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="bi bi-calculator fs-2 text-primary"></i>
                        <div><div class="fs-4 fw-bold"><?= $cotizaciones ?></div><div class="text-muted small">Cotizaciones</div></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a href="modules/mensajes/list.php" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="bi bi-envelope fs-2 text-success"></i>
                        <div><div class="fs-4 fw-bold"><?= $mensajes ?></div><div class="text-muted small">Mensajes</div></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a href="modules/productos/list.php" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="bi bi-box-seam fs-2 text-warning"></i>
                        <div><div class="fs-4 fw-bold"><?= $productos ?></div><div class="text-muted small">Productos</div></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a href="modules/usuarios/list.php" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <i class="bi bi-person-lock fs-2 text-secondary"></i>
                        <div><div class="fs-4 fw-bold"><?= $usuarios ?></div><div class="text-muted small">Usuarios</div></div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-semibold">Últimas cotizaciones</div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="table-light"><tr><th>Nombre</th><th>Cantidad</th><th>Total</th><th>Fecha</th></tr></thead>
                        <tbody>
                        <?php
                        $rows = $pdo->query("SELECT nombre, cantidad, costo_total, created_at FROM cosmos_cotizaciones ORDER BY created_at DESC LIMIT 5")->fetchAll();
                        foreach ($rows as $r):
                        ?>
                        <tr>
                            <td><?= e($r['nombre']) ?></td>
                            <td><?= number_format($r['cantidad']) ?></td>
                            <td>$<?= number_format($r['costo_total']) ?></td>
                            <td class="text-muted small"><?= date('d/m/Y', strtotime($r['created_at'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (!$rows): ?><tr><td colspan="4" class="text-center text-muted py-3">Sin cotizaciones aún</td></tr><?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-semibold">Últimos mensajes</div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover mb-0">
                        <thead class="table-light"><tr><th>Nombre</th><th>Email</th><th>Fecha</th></tr></thead>
                        <tbody>
                        <?php
                        $rows = $pdo->query("SELECT nombre, email, created_at FROM cosmos_mensajes ORDER BY created_at DESC LIMIT 5")->fetchAll();
                        foreach ($rows as $r):
                        ?>
                        <tr>
                            <td><?= e($r['nombre']) ?></td>
                            <td><?= e($r['email']) ?></td>
                            <td class="text-muted small"><?= date('d/m/Y', strtotime($r['created_at'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (!$rows): ?><tr><td colspan="3" class="text-center text-muted py-3">Sin mensajes aún</td></tr><?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
