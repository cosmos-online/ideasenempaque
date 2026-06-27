-- ============================================================
-- Migración: 001_tablas_base.sql
-- Fecha: 2026-06-27
-- Autor: Cosmos Online
-- Descripción: Crea las 4 tablas base del sistema:
--              cosmos_usuarios, cosmos_cotizaciones,
--              cosmos_mensajes, cosmos_productos
-- ============================================================

-- UP — ejecutar: mysql -u [user] -p [db] < database/migrations/001_tablas_base.sql

SOURCE database/schema.sql;

-- DOWN (referencia, no se ejecuta automáticamente)
-- DROP TABLE IF EXISTS `cosmos_productos`;
-- DROP TABLE IF EXISTS `cosmos_mensajes`;
-- DROP TABLE IF EXISTS `cosmos_cotizaciones`;
-- DROP TABLE IF EXISTS `cosmos_usuarios`;
