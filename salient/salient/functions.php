<?php 

#-----------------------------------------------------------------#
# Default theme constants
#-----------------------------------------------------------------#
define('NECTAR_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/nectar/');
define('NECTAR_THEME_NAME', 'salient');

#-----------------------------------------------------------------#
# Load text domain
#-----------------------------------------------------------------#

add_action('after_setup_theme', 'lang_setup');
function lang_setup(){
	
	load_theme_textdomain(NECTAR_THEME_NAME, get_template_directory() . '/lang');
	
}

#-----------------------------------------------------------------#
# Register/Enqueue JS
#-----------------------------------------------------------------#

function nectar_register_js() {	
	
	if (!is_admin()) { 
		
		// Register 
		wp_register_script('modernizer', get_template_directory_uri() . '/js/modernizr.js', 'jquery', '2.6.2');
		wp_register_script('respond', get_template_directory_uri() . '/js/respond.js', 'jquery', '1.1', TRUE);
		wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js', 'jquery', '1.4.8', TRUE);
		wp_register_script('easing', get_template_directory_uri() . '/js/easing.js', 'jquery', '1.3', TRUE);
		wp_register_script('imagesloaded', get_template_directory_uri() . '/js/imagesLoaded.min.js', 'jquery', '3.1.1', TRUE);
		wp_register_script('touchSwipe', get_template_directory_uri() . '/js/swipe.min.js', 'jquery', '1.6', TRUE);
		wp_register_script('respond', get_template_directory_uri() . '/js/respond.js', 'jquery', '1.1',TRUE);
		wp_register_script('orbit', get_template_directory_uri() . '/js/orbit.js', 'jquery', '1.4', TRUE);
		wp_register_script('nicescroll', get_template_directory_uri() . '/js/nicescroll.js', 'jquery', '3.5.4' ,TRUE);
		wp_register_script('sticky', get_template_directory_uri() . '/js/sticky.js', 'jquery', '1.0', TRUE);
		wp_register_script('nectar_prettyPhoto', get_template_directory_uri() . '/js/prettyPhoto.js', 'jquery', '3.1.5', TRUE);
		wp_register_script('flexslider', get_template_directory_uri() . '/js/flexslider.min.js', 'jquery', '2.2', TRUE);
		wp_register_script('appear', get_template_directory_uri() . '/js/appear.js', 'jquery', '1.0', TRUE);
		wp_register_script('isotope', get_template_directory_uri() . '/js/isotope.min.js', 'jquery', '1.5.25' ,TRUE);
		wp_register_script('blogmasonry', get_template_directory_uri() . '/js/blog-masonry.js', 'jquery', '3.15', TRUE);
		wp_register_script('carouFredSel', get_template_directory_uri() . '/js/carouFredSel.min.js', 'jquery', '6.2', TRUE);
		wp_register_script('nectarSlider', get_template_directory_uri() . '/js/nectar-slider.js', 'jquery', '3.1', TRUE);

		if ( floatval(get_bloginfo('version')) < "3.6" ) {
			wp_register_script('jplayer', get_template_directory_uri() . '/js/jplayer.min.js', 'jquery', '2.1', TRUE);
		}
		wp_register_script('nectarFrontend', get_template_directory_uri() . '/js/init.js', array('jquery', 'superfish', 'carouFredSel', 'easing', 'flexslider', 'nicescroll'), '3.15', TRUE);
		
		// Dequeue
		wp_dequeue_script( 'prettyPhoto' );
		
		// Enqueue
		wp_enqueue_script('jquery');
		wp_enqueue_script('modernizer');
		wp_enqueue_script('superfish'); 
		wp_enqueue_script('imagesloaded');
		wp_enqueue_script('easing'); 
		wp_enqueue_script('respond');
		wp_enqueue_script('touchSwipe'); 
		wp_enqueue_script('nicescroll');
		wp_enqueue_script('sticky'); 
		wp_enqueue_script('nectar_prettyPhoto');
		wp_enqueue_script('flexslider');
		wp_enqueue_script('isotope');
		wp_enqueue_script('carouFredSel');
		wp_enqueue_script('appear'); 
		if ( floatval(get_bloginfo('version')) < "3.6" ) {
			wp_enqueue_script('jplayer');
		}
		
		wp_enqueue_script('nectarFrontend');
		
		
	}
}

add_action('wp_enqueue_scripts', 'nectar_register_js');



function nectar_page_specific_js() {
	
	global $post;
	if(!is_object($post)) $post = (object) array('post_content'=>' ', 'ID' => ' ');
    $template_name = get_post_meta( $post->ID, '_wp_page_template', true );
	
	//home
	if ( is_page_template('template-home-1.php') || $template_name == 'salient/template-home-1.php' ||
	     is_page_template('template-home-2.php') || $template_name == 'salient/template-home-2.php' ||
	     is_page_template('template-home-3.php') || $template_name == 'salient/template-home-3.php' ||
	     is_page_template('template-home-4.php') || $template_name == 'salient/template-home-4.php') {
		wp_enqueue_script('orbit');
	}
	
	//contact
	if ( is_page_template('template-contact.php') ||  $template_name == 'salient/template-contact.php') {
		wp_register_script('googleMaps', 'https://maps.google.com/maps/api/js?sensor=false', NULL, NULL, TRUE);
		wp_register_script('nectarMap', get_template_directory_uri() . '/js/map.js', array('jquery', 'googleMaps'), '1.0', TRUE);
		
		wp_enqueue_script('googleMaps');
		wp_enqueue_script('nectarMap');
	}
	
	//blog
	wp_enqueue_script('blogmasonry');
	
	//nectarSlider mediaElement 
	$portfolio_extra_content = get_post_meta($post->ID, '_nectar_portfolio_extra_content', true);
	if(stripos( $post->post_content, '[nectar_slider') !== FALSE || stripos( $portfolio_extra_content, '[nectar_slider') !== FALSE
	|| stripos($post->post_content, '[vc_gallery type="nectarslider_style"') !== FALSE || stripos( $portfolio_extra_content, '[vc_gallery type="nectarslider_style"') !== FALSE) {
		
		if ( floatval(get_bloginfo('version')) >= "3.6" ) {
			wp_enqueue_script('wp-mediaelement');
			wp_enqueue_style('wp-mediaelement');
		} else {
			
			//register media element for WordPress 3.5
			wp_register_script('wp-mediaelement', get_template_directory_uri() . '/js/mediaelement-and-player.min.js', array('jquery'), '1.0', TRUE);
			wp_register_style('wp-mediaelement', get_template_directory_uri() . '/css/mediaelementplayer.min.css');
			
			wp_enqueue_script('wp-mediaelement');
			wp_enqueue_style('wp-mediaelement');
		}
		
		wp_enqueue_script('nectarSlider');
	}
	
	//comments
	if ( is_singular() && comments_open() && get_option('thread_comments') )
	wp_enqueue_script('comment-reply');
}

add_action('wp_enqueue_scripts', 'nectar_page_specific_js'); 



//Remove wooCommerce prettyPhoto
global $woocommerce;
if($woocommerce) {
	
	function removeWooPrettyPhoto(){
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
	    wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_script( 'prettyPhoto' );
	}
	
	add_action( 'wp_enqueue_scripts', 'removeWooPrettyPhoto', 99 );

}

#-----------------------------------------------------------------#
# Register/Enqueue CSS
#-----------------------------------------------------------------#


//Main Styles
function nectar_main_styles() {	
		 
		 // Register 
		 wp_register_style('rgs', get_template_directory_uri() . '/css/rgs.css');
		 wp_register_style('orbit', get_template_directory_uri() . '/css/orbit.css');
		 wp_register_style('woocommerce', get_template_directory_uri() . '/css/woocommerce.css');
		 wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
		 wp_register_style('steadysets', get_template_directory_uri() . '/css/steadysets.css');
		 wp_register_style('linecon', get_template_directory_uri() . '/css/linecon.css');
		 wp_register_style("main-styles", get_stylesheet_directory_uri() . "/style.css", '', '3.1');
		 wp_register_style("responsive", get_template_directory_uri() . "/css/responsive.css", '', '3.1');
		 wp_register_style("non-responsive", get_template_directory_uri() . "/css/non-responsive.css");
		 wp_register_style("ie8", get_template_directory_uri() . "/css/ie8.css");
		 
		 // Enqueue
		 wp_enqueue_style('rgs'); 
		 wp_enqueue_style('font-awesome'); 
		 wp_enqueue_style('steadysets'); 
		 wp_enqueue_style('linecon'); 
		 wp_enqueue_style('main-styles');
		 wp_enqueue_style('ie8'); 
		 
		 
		 //responsive
		 $options = get_option('salient');
		 if( !empty($options['responsive']) && $options['responsive'] == 1 ) { 
			wp_enqueue_style('responsive');
		 } else { 
			wp_enqueue_style('non-responsive');
			
			add_filter('body_class','salient_non_responsive');
			function salient_non_responsive($classes) {
				// add 'class-name' to the $classes array
				$classes[] = 'salient_non_responsive';
				// return the $classes array
				return $classes;
			}
			
		 } 
		 
		 //IE 
		 global $wp_styles;
		 $wp_styles->add_data("ie8", 'conditional', 'lt IE 9');
}

add_action('wp_enqueue_scripts', 'nectar_main_styles');


function nectar_page_sepcific_styles() {
	
	//home
	if ( is_page_template('template-home-1.php') || is_page_template('template-home-2.php') || is_page_template('template-home-3.php') || is_page_template('template-home-4.php')) {
		wp_enqueue_style('orbit'); 
	}
	
	//WooCommerce
    if ( function_exists( 'is_woocommerce' ) ) {
    	wp_enqueue_style('woocommerce'); 
	}
	
}

add_action('wp_enqueue_scripts', 'nectar_page_sepcific_styles');



#-----------------------------------------------------------------#
# Dynamic Styles
#-----------------------------------------------------------------#

/* Add Custom Styles */
include('css/colors.php');
include('css/custom.php');

$options = get_option('salient'); 
if(!empty($options['use-custom-fonts']) && $options['use-custom-fonts'] == 1){
	include('css/fonts.php');
}


#-----------------------------------------------------------------#
# Post formats
#-----------------------------------------------------------------#

add_theme_support( 'post-formats', array('quote','video','audio','gallery','link') );

#-----------------------------------------------------------------#
# Automatic Feed Links
#-----------------------------------------------------------------#

if(function_exists('add_theme_support')) {
    add_theme_support('automatic-feed-links');
}

#-----------------------------------------------------------------#
# Image sizes 
#-----------------------------------------------------------------#

