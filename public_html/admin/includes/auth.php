<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: ' . ($_ENV['APP_URL'] ?? '') . '/admin/login.php');
    exit;
}
