<?php
/*

Template Name: Facebook

*/

get_header('fb'); ?>
<section class="container" id="facebook">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
</header>

<div id="b2b" class="grid_4">
	<div class="b2b">
		<h2>Für alle Immobilien-Verwalter, -Investoren und -Entwickler:</h2>
	</div>
	<div class="">
		<img src="https://www.realmatch360.com/wp-content/uploads/2014/11/baustelle.jpg" class="fb">
	</div>		
	<div class="b2b text">
		Im Vergleich zu herkömmlichen Immobilien-Marktdaten zeigt Realmatch360 erstmals eine zukunfts- und nachfrageorientierte Sicht auf der Basis von effektiven und tagesaktuellen Nachfragedaten.
	</div>
	<div class= "b2b">
		<h3>&laquo;Wir wissen, wer wo wohnen will.&raquo;</h3>
	</div>
	<div class="b2b text">
		<h3>Live Demo?</h3>
		<p>Wir zeigen Ihnen Realmatch360 kostenlos &#8211; bei Ihnen vor Ort oder im online Webinar.</p>
		<p><a href="https://www.realmatch360.com/kontaktformular/" class="mailadress" title="Kontaktformular">Schreiben Sie uns</a><br />
		<a href="https://www.realmatch360.com/ueber-uns/" class="consultant">Kontaktieren Sie den Berater in ihrer Region</a>
	</div>
</div>

<div id="b2c" class="grid_4">
	<div class="b2c">
		<h2>Für alle Haus- und Wohnungssuchende, Käufer und Träumer</h2>
	</div>
	<div class="">
		<img src="https://www.realmatch360.com/wp-content/uploads/2014/11/nacht.jpg" class="fb">
	</div>
	<div class="b2c text">
		Realmatch360 findet Ihre Traumwohnung für Sie, ohne dass Sie aktiv suchen müssen. Melden Sie sich kostenlos an und hören zuerst von den neusten und besten Objekten.
	</div>
	<div class="b2c">
		<h3>&laquo;Lassen Sie sich von Ihrer Traumwohnung finden.&raquo;</h3>
	</div>
	<div class="b2c text">
		<h3>Kostenlos anmelden</h3>
		<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="true" data-auto-logout-link="false"></div>
		<a class="gobutton" href="http://login.traumhaus.realmatch360.com/auth/registration">Jetzt Loslegen</a>        
	</div>
</div>

<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

<?php the_content(); ?>

<div class="page-links"><?php wp_link_pages(); ?></div>
</article>
 <?php edit_post_link(); ?>
<?php endwhile; endif; ?>
</section>
<?php get_footer('fb'); ?>