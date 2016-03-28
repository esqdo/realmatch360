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



<section class="page-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<div class="container">
    <p class="grid_3"><a href="http://www.realmatch360.com/kontaktformular/" class="mailadress">info@realmatch360.com</a></p>
    <p class="grid_3 alpha telefon"><i class="icon-call-end"></i>+41 44 500 96 30</p>
    <p class="grid_3 alpha"><a href="<?php echo get_permalink(icl_object_id(940,'page',false,ICL_LANGUAGE_CODE));?>"><?php _e('Adhoc order form', 'realmatch'); ?></a></p>
    <h2 class="grid_12 team-title"><?php the_field('consulting'); ?></h2>
     <?php
    $advisors =  new WP_Query( 'post_type=sales' );
    while ($advisors->have_posts()) {
        $advisors->the_post();
        ?>
    <div class="grid_3 omega employeeoverview">
        <div class="employeeregion"><i class="icon-compass"></i><?php the_field('region'); ?></div>
        <?php the_post_thumbnail(); ?>
    <div class="employeedesc">
        <h3><?php the_title(); ?></h3>
       <div class="employeejob"><p><?php the_field('jobname');?></p></div>
        <div class="employeemeta">

        <div class="employeetelefon"><i class="icon-call-end"></i><?php the_field('telefon'); ?></div>
        <div class="employeemobile"><i class="icon-screen-smartphone"></i><?php the_field('mobile'); ?></div>
        <div class="employeemail"><i class="icon-envelope"></i><?php the_field('mail'); ?></div>
        </div>
       <?php the_content(); ?>
    </div>
    </div>
    <?php
    }
    ?>
    <?php wp_reset_postdata(); ?>
    <h2 class="grid_12 page-title"><?php the_field('titleteam'); ?></h2>
     <?php
    $advisors =  new WP_Query( 'post_type=mitarbeiter' );
    while ($advisors->have_posts()) {
        $advisors->the_post();
        ?>
    <div class="grid_3 omega employeeoverview">
        <?php the_post_thumbnail(); ?>
    <div class="employeedesc">
        <h3><?php the_title(); ?></h3>
       <div class="employeejob"><p><?php the_field('jobname');?></p></div>
       <?php the_content(); ?>
    </div>
    </div>
    <?php
    }
    ?>
    </div>




</section>
<div class="clear"></div>
<div class="page-links"><?php wp_link_pages(); ?></div>

<?php edit_post_link(); ?>
<?php endwhile; endif; ?>
</section>
</section>
<?php get_footer(); ?>
