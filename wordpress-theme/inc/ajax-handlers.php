<?php
/**
 * AJAX Handlers
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Handle Contact Form Submission
 */
function dost_audit_handle_contact_form() {
    // Check nonce
    if ( ! isset( $_POST['dost_audit_contact_nonce'] ) || ! wp_verify_nonce( $_POST['dost_audit_contact_nonce'], 'dost-audit-contact-form' ) ) {
        wp_send_json_error( array(
            'message' => __( 'Security check failed. Please refresh the page and try again.', 'dost-audit' ),
        ) );
    }
    
    // Sanitize inputs
    $first_name = sanitize_text_field( $_POST['firstName'] ?? '' );
    $last_name  = sanitize_text_field( $_POST['lastName'] ?? '' );
    $email      = sanitize_email( $_POST['email'] ?? '' );
    $phone      = sanitize_text_field( $_POST['phone'] ?? '' );
    $service    = sanitize_text_field( $_POST['service'] ?? '' );
    $message    = sanitize_textarea_field( $_POST['message'] ?? '' );
    $full_name  = trim( $first_name . ' ' . $last_name );
    
    // Validate
    if ( empty( $first_name ) || empty( $last_name ) || empty( $email ) || empty( $phone ) || empty( $service ) || empty( $message ) ) {
        wp_send_json_error( array(
            'message' => __( 'Please fill in all required fields.', 'dost-audit' ),
        ) );
    }
    
    if ( ! is_email( $email ) ) {
        wp_send_json_error( array(
            'message' => __( 'Please enter a valid email address.', 'dost-audit' ),
        ) );
    }
    
    // Prepare email
    $to      = get_option( 'admin_email' );
    $subject = sprintf( __( 'New Contact Form Submission from %s', 'dost-audit' ), $full_name );
    $body    = sprintf(
        __( "Name: %s %s\nEmail: %s\nPhone: %s\nService: %s\n\nMessage:\n%s", 'dost-audit' ),
        $first_name,
        $last_name,
        $email,
        $phone,
        $service,
        $message
    );
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $email,
    );
    
    // Send email
    $sent = wp_mail( $to, $subject, $body, $headers );
    
    if ( $sent ) {
        wp_send_json_success( array(
            'message' => __( 'Thank you for your message. We will get back to you soon!', 'dost-audit' ),
        ) );
    } else {
        wp_send_json_error( array(
            'message' => __( 'There was an error sending your message. Please try again later.', 'dost-audit' ),
        ) );
    }
}
add_action( 'wp_ajax_dost_audit_contact_form', 'dost_audit_handle_contact_form' );
add_action( 'wp_ajax_nopriv_dost_audit_contact_form', 'dost_audit_handle_contact_form' );
