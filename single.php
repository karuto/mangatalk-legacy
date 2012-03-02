<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

<!--
	<nav id="nav-single">
		<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
		<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
		<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
	</nav>
-->

	<?php 
		$format = get_post_format();
		if ( $format == 'aside' )
			get_template_part( 'content', 'aside' ); 
		else 
			get_template_part( 'content', 'single' ); 
	?>

	<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

</div><!-- .mainpost -->
</div><!-- #mainlist -->
<?php 
	$format = get_post_format();
	if ( false === $format )
		get_sidebar();
?>
<?php get_footer(); ?>