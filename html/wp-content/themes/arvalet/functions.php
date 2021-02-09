<?php
require_once( 'extra/adelio.php' );
require_once( 'extra/extra.php' );
require_once( 'extra/actions.php' );

function adelio_init() {
	// let's get language support going, if you need it
	load_theme_textdomain( 'adelio', get_template_directory() . '/library/translation' );

	// launching operation cleanup
	add_action( 'init', 'adelio_head_cleanup' );
	// A better title
	add_filter( 'wp_title', 'rw_title', 10, 3 );
	// remove WP version from RSS
	add_filter( 'the_generator', 'adelio_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'adelio_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'adelio_remove_recent_comments_style', 1 );

	// enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'adelio_scripts_and_styles', 999 );
	// ie conditional wrapper

	adelio_custom_image_sizes();

	adelio_theme_support();
}

// let's get this party started
add_action( 'after_setup_theme', 'adelio_init' );

/**
 * Custom functions
 */

if( ! function_exists('editor_set_roles')) :
    function editor_set_roles()
    {
        global $wp_roles;

        $wp_roles->add_cap('editor','edit_theme_options');
    }
endif;

add_action('after_setup_theme', 'editor_set_roles');



/**
 * Sitemap
 */
function get_html_sitemap( $atts ){

	$return = '';
	$args = array('public'=>1);

// If you would like to ignore some post types just add them to the array below
	$ignoreposttypes = array('attachment');

	$post_types = get_post_types( $args, 'objects' );

	foreach ( $post_types as $post_type ) {
		if( !in_array($post_type->name,$ignoreposttypes)){
			$return .= '<h2>' . $post_type->labels->name.'</h2>';
			$args = array(
				'posts_per_page'   => -1,
				'post_type'        => $post_type->name,
				'post_status'      => 'publish'
			);
			$posts_array = get_posts( $args );
			$return .=  '<ul class="sitemap">';
			foreach($posts_array as $pst){
				$return .=  '<li><a href="'.get_permalink($pst->ID).'">'.$pst->post_title.'</a></li>';
			}
			$return .=  '</ul>';
		}
	}

	return $return;
}
add_shortcode( 'htmlSitemap', 'get_html_sitemap' );

// empty p tags in wyswig acf


?>

