
<!-- Selector de paleta (herramienta de previsualización) -->
<div class="palette-switcher" id="paletteSwitcher" title="Cambiar paleta de colores">
    <span class="palette-label">Paleta</span>
    <button class="palette-swatch active" data-palette="rojo"   style="background:#EE3927" title="Rojo Carbón"></button>
    <button class="palette-swatch"        data-palette="cian"   style="background:#52C7D1" title="Cian Marino"></button>
    <button class="palette-swatch"        data-palette="verde"  style="background:#87D338" title="Verde Kraft"></button>
</div>

<!-- WhatsApp FAB -->
<?php if (WA_NUM): ?>
<a href="https://wa.me/<?= e(WA_NUM) ?>?text=Hola%2C%20me%20interesa%20cotizar%20bolsas%20de%20empaque"
   class="whatsapp-fab" target="_blank" rel="noopener" title="WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>
<?php endif; ?>

<footer class="footer">
    <div class="footer-upper">
        <div class="container-fluid px-4">
            <div class="row g-5">

                <!-- Marca -->
                <div class="col-lg-4">
                    <div class="footer-brand mb-2">
                        <img src="<?= APP_URL ?>/assets/img/logo.png" alt="Ideas Empaque">
                    </div>
                    <p class="footer-tagline">
                        Fabricantes y distribuidores de bolsas de polipropileno y materiales de empaque. +13 años en la industria. Empresa 100% mexicana.
                    </p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="https://www.facebook.com/ideasenempaque" target="_blank" rel="noopener" class="footer-social">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/ideasenempaque/" target="_blank" rel="noopener" class="footer-social">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>

                <!-- Productos destacados -->
                <div class="col-sm-6 col-lg-3">
                    <p class="footer-heading">Productos</p>
                    <ul class="footer-links">
                        <li><a href="<?= APP_URL ?>/bolsas-de-sello-lateral">Bolsas de sello lateral</a></li>
                        <li><a href="<?= APP_URL ?>/bolsas-con-adhesivo-y-cenefa">Bolsas con adhesivo</a></li>
                        <li><a href="<?= APP_URL ?>/bolsa-con-cierre-ziplock">Bolsas ziplock</a></li>
                        <li><a href="<?= APP_URL ?>/bolsas-tipo-pouch">Bolsas tipo Pouch</a></li>
                        <li><a href="<?= APP_URL ?>/bolsas-de-papel-kraft">Bolsas de papel kraft</a></li>
                        <li><a href="<?= APP_URL ?>/cintas-para-empaque">Cintas para empaque</a></li>
                        <li><a href="<?= APP_URL ?>/productos" class="highlight">Ver todos →</a></li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div class="col-sm-6 col-lg-3">
                    <p class="footer-heading">Contacto</p>
                    <ul class="footer-links">
                        <li>
                            <a href="tel:+525526303020">
                                <i class="bi bi-telephone me-2" style="color:var(--red)"></i><?= e(PHONE) ?>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:<?= e(EMAIL_VENTAS) ?>">
                                <i class="bi bi-envelope me-2" style="color:var(--red)"></i><?= e(EMAIL_VENTAS) ?>
                            </a>
                        </li>
                        <li class="mt-3">
                            <a href="<?= APP_URL ?>/cotizador" class="btn btn-primary btn-sm px-3 w-100 text-center" style="display:block">
                                <i class="bi bi-calculator me-1"></i>Cotizar ahora
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container-fluid px-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <span>&copy; <?= date('Y') ?> Ideas Empaque e Impresión, S.A. de C.V.</span>
                <span>Diseño: <a href="https://cosmos.com.mx" target="_blank" rel="noopener">Cosmos Online</a></span>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery (por si se necesita) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<!-- Scripts propios -->
<script src="<?= APP_URL ?>/assets/js/main.js"></script>
</body>
</html>
