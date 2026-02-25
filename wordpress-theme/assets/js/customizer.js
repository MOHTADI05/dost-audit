/**
 * Theme Customizer Live Preview
 *
 * @package DOST_AUDIT
 */

(function( $ ) {
    'use strict';

    // Site title and description
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.logo-img' ).attr( 'alt', to );
        } );
    } );

    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).text( to );
        } );
    } );

    // Hero section
    wp.customize( 'dost_audit_hero_subtitle', function( value ) {
        value.bind( function( to ) {
            $( '.hero-subtitle' ).text( to );
        } );
    } );

    wp.customize( 'dost_audit_hero_title', function( value ) {
        value.bind( function( to ) {
            $( '.hero h1' ).html( to.replace(/\n/g, '<br>') );
        } );
    } );

    wp.customize( 'dost_audit_hero_description', function( value ) {
        value.bind( function( to ) {
            $( '.hero-text > p' ).text( to );
        } );
    } );

    // CTA Button
    wp.customize( 'dost_audit_cta_button_text', function( value ) {
        value.bind( function( to ) {
            $( '.nav-cta' ).text( to );
        } );
    } );

    // Colors
    wp.customize( 'dost_audit_primary_color', function( value ) {
        value.bind( function( to ) {
            $( ':root' ).css( '--color-primary', to );
        } );
    } );

    wp.customize( 'dost_audit_secondary_color', function( value ) {
        value.bind( function( to ) {
            $( ':root' ).css( '--color-primary-dark', to );
        } );
    } );

    // Footer
    wp.customize( 'dost_audit_footer_description', function( value ) {
        value.bind( function( to ) {
            $( '.footer-description' ).text( to );
        } );
    } );

})( jQuery );
