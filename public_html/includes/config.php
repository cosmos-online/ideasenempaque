<?php
// Carga .env desde ideasenempaque/.env (fuera de public_html)
$envFile = dirname(__DIR__, 2) . '/ideasenempaque/.env';
if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos(trim($line), '#') === 0 || strpos($line, '=') === false) continue;
        [$k, $v] = explode('=', $line, 2);
        $_ENV[trim($k)] = trim($v);
        putenv(trim($k) . '=' . trim($v));
    }
}

define('APP_URL',   rtrim($_ENV['APP_URL']   ?? '', '/'));
define('APP_DEBUG', ($_ENV['APP_DEBUG'] ?? 'false') === 'true');
define('GA_ID',     $_ENV['GA_TRACKING_ID']  ?? 'UA-164308273-2');
define('WA_NUM',    $_ENV['WHATSAPP_NUMBER']  ?? '');
define('PHONE',     '(55) 2630-3020');
define('EMAIL_VENTAS', 'ventas@ideasenempaque.com');

function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
