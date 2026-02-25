# 🔧 Correction des Erreurs Courantes - DOST'AUDIT Theme

## ⚠️ Erreur Critique: "Il y a eu une erreur critique sur ce site"

### Solution Rapide 1: Vérifier les Fichiers Requis

Assurez-vous que tous ces fichiers existent dans votre thème:

```bash
wordpress-theme/
├── style.css                    ✅ REQUIS
├── functions.php                ✅ REQUIS
├── index.php                    ✅ REQUIS
├── header.php                   ✅ REQUIS
├── footer.php                   ✅ REQUIS
├── front-page.php              ✅ REQUIS
├── assets/
│   ├── css/main.css            ✅ REQUIS
│   ├── js/main.js             ✅ REQUIS
│   └── images/                 ✅ REQUIS
└── inc/
    ├── custom-post-types.php    ✅ REQUIS
    ├── customizer.php           ✅ REQUIS
    ├── template-tags.php        ✅ REQUIS
    └── ajax-handlers.php       ✅ REQUIS
```

### Solution Rapide 2: Vérifier la Syntaxe PHP

Si un fichier a une erreur de syntaxe, le thème ne peut pas se charger.

**Testez chaque fichier PHP:**

```bash
php -l functions.php
php -l inc/custom-post-types.php
php -l inc/customizer.php
php -l inc/template-tags.php
php -l inc/ajax-handlers.php
```

### Solution Rapide 3: Erreurs Courantes et Corrections

#### Erreur 1: "Failed opening required 'inc/custom-post-types.php'"

**Cause**: Le fichier n'existe pas ou le chemin est incorrect

**Solution**: Vérifiez que le fichier existe dans `wordpress-theme/inc/custom-post-types.php`

#### Erreur 2: "Call to undefined function get_template_directory()"

**Cause**: Fonction appelée avant que WordPress soit chargé

**Solution**: Vérifiez que tous les fichiers utilisent `if ( ! defined( 'ABSPATH' ) ) exit;` au début

#### Erreur 3: "Cannot redeclare function dost_audit_..."

**Cause**: Fonction déclarée deux fois

**Solution**: Vérifiez qu'il n'y a pas de doublons dans functions.php

#### Erreur 4: "Parse error: syntax error"

**Cause**: Erreur de syntaxe PHP (guillemets, parenthèses, etc.)

**Solution**: Vérifiez la syntaxe avec `php -l nom-du-fichier.php`

### Solution Rapide 4: Désactiver Temporairement les Fichiers Inc

Si l'erreur vient d'un fichier `inc/`, commentez temporairement dans `functions.php`:

```php
// Temporairement désactivé pour débogage
// require get_template_directory() . '/inc/custom-post-types.php';
// require get_template_directory() . '/inc/customizer.php';
// require get_template_directory() . '/inc/template-tags.php';
// require get_template_directory() . '/inc/ajax-handlers.php';
```

Si le site fonctionne après, réactivez un par un pour identifier le fichier problématique.

### Solution Rapide 5: Vérifier les Versions

**PHP**: Minimum 7.4 (recommandé 8.0+)
**WordPress**: Minimum 5.9 (recommandé 6.0+)

Vérifiez dans votre admin WordPress → Outils → Santé du site

### Solution Rapide 6: Activer le Mode Debug

1. **Téléchargez** `wp-config.php` depuis votre serveur
2. **Ouvrez** le fichier
3. **Ajoutez** le code de `wp-config-debug.php` AVANT `/* That's all, stop editing! */`
4. **Uploadez** le fichier
5. **Vérifiez** `wp-content/debug.log` pour voir l'erreur exacte

## 📋 Checklist de Diagnostic

- [ ] Tous les fichiers requis sont présents
- [ ] Syntaxe PHP correcte (testé avec `php -l`)
- [ ] Version PHP compatible (7.4+)
- [ ] Version WordPress compatible (5.9+)
- [ ] Permissions de fichiers correctes (644 pour fichiers, 755 pour dossiers)
- [ ] Mode debug activé et debug.log vérifié
- [ ] Pas de fonctions dupliquées
- [ ] Tous les `require` pointent vers des fichiers existants

## 🚨 Erreurs Spécifiques au Thème

### Si l'erreur mentionne "custom-post-types.php"

Vérifiez que le fichier existe et qu'il n'y a pas d'erreur de syntaxe.

### Si l'erreur mentionne "customizer.php"

Vérifiez que toutes les fonctions `get_theme_mod()` utilisent des valeurs par défaut.

### Si l'erreur mentionne "ajax-handlers.php"

Vérifiez que le nonce est correctement vérifié.

## 📞 Prochaines Étapes

1. **Activez le mode debug** (voir DEBUG-GUIDE.md)
2. **Vérifiez debug.log** pour l'erreur exacte
3. **Corrigez l'erreur** identifiée
4. **Testez** le site
5. **Désactivez le mode debug** une fois corrigé

---

**Besoin d'aide?** Consultez DEBUG-GUIDE.md pour plus de détails.
