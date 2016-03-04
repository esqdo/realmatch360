<?php get_header(); ?>
<section id="content" role="main" class="container">
<header class="header">
<h1 class="entry-title"><?php
if ( is_day() ) { printf( __( 'Daily Archives: %s', 'realmatch360' ), get_the_time( get_option( 'date_format' ) ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'realmatch360' ), get_the_time( 'F Y' ) ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'realmatch360' ), get_the_time( 'Y' ) ); }
else { _e( 'Archives', 'blankslate' ); }
?></h1>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<div class="sidebar grid_3">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
