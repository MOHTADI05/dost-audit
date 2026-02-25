<?php
/**
 * Configuration de Débogage WordPress
 *
 * INSTRUCTIONS:
 * 1. Copiez ce code dans votre fichier wp-config.php
 * 2. Collez-le AVANT la ligne: "That's all, stop editing! Happy publishing."
 * 3. Sauvegardez et uploadez sur votre serveur
 * 4. Vérifiez le fichier wp-content/debug.log pour voir les erreurs
 *
 * IMPORTANT: Désactivez le mode debug en production!
 */

// ===================================
// MODE DEBUG - DOST'AUDIT THEME
// ===================================

// Active le mode WP_DEBUG
define( 'WP_DEBUG', true );

// Active l'enregistrement dans le fichier /wp-content/debug.log
define( 'WP_DEBUG_LOG', true );

// Désactive l'affichage des erreurs et des avertissements (pour ne pas perturber l'affichage)
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Utiliser les versions en développement des fichiers JS et CSS de base
define( 'SCRIPT_DEBUG', true );

// Augmenter la limite de mémoire PHP (si nécessaire)
define( 'WP_MEMORY_LIMIT', '256M' );

// Enregistrer les requêtes de base de données (optionnel - impact performance)
// Décommentez seulement si vous avez besoin de déboguer les requêtes SQL
// define( 'SAVEQUERIES', true );

/**
 * NOTE IMPORTANTE:
 *
 * Après avoir identifié et corrigé l'erreur:
 * 1. Changez WP_DEBUG à false
 * 2. Changez WP_DEBUG_LOG à false
 * 3. Supprimez ou déplacez le fichier debug.log
 * 4. Ne laissez JAMAIS le mode debug activé en production!
 */