add_theme_support( 'post-thumbnails' );
add_image_size( 'blog-widget', 50, 50, true ); 
add_image_size( 'portfolio-thumb', 600, 403, true ); 
add_image_size( 'portfolio-widget', 100, 100, true ); 

add_image_size( 'wide', 1000, 500, true );  
add_image_size( 'regular', 500, 500, true ); 
add_image_size( 'tall', 500, 1000, true ); 
add_image_size( 'wide_tall', 1000, 1000, true ); 


#-----------------------------------------------------------------#
# Custom menu
#-----------------------------------------------------------------#
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'top_nav' => 'Top Navigation Menu',
		  'secondary_nav' => 'Secondary Navigation Menu <br /> <small>Will only display if applicable header layout is selected <a href="'. admin_url('?page=redux_options&tab=4') .'">here</a>.</small>'
		)
	);
}	


//dropdown arrows
class Nectar_Arrow_Walker_Nav_Menu extends Walker_Nav_Menu {
    function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
        $id_field = $this->db_fields['id'];
        if (!empty($children_elements[$element->$id_field]) && $element->menu_item_parent == 0) { 
            $element->title =  $element->title . '<span class="sf-sub-indicator"><i class="icon-angle-down"></i></span>'; 
			$element->classes[] = 'sf-with-ul';
        }
		
		if (!empty($children_elements[$element->$id_field]) && $element->menu_item_parent != 0) { 
            $element->title =  $element->title . '<span class="sf-sub-indicator"><i class="icon-angle-right"></i></span>'; 
        }

        Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}


#-----------------------------------------------------------------#
# TGM
#-----------------------------------------------------------------#

require_once('nectar/tgm-plugin-activation/class-tgm-plugin-activation.php');
require_once('nectar/tgm-plugin-activation/required_plugins.php');

#-----------------------------------------------------------------#
# Nectar VC
#-----------------------------------------------------------------#

//load VC if not already active
if (!class_exists('WPBakeryVisualComposerAbstract')) {
  $dir = dirname(__FILE__) . '/wpbakery';
  $composer_settings = Array(
      'APP_ROOT'      => $dir . '/js_composer',
      'WP_ROOT'       => dirname( dirname( dirname( dirname($dir ) ) ) ). '/',
      'APP_DIR'       => basename( $dir ) . '/js_composer/',
      'CONFIG'        => $dir . '/js_composer/config/',
      'ASSETS_DIR'    => 'assets/',
      'COMPOSER'      => $dir . '/js_composer/composer/',
      'COMPOSER_LIB'  => $dir . '/js_composer/composer/lib/',
      'SHORTCODES_LIB'  => $dir . '/js_composer/composer/lib/shortcodes/',
      'USER_DIR_NAME'  => 'nectar/nectar-vc-addons/vc_templates', 
      'default_post_types' => Array('page','post','portfolio')
  );

  require_once locate_template('/wpbakery/js_composer/js_composer.php');
  $wpVC_setup->init($composer_settings);
  
}

//Add Nectar Functionality to VC
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function add_nectar_to_vc(){
		require_once locate_template('/nectar/nectar-vc-addons/nectar-addons.php');
	}
	add_action('init','add_nectar_to_vc', 5);
	add_action('admin_enqueue_scripts', 'nectar_vc_styles');
	
	function nectar_vc_styles() {
		wp_enqueue_style('nectar_vc', get_template_directory_uri() .'/nectar/nectar-vc-addons/nectar-addons.css', array(), time(), 'all');
	}
}



#-----------------------------------------------------------------#
# Ajax Search
#-----------------------------------------------------------------#

$ajax_search = (!empty($options['header-disable-ajax-search']) && $options['header-disable-ajax-search'] == '1') ? 'no' : 'yes';

if($ajax_search == 'yes'){
	require_once('nectar/assets/functions/ajax-search/wp-search-suggest.php');
}


