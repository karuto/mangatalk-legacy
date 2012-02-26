<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'footerbar-3'  )
		&& ! is_active_sidebar( 'footerbar-4' )
		&& ! is_active_sidebar( 'footerbar-5'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="supplementary" <?php twentyeleven_footer_sidebar_class(); ?>>

	<?php if ( is_active_sidebar( 'footerbar-3' ) ) : ?>
	<div id="footer-w1" class="widget-area column maincol" role="complementary">
		<div class="footer-wbox">
		<?php dynamic_sidebar( 'footerbar-3' ); ?>
		</div>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footerbar-4' ) ) : ?>
	<div id="footer-w2" class="widget-area column maincol" role="complementary">
		<div class="footer-wbox">
		<?php dynamic_sidebar( 'footerbar-4' ); ?>
		</div>	</div><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'footerbar-5' ) ) : ?>
	<div id="footer-w3" class="widget-area column maincol" role="complementary">
		<div class="footer-wbox">
		<?php dynamic_sidebar( 'footerbar-5' ); ?>
		</div>	</div><!-- #second .widget-area -->
	</div><!-- #third .widget-area -->
	<?php endif; ?>
	
</div><!-- #supplementary -->