<?php
/**
 * Template Name: Featured Page
 * Description: A Page Template without sidebars, for better focus on the featured content.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div id="single-column-page">
<div id="mainlist">
<div class="mainpage floatparentfix">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>
		<?php comments_template( '', true ); ?>

	<?php endwhile; // end of the loop. ?>

</div><!-- .mainlist-regular -->
</div><!-- #mainlist -->
</div><!-- #single-column-page -->
<?php get_footer(); ?>