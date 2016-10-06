<?php
/*

Template Name: Dienstleistungen

*/


 get_header(); ?>
<section class="container">
<section class="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<header class="header">
<h1 class="page-title grid_12"><?php the_title(); ?></h1>
</header>

<section class="page-content dienstleistungen">
	<div class="grid_12"><?php the_content(); ?></div>

	<div class="clear"></div>

    <div class="grid_6 omega productimage">
    <?php $image = get_field('detailanalysescreenshot');if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php endif; ?>
    </div>
	<div class="grid_5 omega"><?php the_field('detailanalyse');?></div>
        <div class="grid_6 omega productimagemobile">
    <?php $image = get_field('detailanalysescreenshot');if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php endif; ?>
    </div>

	<div class="clear"></div><br>

     <div class="grid_6 omega productimage">
    <?php $image = get_field('ms-regionscreenshot');if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php endif; ?>
    </div>
	<div class="grid_5 omega"><?php the_field('ms-region');?></div>
      <div class="grid_6 omega productimagemobile">
    <?php $image = get_field('ms-regionscreenshot');if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php endif; ?>
    </div>
	<div class="clear"></div><br>

     <div class="grid_6 omega productimage">
    <?php $image = get_field('_projektcheckscreenshot');if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php endif; ?>
    </div>
	<div class="grid_5 omega"><?php the_field('projektcheck');?></div>
      <div class="grid_6 omega productimagemobile">
    <?php $image = get_field('_projektcheckscreenshot');if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php endif; ?>
    </div>

    <div class="clear"></div><br>

      <div class="grid_6 omega productimage">
    <?php $image = get_field('_pricesetterscreenshot');if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php endif; ?>
    </div>
	<div class="grid_5 omega"><?php the_field('pricesetter');?></div>
      <div class="grid_6 omega productimagemobile">
    <?php $image = get_field('_pricesetterscreenshot');if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /><?php endif; ?>
    </div>


	<div class="clear"></div><br>
     <div class="grid_11 omega"><?php the_field('preisliste');?></div>

</section>

<div class="page-links"><?php wp_link_pages(); ?></div>

<?php endwhile; endif; ?>

</section>

    <div class="clear"></div>
    <div class="offerwrp">
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
    </div>


<?php edit_post_link(); ?>
</section>
<?php get_footer(); ?>
