<?php
/*

Template Name: Produktpage

*/

get_header('empty'); ?>

<section class="container">

<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<h1 class="alpha omega grid_12 page-title"><?php the_title(); ?></h1>
</header>
<section class="alpha omega grid_12 page-content">

<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

<?php the_content(); ?>

<div class="page-links"><?php wp_link_pages(); ?></div>
</section>
</article>
 <?php edit_post_link(); ?>
<?php endwhile; endif; ?>
</section>
</section>

<!-- Offers -->
<section class="container offers__wrapper">
                             <?php
    $offer =  new WP_Query( 'post_type=offers' );
    while ($offer->have_posts()) {
            $offer->the_post();
            ?>
        <?php the_content(); ?>
    <?php
} wp_reset_postdata(); ?>
</section>
<!-- Offers -->

<?php get_footer('empty'); ?>
