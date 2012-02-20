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
<div id="scroll">
	<div id="up_scroll"></div>
	<div id="comt_scroll"></div>
	<div id="down_scroll"></div>
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