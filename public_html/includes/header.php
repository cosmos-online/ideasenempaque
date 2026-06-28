<?php if (!defined('APP_URL')) require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle ?? 'Ideas Empaque e Impresión, S.A. de C.V.') ?></title>
    <meta name="description" content="<?= e($pageDesc ?? 'Manufactura y distribución de artículos para empaque y exhibición de productos. Bolsas de polipropileno, polietileno, papel kraft, cintas y más.') ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Handlee&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/style.css">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= e(GA_ID) ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?= e(GA_ID) ?>');
    </script>
</head>
<body>

<!-- Barra superior -->
<div class="topbar py-1">
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-end align-items-center gap-3 small">
            <a href="mailto:<?= e(EMAIL_VENTAS) ?>" class="topbar-link">
                <i class="bi bi-envelope me-1"></i><?= e(EMAIL_VENTAS) ?>
            </a>
            <a href="tel:+525526303020" class="topbar-link">
                <i class="bi bi-telephone me-1"></i><?= e(PHONE) ?>
            </a>
            <a href="https://www.facebook.com/ideasenempaque" target="_blank" rel="noopener" class="topbar-link">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://www.instagram.com/ideasenempaque/" target="_blank" rel="noopener" class="topbar-link">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
    </div>
</div>

<!-- Navbar principal -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container-fluid px-4">

        <!-- Logo -->
        <a class="navbar-brand py-2" href="<?= APP_URL ?>/">
            <img src="<?= APP_URL ?>/assets/img/logo.png" alt="Ideas Empaque e Impresión" height="55">
        </a>

        <!-- Toggle mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">

                <li class="nav-item">
                    <a class="nav-link" href="<?= APP_URL ?>/">
                        <i class="bi bi-house me-1"></i>Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= APP_URL ?>/quienes-somos">Nosotros</a>
                </li>

                <!-- Polipropileno -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Bolsas de Celofán
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-de-sello-lateral">Bolsas de sello lateral</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-con-adhesivo-y-cenefa">Bolsas con adhesivo y cenefa</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-de-sello-simplex">Bolsas de sello simplex</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-de-sello-fondo">Bolsas de sello fondo</a></li>
                    </ul>
                </li>

                <!-- Bolsas variadas -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Bolsas</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-de-polietileno">Bolsas de polietileno</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-de-polipapel">Bolsas de polipapel</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsa-con-cierre-ziplock">Bolsas con cierre ziplock</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-tipo-pouch">Bolsas tipo Pouch</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-tipo-canguro">Bolsas tipo canguro</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-de-papel-kraft">Bolsas de papel kraft</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-impresas">Bolsas impresas</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/bolsas-de-suaje-rinon">Bolsas de suaje riñón</a></li>
                    </ul>
                </li>

                <!-- Sobres -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Sobres</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/sobre-con-adhesivo">Sobre con adhesivo</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/sobre-sin-adhesivo">Sobre sin adhesivo</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/sobre-con-adhesivo-y-cenefa">Sobre con adhesivo y cenefa</a></li>
                    </ul>
                </li>

                <!-- Otros -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Otros productos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/cintas-para-empaque">Cintas para empaque</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/cintas-doble-cara">Cintas doble cara</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/rollos-de-poleolefina">Rollos de poliolefina</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pelicula-polistrech">Película polystrech</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/perchas-adhesivas">Perchas adhesivas</a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/tiras-exhibidoras">Tiras exhibidoras</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= APP_URL ?>/contacto">Contacto</a>
                </li>

                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary btn-sm px-3" href="<?= APP_URL ?>/cotizador">
                        <i class="bi bi-calculator me-1"></i>Cotizar
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
