<?php
/**
 * Template part for displaying the Hero section
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

$hero_subtitle    = get_theme_mod( 'dost_audit_hero_subtitle', 'Excellence en Audit & Expertise Comptable' );
$hero_title       = get_theme_mod( 'dost_audit_hero_title', 'Votre Partenaire de Confiance en Expertise Comptable' );
$hero_description = get_theme_mod( 'dost_audit_hero_description', 'DOST\'AUDIT vous accompagne avec professionnalisme et expertise dans la gestion de vos finances, l\'audit de vos comptes et le développement de votre entreprise.' );
$hero_image_id    = get_theme_mod( 'dost_audit_hero_image' );
$hero_image       = $hero_image_id ? wp_get_attachment_image_url( $hero_image_id, 'dost-audit-hero' ) : get_template_directory_uri() . '/assets/images/SITUATION-2-2.jpg';
?>

<!-- Hero Section -->
<section id="home" class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <div class="hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></div>
                <h1><?php echo wp_kses_post( nl2br( $hero_title ) ); ?></h1>
                <p><?php echo esc_html( $hero_description ); ?></p>
                <div class="hero-buttons">
                    <button class="btn-primary"><?php esc_html_e( 'Prendre Rendez-vous', 'dost-audit' ); ?></button>
                    <button class="btn-secondary"><?php esc_html_e( 'Nos Services', 'dost-audit' ); ?></button>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">10+</div>
                        <div class="stat-label"><?php esc_html_e( 'Ans d\'Expérience', 'dost-audit' ); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">200+</div>
                        <div class="stat-label"><?php esc_html_e( 'Clients Satisfaits', 'dost-audit' ); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label"><?php esc_html_e( 'Engagement Qualité', 'dost-audit' ); ?></div>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-decorative-blob"></div>
                <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php esc_attr_e( 'Équipe DOST\'AUDIT', 'dost-audit' ); ?>" class="hero-img">
                <div class="floating-element element-1">
                    <svg width="500" height="500" viewBox="0 0 500 500">
                        <circle cx="25" cy="25" r="20" fill="#3781AE" opacity="0.1"/>
                    </svg>
                </div>
                <div class="floating-element element-2">
                    <svg width="300" height="300" viewBox="0 0 300 300">
                        <rect x="5" y="5" width="20" height="20" rx="3" fill="#3781AE" opacity="0.1"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
