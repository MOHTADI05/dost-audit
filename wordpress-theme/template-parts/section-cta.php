<?php
/**
 * Template part for displaying the CTA section
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

$cta_title = get_theme_mod( 'dost_audit_cta_title', 'Prêt à Discuter de Vos Besoins?' );
$cta_description = get_theme_mod( 'dost_audit_cta_description', 'Planifiez une consultation gratuite avec notre équipe d\'experts. Nous sommes là pour vous accompagner dans la gestion de vos finances.' );
$cta_button_text = get_theme_mod( 'dost_audit_cta_button_text', 'Planifier une Consultation' );
$cta_button_link = get_theme_mod( 'dost_audit_cta_button_link', '#contact' );
?>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <div class="cta-decorative-line">
                <svg width="100%" height="200" viewBox="0 0 1200 200" preserveAspectRatio="none">
                    <path d="M0,100 Q300,50 600,100 T1200,100" stroke="#3781AE" stroke-width="2" fill="none" opacity="0.3"/>
                </svg>
                <div class="cta-icon icon-1">
                    <svg width="60" height="60" viewBox="0 0 60 60">
                        <circle cx="30" cy="30" r="25" fill="#3781AE" opacity="0.15"/>
                        <path d="M30 20V40M20 30H40" stroke="#3781AE" stroke-width="2"/>
                    </svg>
                </div>
                <div class="cta-icon icon-2">
                    <svg width="50" height="50" viewBox="0 0 50 50">
                        <rect x="10" y="10" width="30" height="30" rx="5" fill="#406889" opacity="0.1"/>
                    </svg>
                </div>
                <div class="cta-icon icon-3">
                    <svg width="55" height="55" viewBox="0 0 55 55">
                        <circle cx="27.5" cy="27.5" r="22" fill="#4C7282" opacity="0.12"/>
                    </svg>
                </div>
            </div>
            <div class="cta-text">
                <h2><?php echo esc_html( $cta_title ); ?></h2>
                <p><?php echo esc_html( $cta_description ); ?></p>
                <a href="<?php echo esc_url( $cta_button_link ); ?>" class="btn-primary large"><?php echo esc_html( $cta_button_text ); ?></a>
                <div class="cta-info">
                    <div class="cta-info-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M3 8L10.89 13.26C11.567 13.6723 12.433 13.6723 13.11 13.26L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke="#3781AE" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <span><?php esc_html_e( 'Réponse sous 24 heures', 'dost-audit' ); ?></span>
                    </div>
                    <div class="cta-info-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9 11L12 14L22 4M21 12V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H16" stroke="#3781AE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span><?php esc_html_e( 'Consultation sans engagement', 'dost-audit' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
