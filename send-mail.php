<?php
/**
 * Contact form mailer — uses PHPMailer via SMTP (Office 365)
 * Receives a JSON POST from script.js and sends an email to the cabinet address.
 */

// Prevent any PHP warnings/notices from corrupting JSON output
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);

// ── SMTP CONFIGURATION (Office 365) ─────────────────────────────────────────
define('SMTP_HOST',     'smtp.office365.com');    // Microsoft 365 / Outlook
define('SMTP_PORT',     587);                      // 587 = STARTTLS
define('SMTP_SECURE',   'tls');                    // 'tls' for port 587
define('SMTP_USERNAME', 'Contact@dost-audit.fr'); // Adresse Microsoft 365
define('SMTP_PASSWORD', 'Btgvrwfp7');            // Mot de passe de cette adresse

define('MAIL_FROM',     '');                       // Même adresse que SMTP_USERNAME (laisser vide = utilise SMTP_USERNAME)
define('MAIL_FROM_NAME','DOST\'AUDIT — Formulaire de contact');
define('MAIL_TO',       'contact@dost-audit.fr'); // Adresse de réception des demandes
// ────────────────────────────────────────────────────────────────────────────

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

// Detect classic form submit (HTML form action/method) vs AJAX (fetch with JSON)
$contentType = $_SERVER['CONTENT_TYPE'] ?? '';
$isFormSubmit = (strpos($contentType, 'application/x-www-form-urlencoded') !== false || strpos($contentType, 'multipart/form-data') !== false);

function respond_contact($success, $message) {
    global $isFormSubmit;
    if (ob_get_level()) ob_clean();
    if ($isFormSubmit) {
        $params = $success ? 'sent=1' : 'error=1&message=' . rawurlencode($message);
        header('Location: index.html?' . $params . '#contact');
        exit;
    }
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($success ? 200 : 500);
    echo json_encode(['success' => $success, 'message' => $message]);
    exit;
}

// Debug: GET ?debug=1 returns status without sending (to verify script runs)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['debug'])) {
    if (ob_get_level()) ob_end_clean();
    echo json_encode([
        'success' => true,
        'debug' => true,
        'smtp_configured' => (SMTP_USERNAME !== '' && SMTP_PASSWORD !== ''),
    ]);
    exit;
}

try {
// Use SMTP user as From when MAIL_FROM is empty
$fromEmail = (MAIL_FROM !== '') ? MAIL_FROM : SMTP_USERNAME;

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond_contact(false, 'Méthode non autorisée.');
}

// Read and decode the JSON body sent by fetch()
$raw  = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data || !is_array($data)) {
    // Fallback: try regular form POST (application/x-www-form-urlencoded)
    $data = $_POST ?? [];
}

// ── INPUT VALIDATION ────────────────────────────────────────────────────────
$required = ['firstName', 'lastName', 'email', 'phone', 'service', 'message'];
foreach ($required as $field) {
    if (empty(trim($data[$field] ?? ''))) {
        respond_contact(false, 'Veuillez remplir tous les champs obligatoires.');
    }
}

$email = filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL);
if (!$email) {
    respond_contact(false, 'Adresse e-mail invalide.');
}

// Sanitise every field
$firstName = htmlspecialchars(trim($data['firstName']), ENT_QUOTES, 'UTF-8');
$lastName  = htmlspecialchars(trim($data['lastName']),  ENT_QUOTES, 'UTF-8');
$phone     = htmlspecialchars(trim($data['phone']),     ENT_QUOTES, 'UTF-8');
$service   = htmlspecialchars(trim($data['service']),   ENT_QUOTES, 'UTF-8');
$message   = htmlspecialchars(trim($data['message']),   ENT_QUOTES, 'UTF-8');

// ── LOAD PHPMAILER ───────────────────────────────────────────────────────────
$autoload = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoload)) {
    respond_contact(false, 'Erreur serveur : PHPMailer introuvable. Lancez "composer install".');
}
require $autoload;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// ── SERVICE LABEL MAP ────────────────────────────────────────────────────────
$serviceLabels = [
    'expertise' => 'Expertise Comptable',
    'audit'     => 'Audit & Commissariat',
    'fiscal'    => 'Conseil Fiscal',
    'social'    => 'Gestion Sociale',
    'creation'  => "Création d'Entreprise",
    'juridique' => 'Conseil Juridique',
    'other'     => 'Autre',
];
$serviceLabel = $serviceLabels[$service] ?? $service;

// Check SMTP config so we return a clear error instead of a cryptic one
if (SMTP_USERNAME === '' || SMTP_PASSWORD === '') {
    respond_contact(false, 'Erreur serveur : adresse e-mail ou mot de passe SMTP non configurés.');
}

// ── BUILD & SEND EMAIL ───────────────────────────────────────────────────────
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = SMTP_SECURE;
    $mail->Port       = SMTP_PORT;
    $mail->CharSet    = 'UTF-8';

    // From / To (From must be the same as SMTP user for Office 365)
    $mail->setFrom($fromEmail, MAIL_FROM_NAME);
    $mail->addAddress(MAIL_TO);
    $mail->addReplyTo($email, "$firstName $lastName");

    // Email content
    $mail->isHTML(true);
    $mail->Subject = "Nouvelle demande de contact — $serviceLabel";
    $mail->Body    = "
        <html><body style='font-family:Arial,sans-serif;color:#222;'>
        <h2 style='color:#3781AE;'>Nouvelle demande de contact</h2>
        <table style='border-collapse:collapse;width:100%;max-width:600px;'>
            <tr><td style='padding:8px;font-weight:bold;'>Prénom</td><td style='padding:8px;'>$firstName</td></tr>
            <tr style='background:#f5f5f5;'><td style='padding:8px;font-weight:bold;'>Nom</td><td style='padding:8px;'>$lastName</td></tr>
            <tr><td style='padding:8px;font-weight:bold;'>E-mail</td><td style='padding:8px;'><a href='mailto:$email'>$email</a></td></tr>
            <tr style='background:#f5f5f5;'><td style='padding:8px;font-weight:bold;'>Téléphone</td><td style='padding:8px;'>$phone</td></tr>
            <tr><td style='padding:8px;font-weight:bold;'>Service</td><td style='padding:8px;'>$serviceLabel</td></tr>
            <tr style='background:#f5f5f5;'><td style='padding:8px;font-weight:bold;vertical-align:top;'>Message</td>
                <td style='padding:8px;'>" . nl2br($message) . "</td></tr>
        </table>
        <p style='margin-top:24px;font-size:12px;color:#888;'>
            Envoyé depuis le formulaire de contact de <strong>dost-audit.fr</strong>
        </p>
        </body></html>
    ";
    $mail->AltBody = "Prénom: $firstName\nNom: $lastName\nE-mail: $email\nTéléphone: $phone\nService: $serviceLabel\n\nMessage:\n$message";

    $mail->send();

    respond_contact(true, 'Votre message a bien été envoyé. Nous vous répondrons sous 24 heures.');

} catch (Exception $e) {
    $err = $mail->ErrorInfo ?: $e->getMessage();
    respond_contact(false, 'Erreur envoi e-mail : ' . $err);
}

} catch (Throwable $e) {
    respond_contact(false, 'Erreur serveur : ' . $e->getMessage());
}
