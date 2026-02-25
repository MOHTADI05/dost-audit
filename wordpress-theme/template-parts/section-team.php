<?php
/**
 * Template part for displaying the Team section
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

$team_query = new WP_Query( array(
    'post_type'      => 'team',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );
?>

<!-- Team Parallax Section -->
<section class="team-parallax-section">
    <div class="parallax-container">
        <div class="section-header-parallax">
            <div class="section-subtitle"><?php esc_html_e( 'Notre Équipe', 'dost-audit' ); ?></div>
            <h2><?php esc_html_e( 'Les Experts à Votre Service', 'dost-audit' ); ?></h2>
            <p><?php esc_html_e( 'Une équipe de professionnels dévoués combinant excellence technique et approche humaine', 'dost-audit' ); ?></p>
        </div>

        <?php
        if ( $team_query->have_posts() ) :
            $counter = 1;
            while ( $team_query->have_posts() ) : $team_query->the_post();
                $is_reverse = ( $counter % 2 === 0 ) ? 'reverse' : '';
                $team_number = str_pad( $counter, 2, '0', STR_PAD_LEFT );
                $team_title = get_post_meta( get_the_ID(), '_team_title', true ) ?: get_the_excerpt();
                ?>
                <!-- Team Member <?php echo esc_attr( $counter ); ?> -->
                <div class="parallax-team-block <?php echo esc_attr( $is_reverse ); ?>">
                    <div class="parallax-content-wrapper">
                        <div class="parallax-layer parallax-layer-back">
                            <div class="parallax-decoration"></div>
                        </div>
                        <div class="parallax-layer parallax-layer-base">
                            <div class="team-parallax-grid">
                                <?php if ( $is_reverse ) : ?>
                                    <div class="team-parallax-info">
                                        <div class="team-number"><?php echo esc_html( $team_number ); ?></div>
                                        <h3 class="team-parallax-name"><?php the_title(); ?></h3>
                                        <p class="team-parallax-title"><?php echo esc_html( $team_title ); ?></p>
                                        <div class="team-parallax-description">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                    <div class="team-parallax-image">
                                        <div class="image-frame">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'dost-audit-team', array( 'class' => 'parallax-img', 'alt' => get_the_title() ) ); ?>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder-team.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" class="parallax-img">
                                            <?php endif; ?>
                                            <div class="image-overlay"></div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="team-parallax-image">
                                        <div class="image-frame">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'dost-audit-team', array( 'class' => 'parallax-img', 'alt' => get_the_title() ) ); ?>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder-team.jpg' ); ?>" alt="<?php the_title_attribute(); ?>" class="parallax-img">
                                            <?php endif; ?>
                                            <div class="image-overlay"></div>
                                        </div>
                                    </div>
                                    <div class="team-parallax-info">
                                        <div class="team-number"><?php echo esc_html( $team_number ); ?></div>
                                        <h3 class="team-parallax-name"><?php the_title(); ?></h3>
                                        <p class="team-parallax-title"><?php echo esc_html( $team_title ); ?></p>
                                        <div class="team-parallax-description">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $counter++;
            endwhile;
            wp_reset_postdata();
        else :
            // Fallback: Default team members from images
            $default_team = array(
                array(
                    'name' => 'Myriam BEN RACHED',
                    'title' => 'Directrice Générale – Pôle social',
                    'description' => 'Experte en gestion sociale et administration du personnel, Myriam dirige notre pôle social avec excellence et dévouement.',
                    'image' => 'Myriam-3.jpg',
                    'number' => '01',
                ),
                array(
                    'name' => 'Nuno DA SILVA',
                    'title' => 'Chef de mission – Pôle comptable',
                    'description' => 'Responsable de notre pôle comptable, Nuno garantit la qualité et la précision de nos services d\'expertise.',
                    'image' => 'Nuno DA SILVA .jpg',
                    'number' => '02',
                ),
                array(
                    'name' => 'Birkan CETIN',
                    'title' => 'Expert-comptable et commissaire aux comptes',
                    'description' => 'Expert certifié en comptabilité et audit, Birkan apporte son expertise technique et sa rigueur professionnelle.',
                    'image' => 'Birkan CETIN.jpg',
                    'number' => '03',
                ),
            );
            
            foreach ( $default_team as $index => $member ) :
                $is_reverse = ( ( $index + 1 ) % 2 === 0 ) ? 'reverse' : '';
                ?>
                <div class="parallax-team-block <?php echo esc_attr( $is_reverse ); ?>">
                    <div class="parallax-content-wrapper">
                        <div class="parallax-layer parallax-layer-back">
                            <div class="parallax-decoration"></div>
                        </div>
                        <div class="parallax-layer parallax-layer-base">
                            <div class="team-parallax-grid">
                                <?php if ( $is_reverse ) : ?>
                                    <div class="team-parallax-info">
                                        <div class="team-number"><?php echo esc_html( $member['number'] ); ?></div>
                                        <h3 class="team-parallax-name"><?php echo esc_html( $member['name'] ); ?></h3>
                                        <p class="team-parallax-title"><?php echo esc_html( $member['title'] ); ?></p>
                                        <div class="team-parallax-description">
                                            <p><?php echo esc_html( $member['description'] ); ?></p>
                                        </div>
                                    </div>
                                    <div class="team-parallax-image">
                                        <div class="image-frame">
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $member['image'] ); ?>" alt="<?php echo esc_attr( $member['name'] ); ?>" class="parallax-img">
                                            <div class="image-overlay"></div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="team-parallax-image">
                                        <div class="image-frame">
                                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $member['image'] ); ?>" alt="<?php echo esc_attr( $member['name'] ); ?>" class="parallax-img">
                                            <div class="image-overlay"></div>
                                        </div>
                                    </div>
                                    <div class="team-parallax-info">
                                        <div class="team-number"><?php echo esc_html( $member['number'] ); ?></div>
                                        <h3 class="team-parallax-name"><?php echo esc_html( $member['name'] ); ?></h3>
                                        <p class="team-parallax-title"><?php echo esc_html( $member['title'] ); ?></p>
                                        <div class="team-parallax-description">
                                            <p><?php echo esc_html( $member['description'] ); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        endif;
        ?>
    </div>
</section>
