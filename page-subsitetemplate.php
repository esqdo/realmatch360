/*

Template Name: Subsite

*/

<?php get_header(); ?>
<section class="container">
<section class="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<header class="header">
<h1 class="grid_12 page-title">Realmatch360 für <?php the_title(); ?></h1> 
</header>
<img src="http://lorempixel.com/500/250/" class="grid_6">
<div class="grid_6">
  <ul class="points">
      <li><h3>Welche Wohnungen werden in dieser Gemeinde nachgefragt?</h3></li>
      <li><h3>Welche Grössen sollen die Wohnungen haben?</h3></li>
      <li><h3>Welche Zahlungsbereitschaft besteht für die einzelnen Wohnungen?</h3></li> 
</ul>  

 <ul class="infonav">
                <a href="http://www.realmatch360.com/?page_id=101"><li>Mehr Informationen</li></a>
                <a href="mailto:info@realmatch360.com"><li>Beratungstermin vereinbaren</li></a>
                <a href="http://www.realmatch360.com/report-city.html"><li>Beispiel anschauen</li></a>    
        </ul>  
    
</div>
    
</section>
<section class="page-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<section class="usewrp grid_12">
<h2>Nutzen von Realmatch 360</h2>
</section>
<section class="content">
<h2 class="grid_12">Unsere Kunden</h2>    
</section>

</section>
<div class="offer2 offerwrp container">
                    <div class="grid_4 leadsform"><?php the_block('Angebot1'); ?></div>
                    <div class="grid_4"><?php the_block('Angebot2');?></div>
                    <div class="grid_4"><?php the_block('Angebot3'); ?></div>
</div>
<div class="page-links"><?php wp_link_pages(); ?></div>

<?php edit_post_link(); ?>
<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>
