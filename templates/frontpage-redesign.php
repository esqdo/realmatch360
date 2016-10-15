<?php
/*

Template Name: Frontpage Redesign

*/

get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Container -->
    <div class="container">

        <!-- Intro Wir zeigen Ihnen die Imobiliennachfrage -->
        <section class="homeintro">
            <div class="homeintro__content">
                <?php the_content(); ?>
            </div>
            <div class="homeintro__play">
                <a data-featherlight="#fl3" href="#"><i class="fa fa-play-circle" aria-hidden="true"></i></a>
            </div>
            <iframe class="fl3" id="fl3"  frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="//player.vimeo.com/video/<?php _e('118894194', 'realmatch360'); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=147a75;"></iframe>
        </section>
        <!-- Intro Wir zeigen Ihnen die Imobiliennachfrage -->

        <!-- Dienstleistungen -->
        <section class="services">
            <h2><?php _e('Our Online-Services for You', 'realmatch360'); ?></h2>
            <div class="services__wrapper">
                <?php
                $service =  new WP_Query( 'post_type=services' );
                while ($service->have_posts()) { $service->the_post(); ?>
                    <div class="services__service">
                        <div class="services__imagewrapper">
                            <a href="?page_id=8490"><?php the_post_thumbnail(); ?></a>
                        </div>
                        <div class="services__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php } wp_reset_postdata(); ?>
            </div>
            <div class="services__buttons">
                <div class="buttons_wrapper">
                    <a class="button" href="https://www.realmatch360.com/app/report-city.html" target="_blank"><?php _e('Try it for free', 'realmatch360'); ?></a>
                    <a class="button" href="?page_id=915" target="_blank"><?php _e('Live Demo?', 'realmatch360'); ?></a>
                </div>
            </div>
        </section>
        <!-- Dienstleistungen -->

        <!-- Kunden -->
        <section class="customers">
            <h2><?php _e('Over 100 Customers trust Realmatch360', 'realmatch360'); ?></h2>
            <div class="customers__menu">
                <?php wp_nav_menu( array( 'theme_location' => 'featured-menu' ) ); ?>
            </div>
            <div class="customers__wrapper">
                <div class="customers__column">
                    <div class="customers__images">
                        <?php the_field('projektentwickler_logos'); ?>
                    </div>
                </div>
                <div class="customers__column">
                    <div class="customers__images">
                        <?php the_field('investoren_logos'); ?>
                    </div>
                </div>
                <div class="customers__column">
                    <div class="customers__images">
                        <?php the_field('bewirtschafter_logos'); ?>
                    </div>
                </div>
                <div class="customers__column">
                    <div class="customers__images">
                        <?php the_field('bewerter_logos'); ?>
                    </div>
                </div>
            </div>
            <!-- Nachfragedaten -->
            <div class="customers__data">
                <?php the_field('nachfragedaten'); ?>
            </div>
            <!-- Nachfragedaten -->
            <!-- Wir sind für Sie Da-->
            <div class="customers__support-wrapper">
                <h2><?php _e('We are there for you', 'realmatch360'); ?></h2>
                <div class="customers__support">
                    <?php the_field('wir_sind_fur_sie_da'); ?>
                </div>
            </div>
            <!-- Wir sind für Sie Da-->
        </section>
        <!-- Kunden -->


        <!-- Partners -->
        <section class="partners">
            <h2><?php _e('Partners', 'realmatch360'); ?></h2>
            <div class="partners__images">
                <?php the_field('partner_logos');?>
            </div>
        </section>
        <!-- Partners -->

        <!-- Button -->
        <div class="services__buttons bottom">
            <div class="buttons_wrapper">
                <a class="button" href="https://www.realmatch360.com/app/report-city.html" target="_blank"><?php _e('Try it for free', 'realmatch360'); ?></a>
            </div>
        </div>
        <!-- Button -->
    </div>
    <!-- Container -->

<?php endwhile; endif; ?>



<?php get_footer(); ?>
