<?php get_header ( "featured" ); ?>

<section class="container">

<section class="content container" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<div class="featuredpoints grid_6 omega">
    <header class="header">
        <h2 class="grid_5 omega featuredtitle"><?php _e('For ', 'realmatch360'); ?><?php the_title(); ?></h2>
    </header>
 	<div class="clear"></div>
      <?php the_field('frage'); ?>


 <div class="featuredsinglenav">
                <a class="button" href="<?php echo get_permalink(icl_object_id(8490,'page',false,ICL_LANGUAGE_CODE));?>"><?php _e('Productdetails', 'realmatch360'); ?></a>
                <a class="button" href="<?php echo get_permalink(icl_object_id(17,'page',false,ICL_LANGUAGE_CODE));?>"><?php _e('Get an Appointment', 'realmatch360'); ?></a>
                <!-- <a class="button" href="http://www.realmatch360.com/report-city.html"><?php _e('Beispiel anschauen', 'realmatch360'); ?></a> -->
        </div>

</div>
<div class="featuredscreenshot grid_6 omega">
    <div class="navclear"></div>
    <?php

$image = get_field('featuredscreenshot');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>


    </div>



</section>
<section class="page-content">

<?php the_content(); ?>
<section class="usewrp container">
<h2 class="grid_12"><?php the_field('nutzentitel'); ?></h2>
<div class="grid_4 omega questionwrapper">
<div class="question stretch">
<h3><?php the_field('frage1'); ?></h3>
</div>
<?php the_field('antwort1'); ?>
</div>
<div class="grid_4 omega questionwrapper">
<div class="question stretch">
<h3><?php the_field('frage2'); ?></h3>
</div>
<?php the_field('antwort2'); ?>
</div>
<div class="grid_4 omega questionwrapper">
<div class="question stretch">
<h3><?php the_field('frage3'); ?></h3>
</div>
<?php the_field('antwort3'); ?>
</div>

</section>
<section class="customerwrp">
<?php the_field('kunden'); ?>

</section>
<div class="container">
                 <?php
                $offer =  new WP_Query( 'post_type=offers' );
                while ($offer->have_posts()) {
                        $offer->the_post();
                        ?>
                    <?php the_content(); ?>
                <?php
            }
            ?>

</div>
</section>


<div class="clear"></div>
<div class="container">
<?php edit_post_link(); ?>
</div>
<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>
