    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="footer-logo">
                        <?php
                        if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="footer-logo-img">
                            <?php
                        }
                        ?>
                    </div>
                    <p class="footer-description">
                        <?php
                        $footer_description = get_theme_mod( 'dost_audit_footer_description', 'Cabinet d\'expertise comptable et d\'audit offrant des services de qualité avec professionnalisme et engagement.' );
                        echo esc_html( $footer_description );
                        ?>
                    </p>
                    <div class="footer-social">
                        <?php
                        $linkedin = get_theme_mod( 'dost_audit_linkedin', '#' );
                        $twitter = get_theme_mod( 'dost_audit_twitter', '#' );
                        $facebook = get_theme_mod( 'dost_audit_facebook', '#' );
                        ?>
                        <a href="<?php echo esc_url( $linkedin ); ?>" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z" fill="currentColor"/></svg>
                        </a>
                        <a href="<?php echo esc_url( $twitter ); ?>" aria-label="Twitter" target="_blank" rel="noopener noreferrer">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M22.46 6c-.85.38-1.75.64-2.7.76a4.7 4.7 0 0 0 2.07-2.6c-.9.54-1.9.93-2.98 1.14a4.69 4.69 0 0 0-7.98 4.27 13.3 13.3 0 0 1-9.66-4.9 4.68 4.68 0 0 0 1.45 6.25A4.66 4.66 0 0 1 .54 10v.06a4.68 4.68 0 0 0 3.76 4.59 4.65 4.65 0 0 1-2.12.08 4.69 4.69 0 0 0 4.38 3.25A9.4 9.4 0 0 1 0 19.54a13.27 13.27 0 0 0 7.18 2.11c8.62 0 13.33-7.14 13.33-13.33 0-.2 0-.4-.02-.6A9.52 9.52 0 0 0 22.46 6z" fill="currentColor"/></svg>
                        </a>
                        <a href="<?php echo esc_url( $facebook ); ?>" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M24 12.07C24 5.41 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.04V9.41c0-3.02 1.8-4.7 4.54-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.5c-1.5 0-1.96.93-1.96 1.89v2.26h3.32l-.53 3.5h-2.8V24C19.62 23.1 24 18.1 24 12.07" fill="currentColor"/></svg>
                        </a>
                    </div>
                </div>

                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <div class="footer-column">
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-bottom">
                <div class="footer-copyright">
                    <p>
                        <?php
                        printf(
                            esc_html__( '&copy; %1$s %2$s. Tous droits réservés.', 'dost-audit' ),
                            date( 'Y' ),
                            get_bloginfo( 'name' )
                        );
                        ?>
                    </p>
                    <p><?php esc_html_e( 'Created by', 'dost-audit' ); ?> <a href="https://mohtedi-io.vercel.app/" target="_blank" rel="noopener noreferrer">&copy;Mohtedi05</a> <?php echo date( 'Y' ); ?></p>
                </div>
                <div class="footer-legal">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer-legal-links',
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
