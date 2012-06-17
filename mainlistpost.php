<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix floatparentfix'); ?>>
		
		<div class="mainlist-thumbnail floatl">

			<?php if ( has_post_thumbnail() ) :
					// $w = get_option('thumbnail_size_w') / 2;
					// $h = get_option('thumbnail_size_h') /2;
					the_post_thumbnail( thumbnail );
			 ?>
			<?php else : // change default thumbnail here
					echo'<img width="150" height="150" src="http://mangatalk.net/mt-uploads/2012/02/20110321-003-150x150.jpg" class="attachment-thumbnail wp-post-image">';
			?>
			<?php endif; ?>
			
		</div><!-- .entry-thumbnail -->
		
		<?php wp_reset_query(); ?><!-- Reset query before invoking conditional tags. -->
		<?php if (is_home() || $_SERVER["REQUEST_URI"] == '/' || $_SERVER["REQUEST_URI"] == '/index.php') : ?>
		<div class="mainlist-content-home floatl">
		<?php else : ?>
		<div class="mainlist-content-regular floatl">
		<?php endif; ?>
		
			<header>
			
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Click to Read %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><h2 class="beta"><?php the_title(); ?></h2></a>
				</h1><!-- .entry-title -->
				
<<<<<<< HEAD
				<h5 class="epsilon roboto">Written By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author_meta( 'display_name' ) ?></a> on <?php echo get_the_date(); ?> <b class="red">+</b> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Click to Read %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php comments_number( '<span class="red">0 notes</span>', '<span class="red">1 note</span>', '<span class="red">% notes</span>' ); ?><br /></a></h5>
=======
				<h6 class="entry-define less-focus roboto">Written By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author_meta( 'display_name' ) ?></a> on <?php echo get_the_date(); ?> <b class="red">+</b> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Click to Read %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php comments_number( '<span class="red">0 notes</span>', '<span class="red">1 note</span>', '<span class="red">% notes</span>' ); ?><br /></a></h6>
>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.
				
			</header><!-- .entry-header -->

			<div class="entry-summary clearfix">
			<h4>
				<?php if ($post->post_excerpt!==''): ?>
					<?php the_excerpt(); ?>
				<?php else : ?>
					<?php echo '<p class="morebottom">';
					echo mb_strimwidth(strip_tags($post->post_content),0,200,'......');
					// KM: If no excerpts specified, trim 200 words for default display.
					// KM: Below: Manually ouput "read more". Yeah I know, but I can take it. :/
					?>
<<<<<<< HEAD
					</p><div class="readmore"><a class="readmore-link" href="<?php the_permalink();?>">阅读全文 ｜ Read More</a></div>				
=======
					</p><div class="readmore"><a href="<?php the_permalink();?>">阅读全文 ｜ Read More</a></div>				
>>>>>>> Lots of modules have been updated since last commit (which was the public launch), mainly for sidebar widgets, content styles and such. Have deleted the slider gallery at homepage. Included 2 new plugins I wrote just in case.
				<?php endif; ?>
			<h4>
			</div><!-- .entry-summary -->

		</div><!-- .mainlist-content -->
		
	</article><!-- #post-<?php the_ID(); ?> -->
