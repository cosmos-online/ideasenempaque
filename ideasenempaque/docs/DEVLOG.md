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
