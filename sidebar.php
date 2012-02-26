<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>

	<?php wp_reset_query(); ?><!-- Reset query before invoking conditional tags. -->

	<div id="secondary" class="widget-area regular-sidebar" role="complementary">
	<!-- KM: Scroll Panel -->
	<div id="scroll">
		<div title="回到顶部" id="up_scroll" class="scroll_unit"></div>
		<div title="分享 / 评论" id="comt_scroll" class="scroll_unit"></div>
		<div title="回到底部" id="down_scroll" class="scroll_unit"></div>
		<div id="hidescroll"></div>
	</div>
		<?php if ( ! dynamic_sidebar( 'sidebar-main' ) ) : ?>

			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary .widget-area -->
<?php endif; ?>