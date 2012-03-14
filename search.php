<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="mainlist">

	<?php if ( have_posts() ) : ?>

		<header id="titlebar" class="page-header roboto">
			<h1 class="page-title">
				<?php printf( __( '包含「%s」的文章', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>
		</header><!-- #titlebar -->	
		
		<div class="mainlist-regular floatparentfix">
		
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 
				 get_template_part( 'content', get_post_format() );
				 
				 */
				get_template_part( 'mainlistpost');
			?>

		<?php endwhile; ?>
		<?php twentyeleven_content_nav( 'nav-below' ); 
		/* Display navigation to next/previous pages when applicable */?>

		
	<?php else : // no results returned ?>

		<header id="titlebar" class="page-header roboto">
			<h1 class="page-title">
				<?php _e( '很抱歉，没有符合您要求的文章。', 'twentyeleven' ); ?><a href="<?php echo home_url(); ?>">返回首页？</a>
			</h1>
			
		</header><!-- #titlebar -->
		
		<div class="mainlist-regular floatparentfix">
	<?php endif; ?>

		</div><!-- .mainlist-regular -->
</div><!-- #mainlist -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>