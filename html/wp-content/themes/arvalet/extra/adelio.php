<?php
if ( ! function_exists( 'adelio_get_manifest_asset' ) ) :
	/**
	 * Serve theme styles via a hashed filename instead of WordPress' default style.css.
	 *
	 * Checks for a hashed filename as a value in a JSON object.
	 * If it exists: the hashed filename is enqueued in place of style.css.
	 * Fallback: the default style.css will be passed through.
	 *
	 * @param string $asset is WordPress’ required, known location for CSS: style.css
	 * @return string The asset manifest file
	 */
	function adelio_get_manifest_asset( $asset ) {
		$map = get_template_directory() . '/dist/adelio-manifest.json';
		$manifest_obj = new SplFileObject( $map );
		if ( $manifest_obj->isFile() ) {
			$manifest_json = $manifest_obj->fread( $manifest_obj->getSize() );
			$manifest = json_decode( $manifest_json, true );
			if ( is_array( $manifest ) && isset( $manifest[ $asset ] ) ) {
				return $manifest[ $asset ];
			}
		}
		return $asset;
	}
endif;

/*********************
 * SCRIPTS & ENQUEUEING
 *********************/
function adelio_scripts_and_styles() {

	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	if ( ! is_admin() ) {
		// deregister jquery
		wp_deregister_script('jquery');

		// register main stylesheet
		wp_register_style( 'adelio-stylesheet', get_template_directory_uri() . '/dist/' . adelio_get_manifest_asset( 'main.css' ), array(), null, 'all' );
		wp_enqueue_script( 'bundle', get_stylesheet_directory_uri() . '/dist/' . adelio_get_manifest_asset( 'main.js' ), '', null, true );
		wp_enqueue_style( 'adelio-stylesheet' );
	}
}

function adelio_custom_image_sizes()
{
	add_image_size('team', 270, 270, true);

	add_image_size('gallery-3', 368, 368, true);

	add_image_size('gallery-2', 558, 558, true);

	add_image_size('experts-icon', 55, 55, true);

	add_image_size('brands', 228, 228, false);

	add_image_size('content-desk', 586, 382, true);
	add_image_size('content-mobile', 280, 182, true);


	add_image_size('hero-slider-mobile-x1', 375, 520, array('center', 'center'));
	add_image_size('hero-slider-mobile-x2', 750, 1040, array('center', 'center'));

	add_image_size('hero-slider-x1', 1900, 520, array('center', 'center'));
	add_image_size('hero-slider-x2', 3800, 1040, array('center', 'center'));

    add_image_size('hero-image-mobile-x1', 375, 200, array('center', 'center'));
    add_image_size('hero-image-mobile-x2', 750, 400, array('center', 'center'));

	add_image_size('hero-image-x1', 1900, 200, array('center', 'center'));
	add_image_size('hero-image-x2', 3800, 400, array('center', 'center'));

	add_image_size('slider', 270, 150, true);
	//add_image_size('slider-desktop', 383, 383, true);

	//

	// add_image_size('box-image-x1', 350, 300, array('center', 'center'));

	// add_image_size('content-x1', 550, 500, array('center', 'center'));

	// add_image_size('content-x1-horizontal', 570, 260, array('center', 'center'));

	// add_image_size('content-x1-narrow', 370, 480, array('center', 'center'));

	// add_image_size('content-x1-narrow-small', 370, 360, array('center', 'center'));

	// add_image_size('content-x1-wide', 750, 680, array('center', 'center'));

	// add_image_size('content-x1-wide-small', 750, 360, array('center', 'center'));


	// add_image_size('carousel-background', 1270, 730, false );

	// add_image_size('lightbox-thumbnail', 383, 383, true );
	// add_image_size('lightbox', 795, 450, false );

	// add_image_size('gallery', 587, 298, false );

	//add_image_size('slider-desktop', 383, 383, true);
}

function adelio_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'adelio_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'adelio_remove_wp_ver_css_js', 9999 );

}

function rw_title( $title, $sep, $seplocation ) {
	global $page, $paged;

	// Don't affect in feeds.
	if ( is_feed() ) {
		return $title;
	}

	// Add the blog's name
	if ( 'right' == $seplocation ) {
		$title .= get_bloginfo( 'name' );
	} else {
		$title = get_bloginfo( 'name' ) . $title;
	}

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " {$sep} {$site_description}";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
	}

	return $title;

}

function adelio_rss_version() {
	return '';
}

function adelio_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;
}

function adelio_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

function adelio_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
}

function adelio_gallery_style( $css ) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

function adelio_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size( 125, 125, true );

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
		array(
			'default-image'          => '',    // background image default
			'default-color'          => '',    // background color default (dont add the #)
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);

	// rss thingy
	add_theme_support( 'automatic-feed-links' );

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav'     => __( 'Main Menu', 'adelio' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'adelio' ) // secondary nav in footer
		)
	);

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );

}

function adelio_page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}
	echo '<nav class="pagination">';
	echo paginate_links( array(
		'base'      => str_replace( $bignum, '%#%', esc_url( get_pagenum_link( $bignum ) ) ),
		'format'    => '',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'prev_text' => '&larr;',
		'next_text' => '&rarr;',
		'type'      => 'list',
		'end_size'  => 3,
		'mid_size'  => 3
	) );
	echo '</nav>';
}

//function adelio_filter_ptags_on_images( $content ) {
//	return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
//}
//add_action( 'init', 'register_footer_menus' );
