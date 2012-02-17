<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		
		
		<header class="entry-header clearfix">
		
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				<h6 class="entry-prompt"><?php comments_number( '0 NOTES', '1 NOTE', '% NOTES' ); ?><br />
				<span class="entry-define">
				<?php 
				 if ( has_tag( 'trans') )
					echo '译文';
			    else if ( has_tag( 'news') )
					echo '资讯';
				else if ( has_tag( 'featured') )
					echo '专题';
				else
					echo '文章';
				 
				
				?>
				</span></h6>
			</h1><!-- .entry-title -->
			
		</header><!-- .entry-header -->

		<!-- KM: Consider clean this search part later. -->
		<div class="entry-summary clearfix">
			<div class="entry-thumbnail">
				<?php 
					if ( has_post_thumbnail() ) {
					  the_post_thumbnail(medium);
					} 
				?>
			</div><!-- .entry-thumbnail -->
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		
	</article><!-- #post-<?php the_ID(); ?> -->