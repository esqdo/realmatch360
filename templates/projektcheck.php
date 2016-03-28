<?php
/*

Template Name: Projektcheck

*/

get_header('empty'); ?>
<section class="container" id="projektcheck">
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<h1 class="grid_12 page-title"><?php the_title(); ?></h1>
</header>
<section class="grid_12 page-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

<?php the_content(); ?>

<div class="page-links"><?php wp_link_pages(); ?></div>
</section>
</article>
 <?php edit_post_link(); ?>
<?php endwhile; endif; ?>
</section>
</section>
<?php get_footer('empty'); ?>