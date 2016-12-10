<?php get_header ( "featured" ); ?>

<section class="container featured">


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- Testimonial -->
<section class="featured__testimonial container" role="main">
    <div class="testimonial__image">
        <?php
        $image = get_field('testimonial_picture');
        if( !empty($image) ): ?>
            <img src="<?php the_field('testimonial_picture'); ?>" alt="<?php the_field('testimonial_person'); ?>" />
        <?php endif; ?>
    </div>
    <div class="testimonial__text">
        <h4 class="testimonial__quote"><?php the_field('testimonial'); ?></h4>
        <p class="testimonial__person"><?php the_field('testimonial_person'); ?></p>
    </div>
</section>
<!-- Testimonial -->

<!-- Questions -->
<section class="container featured__questions">

    <h2><?php the_field('nutzentitel'); ?></h2>
    <div class="featured__questions-wrapper">
        <div class="questionwrapper">
            <div class="question stretch">
                <?php the_field('frage1'); ?>
            </div>
            <?php the_field('antwort1'); ?>
        </div>

        <div class="questionwrapper">
            <div class="question stretch">
                <?php the_field('frage2'); ?>
            </div>
            <?php the_field('antwort2'); ?>
        </div>

        <div class="questionwrapper">
            <div class="question stretch">
                <?php the_field('frage3'); ?>
            </div>
            <?php the_field('antwort3'); ?>
        </div>
    </div>

</section>
<!-- Questions -->

<!-- Customers -->
<section class="customerwrp">
    <?php the_field('kunden'); ?>
</section>
<!-- Customers -->



<div class="clear"></div>
<div class="container">
<?php edit_post_link(); ?>
</div>
<?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>
