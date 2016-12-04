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
                $service =  new WP_Query( 'post_type=products' );
                while ($service->have_posts()) { $service->the_post(); ?>
                    <div class="services__service">
                        <div class="services__imagewrapper">
                            <a href="<?php echo get_permalink(icl_object_id(8490,'page',false,ICL_LANGUAGE_CODE));?>"><?php the_post_thumbnail(); ?></a>
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
                    <a class="button" href="<?php echo get_permalink(icl_object_id(915,'page',false,ICL_LANGUAGE_CODE));?>" target="_blank"><?php _e('Live Demo?', 'realmatch360'); ?></a>
                </div>
            </div>
        </section>
        <!-- Dienstleistungen -->

        <!-- Kunden -->
        <section class="customers">
            <h2><?php _e('Over 100 Customers trust Realmatch360', 'realmatch360'); ?></h2>

            <div class="customers__wrapper">
                <?php $args = array( 'post_type' => 'featured' );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="customers__column">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="customers__images">
                        <?php the_field('featured_logos'); ?>
                    </div>
                </div>

                <?php endwhile;wp_reset_postdata(); ?>
             </div>
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

        <!-- Wir sind für Sie Da-->
        <section class="customers">
            <div class="customers__support-wrapper">
                <h2><?php _e('We are there for you', 'realmatch360'); ?></h2>
                <div class="customers__support">
                    <?php the_field('wir_sind_fur_sie_da'); ?>
                </div>
            </div>
        </section>
        <!-- Wir sind für Sie Da-->

        <!-- Button -->
        <div class="services__buttons bottom">
            <div class="buttons_wrapper">
                <a class="button" href="https://www.realmatch360.com/app/report-city.html" target="_blank"><?php _e('Try it for free', 'realmatch360'); ?></a>
            </div>
        </div>
        <!-- Button -->

        <!-- Feeds -->
        <div class="feeds">
            <div class="feeds_latest-post">
                <?php $latest = new WP_Query( array( 'posts_per_page' => 1 ));
                if( $latest->have_posts() ) : ?>
                <div class="latest-post__content">
                    <?php while( $latest->have_posts() ) : $latest->the_post(); ?>
                        <h3 class="feedtitle">Blog</h3>
                        <h3 class="feedtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="blogexcerpt"><?php the_excerpt(); ?></div>
                        <div class="clear"></div>
                        <a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'realmatch360'); ?></a>
                    <?php endwhile; ?>
                    <a class="" href="<?php echo get_permalink(icl_object_id(65,'page',false,ICL_LANGUAGE_CODE));?>"><?php _e('More Articles', 'realmatch360'); ?></a>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
                <?php if ( is_active_sidebar( 'footer-column2-widget-area' ) ) : ?>
                    <div id="footer-column2" class="widget-area">
                        <?php dynamic_sidebar( 'footer-column2-widget-area' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Twitter Feed -->
            <div class="feeds_twitterbadge">
                <h3 class="feeds_feedtitle"><?php _e('Twitter @ImmoDigest', 'realmatch360'); ?>
                    <div class="feeds_twitterbutton"><a href="https://twitter.com/ImmoDigest" class="twitter-follow-button" data-show-count="false" data-lang="de" data-size="large" data-show-screen-name="true">@ImmoDigest folgen</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </div>
                </h3>
                <div class="feeds_tweetcontent"><a class="twitter-timeline"   data-chrome="nofooter transparent noheader" height="400" href="https://twitter.com/ImmoDigest"  data-widget-id="496927765556256768">Tweets von @ImmoDigest</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
            <!-- Twitter Feed -->
        </div>
        <!-- Feeds -->


    </div>
    <!-- Container -->




<?php endwhile; endif; ?>



<?php get_footer(); ?>
