<?php
// Envío de correo con mail() nativo de cPanel
// Requiere que config.php ya haya cargado el .env

function sendMail(string $to, string $subject, string $htmlBody, array $cc = []): bool
{
    $from     = $_ENV['MAIL_USER']      ?? 'formulario@ideasenempaque.com.mx';
    $fromName = $_ENV['MAIL_FROM_NAME'] ?? 'Ideas Empaque';

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: {$fromName} <{$from}>\r\n";
    $headers .= "Reply-To: {$from}\r\n";
    if (!empty($cc)) {
        $headers .= 'Cc: ' . implode(', ', $cc) . "\r\n";
    }
    if (!empty($_ENV['MAIL_BCC'])) {
        $headers .= 'Bcc: ' . $_ENV['MAIL_BCC'] . "\r\n";
    }
    $headers .= "X-Mailer: PHP/" . phpversion();

    return mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $htmlBody, $headers);
}

function mailTemplate(string $titulo, array $campos): string
{
    $filas = '';
    foreach ($campos as $label => $valor) {
        $filas .= '<tr>
            <td style="padding:8px 12px;font-weight:bold;background:#f5f5f5;width:35%">' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</td>
            <td style="padding:8px 12px">' . nl2br(htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8')) . '</td>
        </tr>';
    }
    return '<!DOCTYPE html><html><body style="font-family:Arial,sans-serif;color:#333;max-width:600px;margin:0 auto">
        <div style="background:#D0D205;padding:20px 24px">
            <h2 style="margin:0;color:#333">' . htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8') . '</h2>
        </div>
        <div style="padding:24px">
            <table style="width:100%;border-collapse:collapse;border:1px solid #ddd">' . $filas . '</table>
        </div>
        <div style="background:#3E3E3E;padding:12px 24px;color:#aaa;font-size:12px;text-align:center">
            Ideas Empaque e Impresión, S.A. de C.V. &mdash; ideasenempaque.com.mx
        </div>
    </body></html>';
}
