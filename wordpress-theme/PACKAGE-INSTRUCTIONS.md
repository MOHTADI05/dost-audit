# Instructions de Package WordPress Theme

## Pour créer le package final:

1. Assurez-vous que tous les fichiers sont dans le dossier `wordpress-theme/`

2. Compressez le dossier en ZIP:
   - Sur Windows: Clic droit > "Envoyer vers" > "Dossier compressé"
   - Sur Mac: Clic droit > "Compress"
   - Ou utilisez la commande: `zip -r dost-audit-theme.zip wordpress-theme/`

3. Renommez le ZIP en `dost-audit.zip`

4. Le thème est prêt à être installé sur WordPress!

## Fichiers importants manquants à ajouter:

### Screenshot (screenshot.png)
- Créez une capture d'écran de votre site : 1200x900px
- Enregistrez-la comme `wordpress-theme/screenshot.png`
- Ce sera l'aperçu dans Apparence > Thèmes

### Fichiers de template parts à compléter:
- `template-parts/section-about.php` - Copiez le contenu HTML de index.html
- `template-parts/section-team.php` - Copiez et adaptez avec WP_Query
- `template-parts/section-testimonials.php` - Copiez et adaptez avec WP_Query
- `template-parts/section-faq.php` - Copiez et adaptez avec WP_Query
- `template-parts/section-cta.php` - Copiez le contenu HTML
- `template-parts/section-contact.php` - Copiez et intégrez AJAX

### Fichier customizer.js:
Créez `wordpress-theme/assets/js/customizer.js` avec:

```javascript
(function( $ ) {
    // Site title
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.logo-img' ).attr( 'alt', to );
        } );
    } );
    
    // Hero section
    wp.customize( 'dost_audit_hero_title', function( value ) {
        value.bind( function( to ) {
            $( '.hero h1' ).text( to );
        } );
    } );
})( jQuery );
```

## Structure finale du package:

```
dost-audit.zip
└── wordpress-theme/
    ├── assets/
    ├── inc/
    ├── template-parts/
    ├── style.css
    ├── functions.php
    ├── header.php
    ├── footer.php
    ├── index.php
    ├── front-page.php
    ├── screenshot.png  (À AJOUTER)
    └── README.md
```

## Checklist avant publication:

- [ ] Screenshot ajouté (1200x900px)
- [ ] Tous les template-parts complétés
- [ ] Customizer.js créé
- [ ] Testé sur WordPress 5.9+
- [ ] Testé responsive (mobile, tablet, desktop)
- [ ] Formulaire de contact testé
- [ ] Menus configurés
- [ ] Services ajoutés
- [ ] Thème validé avec Theme Check plugin
