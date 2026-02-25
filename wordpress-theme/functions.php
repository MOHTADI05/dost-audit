<?php
/**
 * DOST'AUDIT Theme Functions
 * 
 * @package DOST_AUDIT
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Theme version
define( 'DOST_AUDIT_VERSION', '1.0.0' );

/**
 * Theme Setup
 */
function dost_audit_setup() {
    // Make theme available for translation
    load_theme_textdomain( 'dost-audit', get_template_directory() . '/languages' );
    
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );
    
    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );
    
    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 675, true );
    
    // Add custom image sizes
    add_image_size( 'dost-audit-hero', 1920, 1080, true );
    add_image_size( 'dost-audit-team', 500, 600, true );
    add_image_size( 'dost-audit-service', 800, 600, true );
    
    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'dost-audit' ),
        'footer'  => esc_html__( 'Footer Menu', 'dost-audit' ),
    ) );
    
    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    
    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    
    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    
    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );
    
    // Add support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );
}
add_action( 'after_setup_theme', 'dost_audit_setup' );

/**
 * Set the content width in pixels
 */
function dost_audit_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'dost_audit_content_width', 1200 );
}
add_action( 'after_setup_theme', 'dost_audit_content_width', 0 );

/**
 * Enqueue scripts and styles
 */
function dost_audit_scripts() {
    // Main stylesheet
    wp_enqueue_style( 'dost-audit-style', get_stylesheet_uri(), array(), DOST_AUDIT_VERSION );
    
    // Main CSS
    wp_enqueue_style( 'dost-audit-main', get_template_directory_uri() . '/assets/css/main.css', array(), DOST_AUDIT_VERSION );
    
    // Google Fonts
    wp_enqueue_style( 'dost-audit-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap', array(), null );
    
    // Main JavaScript
    wp_enqueue_script( 'dost-audit-main', get_template_directory_uri() . '/assets/js/main.js', array(), DOST_AUDIT_VERSION, true );
    
    // Localize script for AJAX
    wp_localize_script( 'dost-audit-main', 'dostAuditData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'dost-audit-nonce' ),
    ) );
    
    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'dost_audit_scripts' );

/**
 * Register Widget Areas
 */
function dost_audit_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Footer - Column 1', 'dost-audit' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here for footer column 1.', 'dost-audit' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer - Column 2', 'dost-audit' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here for footer column 2.', 'dost-audit' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer - Column 3', 'dost-audit' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here for footer column 3.', 'dost-audit' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'dost_audit_widgets_init' );

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Customizer additions
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * AJAX handlers
 */
require get_template_directory() . '/inc/ajax-handlers.php';

/**
 * Add preconnect for Google Fonts
 */
function dost_audit_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'dost-audit-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'dost_audit_resource_hints', 10, 2 );

/**
 * Body Classes
 */
function dost_audit_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }
    
    // Adds a class of no-sidebar when there is no sidebar present
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }
    
    return $classes;
}
add_filter( 'body_class', 'dost_audit_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments
 */
function dost_audit_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'dost_audit_pingback_header' );

/**
 * Excerpt Length
 */
function dost_audit_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'dost_audit_excerpt_length', 999 );

/**
 * Excerpt More
 */
function dost_audit_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'dost_audit_excerpt_more' );

/**
 * Suppress Deprecated Warnings from Third-Party Plugins/Themes
 * 
 * Masque les avertissements deprecated provenant de plugins/thèmes tiers
 * (comme Supreme Modules Pro, Divi Theme) qui ne sont pas encore compatibles PHP 8.2+
 * 
 * Ces avertissements n'affectent pas le fonctionnement du site mais polluent les logs.
 */
function dost_audit_suppress_deprecated_warnings() {
    // Seulement si WP_DEBUG est activé mais WP_DEBUG_DISPLAY est désactivé
    if ( defined( 'WP_DEBUG' ) && WP_DEBUG && defined( 'WP_DEBUG_DISPLAY' ) && ! WP_DEBUG_DISPLAY ) {
        // Masquer les deprecated warnings mais garder les autres erreurs
        error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT );
    }
}
add_action( 'init', 'dost_audit_suppress_deprecated_warnings', 1 );
