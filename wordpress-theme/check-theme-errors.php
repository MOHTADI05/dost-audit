<?php
/**
 * Script de Vérification du Thème DOST'AUDIT
 * 
 * INSTRUCTIONS:
 * 1. Uploadez ce fichier dans le dossier du thème (wordpress-theme/)
 * 2. Accédez à: http://votre-site.com/wp-content/themes/dost-audit/check-theme-errors.php
 * 3. Vérifiez les résultats
 * 4. SUPPRIMEZ ce fichier après utilisation (sécurité)
 */

// Sécurité: Vérifier que WordPress est chargé
if ( ! defined( 'ABSPATH' ) ) {
    // Si WordPress n'est pas chargé, charger wp-load.php
    $wp_load = dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . '/wp-load.php';
    if ( file_exists( $wp_load ) ) {
        require_once( $wp_load );
    } else {
        die( 'WordPress not found. Please upload this file to your theme directory.' );
    }
}

// Vérifier les permissions (seulement pour les admins)
if ( ! current_user_can( 'manage_options' ) ) {
    die( 'Access denied. You must be an administrator.' );
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>DOST'AUDIT Theme - Error Checker</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #3781AE; }
        .check { margin: 10px 0; padding: 10px; border-left: 4px solid #ddd; }
        .success { border-left-color: #46b450; background: #f0f8f0; }
        .error { border-left-color: #dc3232; background: #fef0f0; }
        .warning { border-left-color: #ffb900; background: #fff8e5; }
        .file-list { background: #f9f9f9; padding: 15px; margin: 10px 0; border-radius: 4px; }
        code { background: #f0f0f0; padding: 2px 6px; border-radius: 3px; font-family: monospace; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 DOST'AUDIT Theme - Vérification des Erreurs</h1>
        
        <?php
        $theme_dir = get_template_directory();
        $errors = array();
        $warnings = array();
        $success = array();
        
        // Vérifier les fichiers requis
        $required_files = array(
            'style.css',
            'functions.php',
            'index.php',
            'header.php',
            'footer.php',
            'front-page.php',
        );
        
        echo '<h2>📁 Fichiers Requis</h2>';
        foreach ( $required_files as $file ) {
            $file_path = $theme_dir . '/' . $file;
            if ( file_exists( $file_path ) ) {
                echo '<div class="check success">✅ <code>' . esc_html( $file ) . '</code> existe</div>';
                $success[] = $file;
            } else {
                echo '<div class="check error">❌ <code>' . esc_html( $file ) . '</code> MANQUANT!</div>';
                $errors[] = $file;
            }
        }
        
        // Vérifier les fichiers inc/
        echo '<h2>📂 Fichiers inc/</h2>';
        $inc_files = array(
            'inc/custom-post-types.php',
            'inc/customizer.php',
            'inc/template-tags.php',
            'inc/ajax-handlers.php',
        );
        
        foreach ( $inc_files as $file ) {
            $file_path = $theme_dir . '/' . $file;
            if ( file_exists( $file_path ) ) {
                echo '<div class="check success">✅ <code>' . esc_html( $file ) . '</code> existe</div>';
                $success[] = $file;
            } else {
                echo '<div class="check error">❌ <code>' . esc_html( $file ) . '</code> MANQUANT!</div>';
                $errors[] = $file;
            }
        }
        
        // Vérifier la syntaxe PHP
        echo '<h2>🔧 Vérification de la Syntaxe PHP</h2>';
        $php_files = array_merge( $required_files, $inc_files );
        
        foreach ( $php_files as $file ) {
            $file_path = $theme_dir . '/' . $file;
            if ( file_exists( $file_path ) ) {
                $output = array();
                $return_var = 0;
                exec( "php -l " . escapeshellarg( $file_path ) . " 2>&1", $output, $return_var );
                
                if ( $return_var === 0 ) {
                    echo '<div class="check success">✅ <code>' . esc_html( $file ) . '</code> - Syntaxe OK</div>';
                } else {
                    $error_msg = implode( "\n", $output );
                    echo '<div class="check error">❌ <code>' . esc_html( $file ) . '</code> - Erreur de syntaxe:<br><pre>' . esc_html( $error_msg ) . '</pre></div>';
                    $errors[] = $file . ' (syntaxe)';
                }
            }
        }
        
        // Vérifier les fonctions WordPress
        echo '<h2>🔌 Vérification des Fonctions WordPress</h2>';
        if ( function_exists( 'get_template_directory' ) ) {
            echo '<div class="check success">✅ Fonction <code>get_template_directory()</code> disponible</div>';
        } else {
            echo '<div class="check error">❌ Fonction <code>get_template_directory()</code> non disponible</div>';
            $errors[] = 'get_template_directory()';
        }
        
        // Vérifier les assets
        echo '<h2>🎨 Assets (CSS/JS/Images)</h2>';
        $assets = array(
            'assets/css/main.css',
            'assets/js/main.js',
            'assets/images/logo.png',
        );
        
        foreach ( $assets as $asset ) {
            $asset_path = $theme_dir . '/' . $asset;
            if ( file_exists( $asset_path ) ) {
                echo '<div class="check success">✅ <code>' . esc_html( $asset ) . '</code> existe</div>';
            } else {
                echo '<div class="check warning">⚠️ <code>' . esc_html( $asset ) . '</code> manquant (non critique)</div>';
                $warnings[] = $asset;
            }
        }
        
        // Résumé
        echo '<h2>📊 Résumé</h2>';
        echo '<div class="file-list">';
        echo '<p><strong>✅ Succès:</strong> ' . count( $success ) . ' fichiers</p>';
        echo '<p><strong>⚠️ Avertissements:</strong> ' . count( $warnings ) . ' fichiers</p>';
        echo '<p><strong>❌ Erreurs:</strong> ' . count( $errors ) . ' fichiers</p>';
        echo '</div>';
        
        if ( count( $errors ) > 0 ) {
            echo '<div class="check error">';
            echo '<h3>🚨 Erreurs à Corriger:</h3>';
            echo '<ul>';
            foreach ( $errors as $error ) {
                echo '<li>' . esc_html( $error ) . '</li>';
            }
            echo '</ul>';
            echo '</div>';
        } else {
            echo '<div class="check success">';
            echo '<h3>✅ Aucune erreur critique détectée!</h3>';
            echo '<p>Si vous avez toujours une erreur, activez le mode debug (voir DEBUG-GUIDE.md)</p>';
            echo '</div>';
        }
        ?>
        
        <hr>
        <p><strong>⚠️ SÉCURITÉ:</strong> Supprimez ce fichier après utilisation!</p>
        <p><a href="<?php echo esc_url( admin_url() ); ?>">← Retour à l'admin WordPress</a></p>
    </div>
</body>
</html>
