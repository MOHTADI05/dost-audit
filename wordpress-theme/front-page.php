<?php
/**
 * Front Page Template
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main">
    
    <?php
    // Hero Section
    get_template_part( 'template-parts/section', 'hero' );
    
    // Services Section
    get_template_part( 'template-parts/section', 'services' );
    
    // About Section
    get_template_part( 'template-parts/section', 'about' );
    
    // Team Section
    get_template_part( 'template-parts/section', 'team' );
    
    // Testimonials Section
    get_template_part( 'template-parts/section', 'testimonials' );
    
    // FAQ Section
    get_template_part( 'template-parts/section', 'faq' );
    
    // CTA Section
    get_template_part( 'template-parts/section', 'cta' );
    
    // Contact Section
    get_template_part( 'template-parts/section', 'contact' );
    ?>

</main><!-- #main -->

<?php get_footer(); ?>
