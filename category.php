<?php get_header(); ?>
<section class="container">
<section id="content" role="main" class="grid_9">

<header class="header">
<h1 class="entry-title"><?php _e( 'Category Archives: ', 'realmatch360' ); ?><?php single_cat_title(); ?></h1>
<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'entry' ); ?>

<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>

</section>
<div class="sidebar grid_3">
<?php get_sidebar(); ?>
</div>
</section>
<?php get_footer(); ?>
