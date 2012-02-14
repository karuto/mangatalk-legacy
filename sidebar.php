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
	<?php if (is_home() || $_SERVER["REQUEST_URI"] == '/' || $_SERVER["REQUEST_URI"] == '/index.php') : ?>
		<div id="secondary" class="widget-area homepage-sidebar" role="complementary">
	<?php else : ?>
		<div id="secondary" class="widget-area regular-sidebar" role="complementary">
	<?php endif; ?>
		
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