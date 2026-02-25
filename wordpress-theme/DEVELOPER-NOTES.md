# DOST'AUDIT WordPress Theme - Developer Notes

## Theme Structure Overview

```
wordpress-theme/
│
├── style.css                    # Theme header file (required by WordPress)
├── functions.php                # Theme setup and configuration
├── header.php                   # Header template
├── footer.php                   # Footer template
├── index.php                    # Main loop template
├── front-page.php              # Homepage template (uses template parts)
│
├── assets/
│   ├── css/
│   │   └── main.css            # All theme styles (2920 lines)
│   ├── js/
│   │   ├── main.js             # Main JavaScript (664 lines)
│   │   └── customizer.js       # Customizer live preview
│   └── images/                 # Theme images (9 files)
│
├── inc/
│   ├── custom-post-types.php   # 4 CPTs: Service, Team, Testimonial, FAQ
│   ├── customizer.php          # WordPress Customizer settings
│   ├── template-tags.php       # Helper functions
│   └── ajax-handlers.php       # AJAX form submission
│
└── template-parts/
    ├── section-hero.php         # Hero section (complete)
    ├── section-services.php     # Services grid with WP_Query (complete)
    ├── section-about.php        # About section (placeholder)
    ├── section-team.php         # Team section (placeholder)
    ├── section-testimonials.php # Testimonials carousel (placeholder)
    ├── section-faq.php          # FAQ accordion (placeholder)
    ├── section-cta.php          # CTA section (placeholder)
    └── section-contact.php      # Contact form (placeholder)
```

## Custom Post Types

### Service
- **Purpose**: Display accounting services
- **Supports**: title, editor, thumbnail, excerpt, page-attributes
- **Archive**: Yes
- **Menu Icon**: dashicons-businessman

### Team
- **Purpose**: Display team members
- **Supports**: title, editor, thumbnail, page-attributes
- **Archive**: No
- **Menu Icon**: dashicons-groups

### Testimonial
- **Purpose**: Display client testimonials
- **Supports**: title, editor, thumbnail
- **Archive**: No
- **Publicly Queryable**: No
- **Menu Icon**: dashicons-format-quote

### FAQ
- **Purpose**: Display frequently asked questions
- **Supports**: title, editor, page-attributes
- **Archive**: No
- **Publicly Queryable**: No
- **Menu Icon**: dashicons-editor-help

## Customizer Options

### Hero Section
- `dost_audit_hero_subtitle` (text)
- `dost_audit_hero_title` (text)
- `dost_audit_hero_description` (textarea)
- `dost_audit_hero_image` (media)

### CTA Button
- `dost_audit_cta_button_text` (text, default: "Rendez-vous")
- `dost_audit_cta_button_link` (url, default: "#contact")

