<?php
/**
 * All actions, and related functions, can reside within this file, except for those within the initial theme init in functions.php
 */

/**
 * Filters content and finds any iframe elements, and wraps them in an iframe-wrap <div>. Styling is applied to make these responsive in _global.scss
 *
 * @param $content string - HTML content from any content fields with the 'the_content' filter applied
 *
 * @return mixed
 */
function adelio_iframe_wrapper($content) {

	if ( !empty($content) ) {
		// Check if there is content, otherwise errors will be returned
		// Match any iframes
		$pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
		preg_match_all($pattern, $content, $matches);

		foreach ($matches[0] as $match) {
			// Wrap matched iframe with div
			$wrappedframe = '<div class="embed-responsive embed-responsive-16by9">' . $match . '</div>';

			// Replace original iframe with new in content
			$content = str_replace($match, $wrappedframe, $content);
		}
	}

	return $content;
}
add_filter('the_content', 'adelio_iframe_wrapper');

/**
 * Finds all anchors within $content that have a target="_blank" attribute and adds a title that reads 'Opens in a new window'.
 *
 * This is used instead of a simpler js version to keep to accessibility requirements with no-js
 *
 * @param $content string - HTML content from any content fields with the 'the_content' filter applied
 *
 * @return string
 */
function adelio_anchor_title_target_blank($content) {

	if ( !empty($content) ) {
		// Check if there is content, otherwise errors will be returned
		$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
		$document = new DOMDocument();
		libxml_use_internal_errors(true);
		$document->loadHTML(utf8_decode($content));

		$anchors = $document->getElementsByTagName('a');

		foreach ( $anchors as $anchor ) {
			/**
			 * @var $anchor DOMElement
			 */
			$anchorTarget = $anchor->getAttribute('target');

			if ( $anchorTarget && $anchorTarget === '_blank' ) {
				$anchor->setAttribute('title', 'Opens in a new window');
			}
		}

		$content = $document->saveHTML();
	}

	return $content;
}
add_filter('the_content', 'adelio_anchor_title_target_blank');