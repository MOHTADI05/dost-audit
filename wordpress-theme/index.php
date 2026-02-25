<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header>

                        <?php dost_audit_post_thumbnail(); ?>

                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dost-audit' ),
                                'after'  => '</div>',
                            ) );
                            ?>
                        </div>

                        <?php if ( get_edit_post_link() ) : ?>
                            <footer class="entry-footer">
                                <?php
                                edit_post_link(
                                    sprintf(
                                        wp_kses(
                                            __( 'Edit <span class="screen-reader-text">%s</span>', 'dost-audit' ),
                                            array(
                                                'span' => array(
                                                    'class' => array(),
                                                ),
                                            )
                                        ),
                                        wp_kses_post( get_the_title() )
                                    ),
                                    '<span class="edit-link">',
                                    '</span>'
                                );
                                ?>
                            </footer>
                        <?php endif; ?>
                    </article>
                    <?php
                endwhile;
            else :
                ?>
                <section class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e( 'Nothing here', 'dost-audit' ); ?></h1>
                    </header>
                    <div class="page-content">
                        <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for.', 'dost-audit' ); ?></p>
                    </div>
                </section>
                <?php
            endif;
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
