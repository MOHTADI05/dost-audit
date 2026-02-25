# DOST'AUDIT - Site Web Professionnel

Un site web sophistiqué et moderne pour cabinet d'expertise comptable et d'audit. Conçu avec une esthétique professionnelle et contemporaine. Développé en HTML, CSS et JavaScript purs sans dépendances.

## Philosophie du Design

Ce site web incarne:
- **Confiance & Expertise**: Design professionnel combiné avec une interface moderne
- **Excellence Professionnelle**: Typographie élégante et palette de couleurs raffinée
- **Centré Client**: Navigation claire et expérience utilisateur fluide

## Features

### Éléments de Design
- 🎨 **Palette de Couleurs DOST'AUDIT**:
  - Bleu Principal: `#3781AE`
  - Bleu Foncé: `#406889`
  - Bleu Secondaire: `#4C7282`
- 🔮 **Navbar Liquid Glass** - Glassmorphisme premium 2.0 avec flou givré
- 📸 **Images de Marque** - Logo, photo d'équipe et bureau professionnel
- 📖 Typographie de style éditorial (Playfair Display + Inter)
- 🎨 Formes organiques et animations subtiles
- 📱 Design entièrement responsive
- ♿ Accessible et ergonomique

### Sections
1. **Section Hero** - Introduction impactante avec photos professionnelles
2. **Services** - Six domaines d'expertise avec design élégant
3. **Notre Équipe** - Photos d'équipe et indicateurs clés
4. **Témoignages** - Carrousel avec témoignages clients
5. **FAQ** - 6 questions fréquentes avec accordéon interactif
6. **Appel à l'Action** - Invitation à la consultation
7. **Formulaire de Contact** - Formulaire professionnel
8. **Footer** - Liens complets et informations

### Interactive Features
- **Liquid Glass Navigation** - Advanced glassmorphism with dynamic blur
- **Parallax Scrolling** - Multi-layer depth effects on images and backgrounds
- **Scroll Animations** - Elements slide, fade, and bounce as they enter view
- **Number Counting** - Animated statistics that count up when visible
- **3D Card Hover** - Mouse-tracking parallax effect on cards
- **Image Parallax** - Hero and team images move at different speeds
- Smooth scrolling navigation with active section highlighting
- Testimonial carousel with auto-play
- Form validation with smooth transitions
- Button ripple and fill effects
- Staggered entrance animations
- Reduced motion support for accessibility

## File Structure

```
├── index.html                      # Main HTML structure
├── styles.css                      # Complete styling with animations
├── script.js                       # Interactive functionality & parallax
├── images/                         # Brand images folder
│   ├── logo.png                    # DOST'AUDIT logo
│   ├── image.png                   # Team photo (Notre Équipe)
│   └── SITUATION-2-2.jpg           # Office collaboration photo
├── README.md                       # Main documentation
├── DOSTAUDIT-BRANDING.md          # Complete branding & color guide
├── LIQUID-GLASS-NAVBAR.md         # Detailed navbar implementation
├── NAVBAR-STATES-REFERENCE.md     # Visual states reference
├── ANIMATIONS-PARALLAX-GUIDE.md   # Complete animations guide
└── FAQ-SECTION-GUIDE.md           # FAQ accordion documentation
```

## 🔮 Liquid Glass Navbar

This website features a **premium liquid glass navigation bar** with glassmorphism 2.0 aesthetics:

### Key Features
- **Frosted Glass Effect**: 20px backdrop blur with saturation boost
- **Organic Pill Shape**: Fully rounded 100px border radius
- **Floating Design**: Positioned with elegant spacing from viewport edge
- **Dynamic Blur**: Increases blur intensity on scroll (20px → 30px)
- **Light Refraction**: Multiple shadow layers simulate real glass material
- **Specular Highlights**: Top-edge glow mimics light catching surface
- **Subtle Shimmer**: 8-second light animation across surface
- **Fluid Interactions**: Localized light bloom on hover with smooth transitions
- **Active State Highlighting**: Auto-detects current section while scrolling
- **Responsive**: Adapts beautifully to all screen sizes

See `LIQUID-GLASS-NAVBAR.md` for complete technical documentation and customization options.

---

## 🎨 DOST'AUDIT Branding

The website showcases the complete DOST'AUDIT brand identity:

### Color Palette
```css
Primary Blue:    #3781AE  /* Main brand color - icons, links, accents */
Primary Dark:    #406889  /* Headlines, buttons, important elements */
Secondary Blue:  #4C7282  /* Tertiary accents and decorative elements */
```

### Brand Images

**Logo** (`images/logo.png`)
- Modern geometric design with vertical blue bars
- Used in navbar and footer
- Footer version: White filtered for dark background

**Team Photo** (`images/image.png`)
- Professional team portrait: "NOTRE ÉQUIPE"
- Features: Nuno DA SILVA, Birkan CETIN, Myriam BEN RACHED
- Location: About/Team section

**Office Photo** (`images/SITUATION-2-2.jpg`)
- Professional team collaboration scene
- Modern office environment
- Location: Hero section

### Complete Branding Guide
See `DOSTAUDIT-BRANDING.md` for:
- Complete color mapping
- Image integration details
- Usage guidelines
- Technical specifications
- Quality checklist

---

## 🎬 Animations & Parallax Effects

The website features a comprehensive animation system for an engaging user experience:

