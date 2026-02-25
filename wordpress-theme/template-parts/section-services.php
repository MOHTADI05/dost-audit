<?php
/**
 * Template part for displaying the Services section
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */
?>

<!-- Services Section -->
<section id="services" class="services">
    <div class="services-particles">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="container">
        <div class="section-header scroll-animate" data-animation="slide-down">
            <div class="section-subtitle"><?php esc_html_e( 'Notre Expertise', 'dost-audit' ); ?></div>
            <h2><?php esc_html_e( 'Services Comptables Complets', 'dost-audit' ); ?></h2>
            <p><?php esc_html_e( 'Des solutions expertes en comptabilité, audit et conseil pour accompagner votre croissance', 'dost-audit' ); ?></p>
        </div>
        <div class="services-grid">
            <?php
            // Query for Services Custom Post Type
            $services_query = new WP_Query( array(
                'post_type'      => 'service',
                'posts_per_page' => 6,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ) );
            
            $delay = 0.1;
            $blob_counter = 1;
            
            if ( $services_query->have_posts() ) :
                while ( $services_query->have_posts() ) : $services_query->the_post();
                    ?>
                    <div class="service-card scroll-animate" data-animation="slide-up" data-tilt style="animation-delay: <?php echo esc_attr( $delay ); ?>s;">
                        <div class="service-blob blob-<?php echo esc_attr( $blob_counter ); ?>"></div>
                        <div class="service-icon">
                            <?php
                            // Get custom field for SVG icon if available
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'thumbnail' );
                            } else {
                                // Default SVG icon
                                ?>
                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                                    <path d="M24 4L8 14V30L24 40L40 30V14L24 4Z" stroke="#3781AE" stroke-width="2" fill="none"/>
                                    <path d="M24 16V32M16 24H32" stroke="#3781AE" stroke-width="2"/>
                                </svg>
                                <?php
                            }
                            ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                        <a href="<?php the_permalink(); ?>" class="service-link"><?php esc_html_e( 'En savoir plus', 'dost-audit' ); ?> →</a>
                        <div class="service-shine"></div>
                    </div>
                    <?php
                    $delay += 0.1;
                    $blob_counter++;
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback if no services are added yet
                $default_services = array(
                    array(
                        'title' => 'Expertise Comptable',
                        'description' => 'Tenue complète de votre comptabilité, de l\'enregistrement des opérations à l\'établissement des états financiers.',
                    ),
                    array(
                        'title' => 'Audit & Commissariat',
                        'description' => 'Audit légal et contractuel de vos comptes pour garantir la fiabilité de vos informations financières.',
                    ),
                    array(
                        'title' => 'Conseil Fiscal',
                        'description' => 'Optimisation fiscale et accompagnement dans vos déclarations et relations avec l\'administration.',
                    ),
                    array(
                        'title' => 'Gestion Sociale',
                        'description' => 'Établissement des bulletins de paie, déclarations sociales et conseil en gestion du personnel.',
                    ),
                    array(
                        'title' => 'Création d\'Entreprise',
                        'description' => 'Accompagnement complet dans la création de votre société, du business plan aux formalités juridiques.',
                    ),
                    array(
                        'title' => 'Conseil Juridique',
                        'description' => 'Conseil et assistance juridique pour sécuriser vos décisions stratégiques et opérationnelles.',
                    ),
                );
                
                $delay = 0.1;
                $blob_counter = 1;
                foreach ( $default_services as $service ) :
                    ?>
                    <div class="service-card scroll-animate" data-animation="slide-up" data-tilt style="animation-delay: <?php echo esc_attr( $delay ); ?>s;">
                        <div class="service-blob blob-<?php echo esc_attr( $blob_counter ); ?>"></div>
                        <div class="service-icon">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                                <path d="M24 4L8 14V30L24 40L40 30V14L24 4Z" stroke="#3781AE" stroke-width="2" fill="none"/>
                                <path d="M24 16V32M16 24H32" stroke="#3781AE" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3><?php echo esc_html( $service['title'] ); ?></h3>
                        <p><?php echo esc_html( $service['description'] ); ?></p>
                        <a href="#contact" class="service-link"><?php esc_html_e( 'En savoir plus', 'dost-audit' ); ?> →</a>
                        <div class="service-shine"></div>
                    </div>
                    <?php
                    $delay += 0.1;
                    $blob_counter++;
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
