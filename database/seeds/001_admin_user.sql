-- ============================================================
-- Seed: 001_admin_user.sql
-- Descripción: Usuario administrador inicial
-- IMPORTANTE: Cambiar la contraseña después del primer login
-- Hash generado con: password_hash('Admin2026!', PASSWORD_BCRYPT)
-- ============================================================

INSERT INTO `cosmos_usuarios` (`nombre`, `email`, `password`, `rol`, `activo`)
VALUES ('Administrador', 'admin@ideasenempaque.com.mx',
        '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'admin', 1)
ON DUPLICATE KEY UPDATE `id` = `id`;

-- Contraseña temporal: Admin2026!
-- Cambiar inmediatamente después del primer login
