<?php get_header(); ?>
<section class="container">
<section id="blogcontent" role="main" class="grid_9 omega">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>

<?php get_template_part( 'nav', 'below-single' ); ?>
</section>

    <div class="sidebar grid_3">
        <?php get_sidebar(); ?>
    </div>
<div class="container">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-widget') ) : ?>
<?php endif; ?>
    <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</div>






</section>

<?php get_footer(); ?>
