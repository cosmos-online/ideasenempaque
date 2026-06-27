-- ============================================================
-- Schema — Ideas Empaque e Impresión — Cosmos Online
-- Generado: 2026-06-27
-- Todas las tablas usan prefijo cosmos_
-- ============================================================

SET NAMES utf8mb4;
SET time_zone = '+00:00';

-- ------------------------------------------------------------
-- Usuarios del panel administrativo
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `cosmos_usuarios` (
    `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nombre`     VARCHAR(100) NOT NULL,
    `email`      VARCHAR(150) NOT NULL UNIQUE,
    `password`   VARCHAR(255) NOT NULL,
    `rol`        ENUM('admin','editor') NOT NULL DEFAULT 'editor',
    `activo`     TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Cotizaciones del cotizador de bolsas de sello lateral
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `cosmos_cotizaciones` (
    `id`           INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nombre`       VARCHAR(150) NOT NULL,
    `telefono`     VARCHAR(30)  NOT NULL DEFAULT '',
    `email`        VARCHAR(150) NOT NULL,
    `cantidad`     INT UNSIGNED NOT NULL,
    `ancho`        DECIMAL(6,2) NOT NULL,
    `alto`         DECIMAL(6,2) NOT NULL,
    `solapa`       DECIMAL(6,2) NOT NULL DEFAULT 0,
    `medida_solapa` DECIMAL(6,2) NOT NULL DEFAULT 0,
    `adhesivo`     ENUM('si','no') NOT NULL DEFAULT 'no',
    `micras`       TINYINT UNSIGNED NOT NULL,
    `guardar`      VARCHAR(255) NOT NULL DEFAULT '',
    `comentarios`  TEXT,
    `costo_millar` DECIMAL(10,2) NOT NULL DEFAULT 0,
    `costo_total`  DECIMAL(12,2) NOT NULL DEFAULT 0,
    `created_at`   TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Mensajes del formulario de contacto
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `cosmos_mensajes` (
    `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nombre`     VARCHAR(150) NOT NULL,
    `email`      VARCHAR(150) NOT NULL,
    `telefono`   VARCHAR(30)  NOT NULL DEFAULT '',
    `mensaje`    TEXT         NOT NULL,
    `leido`      TINYINT(1)   NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
-- Catálogo de productos
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `cosmos_productos` (
    `id`          INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    `nombre`      VARCHAR(200)  NOT NULL,
    `slug`        VARCHAR(200)  NOT NULL UNIQUE,
    `descripcion` TEXT,
    `imagen`      VARCHAR(255)  NOT NULL DEFAULT '',
    `pdf`         VARCHAR(255)  NOT NULL DEFAULT '',
    `orden`       TINYINT UNSIGNED NOT NULL DEFAULT 0,
    `activo`      TINYINT(1)    NOT NULL DEFAULT 1,
    `created_at`  TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
