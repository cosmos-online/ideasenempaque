# Arquitectura — Ideas Empaque e Impresión
> Decisiones técnicas importantes y el "por qué" detrás de ellas.

## Stack
- **Frontend:** Bootstrap 5.3 + jQuery 3.x + componentes 21st.dev
- **Backend:** PHP 7.4 (sin frameworks)
- **Base de datos:** MariaDB/MySQL via PDO + prepared statements
- **Email:** PHPMailer (SMTP cPanel)
- **Hosting:** cPanel — cpanel8.xdominio.com
- **Repo:** https://github.com/cosmos-online/ideasenempaque.git

## Estructura del servidor

```
/home/[cpanel-user]/
├── public_html/         ← document root (apunta al repo clonado)
│   ├── index.php
│   ├── .htaccess
│   ├── assets/
│   ├── admin/
│   └── ...páginas de producto
└── ideasenempaque/      ← carpeta de credenciales (fuera del web root)
    ├── .env
    └── docs/
```

## Convención de prefijo en BD

Todas las tablas usan prefijo `cosmos_` (definido en `.env` como `DB_PREFIX`).
Tablas: `cosmos_usuarios`, `cosmos_cotizaciones`, `cosmos_mensajes`, `cosmos_productos`.

## Carga de .env

El `.env` vive un nivel arriba de `public_html/` en `ideasenempaque/.env`.
Se carga manualmente con `file()` en `admin/includes/db.php` antes de la conexión PDO.
Ruta: `dirname(__DIR__, 2) . '/ideasenempaque/.env'`

## Decisiones de arquitectura

### 2026-06-27 — Panel admin incluido desde v0.1
**Contexto:** El sitio viejo guardaba cotizaciones en BD sin interfaz para verlas.
**Decisión:** Incluir panel admin con módulos CRUD desde el inicio.
**Motivo:** El cliente necesita ver cotizaciones, gestionar productos y mensajes.
**Consecuencias:** Stack PHP+MariaDB en lugar de sitio estático.

### 2026-06-27 — Algoritmo del cotizador preservado del sitio viejo
**Contexto:** El sitio viejo tenía un cotizador de bolsas de sello lateral funcional.
**Decisión:** Preservar el algoritmo exacto de precios (ver CLAUDE.md para la fórmula).
**Motivo:** El cliente ya usa esos precios en producción.
**Consecuencias:** El cotizador queda en `public_html/cotizador.php` como página pública.

### 2026-06-27 — GA Universal Analytics (no migrar a GA4)
**Contexto:** El sitio viejo usa UA-164308273-2.
**Decisión:** Mantener UA en el nuevo sitio hasta que el cliente solicite migración.
**Motivo:** El cliente no solicitó cambio explícito.
