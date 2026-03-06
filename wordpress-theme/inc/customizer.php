<?php
/**
 * Theme Customizer
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add postMessage support for site title and description
 */
function dost_audit_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    
    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.logo-img',
            'render_callback' => 'dost_audit_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'dost_audit_customize_partial_blogdescription',
        ) );
    }
    
    // ===================================
    // HERO SECTION
    // ===================================
    $wp_customize->add_section( 'dost_audit_hero_section', array(
        'title'       => __( 'Hero Section', 'dost-audit' ),
        'priority'    => 30,
    ) );
    
    // Hero Subtitle
    $wp_customize->add_setting( 'dost_audit_hero_subtitle', array(
        'default'           => 'Excellence en Audit & Expertise Comptable',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'dost_audit_hero_subtitle', array(
        'label'    => __( 'Hero Subtitle', 'dost-audit' ),
        'section'  => 'dost_audit_hero_section',
        'type'     => 'text',
    ) );
    
    // Hero Title
    $wp_customize->add_setting( 'dost_audit_hero_title', array(
        'default'           => 'Votre Partenaire de Confiance en Expertise Comptable',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'dost_audit_hero_title', array(
        'label'    => __( 'Hero Title', 'dost-audit' ),
        'section'  => 'dost_audit_hero_section',
        'type'     => 'text',
    ) );
    
    // Hero Description
    $wp_customize->add_setting( 'dost_audit_hero_description', array(
        'default'           => 'DOST\'AUDIT vous accompagne avec professionnalisme et expertise dans la gestion de vos finances, l\'audit de vos comptes et le développement de votre entreprise.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'dost_audit_hero_description', array(
        'label'    => __( 'Hero Description', 'dost-audit' ),
        'section'  => 'dost_audit_hero_section',
        'type'     => 'textarea',
    ) );
    
    // Hero Image
    $wp_customize->add_setting( 'dost_audit_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'dost_audit_hero_image', array(
        'label'    => __( 'Hero Image', 'dost-audit' ),
        'section'  => 'dost_audit_hero_section',
        'mime_type' => 'image',
    ) ) );
    
    // ===================================
    // CTA BUTTON
    // ===================================
    $wp_customize->add_section( 'dost_audit_cta_section', array(
        'title'       => __( 'CTA Button', 'dost-audit' ),
        'priority'    => 31,
    ) );
    
    $wp_customize->add_setting( 'dost_audit_cta_button_text', array(
        'default'           => 'Rendez-vous',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'dost_audit_cta_button_text', array(
        'label'    => __( 'CTA Button Text', 'dost-audit' ),
        'section'  => 'dost_audit_cta_section',
        'type'     => 'text',
    ) );
    
    $wp_customize->add_setting( 'dost_audit_cta_button_link', array(
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'dost_audit_cta_button_link', array(
        'label'    => __( 'CTA Button Link', 'dost-audit' ),
        'section'  => 'dost_audit_cta_section',
        'type'     => 'url',
    ) );
    
    // CTA Title
    $wp_customize->add_setting( 'dost_audit_cta_title', array(
        'default'           => 'Prêt à Discuter de Vos Besoins?',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'dost_audit_cta_title', array(
        'label'    => __( 'CTA Title', 'dost-audit' ),
        'section'  => 'dost_audit_cta_section',
        'type'     => 'text',
    ) );
    
    // CTA Description
    $wp_customize->add_setting( 'dost_audit_cta_description', array(
        'default'           => 'Planifiez une consultation gratuite avec notre équipe d\'experts. Nous sommes là pour vous accompagner dans la gestion de vos finances.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'dost_audit_cta_description', array(
        'label'    => __( 'CTA Description', 'dost-audit' ),
        'section'  => 'dost_audit_cta_section',
        'type'     => 'textarea',
    ) );
    
    // ===================================
    // COLORS
    // ===================================
    $wp_customize->add_section( 'dost_audit_colors', array(
        'title'       => __( 'Theme Colors', 'dost-audit' ),
        'priority'    => 40,
    ) );
    
    // Primary Color
    $wp_customize->add_setting( 'dost_audit_primary_color', array(
        'default'           => '#3781AE',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dost_audit_primary_color', array(
        'label'    => __( 'Primary Color', 'dost-audit' ),
        'section'  => 'dost_audit_colors',
    ) ) );
    
    // Secondary Color
    $wp_customize->add_setting( 'dost_audit_secondary_color', array(
        'default'           => '#406889',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dost_audit_secondary_color', array(
        'label'    => __( 'Secondary Color', 'dost-audit' ),
        'section'  => 'dost_audit_colors',
    ) ) );
    
    // ===================================
    // SOCIAL MEDIA
    // ===================================
    $wp_customize->add_section( 'dost_audit_social', array(
        'title'       => __( 'Social Media Links', 'dost-audit' ),
        'priority'    => 50,
    ) );
    
    $wp_customize->add_setting( 'dost_audit_linkedin', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'dost_audit_linkedin', array(
        'label'    => __( 'LinkedIn URL', 'dost-audit' ),
        'section'  => 'dost_audit_social',
        'type'     => 'url',
    ) );
    
    $wp_customize->add_setting( 'dost_audit_twitter', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'dost_audit_twitter', array(
        'label'    => __( 'Twitter URL', 'dost-audit' ),
        'section'  => 'dost_audit_social',
        'type'     => 'url',
    ) );
    
    $wp_customize->add_setting( 'dost_audit_facebook', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'dost_audit_facebook', array(
        'label'    => __( 'Facebook URL', 'dost-audit' ),
        'section'  => 'dost_audit_social',
        'type'     => 'url',
    ) );
    
    // ===================================
    // FOOTER
    // ===================================
    $wp_customize->add_section( 'dost_audit_footer', array(
        'title'       => __( 'Footer Settings', 'dost-audit' ),
        'priority'    => 60,
    ) );
    
    $wp_customize->add_setting( 'dost_audit_footer_description', array(
        'default'           => 'Cabinet d\'expertise comptable et d\'audit offrant des services de qualité avec professionnalisme et engagement.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'dost_audit_footer_description', array(
        'label'    => __( 'Footer Description', 'dost-audit' ),
        'section'  => 'dost_audit_footer',
        'type'     => 'textarea',
    ) );
    
    // ===================================
    // CONTACT INFORMATION
    // ===================================
    $wp_customize->add_section( 'dost_audit_contact', array(
        'title'       => __( 'Contact Information', 'dost-audit' ),
        'priority'    => 70,
    ) );
    
    $wp_customize->add_setting( 'dost_audit_contact_phone', array(
        'default'           => '01 88 75 01 38 / 06 51 72 01 44',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'dost_audit_contact_phone', array(
        'label'    => __( 'Phone Number', 'dost-audit' ),
        'section'  => 'dost_audit_contact',
        'type'     => 'text',
    ) );
    
    $wp_customize->add_setting( 'dost_audit_contact_email', array(
        'default'           => 'contact@dost-audit.fr',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'dost_audit_contact_email', array(
        'label'    => __( 'Email Address', 'dost-audit' ),
        'section'  => 'dost_audit_contact',
        'type'     => 'email',
    ) );
    
    $wp_customize->add_setting( 'dost_audit_contact_address', array(
        'default'           => '44 Rue Roger-Salengro<br>94120 Fontenay-sous-Bois',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'dost_audit_contact_address', array(
        'label'    => __( 'Address', 'dost-audit' ),
        'section'  => 'dost_audit_contact',
        'type'     => 'textarea',
    ) );
    
    $wp_customize->add_setting( 'dost_audit_contact_hours', array(
        'default'           => 'Lun - Ven: 10h00 - 18h00',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'dost_audit_contact_hours', array(
        'label'    => __( 'Business Hours', 'dost-audit' ),
        'section'  => 'dost_audit_contact',
        'type'     => 'textarea',
    ) );
}
add_action( 'customize_register', 'dost_audit_customize_register' );

/**
 * Render the site title for the selective refresh partial
 */
function dost_audit_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial
 */
function dost_audit_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously
 */
function dost_audit_customize_preview_js() {
    wp_enqueue_script( 'dost-audit-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), DOST_AUDIT_VERSION, true );
}
add_action( 'customize_preview_init', 'dost_audit_customize_preview_js' );
