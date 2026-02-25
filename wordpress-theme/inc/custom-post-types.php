<?php
/**
 * Custom Post Types
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Services Custom Post Type
 */
function dost_audit_register_services_cpt() {
    $labels = array(
        'name'                  => _x( 'Services', 'Post Type General Name', 'dost-audit' ),
        'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'dost-audit' ),
        'menu_name'             => __( 'Services', 'dost-audit' ),
        'name_admin_bar'        => __( 'Service', 'dost-audit' ),
        'archives'              => __( 'Service Archives', 'dost-audit' ),
        'attributes'            => __( 'Service Attributes', 'dost-audit' ),
        'parent_item_colon'     => __( 'Parent Service:', 'dost-audit' ),
        'all_items'             => __( 'All Services', 'dost-audit' ),
        'add_new_item'          => __( 'Add New Service', 'dost-audit' ),
        'add_new'               => __( 'Add New', 'dost-audit' ),
        'new_item'              => __( 'New Service', 'dost-audit' ),
        'edit_item'             => __( 'Edit Service', 'dost-audit' ),
        'update_item'           => __( 'Update Service', 'dost-audit' ),
        'view_item'             => __( 'View Service', 'dost-audit' ),
        'view_items'            => __( 'View Services', 'dost-audit' ),
        'search_items'          => __( 'Search Service', 'dost-audit' ),
        'not_found'             => __( 'Not found', 'dost-audit' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'dost-audit' ),
        'featured_image'        => __( 'Service Image', 'dost-audit' ),
        'set_featured_image'    => __( 'Set service image', 'dost-audit' ),
        'remove_featured_image' => __( 'Remove service image', 'dost-audit' ),
        'use_featured_image'    => __( 'Use as service image', 'dost-audit' ),
        'insert_into_item'      => __( 'Insert into service', 'dost-audit' ),
        'uploaded_to_this_item' => __( 'Uploaded to this service', 'dost-audit' ),
        'items_list'            => __( 'Services list', 'dost-audit' ),
        'items_list_navigation' => __( 'Services list navigation', 'dost-audit' ),
        'filter_items_list'     => __( 'Filter services list', 'dost-audit' ),
    );
    
    $args = array(
        'label'                 => __( 'Service', 'dost-audit' ),
        'description'           => __( 'Accounting services', 'dost-audit' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'service', $args );
}
add_action( 'init', 'dost_audit_register_services_cpt', 0 );

/**
 * Register Team Members Custom Post Type
 */
function dost_audit_register_team_cpt() {
    $labels = array(
        'name'                  => _x( 'Team Members', 'Post Type General Name', 'dost-audit' ),
        'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'dost-audit' ),
        'menu_name'             => __( 'Team', 'dost-audit' ),
        'name_admin_bar'        => __( 'Team Member', 'dost-audit' ),
        'archives'              => __( 'Team Archives', 'dost-audit' ),
        'all_items'             => __( 'All Team Members', 'dost-audit' ),
        'add_new_item'          => __( 'Add New Team Member', 'dost-audit' ),
        'add_new'               => __( 'Add New', 'dost-audit' ),
        'new_item'              => __( 'New Team Member', 'dost-audit' ),
        'edit_item'             => __( 'Edit Team Member', 'dost-audit' ),
        'update_item'           => __( 'Update Team Member', 'dost-audit' ),
        'view_item'             => __( 'View Team Member', 'dost-audit' ),
        'search_items'          => __( 'Search Team Member', 'dost-audit' ),
    );
    
    $args = array(
        'label'                 => __( 'Team Member', 'dost-audit' ),
        'description'           => __( 'Team members', 'dost-audit' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'team', $args );
}
add_action( 'init', 'dost_audit_register_team_cpt', 0 );

/**
 * Register Testimonials Custom Post Type
 */
function dost_audit_register_testimonials_cpt() {
    $labels = array(
        'name'                  => _x( 'Testimonials', 'Post Type General Name', 'dost-audit' ),
        'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'dost-audit' ),
        'menu_name'             => __( 'Testimonials', 'dost-audit' ),
        'name_admin_bar'        => __( 'Testimonial', 'dost-audit' ),
        'all_items'             => __( 'All Testimonials', 'dost-audit' ),
        'add_new_item'          => __( 'Add New Testimonial', 'dost-audit' ),
        'add_new'               => __( 'Add New', 'dost-audit' ),
        'new_item'              => __( 'New Testimonial', 'dost-audit' ),
        'edit_item'             => __( 'Edit Testimonial', 'dost-audit' ),
        'update_item'           => __( 'Update Testimonial', 'dost-audit' ),
        'view_item'             => __( 'View Testimonial', 'dost-audit' ),
        'search_items'          => __( 'Search Testimonial', 'dost-audit' ),
    );
    
    $args = array(
        'label'                 => __( 'Testimonial', 'dost-audit' ),
        'description'           => __( 'Client testimonials', 'dost-audit' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-format-quote',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'dost_audit_register_testimonials_cpt', 0 );

/**
 * Register FAQ Custom Post Type
 */
function dost_audit_register_faq_cpt() {
    $labels = array(
        'name'                  => _x( 'FAQs', 'Post Type General Name', 'dost-audit' ),
        'singular_name'         => _x( 'FAQ', 'Post Type Singular Name', 'dost-audit' ),
        'menu_name'             => __( 'FAQs', 'dost-audit' ),
        'name_admin_bar'        => __( 'FAQ', 'dost-audit' ),
        'all_items'             => __( 'All FAQs', 'dost-audit' ),
        'add_new_item'          => __( 'Add New FAQ', 'dost-audit' ),
        'add_new'               => __( 'Add New', 'dost-audit' ),
        'new_item'              => __( 'New FAQ', 'dost-audit' ),
        'edit_item'             => __( 'Edit FAQ', 'dost-audit' ),
        'update_item'           => __( 'Update FAQ', 'dost-audit' ),
        'view_item'             => __( 'View FAQ', 'dost-audit' ),
        'search_items'          => __( 'Search FAQ', 'dost-audit' ),
    );
    
    $args = array(
        'label'                 => __( 'FAQ', 'dost-audit' ),
        'description'           => __( 'Frequently Asked Questions', 'dost-audit' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'page-attributes' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-editor-help',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'faq', $args );
}
add_action( 'init', 'dost_audit_register_faq_cpt', 0 );
