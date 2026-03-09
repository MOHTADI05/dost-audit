<?php
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'success' => true,
    'message' => 'Test OK — PHP fonctionne, JSON envoyé.',
    'vendor_exists' => file_exists(__DIR__ . '/vendor/autoload.php'),
    'send_mail_exists' => file_exists(__DIR__ . '/send-mail.php'),
]);
