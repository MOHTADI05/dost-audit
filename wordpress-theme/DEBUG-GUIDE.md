# 🔍 Guide de Débogage WordPress - DOST'AUDIT Theme

## ⚠️ Erreur Critique Détectée

Si vous voyez le message "Il y a eu une erreur critique sur ce site", suivez ces étapes pour identifier le problème.

## 🚀 Activation du Mode Debug

### Étape 1: Modifier wp-config.php

1. **Connectez-vous via FTP/SFTP** à votre serveur
2. **Téléchargez** le fichier `wp-config.php` depuis la racine de WordPress
3. **Ouvrez** le fichier dans un éditeur de texte
4. **Trouvez** la ligne `/* That's all, stop editing! Happy publishing. */`
5. **Ajoutez AVANT cette ligne** le code suivant:

```php
// ===================================
// MODE DEBUG - DOST'AUDIT THEME
// ===================================
// Active le mode WP_DEBUG
define( 'WP_DEBUG', true );

// Active l'enregistrement dans le fichier /wp-content/debug.log
define( 'WP_DEBUG_LOG', true );

// Désactive l'affichage des erreurs et des avertissements (pour la production)
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Utiliser les versions en développement des fichiers JS et CSS
define( 'SCRIPT_DEBUG', true );

// Enregistrer les requêtes de base de données (optionnel, impact performance)
// define( 'SAVEQUERIES', true );
```

6. **Sauvegardez** et **uploadez** le fichier sur le serveur

### Étape 2: Vérifier le Fichier debug.log

1. **Connectez-vous via FTP/SFTP**
2. **Allez** dans `/wp-content/`
3. **Cherchez** le fichier `debug.log`
4. **Téléchargez-le** et **ouvrez-le** dans un éditeur de texte
5. **Lisez** les dernières lignes pour voir l'erreur exacte

### Étape 3: Analyser l'Erreur

Les erreurs courantes dans le thème peuvent être:

#### Erreur 1: Fichier manquant
```
Fatal error: require_once(): Failed opening required '...'
```
**Solution**: Vérifiez que tous les fichiers du thème sont présents

#### Erreur 2: Syntaxe PHP
```
Parse error: syntax error, unexpected...
```
**Solution**: Vérifiez la syntaxe PHP dans les fichiers

#### Erreur 3: Fonction non définie
```
Call to undefined function...
```
**Solution**: Vérifiez que toutes les fonctions WordPress sont correctement utilisées

#### Erreur 4: Mémoire insuffisante
```
Fatal error: Allowed memory size...
```
**Solution**: Augmentez la mémoire PHP dans wp-config.php:
```php
define( 'WP_MEMORY_LIMIT', '256M' );
```

## 🔧 Corrections Rapides

### Vérifier les Fichiers Requis

Assurez-vous que ces fichiers existent dans votre thème:

```
wordpress-theme/
├── style.css          ✅ REQUIS
├── functions.php      ✅ REQUIS
├── index.php          ✅ REQUIS
├── header.php         ✅ REQUIS
├── footer.php         ✅ REQUIS
└── inc/
    ├── custom-post-types.php
    ├── customizer.php
    ├── template-tags.php
    └── ajax-handlers.php
```

### Vérifier la Syntaxe PHP

Testez chaque fichier PHP avec:
```bash
php -l nom-du-fichier.php
```

### Vérifier les Permissions

Les fichiers doivent avoir les permissions:
- **Fichiers**: 644
- **Dossiers**: 755

## 📋 Checklist de Débogage

- [ ] Mode debug activé dans wp-config.php
- [ ] Fichier debug.log créé dans wp-content/
- [ ] Erreur identifiée dans debug.log
- [ ] Tous les fichiers du thème présents
- [ ] Syntaxe PHP correcte
- [ ] Permissions de fichiers correctes
- [ ] Version PHP compatible (7.4+)
- [ ] Version WordPress compatible (5.9+)

## 🛠️ Outils de Débogage Recommandés

### Plugins WordPress

1. **Query Monitor** - Affiche les requêtes SQL et les hooks
2. **Debug Bar** - Barre d'outils de débogage
3. **Log Deprecated Notices** - Affiche les fonctions obsolètes

### Installation

1. WordPress Admin → Extensions → Ajouter
2. Recherchez "Query Monitor"
3. Installez et activez

## 🔒 Sécurité - Mode Debug en Production

⚠️ **IMPORTANT**: Ne laissez JAMAIS le mode debug activé en production!

### Configuration Sécurisée pour Production

```php
// PRODUCTION - Mode debug DÉSACTIVÉ
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
```

### Configuration pour Développement

```php
// DÉVELOPPEMENT - Mode debug ACTIVÉ
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false ); // Masque les erreurs à l'écran
```

## 📞 Erreurs Courantes du Thème DOST'AUDIT

### Erreur: "Call to undefined function get_template_directory()"

**Cause**: Fichier appelé en dehors du contexte WordPress

**Solution**: Vérifiez que le fichier est bien dans le dossier du thème

### Erreur: "Cannot redeclare function dost_audit_..."

**Cause**: Fonction déclarée deux fois

**Solution**: Vérifiez qu'il n'y a pas de doublons dans functions.php

### Erreur: "Failed to open stream: No such file or directory"

**Cause**: Chemin de fichier incorrect

**Solution**: Utilisez `get_template_directory_uri()` pour les URLs

## 📚 Ressources

- [Documentation WordPress Debug](https://fr.wordpress.org/support/article/debugging-in-wordpress/)
- [Query Monitor Plugin](https://wordpress.org/plugins/query-monitor/)
- [Debug Bar Plugin](https://wordpress.org/plugins/debug-bar/)

## ✅ Après Correction

1. **Désactivez** le mode debug
2. **Supprimez** le fichier debug.log (ou déplacez-le)
3. **Testez** le site en production
4. **Vérifiez** que tout fonctionne correctement

---

**Note**: Le mode debug peut révéler des informations sensibles. Ne l'activez que pour le développement et le débogage.
