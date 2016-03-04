<?php
add_action( 'after_setup_theme', 'realmatch360_setup' );
function realmatch360_setup() {
  load_theme_textdomain( 'realmatch360', get_template_directory() . '/languages' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
}

/* Automatic Updates */
add_filter( 'auto_update_plugin', '__return_true' );
add_filter('allow_major_auto_core_updates', '__return_true' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery',get_template_directory_uri() . '/js/all.js' , false, null );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('responsiveslides',get_template_directory_uri() . '/js/responsiveslides.min.js',array( 'jquery' ));
    wp_enqueue_script('frogaloops',get_template_directory_uri() . '/js/frogaloops.js',array( 'jquery' ));
    wp_enqueue_script( 'maphilight', get_template_directory_uri() . '/js/jquery.maphilight.min.js', array('jquery') );
    wp_enqueue_script('slides',get_template_directory_uri() . '/js/slider.js',array( 'jquery' ));
    wp_enqueue_script( 'featerlightscript', get_template_directory_uri() . '/js/featherlight.min.js', array('jquery') );
    //wp_enqueue_script( 'corejs', get_template_directory_uri() . '/js/core.min.js', array('jquery') );

    wp_enqueue_script( 'map', get_template_directory_uri() . '/js/mapandmore.js', array('jquery') );

	   wp_enqueue_style( '_s-style', get_stylesheet_uri() );
    //wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css' );
    //wp_enqueue_style( 'all', get_template_directory_uri() . '/css/allcss' );
    wp_enqueue_style( 'coremincss', get_template_directory_uri() . '/css/core.min.css' );
    wp_enqueue_style( 'featherlight', get_template_directory_uri() . '/css/featherlight.min.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
    wp_enqueue_style( 'simplegrid', get_template_directory_uri() . '/css/grid.css' );
    wp_enqueue_style( 'simplelineicons', get_template_directory_uri() . '/css/simple-line-icons.css' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	//wp_enqueue_script( 'responsiveslides', get_template_directory_uri() . '/js/responsiveslides.min.js', array('jquery'), '20120206', true );
  //wp_enqueue_script( 'pushy', get_template_directory_uri() . '/js/pushy.min.js', array(), '20140207', true );
    //wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '20140208', true );
    //wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/custom.js', array(),'20140306', true );
	//wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

}
add_action( 'wp_enqueue_scripts', '_s_scripts' );


add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'realmatch360' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}

/*

Blog Widgets

*/

function blog_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Blog Widget Area', 'realmatch360' ),
		'id' => 'blog-widget',
		'before_widget' => '<div id="blogwidget" class="widget-blog">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title uppercase">',
		'after_title' => '</h3>'
	));

}
add_action( 'widgets_init', 'blog_widgets_init' );


function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
register_nav_menus( array(
	'footer_menu' => 'Footer Navigation',
    'featured-menu' => 'Featured Navigation'
) );

//Register Custom Post Types
include 'inc/customposts/customposts.php';
//Metaboxes for Frontpage
include 'inc/metaboxes/frontpage.php';

// Post Thumbnails

if(function_exists('add_theme_support')) {
    /** Exists! So add the post-thumbnail */
    add_theme_support('post-thumbnails');

    /** Now Set some image sizes */

    /** #1 for our featured content slider */
    add_image_size( $name = 'featured_img',1028,400,true );
    add_image_size( $name = 'employee', $width = 223, $height = 160, $crop = true );
    add_image_size('mobilereduced', 490);

}


// Custom Post Type Widget

add_action( 'widgets_init', 'register_offers_widget' );
function register_offers_widget() {
	register_widget( 'Offers_Widget' );
}

class Offers_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'offer-widget', 'description' => __( 'Choose and display a single offer' ) );
		$control_ops = array(  );
		parent::__construct( 'offerswidget', __( 'Offers' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		echo $before_widget;

		$offer_id = $instance['offer'];
		$offer = get_post( $offer_id );

		echo $before_title . $offer->post_title . $after_title;
		echo "<div class='offer-{$offer_id}'>{$offer->post_content}</div>";

		echo $after_widget;
	} //end widget()

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['offer'] = (int) $new_instance['offer'];
		$instance['title'] = get_the_title( $instance['offer'] );
		return $instance;

	} //end update()

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'offer' => 0 ) );
		extract( $instance );
		?>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="hidden" value="<?php echo $title; ?>" />
		<p>
			<label for="<?php echo $this->get_field_id('offer'); ?>"><?php _e( 'Select an Offer:' );?>
			<?php
				$offers = get_posts( 'post_type=offers&post_status=publish&numberposts=-1&language=de_CH' );
				if ( count( $offers ) > 0 ) {
					?><select class="widefat" id="<?php echo $this->get_field_id('offer'); ?>" name="<?php echo $this->get_field_name('offer'); ?>"><?php
					foreach( $offers as $acc ) {
						$selected = selected( $acc->ID, $offer, false );
						echo "<option value='{$acc->ID}'{$selected}>{$acc->post_title}</option>";
					}
					?></select><?php
				} else {
					echo '<em>'. __( 'No offers were found' ) .'</em>';
				}
			?>
			</label>
		</p>
		<?php
	} //end form()
}
