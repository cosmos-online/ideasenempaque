<?php
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/functions.php';

$rows = $pdo->query("SELECT * FROM cosmos_mensajes ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes — Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="/admin/">Ideas Empaque &mdash; Admin</a>
    <a href="/admin/logout.php" class="btn btn-sm btn-outline-light">Salir</a>
</nav>
<div class="container-fluid py-4">
    <h5 class="mb-4"><i class="bi bi-envelope me-2"></i>Mensajes de contacto</h5>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr><th>#</th><th>Fecha</th><th>Nombre</th><th>Email</th><th>Tel</th><th>Mensaje</th></tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $r): ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td class="small text-muted"><?= date('d/m/Y', strtotime($r['created_at'])) ?></td>
                        <td><?= e($r['nombre']) ?></td>
                        <td><?= e($r['email']) ?></td>
                        <td><?= e($r['telefono'] ?? '') ?></td>
                        <td class="small"><?= e($r['mensaje']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (!$rows): ?>
                    <tr><td colspan="6" class="text-center text-muted py-4">Sin mensajes aún</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
