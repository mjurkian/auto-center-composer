<?php
/**
 * functions.php extras
 *
 * This file is used for all utility functions.
 *
 * Please place all add_action calls, with their relevant functions within actions.php
 */

/**
 * Loops through the flexible content field and displays any partials that have templates within /templates/partials/
 */
function adelio_display_flexible_content()
{
	global $post;

	if ( have_rows('flexible_content', $post->ID) ) {
		while ( have_rows('flexible_content', $post->ID ) ) {
			the_row();

			$fileName = __DIR__ . '/../partials/' . get_row_layout() . '.php';

			if ( file_exists($fileName) ) {
				include($fileName);
			}
		}
	}
}

/**
 * Includes the hero image template
 */
function adelio_display_hero_section()
{
	include(__DIR__ . '/../partials/hero-image.php');
}

/**
 * Alternative to the_excerpt.
 *
 * Pass any string through this function along with a maximum character limit
 *
 * @param $string string - No HTML, use strip_tags() on any HTML content prior to using this function
 * @param $your_desired_width int - The desired width in characters, how strict this is maintained is controllable via the $strict argument
 * @param $strict bool - default true
 * How strict the character limit should be. If set to true, this will remove any words (even if in the middle of a word) that exceed the character limit.
 * If set to false, this will allow a word to go over the character limit, if the character limit ended in the middle of that word
 *
 * Example: "Hello World" has 11 characters (1 space, 10 letters). If the character limit was set to 9, strict would behave in the following way:
 *
 *     True: would return "Hello..."
 *     False: Would Return "Hello World" Because 9 characters ends on the 'r' of World, it will complete the word and THEN end.
 *
 * @return bool|string
 */
function adelio_truncate_string( $string, $your_desired_width, $strict = true ) {
	$parts       = preg_split( '/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE );
	$parts_count = count( $parts );

	$greater = false;

	$startingLength = strlen($string);
	$length    = 0;
	$last_part = 0;

	for ( ; $last_part < $parts_count; ++ $last_part ) {
		$length += strlen( $parts[ $last_part ] );
		if ( $length > $your_desired_width ) {
			$greater = true;
			if ( !$strict ) {
				$last_part++;
			}
			break;
		}
	}

	if ( $startingLength === $length ) {
		$greater = false;
	}

	$finalString = implode( array_slice( $parts, 0, $last_part ) );
	$finalChar   = substr( $finalString, - 1 );

	while ( $finalChar === ',' || $finalChar === ' ' || $finalChar === '.' ) {
		$finalString = substr( $finalString, 0, - 1 );
		$finalChar   = substr( $finalString, - 1 );
	}

	return $greater ? $finalString . '...' : $finalString;
}


// Register Custom Post Type
// function people_post_type() {

// 	$labels = array(
// 		'name'                  => _x( 'People', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'         => _x( 'People', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'             => __( 'People', 'text_domain' ),
// 		'name_admin_bar'        => __( 'People', 'text_domain' ),
// 		'archives'              => __( 'People Archives', 'text_domain' ),
// 		'attributes'            => __( 'People Attributes', 'text_domain' ),
// 		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
// 		'all_items'             => __( 'All People', 'text_domain' ),
// 		'add_new_item'          => __( 'Add Person', 'text_domain' ),
// 		'add_new'               => __( 'Add New', 'text_domain' ),
// 		'new_item'              => __( 'New Item', 'text_domain' ),
// 		'edit_item'             => __( 'Edit Item', 'text_domain' ),
// 		'update_item'           => __( 'Update Item', 'text_domain' ),
// 		'view_item'             => __( 'View Item', 'text_domain' ),
// 		'view_items'            => __( 'View Items', 'text_domain' ),
// 		'search_items'          => __( 'Search Item', 'text_domain' ),
// 		'not_found'             => __( 'Not found', 'text_domain' ),
// 		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
// 		'featured_image'        => __( 'Featured Image', 'text_domain' ),
// 		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
// 		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
// 		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
// 		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
// 		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
// 		'items_list'            => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
// 		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
// 	);
// 	$args = array(
// 		'label'                 => __( 'People', 'text_domain' ),
// 		'description'           => __( 'People', 'text_domain' ),
// 		'labels'                => $labels,
// 		'supports'              => array( 'title', 'editor', 'page-attributes' ),
// 		'hierarchical'          => false,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => true,
// 		'menu_position'         => 5,
// 		'menu_icon'             => 'dashicons-businessman',
// 		'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'can_export'            => true,
// 		'has_archive'           => false,
// 		'exclude_from_search'   => false,
// 		'publicly_queryable'    => true,
// 		'capability_type'       => 'page',
// 	);
// 	register_post_type( 'people', $args );

// }
// add_action( 'init', 'people_post_type', 0 );

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}