#-----------------------------------------------------------------#
# Widget areas
#-----------------------------------------------------------------#
if(function_exists('register_sidebar')) {
	
	register_sidebar(array('name' => 'Blog Sidebar', 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget'  => '</div>', 'before_title'  => '<h4>', 'after_title'   => '</h4>'));
	register_sidebar(array('name' => 'Page Sidebar', 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget'  => '</div>', 'before_title'  => '<h4>', 'after_title'   => '</h4>'));
	register_sidebar(array('name' => 'WooCommerce Sidebar', 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget'  => '</div>', 'before_title'  => '<h4>', 'after_title'   => '</h4>'));
	
	register_sidebar(array('name' => 'Footer Area 1', 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget'  => '</div>', 'before_title'  => '<h4>', 'after_title'   => '</h4>'));
	register_sidebar(array('name' => 'Footer Area 2', 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget'  => '</div>', 'before_title'  => '<h4>', 'after_title'   => '</h4>'));
	
	global $options; 
	$footerColumns = (!empty($options['footer_columns'])) ? $options['footer_columns'] : '4';
	if($footerColumns == '3' || $footerColumns == '4'){
		register_sidebar(array('name' => 'Footer Area 3', 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget'  => '</div>', 'before_title'  => '<h4>', 'after_title'   => '</h4>'));
	}
	if($footerColumns == '4'){
		register_sidebar(array('name' => 'Footer Area 4', 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget'  => '</div>', 'before_title'  => '<h4>', 'after_title'   => '</h4>'));
	}
}

#-----------------------------------------------------------------#
# Custom widgets
#-----------------------------------------------------------------#

//Recent Posts Extra
include('includes/custom-widgets/recent-posts-extra-widget.php');

//Recent portfolio items
include('includes/custom-widgets/recent-projects-widget.php');

//allow shortcodes in text widget
add_filter('widget_text', 'do_shortcode');

#-----------------------------------------------------------------#
# Excerpt related 
#-----------------------------------------------------------------#


//excerpt length
function excerpt_length( $length ) {
	
	global $options;
	$excerpt_length = (!empty($options['blog_excerpt_length'])) ? intval($options['blog_excerpt_length']) : 30; 

    return $excerpt_length;
}

add_filter( 'excerpt_length', 'excerpt_length', 999 );

//custom excerpt ending
function excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'excerpt_more');

//fixing filtering for shortcodes
function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}

add_filter('the_content', 'shortcode_empty_paragraph_fix');


//remove the page jump when clicking read more button
function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');



#-----------------------------------------------------------------#
# Category Rel Fix
#-----------------------------------------------------------------#

function remove_category_list_rel( $output ) {
    // Remove rel attribute from the category list
    return str_replace( ' rel="category tag"', '', $output );
}
 
add_filter( 'wp_list_categories', 'remove_category_list_rel' );
add_filter( 'the_category', 'remove_category_list_rel' );

#-----------------------------------------------------------------#
# Search related 
#-----------------------------------------------------------------#

function change_wp_search_size($query) {
	if ( $query->is_search ) 
		$query->query_vars['posts_per_page'] = 12; 

	return $query; 
}
add_filter('pre_get_posts', 'change_wp_search_size');


#-----------------------------------------------------------------#
# Current Page Url
#-----------------------------------------------------------------#

function current_page_url() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

#-----------------------------------------------------------------#
# Options panel
#-----------------------------------------------------------------#

//load font functions
include("nectar/options/fonts.php");

if (is_admin()) {
	include('nectar/options/options-init.php');
}


#-----------------------------------------------------------------#
# Add multiple thumbnail support                         
#-----------------------------------------------------------------#
if ( floatval(get_bloginfo('version')) < "3.6") { 
	include("nectar/assets/functions/multi-post-thumbnails/multi-post-thumbnails.php");
}




#-----------------------------------------------------------------#
# Nectar love
#-----------------------------------------------------------------#

require_once ( 'nectar/love/nectar-love.php' );


#-----------------------------------------------------------------#
# Page meta
#-----------------------------------------------------------------# 

include("nectar/meta/page-meta.php");


#-----------------------------------------------------------------#
# Create admin slider section
#-----------------------------------------------------------------# 
function slider_register() {  
    
	$labels = array(
	 	'name' => __( 'Slides', 'taxonomy general name', NECTAR_THEME_NAME),
		'singular_name' => __( 'Slide', NECTAR_THEME_NAME),
		'search_items' =>  __( 'Search Slides', NECTAR_THEME_NAME),
		'all_items' => __( 'All Slides', NECTAR_THEME_NAME),
		'parent_item' => __( 'Parent Slide', NECTAR_THEME_NAME),
		'edit_item' => __( 'Edit Slide', NECTAR_THEME_NAME),
		'update_item' => __( 'Update Slide', NECTAR_THEME_NAME),
		'add_new_item' => __( 'Add New Slide', NECTAR_THEME_NAME),
	    'menu_name' => __( 'Home Slider', NECTAR_THEME_NAME)
	 );
	 
	 $homeslider_menu_icon = (floatval(get_bloginfo('version')) >= "3.8") ? 'dashicons-admin-home' : NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/icons/home-slider.png';
	 
	 $args = array(
			'labels' => $labels,
			'singular_label' => __('Home Slider', NECTAR_THEME_NAME),
			'public' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 10,
			'menu_icon' => $homeslider_menu_icon,
			'exclude_from_search' => true,
			'supports' => false
       );  
   
    register_post_type( 'home_slider' , $args );  
}  

add_action('init', 'slider_register');


#-----------------------------------------------------------------#
# Custom slider columns
#-----------------------------------------------------------------# 
 
add_filter('manage_edit-home_slider_columns', 'edit_columns_home_slider');  

function edit_columns_home_slider($columns){  
	$column_thumbnail = array( 'thumbnail' => 'Thumbnail' );
	$column_caption = array( 'caption' => 'Caption' );
	$columns = array_slice( $columns, 0, 1, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	$columns = array_slice( $columns, 0, 2, true ) + $column_caption + array_slice( $columns, 2, NULL, true );
	return $columns;
}  
  
  
add_action('manage_home_slider_posts_custom_column',  'home_slider_custom_columns', 10, 2);   

function home_slider_custom_columns($portfolio_columns, $post_id){  

	switch ($portfolio_columns) {
	    case 'thumbnail':
	        $thumbnail = get_post_meta($post_id, '_nectar_slider_image', true);
	        
	        if( !empty($thumbnail) ) {
	            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . $thumbnail . '" /></a>';
	        } else {
	            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/slider-default-thumb.jpg" /></a>' .
	                 '<strong><a class="row-title" href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit">No image added yet</a></strong>';
	        }
	    break; 
		
		case 'caption':
			$caption = get_post_meta($post_id, '_nectar_slider_caption', true);
	        echo $caption;
	    break;  
		
		   
		default:
			break;
	}  
}  


add_action( 'admin_menu', 'nectar_home_slider_ordering' );

function nectar_home_slider_ordering() {
	add_submenu_page(
		'edit.php?post_type=home_slider',
		'Order Slides',
		'Order', 
		'edit_pages', 'slide-order',
		'nectar_home_slider_order_page'
	);
}

function nectar_home_slider_order_page(){ ?>
	
	<div class="wrap">
		<h2>Sort Slides</h2>
		<p>Simply drag the slide up or down and they will be saved in that order.</p>
	<?php $slides = new WP_Query( array( 'post_type' => 'home_slider', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) ); ?>
	<?php if( $slides->have_posts() ) : ?>
		
		<?php wp_nonce_field( basename(__FILE__), 'nectar_meta_box_nonce' ); ?>
		
		<table class="wp-list-table widefat fixed posts" id="sortable-table">
			<thead>
				<tr>
					<th class="column-order">Order</th>
					<th class="manage-column column-thumbnail">Image</th>
					<th class="manage-column column-caption">Caption</th>
				</tr>
			</thead>
			<tbody data-post-type="home_slider">
			<?php while( $slides->have_posts() ) : $slides->the_post(); ?>
				<tr id="post-<?php the_ID(); ?>">
					<td class="column-order"><img src="<?php echo NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/sortable.png'; ?>" title="" alt="Move Icon" width="25" height="25" class="" /></td>
					<td class="thumbnail column-thumbnail">
						<?php 
						global $post;
						$thumbnail = get_post_meta($post->ID, '_nectar_slider_image', true);
	        
				        if( !empty($thumbnail) ) {
				           echo '<img class="slider-thumb" src="' . $thumbnail . '" />' ;
				        } 
				        else {
				            echo '<img class="slider-thumb" src="' . NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/slider-default-thumb.jpg" />' .
				                 '<strong>No image added yet</strong>';
				        } ?>
						
					</td>
					<td class="caption column-caption">
						<?php 
						$caption = get_post_meta($post->ID, '_nectar_slider_caption', true);
	        			echo $caption; ?>
					</td>
				</tr>
			<?php endwhile; ?>
			</tbody>
			<tfoot>
				<tr>
					<th class="column-order">Order</th>
					<th class="manage-column column-thumbnail">Image</th>
					<th class="manage-column column-caption">Caption</th>
				</tr>
			</tfoot>

		</table>

	<?php else: ?>

		<p>No slides found, why not <a href="post-new.php?post_type=home_slider">create one?</a></p>

	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

	</div><!-- .wrap -->
	
<?php }


add_action( 'admin_enqueue_scripts', 'home_slider_enqueue_scripts' );

function home_slider_enqueue_scripts() {
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'nectar-reorder', NECTAR_FRAMEWORK_DIRECTORY . 'assets/js/nectar-reorder.js' );
}


add_action( 'wp_ajax_nectar_update_slide_order', 'nectar_update_slide_order' );

//slide order ajax callback 
function nectar_update_slide_order() {
	
	    global $wpdb;
	 
	    $post_type     = $_POST['postType'];
	    $order        = $_POST['order'];
		
		if (  !isset($_POST['nectar_meta_box_nonce']) || !wp_verify_nonce( $_POST['nectar_meta_box_nonce'], basename( __FILE__ ) ) )
			return;
		
	    foreach( $order as $menu_order => $post_id ) {
	        $post_id         = intval( str_ireplace( 'post-', '', $post_id ) );
	        $menu_order     = intval($menu_order);
			
	        wp_update_post( array( 'ID' => stripslashes(htmlspecialchars($post_id)), 'menu_order' => stripslashes(htmlspecialchars($menu_order)) ) );
    	}
 
	    die( '1' );
}


//order the default home slider page correctly 
function set_home_slider_admin_order($wp_query) {  
  if (is_admin()) {  
  
    $post_type = $wp_query->query['post_type'];  
  
    if ( $post_type == 'home_slider') {  
   
      $wp_query->set('orderby', 'menu_order');  
      $wp_query->set('order', 'ASC');  
    }  
  }  
}  

add_filter('pre_get_posts', 'set_home_slider_admin_order'); 


#-----------------------------------------------------------------#
# Home slider meta
#-----------------------------------------------------------------# 

include("nectar/meta/home-slider-meta.php");






 


#-----------------------------------------------------------------#
# Create nectar slider section
#-----------------------------------------------------------------# 
function nectar_slider_register() {  
    
	$labels = array(
	 	'name' => __( 'Slides', 'taxonomy general name', NECTAR_THEME_NAME),
		'singular_name' => __( 'Slide', NECTAR_THEME_NAME),
		'search_items' =>  __( 'Search Slides', NECTAR_THEME_NAME),
		'all_items' => __( 'All Slides', NECTAR_THEME_NAME),
		'parent_item' => __( 'Parent Slide', NECTAR_THEME_NAME),
		'edit_item' => __( 'Edit Slide', NECTAR_THEME_NAME),
		'update_item' => __( 'Update Slide', NECTAR_THEME_NAME),
		'add_new_item' => __( 'Add New Slide', NECTAR_THEME_NAME),
	    'menu_name' => __( 'Nectar Slider', NECTAR_THEME_NAME)
	 );
	 
	 $nectarslider_menu_icon = (floatval(get_bloginfo('version')) >= "3.8") ? 'dashicons-star-empty' : NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/icons/nectar-slider.png';
	 
	 $args = array(
			'labels' => $labels,
			'singular_label' => __('Nectar Slider', NECTAR_THEME_NAME),
			'public' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 10,
			'menu_icon' => $nectarslider_menu_icon,
			'exclude_from_search' => true,
			'supports' => false
       );  
   
    register_post_type( 'nectar_slider' , $args );  
}  
 

$slider_locations_labels = array(
	'name' => __( 'Slider Locations', NECTAR_THEME_NAME),
	'singular_name' => __( 'Slider Location', NECTAR_THEME_NAME),
	'search_items' =>  __( 'Search Slider Locations', NECTAR_THEME_NAME),
	'all_items' => __( 'All Slider Locations', NECTAR_THEME_NAME),
	'edit_item' => __( 'Edit Slider Location', NECTAR_THEME_NAME),
	'update_item' => __( 'Update Slider Location', NECTAR_THEME_NAME),
	'add_new_item' => __( 'Add New Slider Location', NECTAR_THEME_NAME),
	'new_item_name' => __( 'New Slider Location', NECTAR_THEME_NAME),
    'menu_name' => __( 'Slider Locations', NECTAR_THEME_NAME)
); 	
 
register_taxonomy('slider-locations',
	array('nectar_slider'),
	array('hierarchical' => true,
    'labels' => $slider_locations_labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'slider-locations' )
));




add_action('init', 'nectar_slider_register'); 







#-----------------------------------------------------------------#
# Custom slider columns
#-----------------------------------------------------------------# 

add_filter('manage_edit-nectar_slider_columns', 'edit_columns_nectar_slider');  

function edit_columns_nectar_slider($columns){  
	$column_thumbnail = array( 'thumbnail' => 'Thumbnail' );
	$column_caption = array( 'caption' => 'Caption' );
	$columns = array_slice( $columns, 0, 1, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	$columns = array_slice( $columns, 0, 2, true ) + $column_caption + array_slice( $columns, 2, NULL, true );
	return $columns;
}  
  
  
add_action('manage_nectar_slider_posts_custom_column',  'nectar_slider_custom_columns', 10, 2);  

function nectar_slider_custom_columns($portfolio_columns, $post_id){  

	switch ($portfolio_columns) { 
	    case 'thumbnail':
			
			$background_type = get_post_meta($post_id, '_nectar_slider_bg_type', true);
			if($background_type == 'image_bg') {
				
				$thumbnail = get_post_meta($post_id, '_nectar_slider_image', true);
	        
		        if( !empty($thumbnail) ) {
		            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . $thumbnail . '" /></a>';
		        } else {
		            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/slider-default-thumb.jpg" /></a>' .
		                 '<strong><a class="row-title" href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit">No image added yet</a></strong>';
		        }
			} 

			else {
				 $thumbnail = get_post_meta($post_id, '_nectar_slider_preview_image', true);
	        
		        if( !empty($thumbnail) ) {
		            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . $thumbnail . '" /></a>';
		        } else {
		            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/slider-default-video-thumb.jpg" /></a>' .
		                 '<strong><a class="row-title" href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit">No video preview image added yet</a></strong>';
		        }
			}	
			
	        
	    break; 
		
		case 'caption':
			$caption = get_post_meta($post_id, '_nectar_slider_caption', true);
			$heading = get_post_meta($post_id, '_nectar_slider_heading', true);
	        echo '<h2>'.$heading.'</h2><p>'.$caption.'</p>';
	    break;  
		
		   
		default:
			break; 
	}  
}  


add_action( 'admin_menu', 'nectar_slider_ordering' );

function nectar_slider_ordering() {
	add_submenu_page(
		'edit.php?post_type=nectar_slider',
		'Order Slides',
		'Slide Ordering',
		'edit_pages', 'nectar-slide-order',
		'nectar_slider_order_page'
	);
}

function nectar_slider_order_page(){ ?>
	
	<div class="wrap" data-base-url="<?php echo admin_url('edit.php?post_type=nectar_slider&page=nectar-slide-order'); ?>">
		<h2>Sort Slides</h2>
		<p>Choose your slider location below and simply drag your slides up or down - they will automatically be saved in that order.</p>
		
	<?php 
	(isset($_GET['slider-location'])) ? $location = $_GET['slider-location'] : $location = false ;
	$slides = new WP_Query( array( 'post_type' => 'nectar_slider', 'slider-locations' => $location, 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) ); ?>
	<?php if( $slides->have_posts() ) : ?>
		
		<?php wp_nonce_field( basename(__FILE__), 'nectar_meta_box_nonce' );
		echo '<div class="slider-locations">'; 
		global $typenow;
	    $args=array( 'public' => true, '_builtin' => false ); 
	    $post_types = get_post_types($args);
	    if ( in_array($typenow, $post_types) ) {
	    $filters = get_object_taxonomies($typenow);
	        foreach ($filters as $tax_slug) {
	            $tax_obj = get_taxonomy($tax_slug);
	            wp_dropdown_categories(array(
	                'show_option_all' => 'Slider Locations',
	                'taxonomy' => $tax_slug,
	                'name' => $tax_obj->name,
	                //'orderby' => 'term_order',
	                'selected' => isset($location) ? $location : false,
	                'hierarchical' => $tax_obj->hierarchical,
	                'show_count' => false,
	                'hide_empty' => true
	            ));
	        } 
	    }
		echo '</div>';
		if(isset($location) && $location != false) { 
	    ?>
		
		<table class="wp-list-table widefat fixed posts" id="sortable-table">
			<thead>
				<tr>
					<th class="column-order">Order</th>
					<th class="manage-column column-thumbnail">Image</th>
					<th class="manage-column column-caption">Caption</th>
				</tr>
			</thead>
			<tbody data-post-type="nectar_slider">
			<?php while( $slides->have_posts() ) : $slides->the_post(); ?>
				<tr id="post-<?php the_ID(); ?>">
					<td class="column-order"><img src="<?php echo NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/sortable.png'; ?>" title="" alt="Move Icon" width="25" height="25" class="" /></td>
					<td class="thumbnail column-thumbnail">
						<?php 
						global $post;
						$post_id = $post->ID;
						
						$background_type = get_post_meta($post_id, '_nectar_slider_bg_type', true);
						if($background_type == 'image_bg') {
							
							$thumbnail = get_post_meta($post_id, '_nectar_slider_image', true);
				        
					        if( !empty($thumbnail) ) {
					            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . $thumbnail . '" /></a>';
					        } else {
					            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/slider-default-thumb.jpg" /></a>' .
					                 '<strong><a class="row-title" href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit">No image added yet</a></strong>';
					        }
						} 
			
						else {
							 $thumbnail = get_post_meta($post_id, '_nectar_slider_preview_image', true);
				        
					        if( !empty($thumbnail) ) {
					            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . $thumbnail . '" /></a>';
					        } else {
					            echo '<a href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit"><img class="slider-thumb" src="' . NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/slider-default-video-thumb.jpg" /></a>' .
					                 '<strong><a class="row-title" href="'.get_admin_url() . 'post.php?post=' . $post_id.'&action=edit">No video preview image added yet</a></strong>';
					        }
						}	 ?>
						
					</td>
					<td class="caption column-caption">
						<?php 
						$caption = get_post_meta($post->ID, '_nectar_slider_caption', true);
	        			echo $caption; ?>
					</td>
				</tr>
			<?php endwhile; ?>
			</tbody>
			<tfoot>
				<tr>
					<th class="column-order">Order</th>
					<th class="manage-column column-thumbnail">Image</th>
					<th class="manage-column column-caption">Caption</th>
				</tr>
			</tfoot>

		</table>
	<?php } ?>
	
	<?php else: ?>

		<p>No slides found, why not <a href="post-new.php?post_type=nectar_slider">create one?</a></p>

	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

	</div><!-- .wrap -->
	
<?php }


add_action( 'admin_enqueue_scripts', 'nectar_slider_enqueue_scripts' );

function nectar_slider_enqueue_scripts() {
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'nectar-reorder', NECTAR_FRAMEWORK_DIRECTORY . 'assets/js/nectar-reorder.js' );
	
	wp_register_script('chosen', get_template_directory_uri()  . '/nectar/tinymce/shortcode_generator/js/chosen/chosen.jquery.min.js', array('jquery'), time(), true);
	wp_register_style( 'chosen', get_template_directory_uri() .'/nectar/tinymce/shortcode_generator/css/chosen/chosen.css', array(), time(), 'all');
	
	wp_enqueue_style('chosen');
	wp_enqueue_script('chosen');
}


add_action( 'wp_ajax_nectar_update_slide_order', 'nectar_slider_update_order' );

//slide order ajax callback 
function nectar_slider_update_order() {
	
	    global $wpdb;
	 
	    $post_type     = $_POST['postType'];
	    $order        = $_POST['order'];
		
		if (  !isset($_POST['nectar_meta_box_nonce']) || !wp_verify_nonce( $_POST['nectar_meta_box_nonce'], basename( __FILE__ ) ) )
			return;
		
	    foreach( $order as $menu_order => $post_id ) {
	        $post_id         = intval( str_ireplace( 'post-', '', $post_id ) );
	        $menu_order     = intval($menu_order);
			
	        wp_update_post( array( 'ID' => stripslashes(htmlspecialchars($post_id)), 'menu_order' => stripslashes(htmlspecialchars($menu_order)) ) );
    	}
 
	    die( '1' );
}


//order the default nectar slider page correctly 
function set_nectar_slider_admin_order($wp_query) {  
  if (is_admin()) {  
  
    $post_type = $wp_query->query['post_type'];  
  
    if ( $post_type == 'nectar_slider') {  
   
      $wp_query->set('orderby', 'menu_order');  
      $wp_query->set('order', 'ASC');  
    }  
  }  
}  

add_filter('pre_get_posts', 'set_nectar_slider_admin_order'); 



function my_restrict_manage_posts() {
    global $typenow;
    $args = array( 'public' => true, '_builtin' => false ); 
    $post_types = get_post_types($args);
    if ( in_array($typenow, $post_types) ) {
    		
    	$filters = get_object_taxonomies($typenow);
		if($typenow != 'product'){
	        foreach ($filters as $tax_slug) {
	            $tax_obj = get_taxonomy($tax_slug);
	            wp_dropdown_categories(array(
	                'show_option_all' => __('Show All '.$tax_obj->label ),
	                'taxonomy' => $tax_slug,
	                'name' => $tax_obj->name,
	                //'orderby' => 'term_order',
	                'selected' => isset($_GET[$tax_obj->query_var]) ? $_GET[$tax_obj->query_var] : false,
	                'hierarchical' => $tax_obj->hierarchical,
	                'show_count' => false,
	                'hide_empty' => true
	            ));
	        }
		}

    }
}
function my_convert_restrict($query) {
    global $pagenow;
    global $typenow;
    if ($pagenow=='edit.php') {
        $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $var = &$query->query_vars[$tax_slug];
            if ( isset($var) ) {
                $term = get_term_by('id',$var,$tax_slug);
				if($term) $var = $term->slug; ;
            }
        }
    }
}
add_action('restrict_manage_posts', 'my_restrict_manage_posts' );
add_filter('parse_query','my_convert_restrict');


 

#-----------------------------------------------------------------#
# Nectar slider meta
#-----------------------------------------------------------------# 

include("nectar/meta/nectar-slider-meta.php");



#-----------------------------------------------------------------#
# Nectar slider display
#-----------------------------------------------------------------# 

$real_fs = 0;
 
function nectar_slider_display($config_arr){
	 
	 global $post;
	 global $options;
	 global $real_fs;
	 
	 //adding parallax wrapper if selected
	 if($config_arr['parallax'] == 'true') {

		 if( stripos( $post->post_content, '[nectar_slider') !== FALSE  && stripos( $post->post_content, '[nectar_slider') === 0  &&  $real_fs == 0) { $first_section = 'first-section';  $real_fs = 1; } else { $first_section = ''; }
   		
		 $slider = '<div style="height: '.$config_arr['slider_height'].'px" class="parallax_slider_outer '.$first_section.'">'; 
	 
	 } else { $slider = ''; }
	 
	 $boxed = (!empty($options['boxed_layout']) && $options['boxed_layout'] == '1') ? '1' : '0';
	if($config_arr['full_width'] == 'true' && $boxed != '1') {  $fullwidth = 'true'; }
	else if($config_arr['full_width'] == 'true' && $boxed == '1') { $fullwidth = 'boxed-full-width'; }
	else { $fullwidth = 'false'; }
	
	if($config_arr['parallax'] != 'true') {
	 	 if( stripos( $post->post_content, '[nectar_slider') !== FALSE  && stripos( $post->post_content, '[nectar_slider') === 0 && $real_fs == 0) { $first_section =  'first-section'; $real_fs = 1; } else { $first_section = ''; } 
		 
	 } else {
	 	
	 	 $first_section = ''; 
	 }
		  
		$slider .= '<div style="height: '.$config_arr['slider_height'].'px" data-fullscreen="'.$config_arr['fullscreen'].'" data-autorotate="'.$config_arr['autorotate'].'" data-parallax="'.$config_arr['parallax'].'" data-full-width="'.$fullwidth.'" class="nectar-slider-wrap '.$first_section.'" id="ns-id-'.uniqid().'">
		<div style="height: '.$config_arr['slider_height'].'px" class="swiper-container" data-loop="'.$config_arr['loop'].'" data-height="'. $config_arr["slider_height"] .'" data-arrows="' . $config_arr["arrow_navigation"].'" data-bullets="'.$config_arr["bullet_navigation"].'" data-desktop-swipe="'. $config_arr["desktop_swipe"].'" data-settings="">
			    <div class="swiper-wrapper">';
			     
			      $slide_count = 0;
				  
				  //get slider location by slug instead of raw name
				  $slider_terms = get_term_by('name',$config_arr['location'],'slider-locations');
		
			      //loop through and get all the slides in selected location
			      $slides = new WP_Query( array( 'post_type' => 'nectar_slider', 'slider-locations' => $slider_terms->slug, 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) ); 
				 
				  if( $slides->have_posts() ) :  while( $slides->have_posts() ) : $slides->the_post(); 
				  
					  global $post;
				  	  
					  $background_type = get_post_meta($post->ID, '_nectar_slider_bg_type', true);
					  $background_alignment = get_post_meta($post->ID, '_nectar_slider_slide_bg_alignment', true); 
					  
					  $slide_title = get_post_meta($post->ID, '_nectar_slider_heading', true);
					  
				      $slide_description = get_post_meta($post->ID, '_nectar_slider_caption', true);
					  $slide_description_wrapped = '<span>'.$slide_description.'</span>';
					  $slide_description_bg = get_post_meta($post->ID, '_nectar_slider_caption_background', true);
					  $caption_bg = ( $slide_description_bg == 'on') ? 'class="transparent-bg"' : '';
					   
					  $poster = get_post_meta($post->ID, '_nectar_slider_preview_image', true);
					  $poster_markup = (!empty($poster)) ? 'poster="'.$poster.'"' : null ;
					  
					  $x_pos = get_post_meta($post->ID, '_nectar_slide_xpos_alignment', true); 
				  	  $y_pos = get_post_meta($post->ID, '_nectar_slide_ypos_alignment', true);
					  
					  $link_type = get_post_meta($post->ID, '_nectar_slider_link_type', true);  
					  
					  $full_slide_link = get_post_meta($post->ID, '_nectar_slider_entire_link', true);
					  
					  $button_1_text = get_post_meta($post->ID, '_nectar_slider_button', true); 
					  $button_1_link = get_post_meta($post->ID, '_nectar_slider_button_url', true); 
					  $button_1_style = get_post_meta($post->ID, '_nectar_slider_button_style', true); 
					  $button_1_color = get_post_meta($post->ID, '_nectar_slider_button_color', true); 
				  	  
					  $button_2_text = get_post_meta($post->ID, '_nectar_slider_button_2', true); 
					  $button_2_link = get_post_meta($post->ID, '_nectar_slider_button_url_2', true); 
					  $button_2_style = get_post_meta($post->ID, '_nectar_slider_button_style_2', true); 
					  $button_2_color = get_post_meta($post->ID, '_nectar_slider_button_color_2', true); 
					  
				  	  $video_mp4 = get_post_meta($post->ID, '_nectar_media_upload_mp4', true);
					  $video_webm = get_post_meta($post->ID, '_nectar_media_upload_webm', true);
					  $video_ogv = get_post_meta($post->ID, '_nectar_media_upload_ogv', true); 
					  $video_texture = get_post_meta($post->ID, '_nectar_slider_video_texture', true);  
					  
					  $slide_image = get_post_meta($post->ID, '_nectar_slider_image', true); 
					  $img_bg = null; 
					  
					  $slide_color = get_post_meta($post->ID, '_nectar_slider_slide_font_color', true); 
					  
					  $custom_class = get_post_meta($post->ID, '_nectar_slider_slide_custom_class', true); 
					  $custom_css_class = (!empty($custom_class)) ? ' '.$custom_class : null;

					  if($background_type == 'image_bg') { $bg_img_markup = 'style="background-image: url('. $slide_image.');"'; } else { $bg_img_markup = null;}	
					  
					  (!empty($x_pos)) ? $x_pos_markup = $x_pos : $x_pos_markup = 'center';
					  (!empty($y_pos)) ? $y_pos_markup = $y_pos : $y_pos_markup = 'middle';
					  
					                         		                                             
				      $slider .= '<div class="swiper-slide'.$custom_css_class.'" '.$bg_img_markup.' data-bg-alignment="'.$background_alignment.'" data-color-scheme="'. $slide_color .'" data-x-pos="'.$x_pos_markup.'" data-y-pos="'.$y_pos_markup.'"> 
							';
							
							 if(!empty($slide_title) || !empty($slide_description) || !empty($button_1_text) || !empty($button_2_text)) {
							 	
								 $slider .= '<div class="container">
								<div class="content">';
	
									 if(!empty($slide_title)) { $slider .=  '<h2>'.$slide_title.'</h2>'; } 
									 if(!empty($slide_description)) { $slider .=  '<p '. $caption_bg.' >'. $slide_description_wrapped.'</p>'; } 
									

									   if($link_type == 'button_links' && !empty($button_1_text) || $link_type == 'button_links' && !empty($button_2_text)) { 
										$slider .= '<div class="buttons">';
											
											 if(!empty($button_1_text)) {
											 		
											 	$button_1_link = !empty($button_1_link) ? $button_1_link : '#';
												
												//check button link to see if it's a video or googlemap
												$link_extra = null;
												
												if(strpos($button_1_link, 'youtube.com/watch') !== false) $link_extra = 'pp '; 
												if(strpos($button_1_link, 'vimeo.com/') !== false) $link_extra = 'pp '; 
												if(strpos($button_1_link, 'maps.google.com/maps') !== false) $link_extra = 'map-popup '; 
												
											 	$slider .= 
											 	'<div class="button '.$button_1_style.'">
											 		 <a class="'.$link_extra .$button_1_color .'" href="'.$button_1_link.'">'.$button_1_text.'</a>
											 	 </div>';
											 } 
											 
											
											 if(!empty($button_2_text)) {
											 		
											 	$button_2_link = !empty($button_2_link) ? $button_2_link : '#';
												
												//check button link to see if it's a video or googlemap
												$link_extra = null;
												
												if(strpos($button_2_link, 'youtube.com/watch') !== false) $link_extra = 'pp '; 
												if(strpos($button_2_link, 'vimeo.com/') !== false) $link_extra = 'pp '; 
												if(strpos($button_2_link, 'maps.google.com/maps') !== false) $link_extra = 'map-popup '; 
												
											 	$slider .= 
											 	'<div class="button '.$button_2_style.'">
											 		 <a class="'.$link_extra . $button_2_color .'" href="'.$button_2_link.'">'.$button_2_text.'</a>
											 	 </div>';
											 }
											 
										$slider .= '</div>';
									 } 

								$slider .= '</div>
							</div><!--/container-->';
							
							}
	
							 if($background_type == 'video_bg') {
							 	
								$active_texture = ($video_texture == 'on') ? 'active_texture' : '';
								$slider .=  '<div class="video-texture '.$active_texture.'"></div>';
									 
								$slider .= '
								
								<div class="mobile-video-image" style="background-image: url('.$poster.')"></div>
								<div class="video-wrap">
									
									
									<video class="slider-video" width="1800" height="700" controls="controls" preload="auto" loop autoplay>';

									    if(!empty($video_webm)) { $slider .= '<source type="video/webm" src="'.$video_webm.'">'; }
									    if(!empty($video_mp4)) { $slider .= '<source type="video/mp4" src="'.$video_mp4.'">'; }
									    if(!empty($video_ogv)) { $slider .= '<source type="video/ogg" src="'. $video_ogv.'">'; }
									  
									   $slider .='<object width="320" height="240" type="application/x-shockwave-flash" data="'.get_template_directory_uri().'/js/flashmediaelement.swf">
									        <param name="movie" value="'.get_template_directory_uri().'/js/flashmediaelement.swf" />
									        <param name="flashvars" value="controls=true&file='.$video_mp4.'" />
									        <img src="'.$poster.'" width="1800" height="700" alt="No video playback capabilities" title="No video playback capabilities" />
									    </object>
									</video>
									
									
								</div>';
								
							} 
						
						if($link_type == 'full_slide_link' && !empty($full_slide_link)) {
								$slider .= '<a href="'. $full_slide_link.'" class="entire-slide-link"></a>';
						}
						
				     $slider .= '</div><!--/swiper-slide-->';
					
					 $slide_count ++; 
					 
			    endwhile; endif;
				
				wp_reset_query();
			    
			   $slider .= '</div>';

			      if($config_arr['arrow_navigation'] == 'true' && $slide_count > 1) {
				     $slider .= '<a href="" class="slider-prev"><i class="icon-salient-left-arrow"></i> <div class="slide-count"> <span class="slide-current">1</span> <i class="icon-salient-right-line"></i> <span class="slide-total"></span> </div> </a>
			     		<a href="" class="slider-next"><i class="icon-salient-right-arrow"></i> <div class="slide-count"> <span class="slide-current">1</span> <i class="icon-salient-right-line"></i> <span class="slide-total"></span> </div> </a>';
			       } 
				 
				 if($config_arr['bullet_navigation'] == 'true' && $slide_count > 1){ 
			     	$slider .= '<div class="slider-pagination"></div>';
			     }
			     
			$slider .= '<div class="nectar-slider-loading"></div> </div> 
			
		</div>';
	
	if($config_arr['parallax'] == 'true') { $slider .= '</div>'; }
	
	return $slider;

}










#-----------------------------------------------------------------#
# Create admin portfolio section
#-----------------------------------------------------------------# 
function portfolio_register() {  
    	 
	 $portfolio_labels = array(
	 	'name' => __( 'Portfolio', 'taxonomy general name', NECTAR_THEME_NAME),
		'singular_name' => __( 'Portfolio Item', NECTAR_THEME_NAME),
		'search_items' =>  __( 'Search Portfolio Items', NECTAR_THEME_NAME),
		'all_items' => __( 'Portfolio', NECTAR_THEME_NAME),
		'parent_item' => __( 'Parent Portfolio Item', NECTAR_THEME_NAME),
		'edit_item' => __( 'Edit Portfolio Item', NECTAR_THEME_NAME),
		'update_item' => __( 'Update Portfolio Item', NECTAR_THEME_NAME),
		'add_new_item' => __( 'Add New Portfolio Item', NECTAR_THEME_NAME)
	 );
	 
	 $options = get_option('salient'); 
     $custom_slug = null;		
	 
	 if(!empty($options['portfolio_rewrite_slug'])) $custom_slug = $options['portfolio_rewrite_slug'];
	
	 $portolfio_menu_icon = (floatval(get_bloginfo('version')) >= "3.8") ? 'dashicons-art' : NECTAR_FRAMEWORK_DIRECTORY . 'assets/img/icons/portfolio.png';
	
	 $args = array(
			'labels' => $portfolio_labels,
			'rewrite' => array('slug' => $custom_slug,'with_front' => false),
			'singular_label' => __('Project', NECTAR_THEME_NAME),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 9,
			'menu_icon' => $portolfio_menu_icon,
			'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions')  
       );  
  
    register_post_type( 'portfolio' , $args );  
}  
add_action('init', 'portfolio_register');


#-----------------------------------------------------------------#
# Add taxonomys attached to portfolio 
#-----------------------------------------------------------------# 

$category_labels = array(
	'name' => __( 'Project Categories', NECTAR_THEME_NAME),
	'singular_name' => __( 'Project Category', NECTAR_THEME_NAME),
	'search_items' =>  __( 'Search Project Categories', NECTAR_THEME_NAME),
	'all_items' => __( 'All Project Categories', NECTAR_THEME_NAME),
	'parent_item' => __( 'Parent Project Category', NECTAR_THEME_NAME),
	'edit_item' => __( 'Edit Project Category', NECTAR_THEME_NAME),
	'update_item' => __( 'Update Project Category', NECTAR_THEME_NAME),
	'add_new_item' => __( 'Add New Project Category', NECTAR_THEME_NAME),
    'menu_name' => __( 'Project Categories', NECTAR_THEME_NAME)
); 	

register_taxonomy("project-type", 
		array("portfolio"), 
		array("hierarchical" => true, 
				'labels' => $category_labels,
				'show_ui' => true,
    			'query_var' => true,
				'rewrite' => array( 'slug' => 'project-type' )
));

$attributes_labels = array(
	'name' => __( 'Project Attributes', NECTAR_THEME_NAME),
	'singular_name' => __( 'Project Attribute', NECTAR_THEME_NAME),
	'search_items' =>  __( 'Search Project Attributes', NECTAR_THEME_NAME),
	'all_items' => __( 'All Project Attributes', NECTAR_THEME_NAME),
	'parent_item' => __( 'Parent Project Attribute', NECTAR_THEME_NAME),
	'edit_item' => __( 'Edit Project Attribute', NECTAR_THEME_NAME),
	'update_item' => __( 'Update Project Attribute', NECTAR_THEME_NAME),
	'add_new_item' => __( 'Add New Project Attribute', NECTAR_THEME_NAME),
	'new_item_name' => __( 'New Project Attribute', NECTAR_THEME_NAME),
    'menu_name' => __( 'Project Attributes', NECTAR_THEME_NAME)
); 	

register_taxonomy('project-attributes',
	array('portfolio'),
	array('hierarchical' => true,
    'labels' => $attributes_labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project-attributes' )
));

#-----------------------------------------------------------------#
# Add multiple Post thumbnails
#-----------------------------------------------------------------# 

if ( floatval(get_bloginfo('version')) < "3.6" && class_exists('MultiPostThumbnails')) { 
	
	//Portfolio
	new MultiPostThumbnails( 
		array( 
			'label' => 'Second Image', 
			'id' => 'second-slide', 
			'post_type' => 'portfolio' 
		));
	new MultiPostThumbnails( 
		array( 
			'label' => 'Third Image', 
			'id' => 'third-slide', 
			'post_type' => 'portfolio' 
		));
	new MultiPostThumbnails( 
		array( 
			'label' => 'Fourth Image', 
			'id' => 'fourth-slide', 
			'post_type' => 'portfolio' 
		));
	new MultiPostThumbnails( 
		array( 
			'label' => 'Fifth Image', 
			'id' => 'fifth-slide', 
			'post_type' => 'portfolio' 
		));
	new MultiPostThumbnails( 
		array( 
			'label' => 'Sixth Image', 
			'id' => 'sixth-slide', 
			'post_type' => 'portfolio' 
		));
	
	//Posts
	new MultiPostThumbnails( 
		array( 
			'label' => 'Second Image', 
			'id' => 'second-slide', 
			'post_type' => 'post' 
		));
	new MultiPostThumbnails( 
		array( 
			'label' => 'Third Image', 
			'id' => 'third-slide', 
			'post_type' => 'post' 
		));
	new MultiPostThumbnails( 
		array( 
			'label' => 'Fourth Image', 
			'id' => 'fourth-slide', 
			'post_type' => 'post' 
		));
	new MultiPostThumbnails( 
		array( 
			'label' => 'Fifth Image', 
			'id' => 'fifth-slide', 
			'post_type' => 'post' 
		));
	new MultiPostThumbnails( 
		array( 
			'label' => 'Sixth Image', 
			'id' => 'sixth-slide', 
			'post_type' => 'post' 
		));
	
}



//utility function for nectar shortcode generator conditional
function is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}


//utility function for WPML duplicate content
if(defined('ICL_LANGUAGE_CODE')) {
	add_filter( 'icl_ls_languages', 'wmpl_duplicate_content_fix' );
	function wmpl_duplicate_content_fix( $languages ) {
		wp_reset_query();
		return $languages;
	}
}

#-----------------------------------------------------------------#
# Shortcodes - have to load after taxonomy/post type declarations
#-----------------------------------------------------------------#

function nectar_shortcode_init() {
 	
	if(is_admin()){

		if(is_edit_page()){
			//load nectar shortcode button
			require_once ( 'nectar/tinymce/tinymce-class.php' );		
		}
	}
}

add_action('init', 'nectar_shortcode_init');


//Add button to page
add_action('media_buttons','nectar_buttons',100);

function nectar_buttons() {
     echo "<a data-effect='mfp-zoom-in' class='button nectar-shortcode-generator' href='#nectar-sc-generator'><img src='".get_template_directory_uri()."/nectar/assets/img/icons/n.png' /> Nectar Shortcodes</a>";
}


//Shortcode Processing
require_once ( 'nectar/tinymce/shortcode-processing.php' );



#-----------------------------------------------------------------#
# Portfolio Meta
#-----------------------------------------------------------------# 

include("nectar/meta/portfolio-meta.php");


#-----------------------------------------------------------------#
# New category walker for portfolio filter
#-----------------------------------------------------------------# 

class Walker_Portfolio_Filter extends Walker_Category {
	
   function start_el(&$output, $category, $depth = 0, $args = array(), $current_object_id = 0) {

      extract($args);
      $cat_slug = esc_attr( $category->slug );
      $cat_slug = apply_filters( 'list_cats', $cat_slug, $category );
	  
      $link = '<li><a href="#" data-filter=".'.strtolower(preg_replace('/\s+/', '-', $cat_slug)).'">';
	  
	  $cat_name = esc_attr( $category->name );
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
	  	
      $link .= $cat_name;
	  
      if(!empty($category->description)) {
         $link .= ' <span>'.$category->description.'</span>';
      }
	  
      $link .= '</a>';
     
      $output .= $link;
       
   }
}


#-----------------------------------------------------------------#
# Function to get the page link back to all portfolio items
#-----------------------------------------------------------------#

function get_portfolio_page_link($post_id) {
    global $wpdb;
	
    $results = $wpdb->get_results("SELECT post_id FROM $wpdb->postmeta
    WHERE meta_key='_wp_page_template' AND meta_value='template-portfolio.php'");
    
	//safety net
    $page_id = null;
	 
    foreach ($results as $result) 
    {
        $page_id = $result->post_id;
    }
	
    return get_page_link($page_id);
} 



#-----------------------------------------------------------------#
# Function to get verify that the page has the portfolio layout assigned 
#-----------------------------------------------------------------#

function verify_portfolio_page($post_id) {
    global $wpdb;
	
    $result = $wpdb->get_results("SELECT post_id FROM $wpdb->postmeta
    WHERE meta_key='_wp_page_template' AND meta_value='template-portfolio.php' AND post_id='$post_id' LIMIT 1");
	
	if(!empty($result)) {
		return get_page_link($result[0]->post_id);
	} else {
		return null;
	}
} 


#-----------------------------------------------------------------#
# Function to find page that contains string
#-----------------------------------------------------------------#

function get_page_by_title_search($string){
    global $wpdb;
    $title = esc_sql($string); 
    if(!$title) return;
    $page = $wpdb->get_results("
        SELECT * 
        FROM $wpdb->posts
        WHERE post_title LIKE '%$title%'
        AND post_type = 'page' 
        AND post_status = 'publish'
        LIMIT 1
    ");
    return $page;
}


#-----------------------------------------------------------------#
# Post meta
#-----------------------------------------------------------------#

function enqueue_media(){
	
	//enqueue the correct media scripts for the media library 

	if ( floatval(get_bloginfo('version')) < "3.5" ) {
	    wp_enqueue_script(
	        'redux-opts-field-upload-js', 
	        Redux_OPTIONS_URL . 'fields/upload/field_upload_3_4.js', 
	        array('jquery', 'thickbox', 'media-upload'),
	        time(),
	        true
	    );
	    wp_enqueue_style('thickbox');// thanks to https://github.com/rzepak
	} else {
	    wp_enqueue_script(
	        'redux-opts-field-upload-js', 
	        Redux_OPTIONS_URL . 'fields/upload/field_upload.js', 
	        array('jquery'),
	        time(),
	        true
	    );
	    wp_enqueue_media();
	}
	
}

//post meta styling
function  nectar_metabox_styles() {
	wp_enqueue_style('nectar_meta_css', NECTAR_FRAMEWORK_DIRECTORY .'assets/css/nectar_meta.css','', '3.0.5');
}

//post meta scripts
function nectar_metabox_scripts() {
	wp_register_script('nectar-upload', NECTAR_FRAMEWORK_DIRECTORY .'assets/js/nectar-meta.js', array('jquery'), '3.0.5');
	wp_enqueue_script('nectar-upload');
	wp_localize_script('redux-opts-field-upload-js', 'redux_upload', array('url' => Redux_OPTIONS_URL .'fields/upload/blank.png'));
	
	if(floatval(get_bloginfo('version')) >= '3.5') {
	    wp_enqueue_style('wp-color-picker');
	    wp_enqueue_script(
	        'redux-opts-field-color-js',
	        NECTAR_FRAMEWORK_DIRECTORY . 'options/fields/color/field_color.js',
	        array('wp-color-picker'),
	        time(),
	        true
	    );
	} else {
	    wp_enqueue_script(
	        'redux-opts-field-color-js', 
	        NECTAR_FRAMEWORK_DIRECTORY . 'options/fields/color/field_color_farb.js', 
	        array('jquery', 'farbtastic'),
	        time(),
	        true
	    );
	}
	
}

add_action('admin_enqueue_scripts', 'nectar_metabox_scripts');
add_action('admin_print_styles', 'nectar_metabox_styles');
add_action('admin_print_styles', 'enqueue_media');


//post meta core functions
include("nectar/meta/meta-config.php");
include("nectar/meta/post-meta.php");


#-----------------------------------------------------------------#
# Post audio
#-----------------------------------------------------------------#

if ( !function_exists( 'nectar_audio' ) ) {
    function nectar_audio($postid) {
	
    	$mp3 = get_post_meta($postid, '_nectar_audio_mp3', TRUE);
    	$ogg = get_post_meta($postid, '_nectar_audio_ogg', TRUE);
    	
    ?>
		
    		<script type="text/javascript">
		
    			jQuery(document).ready(function($){
	
    				if( $().jPlayer ) {
    					$("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
    						ready: function () {
    							$(this).jPlayer("setMedia", {
    							    <?php if($mp3 != '') : ?>
    								mp3: "<?php echo $mp3; ?>",
    								<?php endif; ?>
    								<?php if($ogg != '') : ?>
    								oga: "<?php echo $ogg; ?>",
    								<?php endif; ?>
    								end: ""
    							});
    						},
    						<?php if( !empty($poster) ) { ?>
    						size: {
            				    width: "<?php echo $width; ?>px",
            				    height: "<?php echo $height . 'px'; ?>"
            				},
            				<?php } ?>
    						swfPath: "<?php echo get_template_directory_uri(); ?>/js",
    						cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
    						supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
    					});
					
    				}
    			});
    		</script>
		
    	    <div id="jquery_jplayer_<?php echo $postid; ?>" class="jp-jplayer jp-jplayer-audio"></div>

            <div class="jp-audio-container">
                <div class="jp-audio">
                    <div id="jp_interface_<?php echo $postid; ?>" class="jp-interface">
                        <ul class="jp-controls">
                            <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                            <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                            <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                            <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                        </ul>
                        <div class="jp-progress">
                            <div class="jp-seek-bar">
                                <div class="jp-play-bar"></div>
                            </div>
                        </div>
                        <div class="jp-volume-bar-container">
                            <div class="jp-volume-bar">
                                <div class="jp-volume-bar-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	<?php 
    }
}


#-----------------------------------------------------------------#
# Post video
#-----------------------------------------------------------------#

if ( !function_exists( 'nectar_video' ) ) {
    function nectar_video($postid) { 
	
    	$m4v = get_post_meta($postid, '_nectar_video_m4v', true);
    	$ogv = get_post_meta($postid, '_nectar_video_ogv', true);
    	$poster = get_post_meta($postid, '_nectar_video_poster', true);

    ?>
    <script type="text/javascript">
    	jQuery(document).ready(function($){
		
    		if( $().jPlayer ) {
    			$("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
    				ready: function () {
    					$(this).jPlayer("setMedia", {
    						<?php if($m4v != '') : ?>
    						m4v: "<?php echo $m4v; ?>",
    						<?php endif; ?>
    						<?php if($ogv != '') : ?>
    						ogv: "<?php echo $ogv; ?>",
    						<?php endif; ?>
    						<?php if ($poster != '') : ?>
    						poster: "<?php echo $poster; ?>"
    						<?php else: ?>
    						poster: "<?php echo get_template_directory_uri().'/img/no-video-img.png'; ?>"
    						<?php endif; ?>
    					});
    				},
    				size: {
			          width: "100%",
			          height: "auto"
			        },
    				swfPath: "<?php echo get_template_directory_uri(); ?>/js",
    				cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
    				supplied: "<?php if($m4v != '') : ?>m4v, <?php endif; ?><?php if($ogv != '') : ?>ogv, <?php endif; ?> all"
    			});
    		}
    	});
    </script>

    <div id="jquery_jplayer_<?php echo $postid; ?>" class="jp-jplayer jp-jplayer-video"> <img src="<?php echo get_template_directory_uri().'/img/no-video-img.png'; ?>" alt="video" /> </div>

    <div class="jp-video-container">
        <div class="jp-video">
            <div id="jp_interface_<?php echo $postid; ?>" class="jp-interface">
                <ul class="jp-controls">
                	<li><div class="seperator-first"></div></li>
                    <li><div class="seperator-second"></div></li>
                    <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                    <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                    <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
                    <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                </ul>
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-volume-bar-container">
                    <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php }
}

//default video size
$content_width = 1080;

#-----------------------------------------------------------------#
# Post gallery
#-----------------------------------------------------------------#

if ( !function_exists( 'nectar_gallery' ) ) {
    function nectar_gallery($postid) {  
	        
	    if (class_exists('MultiPostThumbnails')) { ?>
		   
		  <div class="flex-gallery"> 
		  	  <ul class="slides">
			    <?php if ( has_post_thumbnail() ) { echo '<li>' . get_the_post_thumbnail($postid, 'full', array('title' => '')) . '</li>'; } ?>
			   
			    <?php 
				   if(MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'second-slide')) { echo '<li>' . MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'second-slide') . '</li>'; }
				   if(MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'third-slide')) { echo '<li>' . MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'third-slide') . '</li>'; }
				   if(MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'fourth-slide')) { echo '<li>' . MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'fourth-slide') . '</li>'; }
				   if(MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'fifth-slide')) { echo '<li>' . MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'fifth-slide') . '</li>'; }
				   if(MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'sixth-slide')) { echo '<li>' . MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'sixth-slide') . '</li>'; }
		   	    ?>
		   	   
		   	   </ul>
		   </div><!--/gallery-->
		<?php } 
    	
    }
    
}

