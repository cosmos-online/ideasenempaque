// Ideas Empaque — main.js

// Galería de producto: cambiar imagen principal al hacer click en thumbnail
document.addEventListener('DOMContentLoaded', function () {
    const mainImg = document.getElementById('product-main-img');
    const thumbs  = document.querySelectorAll('.product-gallery-thumb');

    thumbs.forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            if (mainImg) mainImg.src = this.dataset.full;
            thumbs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Marcar nav item activo
    const path = window.location.pathname.replace(/\/$/, '') || '/';
    document.querySelectorAll('.nav-link').forEach(function (link) {
        const href = link.getAttribute('href').replace(/\/$/, '') || '/';
        if (href === path) link.classList.add('active');
    });
});
