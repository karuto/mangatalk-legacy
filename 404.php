<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div id="mainlist">
<div class="mainpage floatparentfix">

<header class="entry-header entry-foreplay">
	<h1 class="entry-title">Oopsy, 404 LOL</h1>
</header><!-- .entry-header -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'twentyeleven' ); ?></p>

		<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->


</div><!-- .mainlist-regular -->
</div><!-- #mainlist -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
