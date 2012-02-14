<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<header class="entry-header entry-foreplay">
	<h1 class="entry-title"><?php the_title(); ?></h1>

	<?php if ( 'post' == get_post_type() ) : ?>
		<h6 class="entry-define less-focus roboto">Written By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author() ?></a> on <?php echo get_the_date(); ?> <b class="red">+</b> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Click to Read %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php comments_number( '<span class="red">0 notes</span>', '<span class="red">1 note</span>', '<span class="red">% notes</span>' ); ?><br /></a></h6>
	<?php endif; ?>
</header><!-- .entry-header -->


<div id="mainlist">
<div class="mainpost floatparentfix">
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta roboto">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} else {
				$utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->
	
	<div id="author-info">
		<div id="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
		</div><!-- #author-avatar -->
		
		<div id="author-description" class="roboto">
			
			<div class="author-block">作者</div>
			<h2><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php printf( __( '%s', 'twentyeleven' ), get_the_author() ); ?></a></h2><br/>
			<ul id="author-link">
				<li class="author-block">
				出没
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
		
</article><!-- #post-<?php the_ID(); ?> -->

