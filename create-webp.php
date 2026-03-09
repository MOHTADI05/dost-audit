<?php
/**
 * Génère des versions WebP des images JPG/PNG du dossier images/
 * À exécuter une fois en CLI : php create-webp.php
 * Ou via navigateur : https://votresite.fr/create-webp.php (puis supprimer le fichier)
 *
 * Réduit le poids des images (~30–50 %) pour améliorer le LCP et les performances.
 * Nécessite PHP avec GD compilé avec le support WebP (PHP 5.5+).
 */

$imagesDir = __DIR__ . '/images';
if (!is_dir($imagesDir)) {
    echo "Dossier images/ introuvable.\n";
    exit(1);
}

if (!function_exists('imagewebp')) {
    echo "Votre version de PHP (GD) ne supporte pas WebP.\n";
    exit(1);
}

$extensions = ['jpg', 'jpeg', 'png'];
$created = 0;
$errors = [];

foreach (new DirectoryIterator($imagesDir) as $file) {
    if ($file->isDot()) continue;
    $path = $file->getPathname();
    $ext = strtolower($file->getExtension());
    if (!in_array($ext, $extensions)) continue;

    $baseName = $file->getBasename('.' . $ext);
    $webpPath = $imagesDir . '/' . $baseName . '.webp';

    if (file_exists($webpPath) && filemtime($webpPath) >= filemtime($path)) {
        echo "Déjà à jour : {$baseName}.webp\n";
        continue;
    }

    $image = null;
    if (in_array($ext, ['jpg', 'jpeg'])) {
        $image = @imagecreatefromjpeg($path);
    } elseif ($ext === 'png') {
        $image = @imagecreatefrompng($path);
        if ($image) {
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }
    }

    if (!$image) {
        $errors[] = "Impossible de charger : " . $file->getFilename();
        continue;
    }

    $ok = imagewebp($image, $webpPath, 82); // qualité 82 = bon compromis
    imagedestroy($image);

    if ($ok) {
        echo "Créé : {$baseName}.webp\n";
        $created++;
    } else {
        $errors[] = "Échec écriture : {$baseName}.webp";
    }
}

echo "\nTerminé. Fichiers créés : $created\n";
if (!empty($errors)) {
    echo "Erreurs :\n" . implode("\n", $errors) . "\n";
}
