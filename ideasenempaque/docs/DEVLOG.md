# DEVLOG — Ideas Empaque e Impresión
> Bitácora de sesiones de desarrollo. Actualizar al final de cada sesión.

---

## 2026-06-27 — Cosmos Online — Sesión 1
**Branch:** main (setup inicial)
**Estado:** ✅ Completado

### Completado
- [x] Intake completo del proyecto (12 preguntas)
- [x] Repositorio Git inicializado y conectado a GitHub
- [x] Estructura de carpetas creada (public_html, admin, database, docs)
- [x] Archivos base: .gitignore, CLAUDE.md, .env.example
- [x] Documentación inicial: DEVLOG, CHANGELOG, ARCHITECTURE, DEPLOY
- [x] public_html/.htaccess con headers de seguridad
- [x] public_html/index.php (placeholder)
- [x] admin/includes/db.php, auth.php, functions.php
- [x] admin/login.php, logout.php, dashboard
- [x] Módulos admin: cotizaciones, productos, mensajes, usuarios (estructura)
- [x] database/schema.sql con tablas iniciales
- [x] Migración 001: tablas base del sistema

### Pendiente para siguiente sesión
- [ ] Diseño del home (hero, catálogo de productos, CTA)
- [ ] Layout base: header/nav responsive con Bootstrap 5.3
- [ ] Footer con datos de contacto y redes
- [ ] Páginas individuales de los 19 productos
- [ ] Formulario de contacto con PHPMailer
- [ ] Cotizador interactivo con algoritmo de precios

### Componentes 21st.dev usados
| Componente | URL | Modificaciones |
|------------|-----|----------------|
| — | — | — |

### Decisiones técnicas
- **Decisión:** Git repo en `Sitio Nuevo Jun-2026/` separado de `Sitio Viejo/`
  **Motivo:** `Sitio Viejo/` es solo referencia local, no se despliega

- **Decisión:** Panel admin incluido desde el setup inicial
  **Motivo:** El cliente requiere módulos de cotizaciones, productos, mensajes y usuarios

- **Decisión:** Mantener GA UA-164308273-2 (no migrar a GA4 aún)
  **Motivo:** El cliente no solicitó migración

---

## 2026-06-27 — Cosmos Online — Sesión 2
**Branch:** feature/sitio-publico
**Estado:** ✅ Completado y pusheado

### Completado
- [x] Branch `feature/sitio-publico` creado
- [x] Assets copiados de Sitio Viejo: imágenes productos, hero, PDFs fichas técnicas
- [x] `.htaccess` actualizado con RewriteRules para URLs limpias y producto.php?slug=
- [x] `assets/css/style.css` — estilos completos (colores #D0D205, Bootstrap overrides, navbar, hero, cards, cotizador, footer, WhatsApp FAB)
- [x] `assets/js/main.js` — galería de producto + nav activo
- [x] `includes/config.php` — carga .env, constantes, helper e()
- [x] `includes/header.php` — topbar + navbar Bootstrap con 4 dropdowns + botón Cotizar
- [x] `includes/footer.php` — 3 columnas + redes sociales + WhatsApp FAB
- [x] `includes/productos-data.php` — array completo de 21 productos con slug, categoría, imágenes, PDF
- [x] `includes/mailer.php` — sendMail() + mailTemplate() usando mail() nativo
- [x] `index.php` — home completo: hero carousel 3 slides, intro, features, 8 productos destacados, CTA
- [x] `quienes-somos.php` — historia, qué fabricamos, por qué elegirnos
- [x] `productos.php` — catálogo agrupado por categoría con grid responsive
- [x] `producto.php` — template único con galería, thumbnails, PDF download, cotizar CTA, relacionados
- [x] `contacto.php` — formulario con CSRF, validación, mail(), guarda en cosmos_mensajes
- [x] `gracias.php` — página de confirmación post-form
- [x] `cotizador.php` — algoritmo exacto preservado, CSRF, guarda en cosmos_cotizaciones, mails
- [x] Commit y push a `feature/sitio-publico`

### Pendiente
- [ ] Módulos admin: CRUD completo de productos (crear, editar, eliminar)
- [ ] Módulo admin: ver detalle de cotizaciones
- [ ] Configurar WHATSAPP_NUMBER en .env del servidor

### Decisiones técnicas
- **Decisión:** Un solo producto.php con routing por `?slug=` en lugar de 19+ archivos individuales
- **Decisión:** mail() nativo en lugar de PHPMailer (sin Composer, cPanel lo tiene configurado)
- **Decisión:** Color primario #D0D205 extraído de `Sitio Viejo/color/default.css`

---
