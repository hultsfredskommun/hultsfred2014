<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<?php $hide_secondary = get_post_meta( get_the_ID(), 'hide-secondary', true ); 
$hide_secondary_class = "";
if ($hide_secondary == "true") $hide_secondary_class = "hide-secondary";
?>
<body <?php body_class($hide_secondary_class); ?>>
<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>
	
	<header id="masthead" class="site-header" role="banner">

		<div class="header-main">
			
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<div class="logo">
				<span id="logo" class="logoimg"><a href="http://www.hultsfred.se/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/Hultsfreds_kommun_blO_grO_blOtxt.png" alt="Hultsfreds kommun"></a></span>
			</div>
			<div class="search-toggle">
				<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
		
			</div>
			
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></button>
			
			<?php if (get_current_blog_id() > 1) : ?>
			<nav id="primary-sticky-navigation" class="site-navigation primary-navigation primary-sticky-navigation" role="navigation">
				<div class="nav-menu">
					<ul>
						
						<li class="page_item"><a href="/">Alla bloggar</a>
							<?php //, 'container' => '', 'items_wrap' => ''
							/*
							<ul class="children">
							$blog_list = get_blog_list( 0, 'all' ); 
							foreach ($blog_list AS $blog) { 
								if ($blog['blog_id'] != "1") { 
									$details = get_blog_details($blog['blog_id']); 
									echo '<li class="page_item"><a href="' . $details->siteurl . '">' . $details->blogname . '</a>';
									echo '</li>';
								}
							}
							</ul>*/
							?>
							
						</li>
						<!--li class="page_item"><a href="http://www.hultsfred.se/">Till hultsfred.se</a></li-->
					</ul>
				</div>
			</nav>
			<?php endif; ?>

			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>

		</div>

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div>

	</header><!-- #masthead -->

	<div id="main" class="site-main">