/** Grab IDs from new WP 3.5 gallery **/
function grab_ids_from_gallery() {
	global $post;
	
	if($post != null) {
		
		$attachment_ids = array();  
		$pattern = get_shortcode_regex();
		$ids = array();
		$portfolio_extra_content = get_post_meta($post->ID, '_nectar_portfolio_extra_content', true);
		
		if (preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches ) ) {   //finds the "gallery" shortcode and puts the image ids in an associative array at $matches[3]
			$count=count($matches[3]);      //in case there is more than one gallery in the post.
			for ($i = 0; $i < $count; $i++){
				$atts = shortcode_parse_atts( $matches[3][$i] );
				if ( isset( $atts['ids'] ) ){
					$attachment_ids = explode( ',', $atts['ids'] );
					$ids = array_merge($ids, $attachment_ids);
				}
			}
		}
	
		if (preg_match_all( '/'. $pattern .'/s', $portfolio_extra_content, $matches ) ) {   
			$count=count($matches[3]);     
			for ($i = 0; $i < $count; $i++){
				$atts = shortcode_parse_atts( $matches[3][$i] );
				if ( isset( $atts['ids'] ) ){
					$attachment_ids = explode( ',', $atts['ids'] );
					$ids = array_merge($ids, $attachment_ids);
				}
			}
		}
	return $ids;
  } else {
  	$ids = array();
  	return $ids;
  }


}

