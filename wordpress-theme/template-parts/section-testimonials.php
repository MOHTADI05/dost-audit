<?php
/**
 * Template part for displaying the Testimonials section
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

$testimonials_query = new WP_Query( array(
    'post_type'      => 'testimonial',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
?>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials">
    <div class="container">
        <div class="section-header">
            <div class="section-subtitle"><?php esc_html_e( 'Témoignages Clients', 'dost-audit' ); ?></div>
            <h2><?php esc_html_e( 'La Confiance de Nos Clients', 'dost-audit' ); ?></h2>
        </div>
        <div class="testimonial-carousel">
            <?php
            if ( $testimonials_query->have_posts() ) :
                $first = true;
                while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
                    $author_title = get_post_meta( get_the_ID(), '_testimonial_title', true ) ?: '';
                    ?>
                    <div class="testimonial-slide <?php echo $first ? 'active' : ''; ?>">
                        <div class="testimonial-content">
                            <div class="testimonial-image">
                                <div class="testimonial-avatar">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'testimonial-avatar-img' ) ); ?>
                                    <?php else : ?>
                                        <svg viewBox="0 0 200 200" fill="none">
                                            <circle cx="100" cy="100" r="95" fill="#E8F1F7"/>
                                            <circle cx="100" cy="80" r="35" fill="#3781AE" opacity="0.3"/>
                                            <path d="M40 160 Q100 120 160 160" fill="#3781AE" opacity="0.3"/>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="testimonial-text">
                                <div class="quote-mark">"</div>
                                <p class="testimonial-quote"><?php the_content(); ?></p>
                                <div class="testimonial-author">
                                    <div class="author-name"><?php the_title(); ?></div>
                                    <?php if ( $author_title ) : ?>
                                        <div class="author-title"><?php echo esc_html( $author_title ); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $first = false;
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback testimonials
                $default_testimonials = array(
                    array(
                        'quote' => 'DOST\'AUDIT nous accompagne depuis plusieurs années avec un professionnalisme exemplaire. Leur expertise et leur disponibilité nous permettent de nous concentrer sur notre cœur de métier en toute sérénité.',
                        'author' => 'Sophie Martin',
                        'title' => 'Directrice Générale, Innovation Tech',
                    ),
                    array(
                        'quote' => 'Une équipe réactive, à l\'écoute et compétente. Leur conseil personnalisé et leur suivi régulier sont des atouts majeurs. Je recommande vivement leurs services.',
                        'author' => 'Jean-Pierre Dubois',
                        'title' => 'Entrepreneur',
                    ),
                    array(
                        'quote' => 'Service irréprochable et équipe très professionnelle. Ils ont su s\'adapter à nos besoins spécifiques et nous apportent un soutien précieux dans notre développement.',
                        'author' => 'Marie Leclerc',
                        'title' => 'PDG, Solutions Pro',
                    ),
                );
                
                foreach ( $default_testimonials as $index => $testimonial ) :
                    ?>
                    <div class="testimonial-slide <?php echo ( $index === 0 ) ? 'active' : ''; ?>">
                        <div class="testimonial-content">
                            <div class="testimonial-image">
                                <div class="testimonial-avatar">
                                    <svg viewBox="0 0 200 200" fill="none">
                                        <circle cx="100" cy="100" r="95" fill="#E8F1F7"/>
                                        <circle cx="100" cy="80" r="35" fill="#3781AE" opacity="0.3"/>
                                        <path d="M40 160 Q100 120 160 160" fill="#3781AE" opacity="0.3"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="testimonial-text">
                                <div class="quote-mark">"</div>
                                <p class="testimonial-quote"><?php echo esc_html( $testimonial['quote'] ); ?></p>
                                <div class="testimonial-author">
                                    <div class="author-name"><?php echo esc_html( $testimonial['author'] ); ?></div>
                                    <div class="author-title"><?php echo esc_html( $testimonial['title'] ); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
        <div class="testimonial-controls">
            <button class="testimonial-prev" aria-label="<?php esc_attr_e( 'Previous testimonial', 'dost-audit' ); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <button class="testimonial-next" aria-label="<?php esc_attr_e( 'Next testimonial', 'dost-audit' ); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </div>
</section>
