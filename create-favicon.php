<?php
/**
 * Generate favicon.png with bold D - run once: php create-favicon.php
 */
$size = 64;
$img = imagecreatetruecolor($size, $size);
$bg = imagecolorallocate($img, 55, 129, 174);   // #3781AE
$fg = imagecolorallocate($img, 255, 255, 255);
imagefill($img, 0, 0, $bg);

$font = 5; // built-in font (largest)
$text = 'D';
$fw = imagefontwidth($font) * strlen($text);
$fh = imagefontheight($font);
$x = (int)(($size - $fw) / 2);
$y = (int)(($size - $fh) / 2);
imagestring($img, $font, $x, $y, $text, $fg);

imagepng($img, __DIR__ . '/images/favicon.png');
imagedestroy($img);
echo "Created images/favicon.png\n";