### Colors
- `dost_audit_primary_color` (color, default: #3781AE)
- `dost_audit_secondary_color` (color, default: #406889)

### Social Media
- `dost_audit_linkedin` (url)
- `dost_audit_twitter` (url)
- `dost_audit_facebook` (url)

### Footer
- `dost_audit_footer_description` (textarea)

## Widget Areas

### Footer Widgets (3 columns)
- `footer-1` - Footer - Column 1
- `footer-2` - Footer - Column 2
- `footer-3` - Footer - Column 3

## Navigation Menus

### Registered Locations
- `primary` - Primary Menu (navbar)
- `footer` - Footer Menu (footer legal links)

## Image Sizes

- `dost-audit-hero`: 1920x1080 (hard crop)
- `dost-audit-team`: 500x600 (hard crop)
- `dost-audit-service`: 800x600 (hard crop)

## AJAX Endpoints

### Contact Form
- **Action**: `dost_audit_contact_form`
- **Method**: POST
- **Nonce**: `dost-audit-nonce`
- **Fields**: name, email, phone, company, message
- **Handler**: `inc/ajax-handlers.php`

## CSS Variables (main.css)

```css
:root {
    /* Colors */
    --color-primary: #3781AE;
    --color-primary-dark: #406889;
    --color-text: #4C7282;
    --color-white: #FFFFFF;
    --color-cream: #F8F6F0;
    --color-ivory: #FAF9F5;
    
    /* Typography */
    --font-display: 'Playfair Display', serif;
    --font-sans: 'Inter', sans-serif;
    
    /* Spacing */
    --spacing-xs: 0.5rem;
    --spacing-sm: 1rem;
    --spacing-md: 2rem;
    --spacing-lg: 3rem;
    --spacing-xl: 4rem;
    
    /* Border Radius */
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --radius-full: 9999px;
    
    /* Transitions */
    --transition: 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}
```

## Key Features Implemented

### Design
✅ Liquid Glass (Glassmorphism 2.0) navbar
✅ Blue color palette (#3781AE, #406889, #4C7282)
✅ Responsive design (mobile-first)
✅ CSS animations (parallax, slide, scale, bounce)
✅ Floating particles
✅ Service cards with 3D tilt effect

### WordPress Integration
✅ Custom Post Types (4 types)
✅ WordPress Customizer
✅ Navigation menus (2 locations)
✅ Widget areas (3 areas)
✅ Custom image sizes (3 sizes)
✅ AJAX form handling
✅ Translation ready (dost-audit text domain)

### Performance
✅ Enqueued assets properly
✅ Nonce verification for AJAX
✅ Sanitization and escaping
✅ Preconnect for Google Fonts
✅ will-change for animations

## TODO for Production

### High Priority
1. Complete template parts (about, team, testimonials, FAQ, CTA, contact)
2. Add screenshot.png (1200x900px)
3. Test with Theme Check plugin
4. Test on WordPress 5.9+ and 6.0+
5. Test responsive design thoroughly

### Medium Priority
1. Add more Customizer options
2. Create custom meta boxes for CPTs
3. Add template hierarchy (single-service.php, etc.)
4. Implement breadcrumbs
5. Add schema.org markup

### Low Priority
1. Create child theme example
2. Add more animation options
3. Implement dark mode
4. Add more widget areas
5. Create additional page templates

## Coding Standards

### PHP
- WordPress Coding Standards
- Prefix: `dost_audit_`
- Text Domain: `dost-audit`
- Escaping: `esc_html()`, `esc_attr()`, `esc_url()`
- Sanitization: `sanitize_text_field()`, `sanitize_email()`, etc.

### CSS
- BEM-like methodology
- Mobile-first responsive design
- CSS custom properties (variables)
- Animations use GPU acceleration

### JavaScript
- jQuery for WordPress compatibility
- Event delegation where appropriate
- Throttled scroll events
- Accessibility (keyboard navigation, ARIA)

## Performance Notes

### Optimizations Applied
- CSS and JS minification ready
- Image lazy loading compatible
- Intersection Observer for scroll animations
- requestAnimationFrame for parallax
- Throttled scroll events
- GPU-accelerated animations (transform, opacity)

### Recommended Plugins
- **Autoptimize** - CSS/JS minification
- **WP Rocket** - Caching
- **Smush** - Image optimization
- **WP Mail SMTP** - Email delivery
- **UpdraftPlus** - Backups

## Security

### Implemented
✅ Nonce verification for AJAX
✅ Input sanitization
✅ Output escaping
✅ Capability checks (where applicable)
✅ No direct file access (`ABSPATH` check)

### Recommendations
- Use HTTPS
- Keep WordPress updated
- Use strong passwords
- Install security plugin (Wordfence, Sucuri)
- Regular backups

## Browser Support

### Tested & Supported
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

### Known Issues
- backdrop-filter requires -webkit- prefix for Safari
- Older browsers may not support all animations

## Accessibility

### WCAG 2.1 Level AA
✅ Semantic HTML5
✅ ARIA labels
✅ Keyboard navigation
✅ Focus indicators
✅ Alt text for images
✅ Color contrast ratios
✅ Screen reader friendly

## License

GPL v2 or later

## Author

Mohtedi05
https://mohtedi-io.vercel.app/

## Version History

### 1.0.0 (Current)
- Initial release
- All base features implemented
- Custom Post Types
- WordPress Customizer
- Responsive design
- Animations and parallax effects

---

**Last Updated**: February 2026