add_action( 'wp', 'grab_ids_from_gallery' );





/*Previous and Next Post in Same Taxonomy*/
/*Author: Bill Erickson*/

function be_get_previous_post($in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	return be_get_adjacent_post($in_same_cat, $excluded_categories, true, $taxonomy);
}

function be_get_next_post($in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	return be_get_adjacent_post($in_same_cat, $excluded_categories, false, $taxonomy);
}


function be_get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true, $taxonomy = 'category' ) {
	global $post, $wpdb;

	if ( empty( $post ) )
		return null;

	$current_post_date = $post->post_date;

	$join = '';
	$posts_in_ex_cats_sql = '';
	if ( $in_same_cat || ! empty( $excluded_categories ) ) {
		$join = " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";

		if ( $in_same_cat ) {
			$cat_array = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
			$join .= " AND tt.taxonomy = '$taxonomy' AND tt.term_id IN (" . implode(',', $cat_array) . ")";
		}

		$posts_in_ex_cats_sql = "AND tt.taxonomy = '$taxonomy'";
		if ( ! empty( $excluded_categories ) ) {
			if ( ! is_array( $excluded_categories ) ) {
				// back-compat, $excluded_categories used to be IDs separated by " and "
				if ( strpos( $excluded_categories, ' and ' ) !== false ) {
					_deprecated_argument( __FUNCTION__, '3.3', sprintf( __( 'Use commas instead of %s to separate excluded categories.' ), "'and'" ) );
					$excluded_categories = explode( ' and ', $excluded_categories );
				} else {
					$excluded_categories = explode( ',', $excluded_categories );
				}
			}

			$excluded_categories = array_map( 'intval', $excluded_categories );
				
			if ( ! empty( $cat_array ) ) {
				$excluded_categories = array_diff($excluded_categories, $cat_array);
				$posts_in_ex_cats_sql = '';
			}

			if ( !empty($excluded_categories) ) {
				$posts_in_ex_cats_sql = " AND tt.taxonomy = '$taxonomy' AND tt.term_id NOT IN (" . implode($excluded_categories, ',') . ')';
			}
		}
	}

	$adjacent = $previous ? 'previous' : 'next';
	$op = $previous ? '<' : '>';
	$order = $previous ? 'DESC' : 'ASC';

	$join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
	$where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type = %s AND p.post_status = 'publish' $posts_in_ex_cats_sql", $current_post_date, $post->post_type), $in_same_cat, $excluded_categories );
	$sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

	$query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
	$query_key = 'adjacent_post_' . md5($query);
	$result = wp_cache_get($query_key, 'counts');
	if ( false !== $result )
		return $result;

	$result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
	if ( null === $result )
		$result = '';

	wp_cache_set($query_key, $result, 'counts');
	return $result;
}


