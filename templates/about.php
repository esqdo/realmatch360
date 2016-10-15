<?php

/*

Template Name: About us

*/

get_header(); ?>
<section class="container">
<section class="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<header class="header">
    <h1 class="grid_12 page-title"><?php the_title(); ?></h1>
</header>



<section class="page-content about">
    <div class="clear"></div>
    <section class="employees__wrapper">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
        <div class="container">
            <!-- Contact Info -->
            <div class="employees__contact">
                <p><a href="http://www.realmatch360.com/kontaktformular/" class="mailadress">info@realmatch360.com</a></p>
                <p class="telefon"><a href="tel:+41445009630"><i class="icon-call-end"></i>+41 44 500 96 30</a></p>
                <p><a href="<?php echo get_permalink(icl_object_id(940,'page',false,ICL_LANGUAGE_CODE));?>"><?php _e('Adhoc order form', 'realmatch360'); ?></a></p>
            </div>
            <!-- Contact Info -->

           <h2 class="team-title"><?php the_field('consulting'); ?></h2>
            <!-- Sales Team -->
            <div class="employees__member-wrapper">
                 <?php
                $advisors =  new WP_Query( 'post_type=sales' );
                while ($advisors->have_posts()) {
                    $advisors->the_post();
                    ?>
                <div class="employees__member">

                    <div class="employees__member-content">
                    <?php if( get_field('region') ): ?>
                        <p><i class="icon-compass"></i><?php the_field('region'); ?></p>
                    <?php endif; ?>
                    <?php if( !get_field('region') ): ?>
                        <p>&nbsp;</p>
                    <?php endif; ?>
                        <?php the_post_thumbnail(); ?>
                        <h3><?php the_title(); ?></h3>
                        <div class="employeetelefon"><i class="icon-call-end"></i><a href="tel:<?php echo str_replace(' ', '', get_field('telefon')); ?>"><?php the_field('telefon'); ?></a></div>
                        <?php if( get_field('mobile') ): ?>
                            <div class="employeemobile"><i class="icon-screen-smartphone"></i><a href="tel:<?php echo str_replace(' ', '', get_field('mobile')); ?>"><?php the_field('mobile'); ?></a></div>
                        <?php endif; ?>
                        <div class="employeemail"><i class="icon-envelope"></i><?php the_field('mail'); ?></div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <!-- Sales Team -->
            <?php wp_reset_postdata(); ?>



            <h2 class="page-title"><?php the_field('titleteam'); ?></h2>
            <div class="employees__member-wrapper">
                 <?php
                $advisors =  new WP_Query( 'post_type=mitarbeiter' );
                while ($advisors->have_posts()) {
                    $advisors->the_post();
                    ?>
                <div class="employees__member">
                    <div class="employees__member-content">
                        <?php the_post_thumbnail(); ?>
                        <h3><?php the_title(); ?></h3>
                        <div class="employees__team-content">
                            <p class="employees__job"><?php the_field('jobname');?></p>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>



</section>
<div class="clear"></div>
<div class="page-links"><?php wp_link_pages(); ?></div>

<?php edit_post_link(); ?>
<?php endwhile; endif; ?>
</section>
</section>
<?php get_footer(); ?>
