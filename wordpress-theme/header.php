<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-content">
                <div class="logo">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-img">
                        </a>
                        <?php
                    }
                    ?>
                </div>
                
                <?php
                // Menu WordPress avec fallback complet
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav-links',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ) );
                } else {
                    // Fallback: Menu par défaut avec toutes les sections
                    ?>
                    <ul class="nav-links">
                        <li><a href="#home"><?php esc_html_e( 'Accueil', 'dost-audit' ); ?></a></li>
                        <li><a href="#services"><?php esc_html_e( 'Services', 'dost-audit' ); ?></a></li>
                        <li><a href="#about"><?php esc_html_e( 'Équipe', 'dost-audit' ); ?></a></li>
                        <li><a href="#testimonials"><?php esc_html_e( 'Témoignages', 'dost-audit' ); ?></a></li>
                        <li><a href="#faq"><?php esc_html_e( 'FAQ', 'dost-audit' ); ?></a></li>
                        <li><a href="#contact"><?php esc_html_e( 'Contact', 'dost-audit' ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
                
                <?php
                $cta_text = get_theme_mod( 'dost_audit_cta_button_text', 'Rendez-vous' );
                $cta_link = get_theme_mod( 'dost_audit_cta_button_link', '#contact' );
                ?>
                <a href="<?php echo esc_url( $cta_link ); ?>" class="nav-cta"><?php echo esc_html( $cta_text ); ?></a>
            </div>
        </div>
    </nav>