function be_previous_post_link($format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	be_adjacent_post_link($format, $link, $in_same_cat, $excluded_categories, true, $taxonomy);
}


function be_next_post_link($format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '', $taxonomy = 'category') {
	be_adjacent_post_link($format, $link, $in_same_cat, $excluded_categories, false, $taxonomy);
}


function be_adjacent_post_link($format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true, $taxonomy = 'category') {
	if ( $previous && is_attachment() )
		$post = & get_post($GLOBALS['post']->post_parent);
	else
		$post = be_get_adjacent_post($in_same_cat, $excluded_categories, $previous, $taxonomy);

	if ( !$post )
		return;

	$title = $post->post_title;

	if ( empty($post->post_title) )
		$title = $previous ? __('Previous Post') : __('Next Post');

	$title = apply_filters('the_title', $title, $post->ID);
	$date = mysql2date(get_option('date_format'), $post->post_date);
	$rel = $previous ? 'prev' : 'next';

	$string = '<a href="'.get_permalink($post).'" rel="'.$rel.'">';
	$link = str_replace('%title', $title, $link);
	$link = str_replace('%date', $date, $link);
	$link = $string . $link . '</a>';

	$format = str_replace('%link', $link, $format);

	$adjacent = $previous ? 'previous' : 'next';
	echo apply_filters( "{$adjacent}_post_link", $format, $link );
}





