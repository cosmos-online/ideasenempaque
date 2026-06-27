<?php
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../includes/functions.php';

$flash = getFlash();
$rows  = $pdo->query("SELECT * FROM cosmos_productos ORDER BY nombre ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos — Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="/admin/">Ideas Empaque &mdash; Admin</a>
    <a href="/admin/logout.php" class="btn btn-sm btn-outline-light">Salir</a>
</nav>
<div class="container-fluid py-4">
    <?php if ($flash): ?>
    <div class="alert alert-<?= e($flash['type']) ?> alert-dismissible fade show">
        <?= e($flash['msg']) ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0"><i class="bi bi-box-seam me-2"></i>Productos</h5>
        <a href="create.php" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>Nuevo producto</a>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr><th>Nombre</th><th>Slug URL</th><th>Activo</th><th>Acciones</th></tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $r): ?>
                <tr>
                    <td><?= e($r['nombre']) ?></td>
                    <td><code><?= e($r['slug']) ?></code></td>
                    <td><?= $r['activo'] ? '<span class="badge bg-success">S&iacute;</span>' : '<span class="badge bg-secondary">No</span>' ?></td>
                    <td>
                        <a href="edit.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (!$rows): ?>
                <tr><td colspan="4" class="text-center text-muted py-4">Sin productos. <a href="create.php">Agregar primero</a></td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
