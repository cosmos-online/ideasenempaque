
<!-- WhatsApp flotante -->
<?php if (WA_NUM): ?>
<a href="https://wa.me/<?= e(WA_NUM) ?>?text=Hola%2C%20me%20interesa%20cotizar%20empaques"
   class="whatsapp-fab" target="_blank" rel="noopener" title="Contáctanos por WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>
<?php endif; ?>

<footer class="footer mt-5">
    <div class="container-fluid px-4 py-5">
        <div class="row g-4">

            <div class="col-md-4">
                <img src="<?= APP_URL ?>/assets/img/logo.png" alt="Ideas Empaque" height="50" class="mb-3">
                <p class="footer-text small">
                    Fabricantes y distribuidores de artículos para empaque y exhibición de productos.
                    Más de 13 años en la industria. Empresa 100% mexicana.
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="https://www.facebook.com/ideasenempaque" target="_blank" rel="noopener" class="footer-social">
                        <i class="bi bi-facebook fs-5"></i>
                    </a>
                    <a href="https://www.instagram.com/ideasenempaque/" target="_blank" rel="noopener" class="footer-social">
                        <i class="bi bi-instagram fs-5"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <h6 class="footer-heading mb-3">Productos</h6>
                <ul class="list-unstyled footer-links small">
                    <li><a href="<?= APP_URL ?>/bolsas-de-sello-lateral">Bolsas de sello lateral</a></li>
                    <li><a href="<?= APP_URL ?>/bolsas-con-adhesivo-y-cenefa">Bolsas con adhesivo y cenefa</a></li>
                    <li><a href="<?= APP_URL ?>/bolsa-con-cierre-ziplock">Bolsas con cierre ziplock</a></li>
                    <li><a href="<?= APP_URL ?>/bolsas-de-papel-kraft">Bolsas de papel kraft</a></li>
                    <li><a href="<?= APP_URL ?>/cintas-para-empaque">Cintas para empaque</a></li>
                    <li><a href="<?= APP_URL ?>/perchas-adhesivas">Perchas adhesivas</a></li>
                    <li><a href="<?= APP_URL ?>/productos">Ver todos los productos</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h6 class="footer-heading mb-3">Contacto</h6>
                <ul class="list-unstyled footer-links small">
                    <li>
                        <i class="bi bi-telephone me-2"></i>
                        <a href="tel:+525526303020"><?= e(PHONE) ?></a>
                    </li>
                    <li>
                        <i class="bi bi-envelope me-2"></i>
                        <a href="mailto:<?= e(EMAIL_VENTAS) ?>"><?= e(EMAIL_VENTAS) ?></a>
                    </li>
                    <li class="mt-3">
                        <a href="<?= APP_URL ?>/cotizador" class="btn btn-primary btn-sm">
                            <i class="bi bi-calculator me-1"></i>Cotizar ahora
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="<?= APP_URL ?>/contacto" class="btn btn-outline-light btn-sm">
                            Contacto
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <div class="footer-bottom py-3">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-md-6 small">
                    &copy; <?= date('Y') ?> Ideas Empaque e Impresión, S.A. de C.V. Todos los derechos reservados.
                </div>
                <div class="col-md-6 text-md-end small">
                    Diseño y desarrollo: <a href="https://cosmos.com.mx" target="_blank" rel="noopener">Cosmos Online</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Scripts propios -->
<script src="<?= APP_URL ?>/assets/js/main.js"></script>
</body>
</html>
