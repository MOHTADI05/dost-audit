<?php
/**
 * Template part for displaying the FAQ section
 *
 * @package DOST_AUDIT
 * @since 1.0.0
 */

$faq_query = new WP_Query( array(
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );
?>

<!-- FAQ Section -->
<section id="faq" class="faq">
    <div class="container">
        <div class="section-header">
            <div class="faq-badge"><?php esc_html_e( 'Questions Fréquentes', 'dost-audit' ); ?></div>
            <h2><?php esc_html_e( 'Foire Aux Questions', 'dost-audit' ); ?></h2>
            <p><?php esc_html_e( 'Retrouvez les réponses aux questions les plus fréquemment posées sur nos services d\'expertise comptable et d\'audit', 'dost-audit' ); ?></p>
        </div>
        
        <div class="faq-container">
            <?php
            if ( $faq_query->have_posts() ) :
                $faq_number = 1;
                while ( $faq_query->have_posts() ) : $faq_query->the_post();
                    ?>
                    <div class="faq-item scroll-animate" data-animation="slide-up">
                        <div class="faq-question">
                            <div class="faq-number"><?php echo esc_html( $faq_number ); ?></div>
                            <h3><?php the_title(); ?></h3>
                            <button class="faq-toggle" aria-label="<?php esc_attr_e( 'Toggle answer', 'dost-audit' ); ?>" aria-expanded="false">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19 9l-7 7-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <div class="faq-answer">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                    $faq_number++;
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback FAQs
                $default_faqs = array(
                    array(
                        'question' => 'Quels sont les services inclus dans l\'expertise comptable?',
                        'answer' => 'Nos services d\'expertise comptable incluent la tenue complète de votre comptabilité, l\'établissement de vos déclarations fiscales et sociales, la production de vos bilans et comptes de résultat, ainsi que le conseil en gestion. Nous vous accompagnons également dans vos démarches administratives et vous fournissons des tableaux de bord pour piloter votre activité.',
                    ),
                    array(
                        'question' => 'Quelle est la différence entre un expert-comptable et un commissaire aux comptes?',
                        'answer' => 'L\'expert-comptable assure la tenue et la supervision de votre comptabilité, vous conseille et établit vos comptes annuels. Le commissaire aux comptes (CAC) a pour mission légale de certifier vos comptes et de vérifier leur régularité et sincérité. Le CAC est obligatoire pour certaines entreprises selon leur taille et forme juridique.',
                    ),
                    array(
                        'question' => 'À quelle fréquence dois-je fournir mes documents comptables?',
                        'answer' => 'Nous recommandons une transmission mensuelle de vos documents (factures, relevés bancaires, bulletins de paie, etc.) pour assurer une comptabilité à jour et vous fournir des informations de gestion pertinentes. Toutefois, la fréquence peut être adaptée selon la taille et l\'activité de votre entreprise. Notre plateforme sécurisée facilite l\'envoi de vos documents à tout moment.',
                    ),
                    array(
                        'question' => 'Combien coûtent vos services d\'expertise comptable?',
                        'answer' => 'Nos honoraires sont adaptés à la taille de votre entreprise, au volume d\'opérations à traiter et aux services demandés. Nous vous proposons systématiquement un devis personnalisé et transparent après étude de votre dossier. Nos tarifs incluent l\'ensemble des prestations convenues sans surcoût surprise. Contactez-nous pour obtenir une proposition adaptée à vos besoins.',
                    ),
                    array(
                        'question' => 'Accompagnez-vous les créateurs d\'entreprise?',
                        'answer' => 'Oui, nous accompagnons les entrepreneurs dans toutes les étapes de création de leur entreprise : choix de la forme juridique, business plan, prévisionnel financier, démarches administratives et immatriculation. Nous restons à vos côtés après la création pour assurer le développement pérenne de votre activité avec des conseils personnalisés.',
                    ),
                    array(
                        'question' => 'Puis-je changer d\'expert-comptable en cours d\'année?',
                        'answer' => 'Oui, vous pouvez changer d\'expert-comptable à tout moment. Nous prenons en charge l\'intégralité du processus de transition : récupération de vos dossiers auprès de votre ancien expert-comptable, reprise de votre comptabilité et mise en place rapide de nos services. Notre équipe assure une transition fluide et sans interruption de votre suivi comptable.',
                    ),
                );
                
                foreach ( $default_faqs as $index => $faq ) :
                    ?>
                    <div class="faq-item scroll-animate" data-animation="slide-up">
                        <div class="faq-question">
                            <div class="faq-number"><?php echo esc_html( $index + 1 ); ?></div>
                            <h3><?php echo esc_html( $faq['question'] ); ?></h3>
                            <button class="faq-toggle" aria-label="<?php esc_attr_e( 'Toggle answer', 'dost-audit' ); ?>" aria-expanded="false">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19 9l-7 7-7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <div class="faq-answer">
                            <p><?php echo esc_html( $faq['answer'] ); ?></p>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
