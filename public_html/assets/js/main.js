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

    // ── .text-red (forzar var para SVG) ──
    document.querySelectorAll('.text-red').forEach(function (el) {
        el.style.color = 'var(--red)';
    });

    // ── Selector de paleta ────────────────────────────────────────
    const palettes = {
        rojo: {
            '--red':        '#EE3927',
            '--red-dk':     '#C62E1E',
            '--red-lt':     '#FEF2F0',
            '--charcoal':   '#1F1C18',
            '--charcoal-2': '#2E2B25',
        },
        cian: {
            '--red':        '#2BADB8',
            '--red-dk':     '#218FA0',
            '--red-lt':     '#EDF9FA',
            '--charcoal':   '#0A2030',
            '--charcoal-2': '#133348',
        },
        verde: {
            '--red':        '#6DB82C',
            '--red-dk':     '#5A9A22',
            '--red-lt':     '#F2FAE8',
            '--charcoal':   '#1C2810',
            '--charcoal-2': '#28391A',
        }
    };

    function applyPalette(name) {
        if (!palettes[name]) return;
        const root = document.documentElement;
        Object.entries(palettes[name]).forEach(([k, v]) => root.style.setProperty(k, v));

        document.querySelectorAll('.palette-swatch').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.palette === name);
        });
        localStorage.setItem('ie-palette', name);
    }

    // Aplicar paleta guardada o la default
    applyPalette(localStorage.getItem('ie-palette') || 'rojo');

    document.querySelectorAll('.palette-swatch').forEach(btn => {
        btn.addEventListener('click', () => applyPalette(btn.dataset.palette));
    });

});
