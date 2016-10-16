<?php get_header(); ?>
<section class="container blog">

<section class="blog__wrapper">
    <section id="blogcontent" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'entry' ); ?>

    <?php get_template_part( 'nav', 'below-single' ); ?>
    </section>

    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</section>


<div class="container">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-widget') ) : ?>
<?php endif; ?>
    <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</div>



</section>

<?php get_footer(); ?>
