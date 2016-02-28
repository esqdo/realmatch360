<?php

/*

Template Name: Temp

*/

get_header(); ?>
<section class="container">
<section class="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<header class="header">
    <h1 class="grid_12 page-title"><?php the_title(); ?></h1>
</header>

    

<section class="page-content">
<?php echo get_temp_dir(); ?>
    


</section>
<div class="clear"></div>
<div class="page-links"><?php wp_link_pages(); ?></div>

<?php edit_post_link(); ?>
<?php endwhile; endif; ?>
</section>
</section>
<?php get_footer(); ?>