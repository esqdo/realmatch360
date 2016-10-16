<?php get_header(); ?>
<section class="container">


<section class="blog__wrapper">
 <section id="blogcontent" role="main">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <?php get_template_part( 'entry' ); ?>
   <?php comments_template(); ?>
  <?php endwhile; endif; ?>
  <?php get_template_part( 'nav', 'below' ); ?>

 </section>

 <div class="sidebar">
  <?php get_sidebar(); ?>
 </div>
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-widget') ) : ?>
 <?php endif; ?>
</section>
</section>


<?php get_footer(); ?>