<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="mainlist">

	<div id="author-info" class="author-fix floatparentfix">
	
		<header id="titlebar" class="page-header roboto">
			<h1 class="page-title">	<?php printf( __( 'Archives of %s', 'twentyeleven' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
		</header><!-- #titlebar -->
	
		<div id="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
		</div><!-- #author-avatar -->
		<div id="author-description" class="roboto">
			

			<ul id="author-link">
				<li class="author-block">
				巢穴
				</li>
				<li class="author-link">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php printf( __( '%s 的漫言文集', 'twentyeleven' ), get_the_author() ); ?></a>
				</li>
				<li class="author-link">
				<a href="<?php echo esc_url( the_author_meta( 'user_url', get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php printf( __( '豆瓣', 'twentyeleven' ), get_the_author() ); ?></a>
				</li>
				<li class="author-link">
				<a href="<?php the_author_meta( 'user_url', get_the_author_meta( 'ID' ) ); ?>" rel="author">
					<?php printf( __( '微博', 'twentyeleven' ), get_the_author() ); ?></a>
				</li>
				<li class="author-link">
				<a href="mailto:<?php the_author_meta( 'user_email', get_the_author_meta( 'ID' ) ); ?>" rel="author">
					<?php printf( __( '邮箱', 'twentyeleven' ), get_the_author() ); ?></a>
				</li>
			</ul><!-- #author-link	-->				
			<div class="author-block">简介</div>
			<?php the_author_meta( 'description' ); ?>
			

		</div><!-- #author-description -->
	</div><!-- #entry-author-info -->
	
		
	
	<div class="mainlist-regular floatparentfix">

			<?php if ( have_posts() ) : ?>

				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>


				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>




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

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?><!-- else if: No Posts -->

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

	</div><!-- .mainlist-regular -->
</div><!-- #mainlist -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>