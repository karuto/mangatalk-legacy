<?php
/**
 * The default template for displaying posts on #top3 area of homepage.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		
	
	<a class="blocky summary-header clearfix floatparentfix" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><h2 class="beta floatl"><?php the_title(); ?></h2>
		<span class="blocky floatr entry-prompt">
			<span class="blocky zeta"><?php comments_number( '0 NOTES', '1 NOTE', '% NOTES' ); ?></span>
			<span class="blocky delta"><?php 
			 if ( has_tag( 'featured') )
				echo '专题';
			else if ( has_tag( 'news') )
				echo '资讯';
			else if ( has_tag( 'trans') )
				echo '译文';
			else if ( has_tag( 'love') )
				echo '漫评';
			else
				echo '文章';
			?></span>
		</span>
	</a><!-- .summary-header -->		


	<div class="entry-summary clearfix">
		<div class="middle morebottom">
			<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail(medium);
			} ?>
		</div>
		<h4>
			<?php if ($post->post_excerpt!==''): ?>
				<?php the_excerpt(); ?>
			<?php else : ?>			
				<?php echo mb_strimwidth(strip_tags($post->post_content),0,200,'......');
				// KM: If no excerpts specified, trim 200 words for default display. ?>					
			<?php endif; ?>
		</h4>
	</div><!-- .entry-summary -->
	
		
	</article><!-- #post-<?php the_ID(); ?> -->