#-----------------------------------------------------------------#
# Custom page header
#-----------------------------------------------------------------# 

if ( !function_exists( 'nectar_page_header' ) ) {
    function nectar_page_header($postid) {
		
		global $options;
		global $post;
		
    	$bg = get_post_meta($postid, '_nectar_header_bg', true);
		$parallax_bg = get_post_meta($postid, '_nectar_header_parallax', true);
    	$title = get_post_meta($postid, '_nectar_header_title', true);
    	$subtitle = get_post_meta($postid, '_nectar_header_subtitle', true);
		$height = get_post_meta($postid, '_nectar_header_bg_height', true); 
		$page_template = get_post_meta($postid, '_wp_page_template', true); 
		$display_sortable = get_post_meta($postid, 'nectar-metabox-portfolio-display-sortable', true);
		$inline_filters = (!empty($options['portfolio_inline_filters']) && $options['portfolio_inline_filters'] == '1') ? '1' : '0';
		$filters_id = (!empty($options['portfolio_inline_filters']) && $options['portfolio_inline_filters'] == '1') ? 'portfolio-filters-inline' : 'portfolio-filters';

		(!empty($display_sortable) && $display_sortable == 'on') ? $display_sortable = '1' : $display_sortable = '0';
		
		//incase no title is entered for portfolio, still show the filters
		if( $page_template == 'template-portfolio.php' && empty($title)) $title = get_the_title($post->ID);
			
		if( !empty($bg) ) {  
    ?>
    	<?php if(!empty($parallax_bg) && $parallax_bg == 'on') { echo '<div id="page-header-wrap">'; } ?>
	    <div class="not-loaded" id="page-header-bg" data-parallax="<?php echo (!empty($parallax_bg) && $parallax_bg == 'on') ? '1' : '0'; ?>" data-height="<?php echo (!empty($height)) ? $height : '350'; ?>" style="background-image: url(<?php echo $bg; ?>); height: <?php echo $height;?>px;">
			<div class="container">	
				<div class="row">
					<div class="col span_6">
						<h1><?php echo $title; ?></h1>
						<span class="subheader"><?php echo $subtitle; ?></span>
					</div>
					 
					<?php // portfolio filters
						if( $page_template == 'template-portfolio.php' && $display_sortable == '1' && $inline_filters == '0') { ?>
						<div id="<?php echo $filters_id;?>">
								<a href="#" data-sortable-label="<?php echo (!empty($options['portfolio-sortable-text'])) ? $options['portfolio-sortable-text'] :'Sort Portfolio'; ?>" id="sort-portfolio"><span><?php echo (!empty($options['portfolio-sortable-text'])) ? $options['portfolio-sortable-text'] : __('Sort Portfolio',NECTAR_THEME_NAME); ?></span> <i class="icon-angle-down"></i></a> 
							<ul>
							   <li><a href="#" data-filter="*"><?php echo __('All', NECTAR_THEME_NAME); ?></a></li>
			               	   <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'project-type', 'show_option_none'   => '', 'walker' => new Walker_Portfolio_Filter())); ?>
							</ul>
						</div>
					<?php } ?>
					
				</div>
			</div>
		</div>
	   <?php if(!empty($parallax_bg) && $parallax_bg == 'on') { echo '</div>'; } ?>
		
	    <?php } else if( !empty($title)) { ?>
	    	
		    <div class="row page-header-no-bg">
		    	<div class="container">	
					<div class="col span_12 section-title">
						<h1><?php echo $title; ?><?php if(!empty($subtitle)) echo '<span>' . $subtitle . '</span>'; ?></h1>
						
						<?php // portfolio filters
						if( $page_template == 'template-portfolio.php' && $display_sortable == '1' && $inline_filters == '0') { ?>
						<div id="<?php echo $filters_id;?>">
							
							<a href="#" data-sortable-label="<?php echo (!empty($options['portfolio-sortable-text'])) ? $options['portfolio-sortable-text'] :'Sort Portfolio'; ?>" id="sort-portfolio"><span><?php echo (!empty($options['portfolio-sortable-text'])) ? $options['portfolio-sortable-text'] : __('Sort Portfolio',NECTAR_THEME_NAME); ?></span> <i class="icon-angle-down"></i></a> 
							
							<ul>
							   <li><a href="#" data-filter="*"><?php echo __('All', NECTAR_THEME_NAME); ?></a></li>
			               	   <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'project-type', 'show_option_none'   => '', 'walker' => new Walker_Portfolio_Filter())); ?>
							</ul>
						</div>
					<?php } ?>
						
					</div>
				</div>
			</div>
	    	
	   <?php }
		 
    }
}


