# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

---

## Proyecto

**Cliente:** Ideas Empaque e Impresión, S.A. de C.V.
**Slug:** `ideasenempaque`
**Dominio:** ideasenempaque.com.mx
**Agencia:** Cosmos Online
**Repo:** `https://github.com/cosmos-online/ideasenempaque.git`
**Deadline draft:** 2026-06-28

---

## Stack

PHP 7.4 + Bootstrap 5.3 + MariaDB + jQuery 3.x + PHPMailer. Sin frameworks PHP. PDO + prepared statements siempre.

---

## Estructura del repo (= estructura del servidor)

```
repo-raiz/  (= Sitio Nuevo Jun-2026/)
├── public_html/          ← raíz web (document root en cPanel)
│   ├── index.php
│   ├── .htaccess
│   ├── assets/css|js|img|uploads/
│   ├── admin/            ← panel administrativo
│   │   ├── index.php     ← dashboard
│   │   ├── login.php
│   │   ├── logout.php
│   │   ├── includes/auth.php | db.php | functions.php
│   │   └── modules/cotizaciones/ | productos/ | mensajes/ | usuarios/
│   └── api/v1/
├── ideasenempaque/       ← FUERA de public_html
│   ├── .env              ← nunca en Git
│   ├── .env.example      ← sí en Git
│   └── docs/DEVLOG | CHANGELOG | ARCHITECTURE | DEPLOY
└── database/
    ├── schema.sql
    ├── migrations/
    └── seeds/
```

---

## Panel admin — módulos

| Módulo | Ruta |
|--------|------|
| Cotizaciones | `admin/modules/cotizaciones/` |
| Productos | `admin/modules/productos/` |
| Mensajes de contacto | `admin/modules/mensajes/` |
| Usuarios admin | `admin/modules/usuarios/` |

---

## Páginas públicas a construir

**Catálogo (19 productos — preservar URLs para SEO):**
bolsa-con-cierre-ziplock, bolsas-con-adhesivo-y-cenefa, bolsas-de-papel-kraft,
bolsas-de-polietileno, bolsas-de-polipapel, bolsas-de-polipropileno,
bolsas-de-sello-fondo, bolsas-de-sello-lateral, bolsas-de-sello-simplex,
bolsas-de-suaje-rinon, bolsas-impresas, bolsas-tipo-canguro, bolsas-tipo-pouch,
cintas-doble-cara, cintas-para-empaque, pelicula-polistrech,
perchas-adhesivas, rollos-de-poleolefina, tiras-exhibidoras

**Otras:** home, quienes-somos, productos (catálogo), cotizador, contacto, gracias

---

## Cotizador — algoritmo (preservar exacto)

```php
$pesoPorMillar   = $Ancho * (($Alto * 2) + $Solapa) * ($Micras / 10000);
$bolseoPorMillar = max($pesoPorMillar * 12, 35);
$costoBase       = $pesoPorMillar * 50 + $bolseoPorMillar;

// Factor por cantidad
if      ($Cantidad > 100000) $factor = 1.09;
elseif  ($Cantidad > 59999)  $factor = 1.10;
elseif  ($Cantidad > 29999)  $factor = 1.11;
elseif  ($Cantidad > 9000)   $factor = 1.25;
else                          $factor = 1.50;

$costoPorMillar = $costoBase * $factor;

// Si lleva adhesivo
if ($Adhesivo === 'si') {
    $costoPorMillar += ((($Ancho / 100 * $Cantidad) * 0.07 * 1.17) / ($Cantidad / 1000));
}
```

Restricciones: cantidad mínima 1,000; Ancho 3–80 cm; Alto 4–70 cm; Solapa máx. 5 cm y ≤ Alto.
Guardar en tabla `cosmos_cotizaciones`. Enviar correo a `joseluis@ideasenempaque.com` + `ventas@ideasenempaque.com`.

---

## Carga del .env en PHP

```php
$envFile = dirname(__DIR__, 2) . '/ideasenempaque/.env';
if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos(trim($line), '#') === 0 || strpos($line, '=') === false) continue;
        [$k, $v] = explode('=', $line, 2);
        $_ENV[trim($k)] = trim($v);
        putenv(trim($k) . '=' . trim($v));
    }
}
```

---

## Integrations

- **GA:** UA-164308273-2 (Universal Analytics — mantener del sitio viejo)
- **reCAPTCHA v3:** generar claves nuevas (las del sitio viejo estaban hardcodeadas)
- **SMTP:** PHPMailer vía cpanel, from `formulario@ideasenempaque.com.mx`
- **WhatsApp:** número pendiente de confirmar con cliente

---

## Assets disponibles (sitio viejo → no deployar)

- Imágenes de producto: `../Sitio Viejo/img/productos/`
- Fichas técnicas PDF: `../Sitio Viejo/pdf/` (25 archivos FICHA-b/p/s NN.pdf)
- Paleta de colores: `../Sitio Viejo/color/default.css`
- Tipografías: Google Fonts — Handlee + Open Sans

---

## Reglas Git

- Branch por tarea: `git checkout -b feature/descripcion-corta`
- Prefijos: `feat:` `fix:` `db:` `style:` `docs:` `chore:`
- Al terminar: `git push origin feature/descripcion-corta` → avisar al dev para merge
- cPanel: deploy key SSH **pendiente de configurar** (ver `ideasenempaque/docs/DEPLOY.md`)
- Cada cambio de BD → migración numerada en `database/migrations/`
- Registrar sesión en `ideasenempaque/docs/DEVLOG.md`
