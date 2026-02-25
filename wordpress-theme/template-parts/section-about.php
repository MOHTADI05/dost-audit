<?php
/**
 * Template part for displaying the About section
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

$about_image_id = get_theme_mod( 'dost_audit_about_image' );
$about_image = $about_image_id ? wp_get_attachment_image_url( $about_image_id, 'full' ) : get_template_directory_uri() . '/assets/images/image.png';
?>

<!-- About Us Section -->
<section id="about" class="about">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <div class="section-subtitle"><?php esc_html_e( 'Notre Histoire', 'dost-audit' ); ?></div>
                <h2><?php esc_html_e( 'Notre Équipe d\'Experts', 'dost-audit' ); ?></h2>
                <p><?php esc_html_e( 'DOST\'AUDIT est un cabinet d\'expertise comptable et d\'audit dirigé par une équipe de professionnels passionnés et expérimentés. Nous mettons notre expertise au service de votre réussite.', 'dost-audit' ); ?></p>
                <p><?php esc_html_e( 'Notre équipe pluridisciplinaire combine compétences techniques et approche personnalisée pour vous offrir des solutions adaptées à vos besoins spécifiques.', 'dost-audit' ); ?></p>
                
                <div class="about-metrics">
                    <div class="metric-card">
                        <div class="metric-number">10+</div>
                        <div class="metric-label"><?php esc_html_e( 'Années d\'Expérience', 'dost-audit' ); ?></div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-number">200+</div>
                        <div class="metric-label"><?php esc_html_e( 'Clients Satisfaits', 'dost-audit' ); ?></div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-number">100%</div>
                        <div class="metric-label"><?php esc_html_e( 'Engagement Qualité', 'dost-audit' ); ?></div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-number">3</div>
                        <div class="metric-label"><?php esc_html_e( 'Experts Certifiés', 'dost-audit' ); ?></div>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <div class="about-image-wrapper">
                    <div class="about-decorative"></div>
                    <img src="<?php echo esc_url( $about_image ); ?>" alt="<?php esc_attr_e( 'Notre Équipe DOST\'AUDIT', 'dost-audit' ); ?>" class="team-img">
                </div>
            </div>
        </div>
    </div>
</section>