#-----------------------------------------------------------------#
# Pagination
#-----------------------------------------------------------------#

if ( !function_exists( 'nectar_pagination' ) ) {
	
	function nectar_pagination() {
		
		global $options;
		//extra pagination
		if( !empty($options['extra_pagination']) && $options['extra_pagination'] == '1' ){
			    global $wp_query;  
      
			    $total_pages = $wp_query->max_num_pages;  
			      
			    if ($total_pages > 1){  
			      
			      $current_page = max(1, get_query_var('paged'));  
			      
				  echo '<div id="pagination">';
				   
			      echo paginate_links(array(  
			          'base' => get_pagenum_link(1) . '%_%',  
			          'format' => '/page/%#%',  
			          'current' => $current_page,  
			          'total' => $total_pages,  
			        )); 
					
				  echo  '</div>'; 
					
			    }  
		}
		//regular pagination
		else{
			
			if( get_next_posts_link() || get_previous_posts_link() ) { 
				echo '<div id="pagination">
				      <div class="prev">'.get_previous_posts_link('&laquo; Previous Entries').'</div>
				      <div class="next">'.get_next_posts_link('Next Entries &raquo;','').'</div>
			          </div>';
			
	        }
		}
		
	
	}
}



#-----------------------------------------------------------------#
# Woocommerce
#-----------------------------------------------------------------#

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'salient_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'salient_theme_wrapper_end', 10);

function salient_theme_wrapper_start() {
    echo '<div class="container main-content">';
}

function salient_theme_wrapper_end() {
    echo '</div>';
}

add_theme_support( 'woocommerce' );

 

add_filter('add_to_cart_fragments', 'add_to_cart_fragment');


// update the cart with ajax
function add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	$fragments['a.cart-parent'] = ob_get_clean();
	return $fragments;
}


//change summary html markup to fit responsive
add_action( 'woocommerce_before_single_product_summary', 'summary_div', 35);
add_action( 'woocommerce_after_single_product_summary',  'close_div', 4);
function summary_div() {
	echo "<div class='span_7 col col_last single-product-summary'>";
}
function close_div() {
	echo "</div>";
}

//change tab position to be inside summary
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 1);	


//wrap single product image in an extra div
add_action( 'woocommerce_before_single_product_summary', 'images_div', 2);
add_action( 'woocommerce_before_single_product_summary',  'close_div', 20);
function images_div()
{
	echo "<div class='span_5 col single-product-main-image'>";
}


// display upsells and related products within dedicated div with different column and number of products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

function woocommerce_output_related_products() {
	$output = null;

	ob_start();
	woocommerce_related_products(4,4); 
	$content = ob_get_clean();
	if($content) { $output .= $content; }

	echo '<div class="clear"></div>' . $output;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display',10);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 21);

function woocommerce_output_upsells() {

	$output = null;

	ob_start();
	woocommerce_upsell_display(4,4); 
	$content = ob_get_clean(); 
	if($content) { $output .= $content; }

	echo $output;
}


add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
	 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start(); ?>
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><div class="cart-icon-wrap"><i class="icon-salient-cart"></i> <div class="cart-wrap"><span><?php echo $woocommerce->cart->cart_contents_count; ?> </span></div> </div></a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}


//chnge how many products are displayed per page	
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

//change the position of add to cart
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action('woocommerce_before_shop_loop_item_title', 'product_thumbnail_with_cart', 10 );

function product_thumbnail_with_cart() { ?>
	
   <div class="product-wrap">
	   	<?php 
	   	echo  woocommerce_get_product_thumbnail(); 
	   	woocommerce_get_template( 'loop/add-to-cart.php' ); ?>
   	</div>
<?php 
}

//add link to item titles
add_action('woocommerce_before_shop_loop_item_title','product_item_title_link_open');
add_action('woocommerce_after_shop_loop_item_title','product_item_title_link_close');
function product_item_title_link_open(){
	echo '<a href="'.get_permalink().'">';
}
function product_item_title_link_close(){
	echo '</a>';
}


add_action( 'woocommerce_single_product_summary', 'review_quickview', 7 );
function review_quickview(){
	global $product, $options;
	
	/*$rating_count = $product->get_rating_count();
	
	if(!empty($rating_count)) {
	
		echo '<div class="review_num">'.sprintf( _n('%s review %s', '%s reviews %s', $rating_count, 'woocommerce'), '<span itemprop="ratingCount" class="count">'. $rating_count .'</span>', '' ).'</div>';
		echo '<div class="quick_rating">';
		woocommerce_get_template( 'loop/rating.php' );
		echo '</div>';
		 
	} */ ?>
		
		<div id="single-meta" data-sharing="<?php echo ( !empty($options['woo_social']) && $options['woo_social'] == 1 ) ? '1' : '0'; ?>">

			<?php
			// portfolio social sharting icons
			if( !empty($options['woo_social']) && $options['woo_social'] == 1 ) {
				
				echo '<div class="nectar-social woo">';
				
				//facebook
				if(!empty($options['woo-facebook-sharing']) && $options['woo-facebook-sharing'] == 1) {
					echo "<a class='facebook-share nectar-sharing' href='#' title='Share this'> <i class='icon-facebook'></i> <span class='count'></span></a>";
				}
				//twitter
				if(!empty($options['woo-twitter-sharing']) && $options['woo-twitter-sharing'] == 1) {
					echo "<a class='twitter-share nectar-sharing' href='#' title='Tweet this'> <i class='icon-twitter'></i> <span class='count'></span></a>";
				}
				//pinterest
				if(!empty($options['woo-pinterest-sharing']) && $options['woo-pinterest-sharing'] == 1) {
					echo "<a class='pinterest-share nectar-sharing' href='#' title='Pin this'> <i class='icon-pinterest'></i> <span class='count'></span></a>";
				}
				
				echo '</div>';
			}
			
			?> 
		
		</div> 
<?php 
															
}

// Image sizes
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'nectar_woocommerce_image_dimensions', 1 );
 

// Define image sizes 
function nectar_woocommerce_image_dimensions() {
	$catalog = array(
		'width' => '258',	
		'height'	=> '275',	
		'crop'	=> 1 
	);
	 
	$single = array(
		'width' => '600',	
		'height'	=> '630',	
		'crop'	=> 1 
	);
	 
	$thumbnail = array(
		'width' => '100',	
		'height'	=> '100',	
		'crop'	=> 1 
	);
	 
	
	update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
	update_option( 'shop_single_image_size', $single ); // Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
}




// Open Graph

function add_opengraph() {
	global $post; // Ensures we can use post variables outside the loop

	// Start with some values that don't change.
	echo "<meta property='og:site_name' content='". get_bloginfo('name') ."'/>"; // Sets the site name to the one in your WordPress settings
	echo "<meta property='og:url' content='" . get_permalink() . "'/>"; // Gets the permalink to the post/page

	if (is_singular()) { // If we are on a blog post/page
        echo "<meta property='og:title' content='" . get_the_title() . "'/>"; // Gets the page title
        echo "<meta property='og:type' content='article'/>"; // Sets the content type to be article.
    } elseif(is_front_page() or is_home()) { // If it is the front page or home page
    	echo "<meta property='og:title' content='" . get_bloginfo("name") . "'/>"; // Get the site title
    	echo "<meta property='og:type' content='website'/>"; // Sets the content type to be website.
    }

	if(has_post_thumbnail( $post->ID )) { // If the post has a featured image.
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
		echo "<meta property='og:image' content='" . esc_attr( $thumbnail[0] ) . "'/>"; // If it has a featured image, then display this for Facebook
	} 

}


if ( !defined('WPSEO_VERSION') && !class_exists('NY_OG_Admin')) {
	add_action( 'wp_head', 'add_opengraph', 5 );
}


?>