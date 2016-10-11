<?php get_header(); ?>
<section class="container">
<section id="blogcontent" role="main" class="grid_9 omega">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>

</section>

 <div class="grid_3 sidebar">
<?php get_sidebar(); ?>
</div>   
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-widget') ) : ?>
<?php endif; ?>
</section>

<?php get_footer(); ?>