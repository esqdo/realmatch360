<div class="clear"></div>
<!-- footer -->
<footer class="container" id="footer" role="contentinfo">

    <div class="footer-widgets">
        <!-- Footer Navigation + Social -->
        <div id="footernav">
            <h3><?php _e('Informations', 'realmatch360'); ?></h3>
            <?php if ( is_active_sidebar( 'footer-column1-widget-area' ) ) : ?>
                <div id="footer-column1" class="widget-area">
                    <?php dynamic_sidebar( 'footer-column1-widget-area' ); ?>
                </div>
            <?php endif; ?>
            <ul class="social-media">
                <li class=""><a href="http://www.twitter.com/realmatch360" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                <li class=""><a href="http://www.facebook.com/realmatch360" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="https://plus.google.com/b/101212378203894800980/101212378203894800980" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
            </ul>
        </div>
        <!-- Footer Navigation + Social Links -->
        <div class="latest-post">
            <?php $latest = new WP_Query( array( 'posts_per_page' => 1 ));
            if( $latest->have_posts() ) : ?>
            <div class=" latest-post__content">
                <?php while( $latest->have_posts() ) : $latest->the_post(); ?>
                    <h3 class="feedtitle">Blog</h3>
                    <h3 class="feedtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="blogexcerpt"><?php the_excerpt(); ?></div>
                    <div class="clear"></div>
                    <a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'realmatch360'); ?></a>
                <?php endwhile; ?>
                <a class="" href="<?php echo get_permalink(icl_object_id(65,'page',false,ICL_LANGUAGE_CODE));?>"><?php _e('More Articles', 'realmatch360'); ?></a>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
        <!-- Twitter Feed -->
        <div class="twitterbadge">
            <h3 class="feedtitle"><?php _e('Twitter @ImmoDigest', 'realmatch360'); ?>
                <div class="twitterbutton"><a href="https://twitter.com/ImmoDigest" class="twitter-follow-button" data-show-count="false" data-lang="de" data-size="large" data-show-screen-name="true">@ImmoDigest folgen</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </div>
            </h3>
            <div class="tweetcontent"><a class="twitter-timeline"   data-chrome="nofooter transparent noheader" height="400" href="https://twitter.com/ImmoDigest"  data-widget-id="496927765556256768">Tweets von @ImmoDigest</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
        </div>
        <!-- Twitter Feed -->
    </div>

    <div id="copyright"><p>&copy;<?php echo date(' Y '); ?> Immo Marktdaten AG</p></div>

</footer>
<!-- Footer -->

<?php wp_footer(); ?>
<script>jQuery( document ).ready(function( $ ) { app.init(); });</script>
<!-- Facebook Pixel Conversions -->
<script>(function() {
 var _fbq = window._fbq || (window._fbq = []);
 if (!_fbq.loaded) {
   var fbds = document.createElement('script');
   fbds.async = true;
   fbds.src = '//connect.facebook.net/en_US/fbds.js';
   var s = document.getElementsByTagName('script')[0];
   s.parentNode.insertBefore(fbds, s);
   _fbq.loaded = true;
 }
 _fbq.push(['addPixelId', '1489859177918717']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1489859177918717&amp;ev=PixelInitialized" /></noscript>
<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46656121-1', 'auto');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 978070291;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript"
        src="//www.googleadservices.com/pagead/conversion.js">
</script>

<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/978070291/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>

</body>
</html>