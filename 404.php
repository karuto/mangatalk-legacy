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

	<header id="titlebar" class="page-header roboto">
		<h1 class="page-title">
			很抱歉，您所访问的网页不存在。<a href="<?php echo home_url(); ?>">返回首页？</a>
		</h1>
	</header><!-- #titlebar -->	
	
	<div class="mainlist-regular floatparentfix">
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<p><?php _e( '<strong>您是否在输入地址时，无心打错了某个字呢？<br />您可以点击上方导航栏按分类浏览文章，也可以在下方尝试搜索。祝阅读愉快！=)</strong>', 'twentyeleven' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->

	</div><!-- .mainlist-regular -->
</div><!-- #mainlist -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
