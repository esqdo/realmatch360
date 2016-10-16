<?php
add_action( 'after_setup_theme', 'realmatch360_setup' );
function realmatch360_setup() {
  load_theme_textdomain( 'realmatch360', get_template_directory() . '/languages' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
}

/* Advanced Custom Fields */
define( 'ACF_LITE', false );
include_once('inc/advanced-custom-fields/acf.php');
/* Include Custom Fields */
include_once('inc/customfields/employee.php');
include_once('inc/customfields/featured.php');
include_once('inc/customfields/homepage.php');
include_once('inc/customfields/products.php');
include_once('inc/customfields/sales.php');
include_once('inc/customfields/team.php');

/**
 * Enqueue scripts and styles.
 */
function realmatch_scripts() {
  wp_enqueue_style( 'realmatch360-styles', get_template_directory_uri() . '/style.min.css' );
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery',get_template_directory_uri() . '/js/all.js' , false, null );
  wp_enqueue_script( 'jquery' );
  //wp_enqueue_script('boot',get_template_directory_uri() . '/assets/js/vendor.min.js',array( 'jquery' ), NULL, true);
  //wp_enqueue_script('responsiveslides',get_template_directory_uri() . '/js/responsiveslides.min.js',array( 'jquery' ));
  wp_enqueue_script('frogaloops',get_template_directory_uri() . '/js/frogaloops.js',array( 'jquery' ));
  wp_enqueue_script( 'maphilight', get_template_directory_uri() . '/js/jquery.maphilight.min.js', array('jquery') );
  wp_enqueue_script('slides',get_template_directory_uri() . '/js/slider.js',array( 'jquery' ));
  wp_enqueue_script( 'featerlightscript', get_template_directory_uri() . '/js/featherlight.min.js', array('jquery') );
  wp_enqueue_script( 'map', get_template_directory_uri() . '/js/mapandmore.js', array('jquery') );
	//wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

}
add_action( 'wp_enqueue_scripts', 'realmatch_scripts' );


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
	register_sidebar( array (
		'name' => __( 'Footer Column1 Widget Area', 'realmatch360' ),
		'id' => 'footer-column1-widget-area',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'name' => __( 'Footer Column2 Widget Area', 'realmatch360' ),
		'id' => 'footer-column2-widget-area',
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</div>",
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
  	'featured-menu' => 'Featured Navigation',
  	'main-menu' => 'Main Navigation'
) );

//Register Custom Post Types
include 'inc/customposts/customposts.php';

// Post Thumbnails

if(function_exists('add_theme_support')) {
    /** Exists! So add the post-thumbnail */
    add_theme_support('post-thumbnails');

    /** #1 for our featured content slider */
    add_image_size( 'employee', 223, 160, true );

    /* Featured Slider Sizes */
    add_image_size( 'featured_desktop',1028,400,true );
    add_image_size('featured_tablet', 768,400, true);
    add_image_size('featured_small', 456,400, true);
    add_image_size('featured_mobile', 300,400, true);
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
