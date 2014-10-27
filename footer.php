<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="panorama-wrapper">
				<img src="http://www.hultsfred.se/files/2013/03/panorama_webb.png" alt="Hultsfreds kommun" /><br>
					<?php 
					
					$blog_list = hk_get_sorted_sites();
					$i = 0;
					$first = true;
					foreach ($blog_list AS $blog) {
						
						if ($blog['blog_id'] != "1") {
					
							$details = get_blog_details($blog['blog_id']); 
							if (!$first) {
								echo ' | ';
							}
							$first = false;
							echo ' <a href="' . $details->siteurl . '">' . $details->blogname . '</a> ';
						}
					}
					?>
						
			</div>
			<div class="site-info">
				<?php do_action( 'twentyfourteen_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyfourteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyfourteen' ), 'WordPress' ); ?></a> | <?php wp_loginout(); ?>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>