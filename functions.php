<?php
//add_editor_style( 'editor-style.css' );

// shortcodes
/*
 * shortcode [categorytree], show category tree
 */
function hk_category_tree_func( $atts ){
	$retValue = "";

	// full category tree
	$retValue .= "<div id='categorytree' class='shortcode'>";
	$retValue .= wp_list_categories( 
		array(
			'show_option_all'    => '',
			'style'              => 'list',
			'show_count'         => 1,
			'hide_empty'         => 0,
			'use_desc_for_title' => 1,
			'child_of'           => 0,
			'feed'               => '',
			'feed_type'          => '',
			'feed_image'         => '',
			'exclude_tree'       => '',
			'include'            => '',
			'hierarchical'       => 1,
			'title_li'           => '',
			'show_option_none'   => __('No categories'),
			'number'             => null,
			'echo'               => 0,
			'depth'              => 0,
			'current_category'   => 0,
			'pad_counts'         => 0,
			'taxonomy'           => 'category',
			'walker'             => null
	) );
	$retValue .= "</div>";

	return $retValue;
}
add_shortcode( 'categorytree', 'hk_category_tree_func' );

?>