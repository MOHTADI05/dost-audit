# DOST'AUDIT - Premium WordPress Theme

Un thème WordPress premium pour cabinet d'expertise comptable et d'audit avec design liquid glass moderne, animations sophistiquées et effets parallax.

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-5.9%2B-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)
![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)

## 🌟 Caractéristiques

### Design Moderne
- **Liquid Glass Effect** - Navigation avec effet de verre dépoli (glassmorphism 2.0)
- **Animations CSS Avancées** - Parallax, slide, scale et bounce effects
- **Responsive Design** - Parfaitement adapté à tous les écrans
- **Palette Bleue Premium** - Design professionnel et élégant

### Fonctionnalités WordPress
- ✅ Custom Post Types (Services, Team, Testimonials, FAQ)
- ✅ WordPress Customizer Integration
- ✅ Widget Areas (3 footer columns)
- ✅ Custom Navigation Menus
- ✅ AJAX Contact Form
- ✅ Translation Ready
- ✅ SEO Optimized
- ✅ Performance Optimized

### Sections Incluses
1. **Hero Section** - Bannière animée avec statistiques
2. **Services Section** - Grille de services avec animations
3. **About Section** - Présentation de l'équipe avec métriques
4. **Team Section** - Équipe avec effet parallax
5. **Testimonials** - Témoignages clients avec carousel
6. **FAQ Section** - Questions fréquentes avec accordion
7. **CTA Section** - Appel à l'action
8. **Contact Form** - Formulaire de contact avec validation
9. **Footer** - Footer complet avec widgets et réseaux sociaux

## 📋 Prérequis

- WordPress 5.9 ou supérieur
- PHP 7.4 ou supérieur
- MySQL 5.6 ou supérieur

## 🚀 Installation

### Méthode 1: Installation via WordPress Admin

1. Téléchargez le fichier ZIP du thème
2. Allez dans **Apparence > Thèmes** dans votre admin WordPress
3. Cliquez sur **Ajouter** puis **Téléverser un thème**
4. Sélectionnez le fichier ZIP et cliquez sur **Installer maintenant**
5. Activez le thème

### Méthode 2: Installation par FTP

1. Décompressez le fichier ZIP du thème
2. Uploadez le dossier `wordpress-theme` vers `/wp-content/themes/` via FTP
3. Renommez le dossier en `dost-audit` (optionnel)
4. Allez dans **Apparence > Thèmes** et activez le thème

## ⚙️ Configuration

### 1. Configuration Initiale

Après activation, allez dans **Apparence > Personnaliser** pour configurer:

#### Hero Section
- Sous-titre
- Titre principal
- Description
- Image hero

#### Bouton CTA
- Texte du bouton
- Lien du bouton

