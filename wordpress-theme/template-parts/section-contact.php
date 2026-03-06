<?php
/**
 * Template part for displaying the Contact section
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

$contact_phone = get_theme_mod( 'dost_audit_contact_phone', '01 88 75 01 38 / 06 51 72 01 44' );
$contact_email = get_theme_mod( 'dost_audit_contact_email', 'contact@dost-audit.fr' );
$contact_address = get_theme_mod( 'dost_audit_contact_address', '44 Rue Roger-Salengro<br>94120 Fontenay-sous-Bois' );
$contact_hours = get_theme_mod( 'dost_audit_contact_hours', 'Lun - Ven: 10h00 - 18h00' );
?>

<!-- Contact Section -->
<section id="contact" class="contact">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <div class="section-subtitle"><?php esc_html_e( 'Contactez-Nous', 'dost-audit' ); ?></div>
                <h2><?php esc_html_e( 'Contactez Notre Équipe', 'dost-audit' ); ?></h2>
                <p><?php esc_html_e( 'Contactez-nous pour une consultation confidentielle. Notre équipe d\'experts est prête à vous accompagner dans tous vos besoins comptables.', 'dost-audit' ); ?></p>
                
                <div class="contact-details">
                    <div class="contact-detail-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M3 5C3 3.89543 3.89543 3 5 3H8.27924C8.70967 3 9.09181 3.27543 9.22792 3.68377L10.7257 8.17721C10.8831 8.64932 10.6694 9.16531 10.2243 9.38787L7.96701 10.5165C9.06925 12.9612 11.0388 14.9308 13.4835 16.033L14.6121 13.7757C14.8347 13.3306 15.3507 13.1169 15.8228 13.2743L20.3162 14.7721C20.7246 14.9082 21 15.2903 21 15.7208V19C21 20.1046 20.1046 21 19 21H18C9.71573 21 3 14.2843 3 6V5Z" stroke="#3781AE" stroke-width="2"/>
                            </svg>
                        </div>
                        <div>
                            <div class="contact-label"><?php esc_html_e( 'Téléphone', 'dost-audit' ); ?></div>
                            <div class="contact-value"><?php echo esc_html( $contact_phone ); ?></div>
                        </div>
                    </div>

                    <div class="contact-detail-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M3 8L10.89 13.26C11.567 13.6723 12.433 13.6723 13.11 13.26L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke="#3781AE" stroke-width="2"/>
                            </svg>
                        </div>
                        <div>
                            <div class="contact-label"><?php esc_html_e( 'Email', 'dost-audit' ); ?></div>
                            <div class="contact-value"><a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a></div>
                        </div>
                    </div>

                    <div class="contact-detail-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M17.657 16.657L13.414 20.9C12.6331 21.6808 11.3668 21.6808 10.586 20.9L6.343 16.657C3.21895 13.5329 3.21895 8.46708 6.343 5.34304C9.46704 2.219 14.533 2.219 17.657 5.34304C20.7809 8.46708 20.7809 13.5329 17.657 16.657Z" stroke="#3781AE" stroke-width="2"/>
                                <circle cx="12" cy="11" r="3" stroke="#3781AE" stroke-width="2"/>
                            </svg>
                        </div>
                        <div>
                            <div class="contact-label"><?php esc_html_e( 'Adresse', 'dost-audit' ); ?></div>
                            <div class="contact-value"><?php echo wp_kses_post( $contact_address ); ?></div>
                        </div>
                    </div>

                    <div class="contact-detail-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="9" stroke="#3781AE" stroke-width="2"/>
                                <path d="M12 6V12L16 14" stroke="#3781AE" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div>
                            <div class="contact-label"><?php esc_html_e( 'Horaires', 'dost-audit' ); ?></div>
                            <div class="contact-value"><?php echo wp_kses_post( $contact_hours ); ?></div>
                        </div>
                    </div>
                </div>

                <div class="professional-image">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    <?php endif; ?>
                </div>
            </div>

            <div class="contact-form-wrapper">
                <form class="contact-form" id="dost-audit-contact-form">
                    <?php wp_nonce_field( 'dost-audit-contact-form', 'dost_audit_contact_nonce' ); ?>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName"><?php esc_html_e( 'Prénom', 'dost-audit' ); ?></label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName"><?php esc_html_e( 'Nom', 'dost-audit' ); ?></label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email"><?php esc_html_e( 'Adresse Email', 'dost-audit' ); ?></label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone"><?php esc_html_e( 'Téléphone', 'dost-audit' ); ?></label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="service"><?php esc_html_e( 'Service Souhaité', 'dost-audit' ); ?></label>
                        <select id="service" name="service" required>
                            <option value=""><?php esc_html_e( 'Sélectionnez un service', 'dost-audit' ); ?></option>
                            <option value="expertise"><?php esc_html_e( 'Expertise Comptable', 'dost-audit' ); ?></option>
                            <option value="audit"><?php esc_html_e( 'Audit & Commissariat', 'dost-audit' ); ?></option>
                            <option value="fiscal"><?php esc_html_e( 'Conseil Fiscal', 'dost-audit' ); ?></option>
                            <option value="social"><?php esc_html_e( 'Gestion Sociale', 'dost-audit' ); ?></option>
                            <option value="creation"><?php esc_html_e( 'Création d\'Entreprise', 'dost-audit' ); ?></option>
                            <option value="juridique"><?php esc_html_e( 'Conseil Juridique', 'dost-audit' ); ?></option>
                            <option value="other"><?php esc_html_e( 'Autre', 'dost-audit' ); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message"><?php esc_html_e( 'Message', 'dost-audit' ); ?></label>
                        <textarea id="message" name="message" rows="5" placeholder="<?php esc_attr_e( 'Décrivez vos besoins...', 'dost-audit' ); ?>" required></textarea>
                    </div>

                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="privacy" name="privacy" required>
                        <label for="privacy"><?php esc_html_e( 'J\'accepte la politique de confidentialité et les conditions d\'utilisation', 'dost-audit' ); ?></label>
                    </div>

                    <button type="submit" class="btn-primary large"><?php esc_html_e( 'Envoyer la Demande', 'dost-audit' ); ?></button>

                    <div class="form-note">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M8 14A6 6 0 108 2a6 6 0 000 12z" stroke="#3781AE" stroke-width="1.5"/>
                            <path d="M8 6v4M8 10v.5" stroke="#3781AE" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <span><?php esc_html_e( 'Toutes les communications sont confidentielles et protégées par le secret professionnel.', 'dost-audit' ); ?></span>
                    </div>
                    
                    <div class="form-message" id="contact-form-message"></div>
                </form>
            </div>
        </div>
    </div>
</section>
