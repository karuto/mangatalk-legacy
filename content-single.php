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
	<?php 
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
	?>
	
	<h1 class="entry-title"><?php the_title(); ?></h1>

	
	<?php if ( 'post' == get_post_type() ) : ?>
		<h6 class="entry-define semi-focus roboto">Written By 
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author() ?></a>
		on <?php echo get_the_date(); ?> 
		<b class="red">+</b> 
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '添加评论至 %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php comments_number( '<span class="red">0 notes</span>', '<span class="red">1 note</span>', '<span class="red">% notes</span>' ); ?></a>  
		<?php the_tags( '<span style="">Tagged with ', '<span style="color:#ce5333"> | </span>', '</span>' ); ?>  
		<?php edit_post_link( __( '- Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?><br /></h6>
	<?php endif; ?>
</header><!-- .entry-header -->


<div id="mainlist">
<div id="scroll">
	<div id="up_scroll"></div>
	<div id="comt_scroll"></div>
	<div id="down_scroll"></div>
	<div id="hidescroll"></div>
</div>
<div class="mainpost floatparentfix">
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
		

	</div><!-- .entry-content -->

	<footer class="entry-meta">
		
		<div id="vias-refs">
		<?php $refs = get_post_meta($post->ID, 'source', false); ?>
		<?php $vias = get_post_meta($post->ID, 'via', false); ?>
			<?php if ($vias) : ?>
				<?php $v_count = 0; ?>
				<span class="meta-leadblock">VIA</span>
				<?php foreach($vias as $v) {
					$v_count++;
					echo '<a href="'.$v.'"><li class="meta-unitblock">'.$v_count.'</li></a>';
				} ?>
				<?php $v_count = 0; // reset the counter ?>
			<?php endif; ?>
			<?php if ($refs) : ?>
				<?php $r_count = 0; ?>
				<span class="meta-leadblock">REFERENCES</span>
				<?php foreach($refs as $s) {
					$r_count++;
					echo '<a href="'.$s.'"><li class="meta-unitblock">'.$r_count.'</li></a>';
				} ?>
				<?php $r_count = 0; // reset the counter ?>
			<?php endif; ?>
		</div><!-- #vias-refs -->


		<span class="pspace">
		版权声明：本文采用<a href="http://creativecommons.org/licenses/by-nc-sa/2.5/deed.zh"> BY-NC-SA 中国大陆许可协议</a> 授权，可以自由转载，但转载时请务必<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><strong>以超链接形式</strong>标明本文原始出处</a>、<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">作者信息</a>及本声明，并且不得商用。任何违反协议的侵权行为将被追究法律责任。
		
		<span class="social-stuff clearfix"><?php echo wp_sns_share();?></span>
		</span>
		
		
		<?php
			// if ( '' != $tag_list ) {
				// $utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			// } else {
				// $utility_text = __( 'This entry was posted by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			// }

			// printf(
				// $utility_text,
				// $categories_list,
				// $tag_list,
				// esc_url( get_permalink() ),
				// the_title_attribute( 'echo=0' ),
				// get_the_author(),
				// esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			// );
		?>

	</footer><!-- .entry-meta -->
	
	<div id="author-info">
		<div id="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
		</div><!-- #author-avatar -->
		
		<div id="author-description">
			
			<div class="meta-leadblock roboto">作者</div>
			<h2 class="roboto"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php printf( __( '%s', 'twentyeleven' ), get_the_author() ); ?></a></h2><br/>
			<ul id="author-link" class="roboto">
				<li class="meta-leadblock">
				出没
				</li>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<li class="meta-unitblock">
					<?php printf( __( '%s 的漫言文集', 'twentyeleven' ), get_the_author() ); ?>
				</li></a>
				
				<a href="<?php echo esc_url( the_author_meta( 'douban', get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<li class="meta-unitblock">
					<?php printf( __( '豆瓣', 'twentyeleven' ), get_the_author() ); ?>
				</li></a>
				
				<a href="<?php the_author_meta( 'weibo', get_the_author_meta( 'ID' ) ); ?>" rel="author">
				<li class="meta-unitblock">
					<?php printf( __( '微博', 'twentyeleven' ), get_the_author() ); ?>
				</li></a>
				
				<a href="mailto:<?php the_author_meta( 'user_email', get_the_author_meta( 'ID' ) ); ?>" rel="author">
				<li class="meta-unitblock">				
					<?php printf( __( '邮箱', 'twentyeleven' ), get_the_author() ); ?>
				</li></a>
				
			</ul><!-- #author-link -->				
			<div class="floatl meta-leadblock roboto">简介</div>
			<div class="floatl author-desc"><?php the_author_meta( 'description' ); ?></div>
			
		</div><!-- #author-description -->
	</div><!-- #entry-author-info -->
		
</article><!-- #post-<?php the_ID(); ?> -->