### Scroll-Triggered Animations
- **6 Animation Types**: Slide up/down/left/right, scale, bounce
- **Staggered Entrance**: Service cards and stats animate sequentially
- **Intersection Observer**: Efficient viewport detection
- **One-time Trigger**: Animations play once for performance

### Parallax Scrolling
- **Image Parallax**: Hero and team photos move at different speeds
- **Background Layers**: Subtle depth with moving gradients
- **Floating Elements**: Decorative elements with multi-speed movement
- **Smooth Performance**: 60fps with requestAnimationFrame

### Interactive Animations
- **3D Card Tilt**: Mouse-tracking parallax on service/metric cards
- **Number Counting**: Statistics animate from 0 to target value
- **Hover Effects**: Images lift with enhanced shadows
- **Button Ripples**: Expanding circles and fill effects

### Special Effects
- **Liquid Glass Shimmer**: 8s light sweep across navbar
- **Pulse Animation**: Optional breathing effect for CTAs
- **Wave Movement**: Gentle floating for backgrounds
- **Gradient Shifts**: Animated color transitions

### Accessibility
- **Reduced Motion Support**: Respects `prefers-reduced-motion`
- **Performance Optimized**: GPU-accelerated transforms
- **Smooth Scrolling**: Native browser smooth scroll
- **No Jank**: Throttled scroll events

See `ANIMATIONS-PARALLAX-GUIDE.md` for:
- Complete animation catalog
- Implementation details
- Customization options
- Performance metrics
- Usage examples

---

## ❓ Section FAQ (Foire Aux Questions)

Une section FAQ élégante et interactive pour répondre aux questions fréquentes des clients:

### Fonctionnalités

- **6 Questions Pertinentes** adaptées à l'expertise comptable
- **Accordéon Interactif** une seule question ouverte à la fois
- **Animations Fluides** transitions douces et élégantes
- **Numérotation Stylée** cercles colorés avec effets hover
- **Icons Rotatifs** chevron qui tourne à 180° à l'ouverture
- **Scroll Smooth** vers la question ouverte

### Questions Incluses

1. Services inclus dans l'expertise comptable
2. Différence expert-comptable vs commissaire aux comptes
3. Fréquence de fourniture des documents
4. Tarification des services
5. Accompagnement création d'entreprise
6. Changement d'expert-comptable en cours d'année

### Interactions

- **Clic** sur la question ou le bouton toggle
- **Clavier** Enter/Space pour ouvrir/fermer
- **Accessibilité** ARIA labels et navigation au clavier
- **Auto-close** ferme les autres questions automatiquement
- **Responsive** adapté à tous les écrans

### Design

- Badge "Questions Fréquentes" en haut
- Cercles numérotés (Charcoal → Primary Blue actif)
- Background blanc avec hover subtil
- Bordure Primary Blue pour item actif
- Animations de contenu avec fade-in
- Décorations de fond circulaires

See `FAQ-SECTION-GUIDE.md` for:
- Structure HTML complète
- Styles CSS détaillés
- JavaScript interactions
- Customization options
- Accessibility features
- Best practices

## Getting Started

### Prerequisites
- A modern web browser (Chrome, Firefox, Safari, Edge)
- No build tools or dependencies required

### Installation

1. Clone or download the project files
2. Open `index.html` in your web browser
3. That's it! No installation or build process needed

### Deployment

This is a static website that can be deployed to any web hosting service:

- **GitHub Pages**: Push to a repository and enable GitHub Pages
- **Netlify**: Drag and drop the folder or connect to Git
- **Vercel**: Import the project
- **Traditional Hosting**: Upload files via FTP

## Customization Guide

### Colors
Edit the CSS variables in `styles.css`:

```css
:root {
    --color-ivory: #F5F3ED;
    --color-olive: #5A6B4C;
    --color-charcoal: #2C3E2F;
    /* ... more colors */
}
```

### Typography
The website uses Google Fonts:
- **Headings**: Playfair Display (serif)
- **Body**: Inter (sans-serif)

To change fonts, update the Google Fonts link in `index.html` and the CSS variables.

### Content
- Update text directly in `index.html`
- Modify services, testimonials, and contact information
- Replace placeholder content with your firm's details

### Form Submission
The contact form currently uses a simulated submission. To connect to a real backend:

1. Uncomment the fetch API code in `script.js`
2. Replace `/api/contact` with your endpoint
3. Set up backend to handle form submissions

## Browser Support

- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers

## Performance

- **Fast Loading**: No external dependencies except fonts
- **Optimized**: Clean, semantic HTML and efficient CSS
- **Lightweight**: ~30KB total (excluding fonts)
- **SEO-Friendly**: Semantic markup and proper heading hierarchy

## Accessibility

- Semantic HTML5 elements
- ARIA labels where needed
- Keyboard navigation support
- Color contrast compliant
- Screen reader friendly

## Credits

**Design Inspired By**: Premium law firm aesthetics and editorial layouts
**Fonts**: Google Fonts (Playfair Display, Inter)
**Icons**: Custom SVG graphics

## License

This template is free to use for personal and commercial projects. Attribution appreciated but not required.

## Support

For questions or customization help, refer to the inline code comments or standard HTML/CSS/JS documentation.

---

Built with attention to detail and professional excellence. Perfect for law firms, legal consultancies, and professional services.