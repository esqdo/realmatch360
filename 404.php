<?php get_header(); ?>
<section class="container">
<section id="content" role="main" class="grid_12">
<article id="post-0" class="post not-found">
<header class="header">
<h1 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ); ?></h1>
</header>
<section class="entry-content">
<p><?php _e( 'Back to the homepage?', 'blankslate' ); ?><a href="<?php echo get_home_url(); ?>"><?php _e( 'Bring me back', 'blankslate' ); ?></p>
<!-- <?php get_search_form(); ?> -->
</section>
</article>
</section>
</section>

<?php get_footer(); ?>