#### Couleurs
- Couleur primaire (#3781AE par défaut)
- Couleur secondaire (#406889 par défaut)

#### Réseaux Sociaux
- URL LinkedIn
- URL Twitter
- URL Facebook

#### Footer
- Description du footer

### 2. Configurer les Menus

1. Allez dans **Apparence > Menus**
2. Créez deux menus:
   - **Primary Menu** - Menu de navigation principal
   - **Footer Menu** - Menu du footer

**Menu items suggérés:**
```
Primary Menu:
- Accueil (#home)
- Services (#services)
- Équipe (#about)
- Témoignages (#testimonials)
- FAQ (#faq)
- Contact (#contact)
```

### 3. Ajouter des Services

1. Allez dans **Services > Ajouter**
2. Ajoutez le titre du service
3. Ajoutez la description dans l'éditeur
4. Définissez une image à la une (optionnel - icône SVG)
5. Publiez

**Services suggérés:**
- Expertise Comptable
- Audit & Commissariat
- Conseil Fiscal
- Gestion Sociale
- Création d'Entreprise
- Conseil Juridique

### 4. Ajouter des Membres de l'Équipe

1. Allez dans **Team > Ajouter**
2. Ajoutez le nom du membre
3. Ajoutez la bio dans l'éditeur
4. Définissez une photo à la une
5. Ajoutez le poste (custom field)
6. Publiez

### 5. Ajouter des Témoignages

1. Allez dans **Testimonials > Ajouter**
2. Titre = Nom du client
3. Contenu = Témoignage
4. Image à la une = Photo du client
5. Publiez

### 6. Ajouter des FAQs

1. Allez dans **FAQs > Ajouter**
2. Titre = Question
3. Contenu = Réponse
4. Ordre de page = Pour trier les FAQs
5. Publiez

### 7. Configurer les Widgets Footer

1. Allez dans **Apparence > Widgets**
2. Ajoutez des widgets dans:
   - Footer - Column 1 (Services)
   - Footer - Column 2 (Entreprise)
   - Footer - Column 3 (Resources)

**Widgets suggérés:**
- Navigation Menu Widget
- Text Widget
- Custom HTML

### 8. Uploader le Logo

1. Allez dans **Apparence > Personnaliser > Identité du site**
2. Cliquez sur **Sélectionner un logo**
3. Uploadez votre logo (recommandé: 400x100px, PNG avec transparence)

## 📁 Structure des Fichiers

```
wordpress-theme/
├── assets/
│   ├── css/
│   │   └── main.css          # Styles principaux
│   ├── js/
│   │   ├── main.js           # JavaScript principal
│   │   └── customizer.js     # Customizer JS
│   └── images/               # Images du thème
├── inc/
│   ├── custom-post-types.php # Custom Post Types
│   ├── customizer.php        # Customizer settings
│   ├── template-tags.php     # Template functions
│   └── ajax-handlers.php     # AJAX handlers
├── template-parts/
│   ├── section-hero.php      # Section Hero
│   ├── section-services.php  # Section Services
│   ├── section-about.php     # Section About
│   ├── section-team.php      # Section Team
│   ├── section-testimonials.php # Section Testimonials
│   ├── section-faq.php       # Section FAQ
│   ├── section-cta.php       # Section CTA
│   └── section-contact.php   # Section Contact
├── style.css                 # Stylesheet (header info)
├── functions.php             # Theme functions
├── header.php                # Header template
├── footer.php                # Footer template
├── index.php                 # Main template
├── front-page.php            # Homepage template
└── README.md                 # This file
```

## 🎨 Personnalisation Avancée

### Modifier les Couleurs

Dans `assets/css/main.css`, modifiez les variables CSS:

```css
:root {
    --color-primary: #3781AE;
    --color-primary-dark: #406889;
    --color-text: #4C7282;
}
```

### Ajouter de Nouvelles Sections

1. Créez un fichier dans `template-parts/` (ex: `section-pricing.php`)
2. Ajoutez le code HTML/PHP de votre section
3. Incluez-le dans `front-page.php`:

```php
get_template_part( 'template-parts/section', 'pricing' );
```

### Modifier le Formulaire de Contact

Le handler AJAX est dans `inc/ajax-handlers.php`. Vous pouvez:
- Modifier les champs requis
- Changer l'adresse email de destination
- Ajouter des validations supplémentaires

## 🔧 Troubleshooting

### Le formulaire de contact ne fonctionne pas
1. Vérifiez que votre serveur supporte `wp_mail()`
2. Installez un plugin SMTP (WP Mail SMTP recommandé)
3. Vérifiez les paramètres email dans WordPress

### Les animations ne se déclenchent pas
1. Vérifiez que JavaScript est activé
2. Vérifiez la console pour les erreurs
3. Testez sur un navigateur différent

### Le menu mobile ne fonctionne pas
1. Assurez-vous que le menu est bien assigné à "Primary Menu"
2. Vérifiez que JavaScript se charge correctement

### Les images ne s'affichent pas
1. Régénérez les miniatures avec un plugin (Regenerate Thumbnails)
2. Vérifiez les permissions des dossiers uploads
3. Vérifiez les URLs des images dans la base de données

## 📱 Responsive Breakpoints

```css
/* Mobile First */
Base: 320px+
Small: 576px+
Medium: 768px+
Large: 992px+
Extra Large: 1200px+
```

## ♿ Accessibilité

Ce thème suit les meilleures pratiques d'accessibilité:
- WCAG 2.1 Level AA compliant
- Clavier navigation
- Screen reader friendly
- ARIA labels
- Semantic HTML5
- Focus indicators

## 🌐 Traduction

### Créer une Traduction

1. Installez Poedit ou Loco Translate (plugin)
2. Scannez le thème pour les chaînes traduisibles
3. Créez les fichiers `.po` et `.mo`
4. Placez-les dans `/languages/`

### Chaînes Traduisibles

Toutes les chaînes utilisent `dost-audit` comme text domain:

```php
esc_html_e( 'Text', 'dost-audit' );
esc_html__( 'Text', 'dost-audit' );
```

## 🔄 Mises à Jour

### Version 1.0.0 (Date actuelle)
- 🎉 Release initiale
- ✅ Toutes les fonctionnalités de base
- ✅ Custom Post Types
- ✅ WordPress Customizer
- ✅ Responsive design complet

## 📞 Support

Pour toute question ou support:
- **Email**: contact@mohtedi-io.vercel.app
- **Website**: https://mohtedi-io.vercel.app/
- **GitHub**: https://github.com/mohtedi05

## 📝 Licence

Ce thème est sous licence GPL v2 ou ultérieure.

```
DOST'AUDIT WordPress Theme, Copyright 2026 Mohtedi05
DOST'AUDIT is distributed under the terms of the GNU GPL v2 or later.
```

## 👨‍💻 Crédits

- **Développé par**: [Mohtedi05](https://mohtedi-io.vercel.app/)
- **Design**: Liquid Glass / Glassmorphism 2.0
- **Fonts**: Google Fonts (Playfair Display, Inter)
- **Icons**: Custom SVG icons
- **Animations**: CSS3 + JavaScript

## 🙏 Remerciements

Merci d'avoir choisi DOST'AUDIT Theme!

Si vous aimez ce thème, n'hésitez pas à:
- ⭐ Le noter sur WordPress.org
- 🔗 Le partager avec vos collègues
- 📧 Envoyer vos retours et suggestions

---

**Made with ❤️ by Mohtedi05**
