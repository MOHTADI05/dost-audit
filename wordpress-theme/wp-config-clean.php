<?php
/**
 * Configuration WordPress Propre - Sans Deprecated Warnings
 * 
 * INSTRUCTIONS:
 * 1. Copiez ce code dans votre fichier wp-config.php
 * 2. Collez-le AVANT la ligne: "That's all, stop editing! Happy publishing."
 * 3. Sauvegardez et uploadez sur votre serveur
 * 4. Les deprecated warnings seront masquées, mais les vraies erreurs seront toujours loggées
 */

// ===================================
// CONFIGURATION DEBUG PROPRE
// ===================================

// Mode debug activé mais sans affichage
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

// Masquer les deprecated warnings (plugins/thèmes tiers)
// Cela masque les avertissements de PHP 8.1+ pour les propriétés dynamiques
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT );
@ini_set( 'display_errors', 0 );

// Utiliser les versions en développement des fichiers JS et CSS
define( 'SCRIPT_DEBUG', true );

// Augmenter la limite de mémoire PHP si nécessaire
define( 'WP_MEMORY_LIMIT', '256M' );

/**
 * RÉSULTAT:
 * 
 * ✅ Les vraies erreurs seront toujours loggées dans debug.log
 * ✅ Les deprecated warnings seront masquées
 * ✅ Le site fonctionnera normalement
 * ✅ Les logs seront propres et lisibles
 * 
 * NOTE: Les deprecated warnings proviennent de plugins/thèmes tiers
 * (Supreme Modules Pro, Divi Theme) qui ne sont pas encore compatibles PHP 8.2+
 * 
 * Ces avertissements n'affectent PAS le fonctionnement du site.
 */
