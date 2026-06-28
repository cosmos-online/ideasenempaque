// Ideas Empaque — main.js

document.addEventListener('DOMContentLoaded', function () {

    // ── Galería de producto: thumbnails ──────────────────────────
    const mainImg = document.getElementById('product-main-img');
    document.querySelectorAll('.product-thumb').forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            if (mainImg) mainImg.src = this.dataset.full;
            document.querySelectorAll('.product-thumb').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // ── Marcar nav link activo ────────────────────────────────────
    const path = window.location.pathname.replace(/\/$/, '') || '/';
    document.querySelectorAll('.navbar-main .nav-link').forEach(function (link) {
        const href = (link.getAttribute('href') || '').replace(/\/$/, '') || '/';
        if (href === path) link.classList.add('active');
    });

    // ── .text-amber en iconos del navbar (CSS var no se aplica al SVG) ──
    document.querySelectorAll('.text-amber').forEach(function (el) {
        el.style.color = 'var(--amber)';
    });

});
