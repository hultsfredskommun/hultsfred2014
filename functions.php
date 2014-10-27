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


/*
 * shortcode [bloggstartpage], show category tree
 */
function cmp_blogs_name($a, $b)
{
    return strcmp($a["name"], $b["name"]);
}

function hk_get_sorted_sites() {
	$blog_sites = wp_get_sites(array("archived"=>"0","deleted"=>"0")); 
	$blog_list = array();
	$i = 0;
	foreach ($blog_sites AS $blog) {
		
		if ($blog['blog_id'] != "1") {
			switch_to_blog( $blog['blog_id'] );
			
			$blog_list[$i++] = array(
				"siteurl" => get_site_url(),
				"name" => get_bloginfo('name'),
				"image" => get_header_image(),
				"description" => get_bloginfo('description'),
				"updated" => date('j/n Y', strtotime($blog['last_updated'])));
				
			restore_current_blog();
			
		} 
	} 
	
	
	usort($blog_list, "cmp_blogs_name");
	
	return $blog_list;
}


function hk_startpage_func( $atts ){
	$retValue = "";

	$blog_list = hk_get_sorted_sites();
	
	$retValue .= "<div id='bloggstartpage' class='bloggstartpage'>";

	foreach ($blog_list AS $blog) { 
		$retValue .= '<div class="blogitem">';
		if ($blog['image'] != "")
			$retValue .= '<div class="blogheaderimg"><img src="' . $blog['image'] .'" alt="' . $blog['name'] . '" /></div>';
		else
			$retValue .= '<div class="blogheaderimg"><img class="noimage" src="' . get_stylesheet_directory_uri() . '/Hultsfreds_kommun_blO_grO_blOtxt.png" alt="' . $blog['name'] . '" /></div>';
		$retValue .= '<strong><a href="' . $blog['siteurl'] . '">' . $blog['name'] . '</a></strong> ';
		$retValue .= '<br><i>Uppdaterad ' . $blog['updated'] . '</i></div>';

		//restore to blog
	
	} 
	$retValue .= "</div>";

	return $retValue;
}
add_shortcode( 'bloggstartpage', 'hk_startpage_func' );

?>