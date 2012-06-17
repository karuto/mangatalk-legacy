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
		
<<<<<<< HEAD
	
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
	
=======
		
		<header class="entry-header clearfix floatparentfix">
		
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				<h6 class="entry-prompt"><?php comments_number( '0 NOTES', '1 NOTE', '% NOTES' ); ?><br />
				<span class="entry-define">
				<?php 
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
			<?php if ($post->post_excerpt!==''): ?>
				<?php the_excerpt(); ?>
			<?php else : ?>
				<?php echo '<p>';
				echo mb_strimwidth(strip_tags($post->post_content),0,200,'......');
				// KM: If no excerpts specified, trim 200 words for default display.
				// KM: Below: Manually ouput "read more". Yeah I know, but I can take it. :/
				?>
				</p><div class="readmore"><a href="<?php the_permalink();?>">阅读全文 ｜ Read More</a></div>				
			<?php endif; ?>
		</div><!-- .entry-summary -->
>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.
		
	</article><!-- #post-<?php the_ID(); ?> -->