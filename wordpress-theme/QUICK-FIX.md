# 🚨 Correction Rapide - Erreur Critique WordPress

## ⚡ Solution Express (5 minutes)

### Étape 1: Activer le Mode Debug (2 min)

1. **Téléchargez** `wp-config.php` depuis votre serveur (via FTP)
2. **Ouvrez** le fichier dans un éditeur de texte
3. **Trouvez** la ligne: `/* That's all, stop editing! Happy publishing. */`
4. **Ajoutez AVANT cette ligne:**

```php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );
```

5. **Sauvegardez** et **uploadez** sur le serveur

### Étape 2: Voir l'Erreur (1 min)

1. **Allez** dans `/wp-content/` via FTP
2. **Téléchargez** le fichier `debug.log`
3. **Ouvrez** le fichier
4. **Lisez** la dernière ligne - c'est votre erreur!

### Étape 3: Corriger (2 min)

Selon l'erreur dans debug.log:

#### Si l'erreur dit "Failed opening required"
→ Le fichier manque. Vérifiez que tous les fichiers du thème sont présents.

#### Si l'erreur dit "Parse error"
→ Erreur de syntaxe PHP. Vérifiez les guillemets, parenthèses, etc.

#### Si l'erreur dit "Call to undefined function"
→ Fonction WordPress manquante. Vérifiez la version WordPress.

## 🔍 Vérification Automatique

1. **Uploadez** `check-theme-errors.php` dans le dossier du thème
2. **Accédez** à: `http://votre-site.com/wp-content/themes/dost-audit/check-theme-errors.php`
3. **Voyez** toutes les erreurs détectées
4. **Supprimez** le fichier après utilisation

## 📋 Erreurs les Plus Courantes

### 1. Fichier manquant
**Erreur**: `require(): Failed opening required 'inc/custom-post-types.php'`

**Solution**: Vérifiez que le fichier existe dans `wordpress-theme/inc/custom-post-types.php`

### 2. Syntaxe PHP
**Erreur**: `Parse error: syntax error, unexpected '}'`

**Solution**: Vérifiez les guillemets et parenthèses dans le fichier mentionné

### 3. Version PHP
**Erreur**: `Call to undefined function get_template_directory()`

**Solution**: Vérifiez que PHP 7.4+ est installé

## ✅ Après Correction

1. **Désactivez** le mode debug:
```php
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
```

2. **Supprimez** `debug.log`
3. **Testez** le site

---

**Besoin de plus d'aide?** Consultez `DEBUG-GUIDE.md` pour le guide complet.
